<?php

/**
 * Handles the user login/logout/session
 * @author Panique
 * @link http://www.php-login.net
 * @link https://github.com/panique/php-login-advanced/
 * @license http://opensource.org/licenses/MIT MIT License
 */
class Login
{
    /**
     * @var object $db_connection The database connection
     */
    private $db = null;
    /**
     * @var int $user_id The user's id
     */
    private $user_id = null;
    /**
     * @var string $user_name The user's name
     */
    private $user_name = "";
    /**
     * @var string $user_email The user's mail
     */
    private $user_email = "";
    /**
     * @var boolean $user_admin The user's is a administrator
     */
    private $user_admin = false;
    /**
     * @var boolean $user_is_logged_in The user's login status
     */
    private $user_is_logged_in = false;
    /**
     * @var boolean $password_reset_link_is_valid Marker for view handling
     */
    private $password_reset_link_is_valid  = false;
    /**
     * @var boolean $password_reset_was_successful Marker for view handling
     */
    private $password_reset_was_successful = false;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session
        session_start();

        $this->db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        
        // TODO: organize this stuff better and make the constructor very small
        // TODO: unite Login and Registration classes ?

        // Check the possible login actions:
        
        // 1. logout (happen when user clicks logout button)
        // ===============================
        // 2. login via session data 
        // ===============================
        //    (happens each time user opens a page on your php project AFTER he has successfully logged in via the login form)
        // 3. login via cookie
        // ===============================
        // 4. login via post data
        // ===============================
        //    which means simply logging in via the login form. after the user 
        //    has submit his login/password successfully, his logged-in-status is written into his session data on the server. 
        //    This is the typical behaviour of common login scripts.

        
        if (isset($_GET["logout"])) {       // if user tried to log out
            $this->doLogout();

        } elseif (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) { // if user has an active session on the server
            $this->loginWithSessionData();

            // checking for form submit from editing screen
            // user try to change his username
            if (isset($_POST["user_edit_submit_name"])) {
                // function below uses use $_SESSION['user_id'] and $_SESSION['user_email']
                $this->editUserName($_POST['user_name']);
                
            // user try to change his email
            } elseif (isset($_POST["user_edit_submit_email"])) {
                // function below uses use $_SESSION['user_id'] and $_SESSION['user_email']
                $this->editUserEmail($_POST['user_email']);
                
            // user try to change his password
            } elseif (isset($_POST["user_edit_submit_password"])) {
                // function below uses $_SESSION['user_name'] and $_SESSION['user_id']
                $this->editUserPassword($_POST['user_password_old'], $_POST['user_password_new'], $_POST['user_password_repeat']);
            }

        // login with cookie
        } elseif (isset($_COOKIE['rememberme'])) {
            $this->loginWithCookieData();

        // if user just submitted a login form
        } elseif (isset($_POST["login"])) {
            if (!isset($_POST['user_rememberme'])) {
                $_POST['user_rememberme'] = null;
            }
            $this->loginWithPostData($_POST['user_email'], $_POST['user_password'], $_POST['user_rememberme']);
        }

        // checking if user requested a password reset mail
        if (isset($_POST["request_password_reset"]) && isset($_POST['user_email'])) {
            $this->setPasswordResetDatabaseTokenAndSendMail($_POST['user_email']);
        } elseif (isset($_GET["user_email"]) && isset($_GET["verification_code"])) {
            $this->checkIfEmailVerificationCodeIsValid($_GET["user_email"], $_GET["verification_code"]);
        } elseif (isset($_POST["submit_new_password"])) {
            $this->editNewPassword(
                $_POST['user_email'],
                $_POST['user_password_reset_hash'],
                $_POST['user_password_new'],
                $_POST['user_password_repeat']
            );
        }
    }

    /**
     * Search into database for the user data of user_name specified as parameter
     * @return user data as an object if existing user
     * @return false if user_name is not found in the database
     * TODO: @devplanete This returns two different types. Maybe this is valid, but it feels bad. We should rework this.
     * TODO: @devplanete After some resarch I'm VERY sure that this is not good coding style! Please fix this.
     */
    private function getUserData($email)
    {
        // if database connection opened
        if ($this->db->isConnected()) {
            // database query, getting all the info of the selected user
            $select = $this->db->row(
                'SELECT * FROM users WHERE user_email = :user_email',
                array('user_email' => $email)
            );
            // get result row (as an object)
            return $select;
        } 
        else {
            return false;
        }
    }

    /**
     * Logs with S_SESSION data.
     * Technically we are already logged in at that point of time, as the $_SESSION values already exist.
     */
    private function loginWithSessionData()
    {        
        $this->user_name = $_SESSION['user_name'];
        $this->user_email = $_SESSION['user_email'];

        // set logged in status to true, because we just checked for this:
        //if(!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)
        // when we called this method (in the constructor)
        $this->user_is_logged_in = true;
        
        if($_SESSION['user_privileges'] == 1)
            $this->user_admin = true;
    }

    /**
     * Logs in via the Cookie
     * @return bool success state of cookie login
     */
    private function loginWithCookieData()
    {
        if (isset($_COOKIE['rememberme'])) {
            // extract data from the cookie
            list ($user_id, $token, $hash) = explode(':', $_COOKIE['rememberme']);
            // check cookie hash validity
            if ($hash == hash('sha256', $user_id . ':' . $token . COOKIE_SECRET_KEY) && !empty($token)) {
                // cookie looks good, try to select corresponding user
                if ($this->db->isConnected()) {
                    // get real token from database (and all other data)
                    $select = $this->db->row(
                        "SELECT user_id, user_name, user_email FROM users 
                        WHERE user_id = :user_id AND user_rememberme_token = :user_rememberme_token 
                                                 AND user_rememberme_token IS NOT NULL",
                        array(
                            "user_id"=>$user_id,
                            "user_rememberme_token"=>$token
                        )
                    );

                    if (isset($select["user_id"])) {
                        // write user data into PHP SESSION [a file on your server]
                        $_SESSION['user_id'] = $select["user_id"];
                        $_SESSION['user_name'] = $select["user_name"];
                        $_SESSION['user_email'] = $select["user_email"];
                        $_SESSION['user_logged_in'] = 1;

                        // declare user id, set the login status to true
                        $this->user_id = $select["user_id"];
                        $this->user_name = $select["user_name"];
                        $this->user_email = $select["user_email"];
                        $this->user_is_logged_in = true;

                        // Cookie token usable only once
                        $this->newRememberMeCookie();
                        return true;
                    }
                }
            }
            // A cookie has been used but is not valid... we delete it
            $this->deleteRememberMeCookie();
            $this->errors[] = MESSAGE_COOKIE_INVALID;
        }
        return false;
    }

    /**
     * Logs in with the data provided in $_POST, coming from the login form
     * @param $user_name
     * @param $user_password
     * @param $user_rememberme
     */
    private function loginWithPostData($email, $user_password, $user_rememberme)
    {  
        if (empty($email)) {
            $this->errors[] = MESSAGE_EMAIL_EMPTY;
        } else if (empty($user_password)) {
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;

        // if POST data (from login form) contains non-empty user_name and non-empty user_password
        } else {
            $select = $this->getUserData(trim($email));
            
            // if this user not exists
            if (! isset($select["user_id"])) {
                // was MESSAGE_USER_DOES_NOT_EXIST before, but has changed to MESSAGE_LOGIN_FAILED
                // to prevent potential attackers showing if the user exists
                $this->errors[] = MESSAGE_LOGIN_FAILED;
            } else if (($select["user_failed_logins"] >= 3) && ($select["user_last_failed_login"] > (time() - 30))) {
                $this->errors[] = MESSAGE_PASSWORD_WRONG_3_TIMES;
            // using PHP 5.5's password_verify() function to check if the provided passwords fits to the hash of that user's password
            } else if (!password_verify($user_password, $select["user_password_hash"])) {            
                // increment the failed login counter for that user
                $fails = $this->failed_logins($email);
                $fails = $fails+1;

                $update = $this->db->query(
                    'UPDATE users
                     SET 
                     user_failed_logins = :user_failed_logins, 
                     user_last_failed_login = :user_last_failed_login
                     WHERE user_email = :user_email',
                
                    array(
                        "user_email"=>$email,
                        "user_failed_logins"=>$fails,
                        "user_last_failed_login"=>time()
                    )
                );

                $this->errors[] = MESSAGE_PASSWORD_WRONG;
            // has the user activated their account with the verification email
            } else if ($select["user_active"] != 1) {
                $this->errors[] = MESSAGE_ACCOUNT_NOT_ACTIVATED;
            } else {
                // write user data into PHP SESSION [a file on your server]
                $_SESSION['user_id']        = $select["user_id"];
                $_SESSION['user_name']      = $select["user_name"];
                $_SESSION['user_email']     = $select["user_email"];
                $_SESSION['user_logged_in'] = 1;

                // declare user id, set the login status to true
                $this->user_id           = $select["user_id"];
                $this->user_name         = $select["user_name"];
                $this->user_email        = $select["user_email"];
                $this->user_is_logged_in = true;
                
                // Set admin to true if he has got his field set to 1
                if($select["user_admin"] == 1){
                    $this->user_admin = true;
                    $_SESSION['user_privileges'] = 1;
                }
                
                // reset the failed login counter for that user
                $update = $this->db->query(
                    'UPDATE users 
                     SET user_failed_logins = 0, user_last_failed_login = NULL 
                     WHERE user_id = :user_id AND user_failed_logins != 0',

                  array('user_id' => $select["user_id"])
                );

                // if user has check the "remember me" checkbox, then generate token and write cookie
                if (isset($user_rememberme)) {
                    $this->newRememberMeCookie();
                } else {
                    // Reset remember-me token
                    $this->deleteRememberMeCookie();
                }

                // OPTIONAL: recalculate the user's password hash
                // DELETE this if-block if you like, it only exists to recalculate users's hashes when you provide a cost factor,
                // by default the script will use a cost factor of 10 and never change it.
                // check if the have defined a cost factor in config/hashing.php
                if (defined('HASH_COST_FACTOR')) {
                    // check if the hash needs to be rehashed
                    if (password_needs_rehash($select["user_password_hash"], PASSWORD_DEFAULT, array('cost' => HASH_COST_FACTOR))) {

                        // calculate new hash with new cost factor
                        $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT, array('cost' => HASH_COST_FACTOR));

                        // TODO: this should be put into another method !?
                        $update = $this->db->query(
                            'UPDATE users SET user_password_hash = :user_password_hash WHERE user_id = :user_id',
                            array(
                                "user_password_hash"=>$user_password_hash,
                                "user_id"=>$select["user_id"]
                            )
                        );
                        
                        if ($update == 0) {
                            // writing new hash was successful. you should now output this to the user ;)
                        } else {
                            // writing new hash was NOT successful. you should now output this to the user ;)
                        }
                    }
                }
            }
        }
    }

    /**
     * Create all data needed for remember me cookie connection on client and server side
     */
    private function newRememberMeCookie()
    {
        // if database connection opened
        if ($this->db->isConnected()) {
            // generate 64 char random string and store it in current user data
            $random_token_string = hash('sha256', mt_rand());
            $update = $this->db->query(
                "UPDATE users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id",
                array(
                    "user_rememberme_token"=>$random_token_string,
                    "user_id"=>$_SESSION['user_id']
                )
            );

            // generate cookie string that consists of userid, randomstring and combined hash of both
            $cookie_string_first_part = $_SESSION['user_id'] . ':' . $random_token_string;
            $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
            $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;

            // set cookie
            setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
        }
    }

    /**
     * Delete all data needed for remember me cookie connection on client and server side
     */
    private function deleteRememberMeCookie()
    {
        // if database connection opened
        if ($this->db->isConnected()) {
            // Reset rememberme token
            $update = $this->db->query(
                "UPDATE users SET user_rememberme_token = NULL WHERE user_id = :user_id",
                array("user_id"=>$_SESSION['user_id'])
            );
        }

        // set the rememberme-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obivously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
    }

    /**
     * Perform the logout, resetting the session
     */
    public function doLogout()
    {
        $this->deleteRememberMeCookie();

        $_SESSION = array();
        session_destroy();

        $this->user_is_logged_in = false;
        $this->messages[] = MESSAGE_LOGGED_OUT;
    }

    /**
     * Simply return the current state of the user's login
     * @return bool user's login status
     */
    public function isUserLoggedIn()
    {
        return $this->user_is_logged_in;
    }

    /**
     * Edit the user's email, provided in the editing form
     */
    public function editUserEmail($email)
    {
        // prevent database flooding
        $email = substr(trim($email), 0, 64);

        if (!empty($email) && $email == $_SESSION["user_email"]) {
            $this->errors[] = MESSAGE_EMAIL_SAME_LIKE_OLD_ONE;
        // user mail cannot be empty and must be in email format
        } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = MESSAGE_EMAIL_INVALID;

        } else if ($this->db->isConnected()) {
            // check if new email already exists
            $select = $this->db->row(
                'SELECT * FROM users WHERE user_email = :user_email',
                array("user_email"=>$email)
            );

            // if this email exists
            if (isset($select["user_id"])) {
                $this->errors[] = MESSAGE_EMAIL_ALREADY_EXISTS;
            } else {
                // write users new data into database
                $update = $this->db->query(
                    'UPDATE users SET user_email = :user_email WHERE user_id = :user_id',
                    array(
                        "user_email"=>$email,
                        "user_id"=>$_SESSION['user_id']
                    )
                );

                if ($update > 0) {
                    $_SESSION['user_email'] = $email;
                    $this->messages[] = MESSAGE_EMAIL_CHANGED_SUCCESSFULLY . $email;
                } else {
                    $this->errors[] = MESSAGE_EMAIL_CHANGE_FAILED;
                }
            }
        }
    }

    /**
     * Edit the user's password, provided in the editing form
     */
    public function editUserPassword($user_password_old, $user_password_new, $user_password_repeat)
    {
        if (empty($user_password_new) || empty($user_password_repeat) || empty($user_password_old)) {
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;
        // is the repeat password identical to password
        } elseif ($user_password_new !== $user_password_repeat) {
            $this->errors[] = MESSAGE_PASSWORD_BAD_CONFIRM;
        // password need to have a minimum length of 6 characters
        } elseif (strlen($user_password_new) < 6) {
            $this->errors[] = MESSAGE_PASSWORD_TOO_SHORT;

        // all the above tests are ok
        } else {
            // database query, getting hash of currently logged in user (to check with just provided password)
            $select = $this->getUserData($_SESSION['user_email']);

            // if this user exists
            if (isset($select["user_password_hash"])) {

                // using PHP 5.5's password_verify() function to check if the provided passwords fits to the hash of that user's password
                if (password_verify($user_password_old, $select["user_password_hash"])) {

                    // now it gets a little bit crazy: check if we have a constant HASH_COST_FACTOR defined (in config/hashing.php),
                    // if so: put the value into $hash_cost_factor, if not, make $hash_cost_factor = null
                    $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

                    // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
                    // the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
                    // compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
                    // want the parameter: as an array with, currently only used with 'cost' => XX.
                    $user_password_hash = password_hash($user_password_new, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

                    // write users new hash into database
                    $update = $this->db->query(
                        'UPDATE users SET user_password_hash = :user_password_hash WHERE user_id = :user_id',
                        array(
                            "user_password_hash"=>$user_password_hash,
                            "user_id"=>$_SESSION['user_id']
                        )
                    );

                    // check if exactly one row was successfully changed:
                    if ($update > 0) {
                        $this->messages[] = MESSAGE_PASSWORD_CHANGED_SUCCESSFULLY;
                    } else {
                        $this->errors[] = MESSAGE_PASSWORD_CHANGE_FAILED;
                    }
                } else {
                    $this->errors[] = MESSAGE_OLD_PASSWORD_WRONG;
                }
            } else {
                $this->errors[] = MESSAGE_USER_DOES_NOT_EXIST;
            }
        }
    }

    /**
     * Sets a random token into the database (that will verify the user when he/she comes back via the link
     * in the email) and sends the according email.
     */
    public function setPasswordResetDatabaseTokenAndSendMail($email)
    {
        $email = trim($email);

        if (empty($email)) {
            $this->errors[] = MESSAGE_USERNAME_EMPTY;

        } else {
            // generate timestamp (to see when exactly the user (or an attacker) requested the password reset mail)
            // btw this is an integer ;)
            $temporary_timestamp = time();
            // generate random hash for email password reset verification (40 char string)
            $user_password_reset_hash = sha1(uniqid(mt_rand(), true));
            // database query, getting all the info of the selected user
            $select = $this->getUserData($email);

            // if this user exists
            if (isset($select["user_id"])) {

                // database query:
                $update = $this->db->query(
                    'UPDATE users 
                    SET user_password_reset_hash = :user_password_reset_hash,
                        user_password_reset_timestamp = :user_password_reset_timestamp 
                    WHERE user_email = :user_email',

                    array(
                        "user_password_reset_hash"=>$user_password_reset_hash,
                        "user_password_reset_timestamp"=>$temporary_timestamp,
                        "user_email"=>$email
                    )
                );

                // check if exactly one row was successfully changed:
                if ($update == 1) {
                    // send a mail to the user, containing a link with that token hash string
                    $this->sendPasswordResetMail($select["user_name"], $email, $user_password_reset_hash);
                    return true;
                } else {
                    $this->errors[] = MESSAGE_DATABASE_ERROR;
                }
            } else {
                $this->errors[] = MESSAGE_USER_DOES_NOT_EXIST;
            }
        }
        // return false (this method only returns true when the database entry has been set successfully)
        return false;
    }
 
    /**
     * Sends the password-reset-email.
     */
    public function sendPasswordResetMail($user_name, $user_email, $user_password_reset_hash)
    {
        $mail = new PHPMailer;

        // Definiciones en config/config.php
        // use SMTP or use mail()
        if (EMAIL_USE_SMTP) {
            // Set mailer to use SMTP
            $mail->IsSMTP();
            
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;

            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';
            
            // Enable SMTP authentication
            $mail->SMTPAuth = EMAIL_USE_SMTP;

            // Enable encryption, usually SSL/TLS
            if (defined('EMAIL_SMTP_ENCRYPTION')) {
                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            
            // Specify host server
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Port = EMAIL_SMTP_PORT;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            
        }
        else {
            $mail->IsMail();
        }

        // Remitente que envia el mensaje
        $mail->setFrom(EMAIL_CONTACT_FROM, EMAIL_CONTACT_FROM_NAME);

        // Email de destino, el nuevo usuario
        $mail->addAddress($user_email, $user_name);
        // Asunto del mensaje
        $mail->Subject = EMAIL_PASSWORDRESET_SUBJECT;
        $mail->isHTML(EMAIL_USE_HTML);

        $link = EMAIL_PASSWORDRESET_URL.'?user_email='.urlencode($user_email).'&verification_code='.urlencode($user_password_reset_hash);
        $mail->Body = EMAIL_PASSWORDRESET_CONTENT . ' ' . "<a href=\"".$link."\">".$link."</a>";

        if(!$mail->send()) {
            $this->errors[] = MESSAGE_PASSWORD_RESET_MAIL_FAILED . $mail->ErrorInfo;
            return false;
        } else {
            $this->messages[] = MESSAGE_PASSWORD_RESET_MAIL_SUCCESSFULLY_SENT;
            return true;
        }
    }

    /**
     * Checks if the verification string in the account verification mail is valid and matches to the user.
     */
    public function checkIfEmailVerificationCodeIsValid($email, $verification_code)
    {
        $email = trim($email);

        if (empty($email) || empty($verification_code)) {
            $this->errors[] = MESSAGE_LINK_PARAMETER_EMPTY;
        } else {
            // database query, getting all the info of the selected user
            $select = $this->getUserData($email);

            // if this user exists and have the same hash in database
            if (isset($select["user_id"]) && $select["user_password_reset_hash"] == $verification_code) {

                $timestamp_one_hour_ago = time() - 3600; // 3600 seconds are 1 hour

                if ($select["user_password_reset_timestamp"] > $timestamp_one_hour_ago) {
                    // set the marker to true, making it possible to show the password reset edit form view
                    $this->password_reset_link_is_valid = true;
                } else {
                    $this->errors[] = MESSAGE_RESET_LINK_HAS_EXPIRED;
                }
            } else {
                $this->errors[] = MESSAGE_USER_DOES_NOT_EXIST;
            }
        }
    }

    /**
     * Checks and writes the new password.
     */
    public function editNewPassword($email, $user_password_reset_hash, $user_password_new, $user_password_repeat)
    {
        // TODO: timestamp!
        $email = trim($email);
    
        if (empty($email) || empty($user_password_reset_hash) || empty($user_password_new) || empty($user_password_repeat)) {
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;
        // is the repeat password identical to password
        } else if ($user_password_new !== $user_password_repeat) {
            $this->errors[] = MESSAGE_PASSWORD_BAD_CONFIRM;
        // password need to have a minimum length of 6 characters
        } else if (strlen($user_password_new) < 6) {
            $this->errors[] = MESSAGE_PASSWORD_TOO_SHORT;
        // if database connection opened
        } else if ($this->db->isConnected()) {
            // now it gets a little bit crazy: check if we have a constant HASH_COST_FACTOR defined (in config/hashing.php),
            // if so: put the value into $hash_cost_factor, if not, make $hash_cost_factor = null
            $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

            // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
            // the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
            // compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
            // want the parameter: as an array with, currently only used with 'cost' => XX.
            $user_password_hash = password_hash($user_password_new, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

            // write users new hash into database
            $update = $this->db->query(
                'UPDATE users 
                SET user_password_hash = :user_password_hash,
                    user_password_reset_hash = NULL,
                    user_password_reset_timestamp = NULL
                WHERE user_email = :user_email AND user_password_reset_hash = :user_password_reset_hash',

                array(
                    "user_password_hash"=>$user_password_hash,
                    "user_password_reset_hash"=>$user_password_reset_hash,
                    "user_email"=>$email
                )

            );

            // check if exactly one row was successfully changed:
            if ($update == 1) {
                $this->password_reset_was_successful = true;
                $this->messages[] = MESSAGE_PASSWORD_CHANGED_SUCCESSFULLY;
            } else {
                $this->errors[] = MESSAGE_PASSWORD_CHANGE_FAILED;
            }
        }
    }

    /**
     * Gets the success state of the password-reset-link-validation.
     * TODO: should be more like getPasswordResetLinkValidationStatus
     * @return boolean
     */
    public function passwordResetLinkIsValid()
    {
        return $this->password_reset_link_is_valid;
    }

    /**
     * Gets the success state of the password-reset action.
     * TODO: should be more like getPasswordResetSuccessStatus
     * @return boolean
     */
    public function passwordResetWasSuccessful()
    {
        return $this->password_reset_was_successful;
    }

    /**
     * Gets the username
     * @return string username
     */
    public function getUsername()
    {
        return $this->user_name;
    }
    
    /**
     * Gets the user email
     * @return string user email
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }
    
    /**
     * Check if he is a admin
     * @return boolean True if he is admin
     */
    public function checkIsAdmin()
    {
        return $this->user_admin;
    }

    public function failed_logins($email){
        $select = $this->db->query(
            'SELECT user_failed_logins FROM users WHERE user_email = :user_email',
            array("user_email"=>$email)
        );

        return $select[0]["user_failed_logins"];
    }
}
