<?php
    /* <== Cargar configuracion basica
    =================================> */
    include "../include/handler.php";
?>
<!DOCTYPE html>
<html lang="es-ES" class="es" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="UTF-8">

        <!-- Titulo y Descripcion -->
        <title>Workspaces - Coworking Granada</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../logo.png" type="image/png" />

        <!-- ViewPort -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FIX 1.0.2 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/workspaces.min.css">
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
                <li><a href="clientes">Clientes</a></li>
                <li><a href="empresas">Empresas</a></li>                    
                <li><a href="#" class="active">WorkSpaces</a></li>                    
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
                <li><a href="clientes">Clientes</a></li>
                <li><a href="empresas">Empresas</a></li>                    
                <li><a href="#" class="active">WorkSpaces</a></li>                    
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

                <!-- Contenedor Slider -->
                <section class="box-12 slideshow" id="slideshow2">
                    <!-- Slider -->
                    <section class="slider">
                        <section class="holder">
                            <section class="slide">
                                <img src="../img/workspaces/1.jpg" alt="Slideshow Habitacion Individual Imagen 1">
                            </section>
                            <section class="slide">
                                <img src="../img/workspaces/2.jpg" alt="Slideshow Habitacion Individual Imagen 2">
                            </section>
                            <section class="slide">
                                <img src="../img/workspaces/3.jpg" alt="Slideshow Habitacion Individual Imagen 3">
                            </section>
                        </section>
                    </section>

                    <!-- Flechas de navegacion -->
                    <nav class="arrow nav-circlepop">
                        <a class="prev" href="javascript:;">
                            <span class="icon-wrap"></span>
                        </a>
                        <a class="next" href="javascript:;">
                            <span class="icon-wrap"></span>
                        </a>
                    </nav>  

                    <!-- Circulos Slider -->
                    <ul id="c1" class="dotstyle dotstyle-fillup">
                        <li class=" current"><a href="#slide-0"></a></li>
                        <li class=""><a href="#slide-1"></a></li>
                        <li class=""><a href="#slide-2"></a></li>
                    </ul>                    
                </section>            

                <!-- Añadir Miembros -->
                <section class="box-12 padding-b-2  bg-color-1">                    
                    <section class="box-3">
                        <img class="margin-tp-1" src="../img/icons/png/add_member.png" alt="Icono de impresora" width="200" height="200"/>
                    </section>                    
                    <section class="box-9">
                        <h2 class="title text-left white padding-l-1">Añadir Miembros</h2>
                        <p class="anchor-text padding-l-1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>
                    </section>
                </section>

                <!-- Control de Recursos -->
                <section class="box-12 padding-b-2  bg-color-2">                    
                    <section class="box-3">
                        <img class="margin-tp-1" src="../img/icons/png/printer.png" alt="Icono de impresora" width="200" height="200"/>
                    </section>                    
                    <section class="box-9">
                        <h2 class="title text-left white padding-l-1">Centro de recursos</h2>
                        <p class="anchor-text padding-l-1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>
                    </section>
                </section>
                <!-- Gestion tiempo de uso -->
                <section class="box-12 padding-b-2  bg-color-1">                    
                    <section class="box-3">
                        <img class="margin-tp-1" src="../img/icons/png/clock.png" alt="Icono de impresora" width="200" height="200"/>
                    </section>                    
                    <section class="box-9">
                        <h2 class="title text-left white padding-l-1">Gestion del Tiempo de uso</h2>
                        <p class="anchor-text padding-l-1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>
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
                    "../js/workspaces.min.js",
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