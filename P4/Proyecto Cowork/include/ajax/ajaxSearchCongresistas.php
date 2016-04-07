<?php
    require_once '../../config/config.php';
    require_once DIR_CLASSES."/DB.php"; 
    require_once DIR_CLASSES."/Inscripcion.php";

    if(isset($_POST['busqueda']) && !empty($_POST['busqueda'])){
        $buscar = $_POST['busqueda'];
        if(!isset($inscripcion))    $inscripcion = new Inscripcion();

        $listaInscritos = $inscripcion->searchInscritos($buscar);     
        for($i = 0; $i<count($listaInscritos); $i++){
            $micuota = $inscripcion->getCuota($listaInscritos[$i]["email"])["denominacion"];
            $listadoActividadesInscrito = $inscripcion->getActividadesInscritas($listaInscritos[$i]["email"]);
            $fecha_inscripcion = date("d-m-Y", strtotime($listaInscritos[$i]["fecha_inscripcion"]));
            if($i%2 == 0){
                echo "<p class=\"llorange\">
                         <a href=\"#userModal\" onclick=\"verCongresista(
                            '".$listaInscritos[$i]["nombre"]."',
                            '".$listaInscritos[$i]["apellidos"]."',
                            '".$listaInscritos[$i]["centro_trabajo"]."',
                            '".$listaInscritos[$i]["email"]."',
                            '".$fecha_inscripcion."',
                            '".$micuota."',
                            '".$listadoActividadesInscrito."'
                            );\">".$listaInscritos[$i]["nombre"]."</a>
                    </p>";
            }
            else {
                    echo "<p class=\"white\">
                         <a href=\"#userModal\" onclick=\"verCongresista(
                            '".$listaInscritos[$i]["nombre"]."',
                            '".$listaInscritos[$i]["apellidos"]."',
                            '".$listaInscritos[$i]["centro_trabajo"]."',
                            '".$listaInscritos[$i]["email"]."',
                            '".$fecha_inscripcion."',
                            '".$micuota."',
                            '".$listadoActividadesInscrito."'
                            );\">".$listaInscritos[$i]["nombre"]."</a>
                    </p>";
            }
        }     
    }
    else{
            
        if(!isset($inscripcion))    $inscripcion = new Inscripcion();
        
        $listaInscritos = $inscripcion->verInscritos();
        for($i = 0; $i<count($listaInscritos); $i++){
            $micuota = $inscripcion->getCuota($listaInscritos[$i]["email"])["denominacion"];
            $listadoActividadesInscrito = $inscripcion->getActividadesInscritas($listaInscritos[$i]["email"]);
            $fecha_inscripcion = date("d-m-Y", strtotime($listaInscritos[$i]["fecha_inscripcion"]));
            if($i%2 == 0){
                echo "<p class=\"llorange\">
                         <a href=\"#userModal\" onclick=\"verCongresista(
                            '".$listaInscritos[$i]["nombre"]."',
                            '".$listaInscritos[$i]["apellidos"]."',
                            '".$listaInscritos[$i]["centro_trabajo"]."',
                            '".$listaInscritos[$i]["email"]."',
                            '".$fecha_inscripcion."',
                            '".$micuota."',
                            '".$listadoActividadesInscrito."'
                            );\">".$listaInscritos[$i]["nombre"]."</a>
                    </p>";
            }
            else {
                    echo "<p class=\"white\">
                         <a href=\"#userModal\" onclick=\"verCongresista(
                            '".$listaInscritos[$i]["nombre"]."',
                            '".$listaInscritos[$i]["apellidos"]."',
                            '".$listaInscritos[$i]["centro_trabajo"]."',
                            '".$listaInscritos[$i]["email"]."',
                            '".$fecha_inscripcion."',
                            '".$micuota."',
                            '".$listadoActividadesInscrito."'
                            );\">".$listaInscritos[$i]["nombre"]."</a>
                    </p>";
            }
        }            
    }
?>