<?php
    /* <== Cargar configuracion basica
    =================================> */
    include "../include/handler.php";

    if(!$login->isUserLoggedIn()){
        include DIR_CLASSES."/Registration.php";
        $registration = new Registration();
    }
?>
<!DOCTYPE html>
<html lang="es-ES" class="es" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="UTF-8">

        <!-- Titulo y Descripcion -->
        <title>Clientes - Coworking Granada</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="logo.png" type="image/png" />

        <!-- ViewPort -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FIX 1.0.2 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/clientes.min.css">

        <!-- Button + Modal -->
        <script src="../js/modernizr.custom.js"></script>
    </head>

    <body id="top">
        <!-- Cabecera -->
        <header>
            <!-- Logo esquina -->
            <a href="#" class="logo">
                <img src="../logo_m.png" alt="Logotipo Coworking Granada" width="50">
            </a>

            <!-- Boton Menu -->
            <a href="#" class="nav-mobile">Menu</a>
            <ul>
                <li><a href="../index">Inicio</a></li>
                <li><a href="#" class="active">Clientes</a></li>
                <li><a href="empresas">Empresas</a></li>                    
                <li><a href="workspaces">WorkSpaces</a></li>                    
                <li><a href="eventos">Eventos</a></li>
            </ul>

            <!-- Telefono -->
            <a href="javascript:;" id="phone_number">
                <img src="../img/icons/png/telephone5.png" alt="Telefono de Contacto" width="20" class="margin-t-1 margin-r-1">
                958 301 987
            </a>                
        </header>

        <!-- Tablet Nav -->
        <section class="tablet-nav">
            <ul>
                <li><a href="../index">Inicio</a></li>
                <li><a href="#" class="active">Clientes</a></li>
                <li><a href="empresas">Empresas</a></li>                    
                <li><a href="workspaces">WorkSpaces</a></li>                    
                <li><a href="eventos">Eventos</a></li>
            </ul>
        </section>

        <!-- Page Wrap -->
        <section class="page-wrap">

            <!-- Main Layout Contenido -->
            <section class="content">
                
                <?php
                /* <== Usuario YA identificado
                    ============================> */
                if ($login->isUserLoggedIn()) { ?>
                    <!-- Usuario Logeado -->
                    <section class="user-login">
                        <a><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;<?php echo $login->getUserEmail();?></a>
                    </section>
                <?php } ?>

                <!-- Social Bar -->
                <section class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/urbandreamhotels" target="_blank" class="icon-facebook"></a></li>
                        <li><a href="#" target="_blank" class="icon-twitter"></a></li>
                        <li><a href="https://plus.google.com/106192508253708523883" target="_blank" class="icon-google-plus"></a></li>
                        <li><a href="#" target="_blank" class="icon-pinterest"></a></li>
                        <li><a href="mailto:comercial@urbandreamhotels.com" class="icon-mail"></a></li>
                    </ul>
                </section>
               
               <!-- Registro Overlay -->                
                <section class="overlay overlay-hugeinc text-center">
                    <button type="button" class="overlay-close">Close</button>
                    <h2>Crear una cuenta gratuita</h2>
                    <p>Comienza a disfrutar de todos los servicios que te ofrece Coworking Granada al crear una cuenta</p>
                    
                    <!-- Formulario de Registro -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <!-- Nombre -->
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="text" id="input-1" name="nombre"/>
                            <label class="input__label input__label--chisato" for="input-1">
                                <span class="input__label-content input__label-content--chisato" data-content="Nombre">Nombre</span>
                            </label>
                        </span>
                        <!-- Apellidos -->
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="text" id="input-2" name="apellidos"/>
                            <label class="input__label input__label--chisato" for="input-2">
                                <span class="input__label-content input__label-content--chisato" data-content="Apellidos">Apellidos</span>
                            </label>
                        </span>
                        <!-- Email -->
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="text" id="input-3" name="email"/>
                            <label class="input__label input__label--chisato" for="input-3">
                                <span class="input__label-content input__label-content--chisato" data-content="Email">Email</span>
                            </label>
                        </span>
                        <!-- Contraseña -->
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="password" id="input-4" name="password_new"/>
                            <label class="input__label input__label--chisato" for="input-4">
                                <span class="input__label-content input__label-content--chisato" data-content="Contraseña">Contraseña</span>
                            </label>
                        </span>
                        <!-- Repita Contraseña -->
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="password" id="input-5" name="password_repeat"/>
                            <label class="input__label input__label--chisato" for="input-5">
                                <span class="input__label-content input__label-content--chisato" data-content="Repita Contraseña">Repita Contraseña</span>
                            </label>
                        </span>
                        <!-- Captcha -->
                        <img id="captcha-register" src="<?php echo URL_MODULES.'/Captcha/Captcha.php'?>" alt="Captcha" /><br />
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="text" id="input-6" name="captcha" required autocomplete="off"/>
                            <label class="input__label input__label--chisato" for="input-6">
                                <span class="input__label-content input__label-content--chisato" data-content="Escriba las letras de la imagen">Escriba las letras de la imagen</span>
                            </label>
                        </span>
                        
                        <!-- Botones de opcion -->
                        <ul id="newuser-list">
                            <!-- Aceptar la politica -->
                            <li class="control-inline">
                                <input class="styled-checkbox" type="checkbox" value="politica" id="politica" required>
                                <label for="politica">Acepto la <a href="javascript:;" class="light-blue-400">Politica de Privacidad online</a></label>
                            </li>
                            <!-- Enviar formulario -->
                            <li class="btn btn-1 btn-1a">
                                <input type="submit" name="register" value="Crear una cuenta gratuita"/>                                
                            </li>
                        </ul>
                    </form>
                </section>    

                <!-- Clientes -->
                <section class="box-12 clientes-bg">
                    <section class="box-12">
                        <?php 
                        /* <== Usuario SIN identificar 
                           ============================> */
                        if (!$login->isUserLoggedIn()) {
                            /* Feedback Login */
                            if ($login->errors) {
                                echo "<section class=\"alert\">";
                                foreach ($login->errors as $error) {
                                    echo "<p>".$error."</p>";
                                }
                                echo "</section>";
                            }
                            if ($login->messages) {
                                echo "<section class=\"success\">";
                                foreach ($login->messages as $message) {
                                    echo "<p>".$message."</p>";
                                }
                                echo "</section>";
                            }

                            /* Feedback Registro */
                            if (isset($registration)) {
                                if ($registration->errors) {
                                    echo "<section class=\"alert\">";
                                    foreach ($registration->errors as $error) {
                                        echo "<p>".$error."</p>";
                                    }
                                    echo "</section>";
                                }
                                if ($registration->messages) {
                                    echo "<section class=\"success\">";
                                    foreach ($registration->messages as $message) {
                                        echo "<p>".$message."</p>";
                                    }
                                    echo "</section>";
                                }
                            }
                        ?>
                        <h1>Identifíquese</h1>
                        <p>Podrá comenzar a usar su espacio de trabajo</p>
                        <section class="box-6 clientes-wrapper">

                            <!-- Formulario de Identificacion -->
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                <!-- Inputs -->
                                <span class="input input--chisato">
                                    <input class="input__field input__field--chisato" type="text" id="input-7" name="user_email"/>
                                    <label class="input__label input__label--chisato" for="input-7">
                                        <span class="input__label-content input__label-content--chisato" data-content="Email">Email</span>
                                    </label>
                                </span>
                                <span class="input input--chisato">
                                    <input class="input__field input__field--chisato" type="password" id="input-8" name="user_password"/>
                                    <label class="input__label input__label--chisato" for="input-8">
                                        <span class="input__label-content input__label-content--chisato" data-content="Contraseña">Contraseña</span>
                                    </label>
                                </span>                                    

                                <!-- Botones de opcion -->
                                <ul id="login-list">
                                    <!-- Recordarme -->
                                    <li class="control-inline">
                                        <input class="styled-checkbox" type="checkbox" value="rememberme" id="rememberme" name="rememberme">
                                        <label for="rememberme">Recuérdame</label>
                                    </li>
                                    <!-- Identificarse -->
                                    <li class="btn btn-1 btn-1a">
                                        <input type="submit" name="login" value="Iniciar Sesión"/>
                                    </li>
                                    <!-- Registrarse -->
                                    <li id="trigger-overlay" class="btn btn-1 btn-1a">¿Necesitas una cuenta?</li>
                                    <!-- Olvide contraseña -->
                                    <li class="btn btn-1 btn-1a">¿No puedes iniciar sesión?</li>
                                </ul>
                            </form>                            
                        </section>
                        <?php
                        }
                        /* <== Usuario YA identificado
                           ============================> */
                        else { ?>
                            <h1>Bienvenido &nbsp;<?php echo $login->getUserEmail();?></h1>
                            <!-- Botones de opcion -->
                            <ul id="login-list">
                                <li class="btn btn-1 btn-1a">Gestionar mi espacio</li>
                                <li class="btn btn-1 btn-1a"><a href="<?php echo $_SERVER['PHP_SELF'];?>?logout">Cerrar Sesión</a></li>
                            </ul>
                        <?php } ?>
                    </section>
                </section>
            </section>

            <footer>
                <small class="copyright">Copyright © 2015 Los manzanas</small>
                <small><a href="#">Pol&iacute;tica de Privacidad</a></small>
            </footer>
        </section>

        <!-- Scripts
        ====================== -->        
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        
        <!-- JS Defer Load -->
        <script type="text/javascript">            
            function downloadJSAtOnload() {
                var elements = [
                    // JS propio de la pagina
                    "../js/clientes.min.js",
                    // JS para cargar estilos segun el browser
                    "../js/css_browser_selector-master/css_browser_selector.min.js"
                ];

                for(var i = 0; i<elements.length; i++){
                    el = document.createElement("script");
                    el.src = elements[i];
                    document.body.appendChild(el);
                }
            }
            
            if (window.addEventListener)
                window.addEventListener("load", downloadJSAtOnload, false);
            else if (window.attachEvent)
                window.attachEvent("onload", downloadJSAtOnload);
            else 
                window.onload = downloadJSAtOnload;         
        </script>
    </body>
</html>