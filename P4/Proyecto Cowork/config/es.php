<?php

	// Registration
	define("MESSAGE_CAPTCHA_WRONG", "El captcha introducido no es correcto");
	define("MESSAGE_USERNAME_EMPTY", "El nombre de usuario no puede ser vacio");
	define("MESSAGE_PASSWORD_EMPTY", "La contraseña no puede estar vacia");
	define("MESSAGE_PASSWORD_BAD_CONFIRM", "Las contraseñas no coinciden");
	define("MESSAGE_PASSWORD_TOO_SHORT", "La longitud de la contraseña debe ser mayor a 6 caracteres");
	define("MESSAGE_USERNAME_BAD_LENGTH", "La longitud del nombre debe ser mayor a 2 caracteres");
	define("MESSAGE_USERNAME_INVALID", "El nombre no es valido");
	define("MESSAGE_EMAIL_EMPTY", "El email es necesario");
	define("MESSAGE_EMAIL_TOO_LONG", "El email es demasiado largo");
	define("MESSAGE_EMAIL_INVALID", "El formato de su email no es valido");
	define("MESSAGE_VERIFICATION_MAIL_SENT", "Se le ha enviado un correo a la direccion de email que ha proporcionado para que active su cuenta.");
	define("MESSAGE_VERIFICATION_MAIL_ERROR", "Se ha producido un error en el envio del mail para la activacion de su cuenta.");
	define("MESSAGE_REGISTRATION_FAILED", "Se ha producido un error durante su registro.");
	define("MESSAGE_REGISTRATION_ACTIVATION_SUCCESSFUL", "Se ha completado la activacion satisfactoriamente.");
	define("MESSAGE_REGISTRATION_ACTIVATION_NOT_SUCCESSFUL", "No se ha podido completar la activacion de su cuenta correctamente, por favor mande un email a congresosibw@gmail.com con asunto 'activacion'.");

	// Login
	define("MESSAGE_COOKIE_INVALID", "Cookie no valida");
	define("MESSAGE_LOGIN_FAILED", "El email o la contraseña no son correctos");
	define("MESSAGE_PASSWORD_WRONG_3_TIMES", "Ha introducido mal la contraseña 3 veces, se inactivará su cuenta durante un tiempo.");
	define("MESSAGE_PASSWORD_WRONG", "La contraseña no es correcta.");
	define("MESSAGE_ACCOUNT_NOT_ACTIVATED", "Su cuenta aun no ha sido activada");
	define("MESSAGE_LOGGED_OUT", "Ha cerrado sesion correctamente");
	define("MESSAGE_EMAIL_SAME_LIKE_OLD_ONE", "Ese email es el mismo que tenia antes");
	define("MESSAGE_EMAIL_ALREADY_EXISTS", "El email introducido corresponde a otro usuario");
	define("MESSAGE_EMAIL_CHANGED_SUCCESSFULLY", "Su email ha cambiado con exito");
	define("MESSAGE_EMAIL_CHANGE_FAILED", "Su email no ha podido cambiarse, pongase en contacto con nosotros enviando un correo a congresosibw@gmail.com");
	define("MESSAGE_PASSWORD_CHANGED_SUCCESSFULLY", "Su contraseña ha cambiado con exito");
	define("MESSAGE_PASSWORD_CHANGE_FAILED", "Se ha producido un error en el cambio de su contraseña");
	define("MESSAGE_OLD_PASSWORD_WRONG", "La contraseña antigua no coincide con la suya");
	define("MESSAGE_USER_DOES_NOT_EXIST", "Ese usuario no existe");

	// BD
	define("MESSAGE_DATABASE_ERROR", "Ups. se ha producido un error en su peticion");
	define("MESSAGE_ERROR_SELECT", "Se ha producido un error durante la seleccion");
	define("MESSAGE_ERROR_INSERT", "Se ha producido un error durante la insercion");
	define("MESSAGE_ERROR_UPDATE", "Se ha producido un error durante la actualizacion");

	// Mails
	define("MESSAGE_PASSWORD_RESET_MAIL_FAILED", "No se ha podido enviar un correo para que pueda reiniciar su contraseña. Disculpe las molestias");
	define("MESSAGE_PASSWORD_RESET_MAIL_SUCCESSFULLY_SENT", "Se ha enviado correctamente un correo para que pueda reiniciar su contraseña");
	define("MESSAGE_LINK_PARAMETER_EMPTY", "Error. Los parametros del enlace estan vacios.");
	define("MESSAGE_RESET_LINK_HAS_EXPIRED", "El enlace de reseteo ha expirado. Por favor usa el enlace en menos de 1 hora.");

?>