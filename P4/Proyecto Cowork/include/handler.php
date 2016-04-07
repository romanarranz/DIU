<?php

	header("Content-Type: text/html;charset=utf-8");

	// <== Configuración general 
    // ================================>
	$ROOT = realpath($_SERVER["DOCUMENT_ROOT"])."/proyectocowork";
	include("$ROOT/config/config.php");
	include("$ROOT/config/es.php");

	// <== Servicio de correo
    // ================================>
	/* 
        SMTP needs accurate times, and the PHP time zone MUST be set
        This should be done in your php.ini, but this is how to do it if you don't have access to that 
    */

	date_default_timezone_set('Etc/UTC');
	include(DIR_MODULES."/PHPMailer/PHPMailerAutoload.php");
    
	// <== Libreria de encriptacion de contraseñas
    // ================================>
	include(DIR_MODULES."/Password.php");

	// <== Conexión a bases de datos
    // ================================>
	include(DIR_CLASSES."/DB.php");

	// <== Login
    // ================================>
	include(DIR_CLASSES."/Login.php");
	$login = new Login();
?>