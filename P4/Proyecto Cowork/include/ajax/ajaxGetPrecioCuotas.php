<?php
    require_once '../../config/config.php';
    require_once DIR_CLASSES."/DB.php"; 
    require_once DIR_CLASSES."/Cuotas.php";

    if(isset($_POST['busqueda']) && !empty($_POST['busqueda'])){
        $buscar = explode(",",$_POST['busqueda']);
        
        if(!isset($cuotas)) $cuotas = new Cuotas();
        
        // buscar[0] es la denominacion y buscar[1] es la fecha

        $micuota = $cuotas->searchCuotas($buscar[0]);
        $primeraFecha = strtotime($micuota[0]["primera_fecha"]);
        $segundaFecha = strtotime($micuota[0]["segunda_fecha"]);
        $precio = 0;
        if( $buscar[1] <= $primeraFecha){
            $precio = $micuota[0]["importe_primera_fecha"];
        }
        else if( $buscar[1] <= $segundaFecha){
            $precio = $micuota[0]["importe_segunda_fecha"];
        }
        else {
            $precio = $micuota[0]["importe_tercera_fecha"];
        }
        

        echo "&nbsp;&nbsp;".$precio."€";
    }
?>