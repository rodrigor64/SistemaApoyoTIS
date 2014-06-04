<?php
require '../Controlador/Conexion.php';

function obtenerActividades() {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "select codcons_actividad, visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='publica' and now()<=fechafin and now()>=fechainicio ORDER BY fechainicio desc";
    //select visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='publica' and now()<=fechafin and now()>=fechainicio ORDER BY fechainicio desc;
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
        
        
        echo "<lbl3>$titulo</lbl3><br />";
        echo "<lbl2>Fecha de inicio: $fechaini</lbl2><br />";
        echo "<lbl2>Fecha de fin: $fechafin</lbl2><br />";
        if ($requiere == "si_requiere") {
            
        echo "<a href '' onclick='openWin($codigo_actividad);'>Ver Mas |</a><a href=''> Responder</a><br />";
        }  else {
            
        echo "<a href='' onclick='openWin($codigo_actividad);'>Ver Mas </a><br />";
        }
        echo "<lbl2>________________________________________________________________________________________________________________</lbl2><br />";
    }
    
}


