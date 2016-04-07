<?php
    // Definicion de host
    define("HOST","10.211.55.4");

    // Definicion de reglas para conexiones a bases de datos
    define("DB_HOST",HOST);
    define("DB_NAME","coworking");
    define("DB_USER","roman");
    define("DB_PASSWORD","o5WKxJkRXw");

    // Definicion de directorios
    define("ROOT_DIR",      realpath($_SERVER["DOCUMENT_ROOT"])."/proyectocowork");
    define("DIR_SRC",       ROOT_DIR."/src");
    define("DIR_IMG",       ROOT_DIR."/img");
    define("DIR_CLASSES",   ROOT_DIR."/classes");
    define("DIR_FUNCTION",  ROOT_DIR."/function");
    define("DIR_JS",        ROOT_DIR."/js");
    define("DIR_CSS",       ROOT_DIR."/css");
    define("DIR_FONTS",     ROOT_DIR."/lib/fonts");
    define("DIR_UPLOADS",   ROOT_DIR."/uploads/");
    define("DIR_LOGS",      ROOT_DIR."/logs/");
    define("DIR_MODULES",   ROOT_DIR."/include/modules");
    define("DIR_AJAX",      ROOT_DIR."/include/ajax");

    // Definicion de rutas web (seria conveniente hacerlo con mod_rewrite de apache y una api rest)
    define("URL_INDEX",     "http://".HOST."/proyectocowork");
    define("URL_IMG",       URL_INDEX."/img");
    define("URL_JS",        URL_INDEX."/js");
    define("URL_CSS",       URL_INDEX."/css");
    define("URL_FONTS",     URL_INDEX."/fonts");
    define("URL_SRC",       URL_INDEX."/src");
    define("URL_MODULES",   URL_INDEX."/include/modules");
    define("URL_UPLOADS",   URL_INDEX."/uploads");
    define("URL_AJAX",      URL_INDEX."/include/ajax");

    // Credenciales del Servidor de Correo
    define("EMAIL_USE_SMTP",        true);
    define("EMAIL_SMTP_HOST",       "smtp.gmail.com");
    define("EMAIL_SMTP_AUTH",       true);
    define("EMAIL_SMTP_USERNAME",   "congresosibw@gmail.com");
    define("EMAIL_SMTP_PASSWORD",   "congresosibw1");
    define("EMAIL_SMTP_PORT",       587);
    define("EMAIL_SMTP_ENCRYPTION", "tls");

    // Configuracion del mail de envio
    define("EMAIL_USE_HTML", true);

    // Configuracion del email de contacto
    define("EMAIL_CONTACT_FROM", "no-reply@example.com");
    define("EMAIL_CONTACT_FROM_NAME", "Proyeto Cowork");
    define("EMAIL_CONTACT_REPLY_TO", "congresosibw@gmail.com");
    define("EMAIL_CONTACT_REPLY_TO_NAME", "proyectocowork");
    define("EMAIL_CONTACT_SUBJECT", "Proyeto Cowork - Contacto");

    // Configuracion del email de registro de usuarios
    define("EMAIL_VERIFICATION_URL", URL_INDEX."/src/clientes");
    define("EMAIL_VERIFICATION_FROM", "no-reply@example.com");
    define("EMAIL_VERIFICATION_FROM_NAME", "Proyecto Cowork");
    define("EMAIL_VERIFICATION_REPLY_TO", "congresosibw@gmail.com");
    define("EMAIL_VERIFICATION_REPLY_TO_NAME", "proyectocowork");
    define("EMAIL_VERIFICATION_SUBJECT", "Activacion cuenta Proyecto Cowork");
    define("EMAIL_VERIFICATION_CONTENT", "Haga click en el siguiente enlace para verificar su cuenta:");
    define("MESSAGE_VERIFICATION_MAIL_NOT_SENT","No se ha podido enviar su mensaje");

    // Configuracion del mail de reseteo de contraseñas
    define("EMAIL_PASSWORDRESET_URL", URL_INDEX."/src/resetPassword.php");
    define("EMAIL_PASSWORDRESET_FROM", "no-reply@example.com");
    define("EMAIL_PASSWORDRESET_FROM_NAME", "Proyecto Cowork");
    define("EMAIL_PASSWORDRESET_SUBJECT", "Reinicio de contraseña Proyecto Cowork");
    define("EMAIL_PASSWORDRESET_CONTENT", "Haga click en el siguiente enlace para reiniciar su contraseña:");

    // Configuracion de la subida de archivos
    define("UPLOAD_FILE_TYPES",
        serialize(
            array ( 
                "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png", "application/octet-stream" 
            )
        )
    );

    // Size
    define('KB', 1024);
    define('MB', 1048576);

    /**
    * Configuration for: Hashing strength
    * This is the place where you define the strength of your password hashing/salting
    *
    * To make password encryption very safe and future-proof, the PHP 5.5 hashing/salting functions
    * come with a clever so called COST FACTOR. This number defines the base-2 logarithm of the rounds of hashing,
    * something like 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of hashing, doubling the
    * round with each increase of the cost factor and therefore doubling the CPU power it needs.
    * Currently, in 2013, the developers of this functions have chosen a cost factor of 10, which fits most standard
    * server setups. When time goes by and server power becomes much more powerful, it might be useful to increase
    * the cost factor, to make the password hashing one step more secure. Have a look here
    * (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
    * in the BLOWFISH benchmark table to get an idea how this factor behaves. For most people this is irrelevant,
    * but after some years this might be very very useful to keep the encryption of your database up to date.
    *
    * Remember: Every time a user registers or tries to log in (!) this calculation will be done.
    * Don't change this if you don't know what you do.
    *
    * To get more information about the best cost factor please have a look here
    * @see http://stackoverflow.com/q/4443476/1114320
    *
    * This constant will be used in the login and the registration class.
    */
    define("HASH_COST_FACTOR", "10");

    // Cookies
    define("COOKIE_RUNTIME", 1209600);
    define("COOKIE_DOMAIN", ".".HOST);
    define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");
    
?>