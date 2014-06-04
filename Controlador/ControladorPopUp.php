<?php
require ('../Controlador/Conexion.php');

function mostrar_publicas($cod) {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "select visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='publica' and now()<=fechafin and now()>=fechainicio and codcons_actividad = $cod ORDER BY fechainicio desc";
    //select visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='publica' and now()<=fechafin and now()>=fechainicio ORDER BY fechainicio desc;
    $rows = $conexion->ejecutarSql($sql);
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
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
        echo $horaini."<br />";
        echo $horafin."<br />";
        echo $descripcion."<br />";
    }

}

function mostrar_especificas($cod_GE, $cod) {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "select visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='$cod_GE' and now()<=fechafin and now()>=fechainicio and codcons_actividad = $cod ORDER BY fechainicio desc";
    $rows = $conexion->ejecutarSql($sql);
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
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
        echo $horaini."<br />";
        echo $horafin."<br />";
        echo $descripcion."<br />";
    }
}

    