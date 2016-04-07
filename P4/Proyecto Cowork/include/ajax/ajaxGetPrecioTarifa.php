<?php
    require_once '../../config/config.php';
    require_once DIR_CLASSES."/DB.php"; 
    require_once DIR_CLASSES."/Reserva.php";

    if(isset($_POST['busqueda']) && !empty($_POST['busqueda'])){
        $buscar = $_POST['busqueda'];
        
        if(!isset($reserva)) $reserva = new Reserva();
        
        $precio = 0;
        $select = $reserva->searchPrecioTarifa($buscar);
        
        $precio = $select[0]["precio"];

        echo "&nbsp;&nbsp;".$precio."€";
    }
?>