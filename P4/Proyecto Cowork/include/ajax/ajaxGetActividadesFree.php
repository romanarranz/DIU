<?php
    require_once '../../config/config.php';
    require_once DIR_CLASSES."/DB.php"; 
    require_once DIR_CLASSES."/Actividades.php";

    if(isset($_POST['busqueda']) && !empty($_POST['busqueda'])){
        $buscar = $_POST['busqueda'];
        
        if(!isset($actividades)) $actividades = new Actividades();
        
        $select = $actividades->searchActividades($buscar);

        echo "<p>".$select[0]["denominacion"]."</p>";
        echo "<section>";
        echo "<img class=\"low-margin-top\" src=\"".URL_UPLOADS."/".$select[0]["foto"]."\" alt=\"Imagen no disponible\" width=\"80%\"/>";
        echo "<p>".$select[0]["descripcion"]."</p>";
        echo "</section>";
    }
?>