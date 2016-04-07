<?php
    /* <== Cargar configuracion basica
    =================================> */
    include "./include/handler.php";
?>
<!DOCTYPE html>
<html lang="es-ES" class="es" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="UTF-8">

        <!-- Titulo y Descripcion -->
        <title>Inicio - Coworking Granada</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="logo.png" type="image/png" />

        <!-- ViewPort -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FIX 1.0.2 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="css/index.min.css">
    </head>

    <body id="top">
        <!-- Cabecera -->
        <header>
            <!-- Logo esquina -->
            <a href="#" class="logo">
                <img src="logo_m.png" alt="Logotipo Coworking Granada" width="50">
            </a>

            <!-- Boton Menu -->
            <a href="#" class="nav-mobile">Menu</a>
            <ul>
                <li><a href="#" class="active">Inicio</a></li>
                <li><a href="src/clientes">Clientes</a></li>
                <li><a href="src/empresas">Empresas</a></li>                    
                <li><a href="src/workspaces">WorkSpaces</a></li>                    
                <li><a href="src/eventos">Eventos</a></li>
            </ul>

            <!-- Telefono -->
            <a href="javascript:;" id="phone_number">
                <img src="img/icons/png/telephone5.png" alt="Telefono de Contacto" width="20" class="margin-t-1 margin-r-1">
                958 301 987
            </a>                
        </header>

        <!-- Tablet Nav -->
        <section class="tablet-nav">
            <ul>
                <li><a href="#" class="active">Inicio</a></li>
                <li><a href="src/clientes">Clientes</a></li>
                <li><a href="src/empresas">Empresas</a></li>                    
                <li><a href="src/workspaces">WorkSpaces</a></li>                    
                <li><a href="src/eventos">Eventos</a></li>
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

                <!-- Landing SlideShow -->
                <section id="main-slideshow">
                    <figure><img src="img/index/slider1.jpg" alt="Coworking Apple"/></figure>
                    <figure><img src="img/index/slider2.jpg" alt="Espacio de Coworking Moderno" /></figure>
                    <figure><img src="img/index/slider3.jpg" alt="Espacio de Coworking Vanguardia" /></figure>
                    <figure><img src="img/index/slider4.jpg" alt="Oficinas Coworking" class="active"/></figure>
                </section>

                <!-- Text -->
                <section class="box-12 bg-color-3 padding-b-3">
                    <h2 class="title text-left white">¿Qu&eacute; nos define?</h2>
                    <p class="anchor-text">Proyecto Cowork es un espacio único en la ciudad.<br>
                    Ofrecemos espacios de trabajo, oficinas, salas de reuniones y salas de formación, multimedia y videoconferencia, en unas agradables instalaciones, luminosas y con vistas a la vega. Somos más que un centro de negocios y coworking en Granada, somos tu palanca de crecimiento.</p>
                </section>                

                <!-- Mapa Google -->
                <section class="box-12">
                    <!-- Unlock Google Maps -->
                    <section id="frame-cortina" class="box-12 ubicacion-mapa">
                        <h1>Ubicacion</h1>
                        <p class="text-center btn btn-1 btn-1a">                            
                            <i class="icon-location2" style="margin-right: 8px;"></i>Activar mapa
                        </p>
                    </section>
                    
                    <!-- Lock Google Maps -->
                    <section id="tool-button" class="box-12 disabled">
                        <p class="text-center btn btn-1 btn-1a">                            
                            <i class="icon-location2" style="margin-right: 8px;"></i>Desactivar mapa
                        </p>
                    </section>
                    <iframe id="mapa-urbandream-granada" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.1319445348568!2d-3.6267059846988787!3d37.19709537986871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fc55025f928b%3A0x4dbbca09efdcad08!2sE.T.S.+de+Ingenier%C3%ADas+Inform%C3%A1tica+y+de+Telecomunicaci%C3%B3n!5e0!3m2!1ses!2ses!4v1447757624471" width="100%" height="500" frameborder="0" style="border:0; display: block; margin:0 auto" allowfullscreen></iframe>
                </section>

                <!-- Descripcion -->
                <section class="box-12 padding-b-2  bg-color-1">
                    <h2 class="title text-left white">Contacta con nosotros</h2>
                    <p class="anchor-text">Proyecto Cowork se situa en la ciudad de Granada tenemos un local en AV. Sierra Nevada 34, 18190</p>
                    <p class="anchor-text">
                    Proyecto Cowork no sólo es un lugar exclusivo, profesional y elegante, sino que además está bien comunicado, de fácil acceso, en vía principal de gran tránsito y con Parking. Su ubicación es estratégica, puedes acceder desde cualquier punto de la ciudad a través de la línea 33 de bus urbano.</p>
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
                    "js/index.min.js",
                    // JS para cargar estilos segun el browser
                    "js/css_browser_selector-master/css_browser_selector.min.js"
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