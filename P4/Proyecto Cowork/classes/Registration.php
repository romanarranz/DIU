<?php
class Registration{
	
	private $db = null;
	public  $registration_successful  = false;
	public  $verification_successful  = false;
	public  $errors                   = array();
	public  $messages                 = array();

	public function __construct(){

		session_start();

        // Abro una conexion a la base de datos
        $this->db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

		// si recibimos una peticion POST será porque el usuario ha pedido registrarse
		if (isset($_POST["register"])) {
            
            $this->registerNewUser(
                $_POST['nombre'], 
                $_POST['apellidos'], 
                $_POST['email'],
                $_POST['password_new'],
                $_POST['password_repeat'],
                $_POST['captcha']
           	);
        } 
        // si recibimos una peticion GET será porque el usuario quiere verificarse desde su email 
        else if (isset($_GET["id"]) && isset($_GET["verification_code"]))
        {            
            $this->verifyNewUser(
                $_GET["id"],
                $_GET["verification_code"]
            );
        }
	}


	private function registerNewUser( $nombre, $apellidos, $email, $password_new, $password_repeat, $captcha){
        // Eliminamos los espacios del nombre de usuario y de su email si los hubiera
        $nombre  = trim($nombre);
        $email = trim($email);

        if ( strtolower($captcha) != strtolower($_SESSION['captcha']) )
            $this->errors[] = MESSAGE_CAPTCHA_WRONG;

        elseif (empty($nombre))
            $this->errors[] = MESSAGE_USERNAME_EMPTY;

        elseif (empty($password_new) || empty($password_repeat))
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;

        elseif ($password_new !== $password_repeat)
        	$this->errors[] = MESSAGE_PASSWORD_BAD_CONFIRM;

        elseif (strlen($password_new) < 6)
            $this->errors[] = MESSAGE_PASSWORD_TOO_SHORT;

        elseif (strlen($nombre) > 64 || strlen($nombre) < 2)
            $this->errors[] = MESSAGE_USERNAME_BAD_LENGTH;

        elseif (!preg_match('/^[a-z\d]{2,64}$/i', $nombre))
            $this->errors[] = MESSAGE_USERNAME_INVALID;

        elseif (empty($email))
            $this->errors[] = MESSAGE_EMAIL_EMPTY;

        elseif (strlen($email) > 64)
            $this->errors[] = MESSAGE_EMAIL_TOO_LONG;
        
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->errors[] = MESSAGE_EMAIL_INVALID;
        
        // SI LLEGAMOS AQUI ES QUE TODO HA IDO BIEN
        else if ($this->db->isConnected()) {
            
            // check if username or email already exists
            $select = $this->db->query(
                "SELECT user_name, user_email FROM users WHERE user_name = :user_name OR user_email = :user_email",
                array( 
                    "user_name"=>$nombre,
                    "user_email"=>$email
                )
            );

            // if username or/and email find in the database
            // TODO: this is really awful!
            if (count($select) > 0) {
                for ($i = 0; $i < count($select); $i++) {
                    $this->errors[] = ($select[$i]['user_name'] == $nombre) ? MESSAGE_USERNAME_EXISTS : MESSAGE_EMAIL_ALREADY_EXISTS;
                }
            } else {

                // check if we have a constant HASH_COST_FACTOR defined (in config.php),
                // if so: put the value into $hash_cost_factor, if not, make $hash_cost_factor = null
                $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

                // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
                // the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
                // compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
                // want the parameter: as an array with, currently only used with 'cost' => XX.
                $user_password_hash = password_hash($password_new, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
                // generate random hash for email verification (40 char string)
                $user_activation_hash = sha1(uniqid(mt_rand(), true));

                // write new users data into database
                $insert = $this->db->query(
                    'INSERT INTO users (
                        user_name,
                        user_surname,
                        user_email,
                        user_password_hash,
                        user_registration_ip,
                        user_activation_hash,
                        user_registration_datetime
                    ) 
                    VALUES(
                        :user_name,
                        :user_surname,
                        :user_email,
                        :user_password_hash,
                        :user_registration_ip,
                        :user_activation_hash,
                        now()
                    )',
                    array(
                        "user_name"=>$nombre,
                        "user_surname"=>$apellidos,                        
                        "user_email"=>$email,
                        "user_password_hash"=>$user_password_hash,
                        "user_registration_ip"=>$_SERVER['REMOTE_ADDR'],
                        "user_activation_hash"=>$user_activation_hash,
                    )
                );
                
                
                // id of new user
                $user_id = $this->db->lastInsertId();
                
                if ($insert > 0) {  // miramos si se ha visto afectada alguna fila
                    // send a verification email
                    if ($this->sendVerificationEmail($user_id, $nombre, $email, $user_activation_hash)) {
                        // when mail has been send successfully
                        $this->messages[] = MESSAGE_VERIFICATION_MAIL_SENT;
                        $this->registration_successful = true;
                    } else {
                        $delete = $this->db->query(
                            'DELETE FROM users WHERE user_id = :user_id',
                            array('user_id' => $user_id )
                        );

                        $this->errors[] = MESSAGE_VERIFICATION_MAIL_ERROR;
                    }
                } else {
                    $this->errors[] = MESSAGE_REGISTRATION_FAILED;
                }
            }
        }
    }

    /*
     * sends an email to the provided email address
     * @return boolean gives back true if mail has been sent, gives back false if no mail could been sent
     */
    public function sendVerificationEmail($user_id, $name, $user_email, $user_activation_hash)
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
        $mail->addAddress($user_email, $name);

        // Asunto del mensaje
        $mail->Subject = EMAIL_VERIFICATION_SUBJECT;
        $mail->isHTML(EMAIL_USE_HTML);

        $link = EMAIL_VERIFICATION_URL.'?id='.urlencode($user_id).'&verification_code='.urlencode($user_activation_hash);

        // the link to your register.php, please set this value in config/email_verification.php
        $mail->Body = EMAIL_VERIFICATION_CONTENT.' '.$link;

        if (!$mail->send()) {
            $this->errors[] = MESSAGE_VERIFICATION_MAIL_NOT_SENT . $mail->ErrorInfo;
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * checks the id/verification code combination and set the user's activation status to true (=1) in the database
     */
    public function verifyNewUser($user_id, $user_activation_hash)
    {
        // if database connection opened
        if ($this->db->isConnected()) { 
            // try to update user with specified information
            $update = $this->db->query(
                'UPDATE users SET 
                user_active = 1, 
                user_activation_hash = NULL 

                WHERE user_id = :user_id AND user_activation_hash = :user_activation_hash',
                array(
                    'user_id'=>intval(trim($user_id)),
                    'user_activation_hash'=>$user_activation_hash
                )
            );

            if ($update > 0) {  // miramos si se ha visto afectada alguna fila
                $this->verification_successful = true;
                $this->messages[] = MESSAGE_REGISTRATION_ACTIVATION_SUCCESSFUL;
            } else {
                $this->errors[] = MESSAGE_REGISTRATION_ACTIVATION_NOT_SUCCESSFUL;
            }
        }
    }
}
?>