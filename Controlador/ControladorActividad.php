<?php
require '../Controlador/Conexion.php';

function obtenerActividades() {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "select codcons_actividad, visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='publica' and now()<=fechafin and now()>=fechainicio ORDER BY fechainicio desc";
    $rows = $conexion->ejecutarSql($sql);
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
        $codigo_actividad = $row['codcons_actividad'];
        $visible = $row['visiblepara'];
        $requiere = $row['requiererespuesta'];
        $fechaini = $row['fechainicio'];
        $fechafin = $row['fechafin'];
        $horaini = $row['horainicio'];
        $horafin = $row['horafin'];
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        
   
        echo "<lbl3><strong>$titulo</strong></lbl3><br/>";
        echo "&nbsp;<lbl2><strong>Fecha de inicio:</strong> $fechaini</lbl2><br />";
        echo "&nbsp;<lbl2><strong>Fecha de fin:</strong> $fechafin</lbl2><br />";
        if ($requiere == "si_requiere") {
            
        echo "&nbsp;&nbsp;&nbsp;<a href '' onclick='openWin($codigo_actividad);'>Ver Mas</a>  &nbsp; <a href=''> Responder</a><br />";
        }  else {
            
        echo "&nbsp;&nbsp;&nbsp;<a href='' onclick='openWin($codigo_actividad);'>Ver Mas </a><br />";
        }
        echo "<lbl2>______________________________________________________________________________________________</lbl2><br />";
    }
    
}


