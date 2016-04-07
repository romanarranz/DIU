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
        <link rel="stylesheet" href="../css/eventos.min.css">
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
                <li><a href="workspaces">WorkSpaces</a></li>                    
                <li><a href="#" class="active">Eventos</a></li>
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
                <li><a href="workspaces">WorkSpaces</a></li>                    
                <li><a href="#" class="active">Eventos</a></li>
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

                <!-- Eventos prinpales -->
                <section class="box-12">
                    <section class="evento-top box-8">
                        <h1 class="white">Diseño de Videojuegos</h1>
                        <p>Comienzo de las jornadas para diseñadores del 3/06/2016 al 7/08/2016</p>
                    </section>

                    <!-- Eventos Destacados -->
                    <section class="eventos-destacados box-4">
                        <section><h2 class="white">Curso de Moda</h2></section>
                        <section><h2 class="white">Curso de Fotografia</h2></section>
                        <section><h2 class="white">Curso de Bolsa</h2></section>
                    </section>                 
                </section>            

                <!-- Cuadro de eventos -->
                <section class="box-12 padding-b-3 bg-color-1">                    

                    <!-- Buscador de Eventos -->
                    <section class="box-12">
                        <a id="search-event" class="white"><i class="fa fa-search"></i></a>
                        <span class="input input--chisato">
                            <input class="input__field input__field--chisato" type="text" id="input-13" />
                            <label class="input__label input__label--chisato" for="input-13">
                                <span class="input__label-content input__label-content--chisato" data-content="Buscar Evento">Buscar Evento</span>
                            </label>
                        </span>
                    </section>

                    <!-- Listado de Eventos -->
                    <section class="box-12">
                        <section class="box-4 evento">
                            <section class="encabezado">
                                <span class="nombre">Curso de Social Media</span>
                                <span class="fecha">08/01/2016</span>
                            </section>
                            <img class="imagen" src="../img/eventos/evento5.jpg" alt="Diseño de Interfaces de Usuario">
                            <p class="descripcion">odrás formarte como profesional del Social Media, actualizar conceptos, desarrollar habilidades y obtener las claves necesarias para el desarr...</p>
                        </section>
                        <section class="box-4 evento">
                            <section class="encabezado">
                                <span class="nombre">Diseño de Interfaces de Usuario</span>
                                <span class="fecha">12/01/2016</span>
                            </section>
                            <img class="imagen" src="../img/eventos/evento6.jpg" alt="Diseño de Interfaces de Usuario">
                            <p class="descripcion">El curso de diseño de Interfaces de Usuario se enfoca en ofrecer al alumno los fundamentos para analizar, entender y construir interfaces optimizada...</p>
                        </section>
                        <section class="box-4 evento">
                            <section class="encabezado">
                                <span class="nombre">Marketing Digital</span>
                                <span class="fecha">20/02/2016</span>
                            </section>
                            <img class="imagen" src="../img/eventos/evento7.jpg" alt="Diseño de Interfaces de Usuario">
                            <p class="descripcion">Ofrecemos a los profesionales del marketing los conocimientos y las técnicas necesarias para orientar su carrera profesional a las nuevas estrategia...</p>
                        </section>
                        <section class="box-4 evento">
                            <section class="encabezado">
                                <span class="nombre">Taller de Robotica con Lego</span>
                                <span class="fecha">19/03/2016</span>
                            </section>
                            <img class="imagen" src="../img/eventos/evento8.jpg" alt="Diseño de Interfaces de Usuario">
                            <p class="descripcion">Taller familiar con Little Bits. El sábado 19 de Marzo disfruta en familia de un taller innovador y creativo con Little Bits y Proinnova Educativa...</p>
                        </section>
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
                    "../js/eventos.min.js",
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