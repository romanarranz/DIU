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
        <title>Empresas - Coworking Granada</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="logo.png" type="image/png" />

        <!-- ViewPort -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FIX 1.0.2 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/empresas.min.css">

        <!-- FullSCreen Overlay -->
        <script src="../js/modernizr.custom.js"></script>

        <!-- Image effects -->
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
                <li><a href="#" class="active">Empresas</a></li>                    
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
                <li><a href="clientes">Clientes</a></li>
                <li><a href="#" class="active">Empresas</a></li>                    
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

                <!-- Buscar empresas Overlay -->                
                <section class="overlay overlay-hugeinc text-center">
                    <button type="button" class="overlay-close">Close</button>
                    <span class="input input--chisato">
                        <input class="input__field input__field--chisato" type="text" id="input-13" />
                        <label class="input__label input__label--chisato" for="input-13">
                            <span class="input__label-content input__label-content--chisato" data-content="Nombre">Nombre</span>
                        </label>
                    </span>
                    <span class="input input--chisato">
                        <input class="input__field input__field--chisato" type="text" id="input-14" />
                        <label class="input__label input__label--chisato" for="input-14">
                            <span class="input__label-content input__label-content--chisato" data-content="Apellidos">Apellidos</span>
                        </label>
                    </span>
                </section>                                

                <!-- Buscar -->
                <section id="search-section">
                    <a id="trigger-overlay" class="white"><i class="fa fa-search"></i></a>
                </section>

                <!-- Listado de empresas -->
                <section class="listaempresas">                                        
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/1.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 1</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
                    </section>
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/2.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 2</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
                    </section> 
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/3.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 3</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
                    </section> 
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/4.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 4</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
                    </section>
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/5.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 5</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
                    </section>  
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/6.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 6</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
                    </section>
                    <section class="img-effects">
                        <figure class="effect-lily">
                            <img src="../img/empresas/7.jpg" alt="img12"/>
                            <figcaption>
                                <div>
                                    <h2><span>Empresa 7</span></h2>
                                    <p>Slogan general de la empresa</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>           
                        </figure>
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
                    "../js/empresa.min.js",
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