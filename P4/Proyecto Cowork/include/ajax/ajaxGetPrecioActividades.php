<?php
    require_once '../../config/config.php';
    require_once DIR_CLASSES."/DB.php"; 
    require_once DIR_CLASSES."/Actividades.php";

    if(isset($_POST['busqueda']) && !empty($_POST['busqueda'])){
        $buscar = explode(",",$_POST['busqueda']);
        
        if(!isset($actividades)) $actividades = new Actividades();
        
        $precio = 0;
        for($i = 0; $i<count($buscar); $i++){
            $precio = $precio + intval($actividades->searchActividades($buscar[$i])[0]["importe"]);
        }
        
        echo "&nbsp;&nbsp;".$precio."€";
    }
?>