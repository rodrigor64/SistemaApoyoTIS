<?php

require ('../Controlador/Conexion.php');

function obtenerActividades() {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = " SELECT visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion FROM cons_actividad ORDER BY fechainicio desc";
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
        escribirdata($visible, $requiere, $fechaini, $fechafin, $horaini, $horafin, $titulo, $descripcion);
    }

    function escribirdata($visible, $requiere, $fechaini, $fechafin, $horaini, $horafin, $titulo, $descripcion) {
        $nombre_data = $visible;
        $requiere_respuesta = $requiere;
        $fecha_inicio = $fechaini;
        $fecha_fin = $fechafin;
        $hora_inicio = $horaini;
        $hora_fin = $horafin;
        $titulo_Actividad = $titulo;
        $descripcion_actividad = $descripcion;
        $div="<div id='actividad'>";
        $fin_div="</div>";
        $estilo="<STYLE TYPE='TEXT/CSS'>#actividad{border:solid 1px } #tituloActividad {color:#6F2836;} #descripcionActividad{background-color:#DFDFDF;} #informacionActividad{background-color: #6F2836; text-align:center; color:#FFF;}</STYLE>";
        if (file_exists('../Vista/' . $nombre_data . '.data')) {
            if ($requiere_respuesta) {
                $escribirdatos = fopen("../Vista/Otros/'.$nombre_data.'.data", "a");
                $datos="<h1 id=tituloActividad>.$titulo_Actividad.</h1> <p id=descripcionActividad>.$descripcion_actividad.</p><cite id=informacionActividad>Inicio Actividad:.$fecha_inicio.fin Actividad.$fecha_fin.hora inicio.$hora_inicio.hora fin.$hora_fin.<a href=>responder</a></cite>";
                $informaciontotal=$div.$datos.$fin_div.$estilo;
                fwrite($escribirdatos, "$informacion");
            }else{
                $escribirdatos = fopen("../Vista/Otros/'.$nombre_data.'.data", "a");
                $datos="<h1 id=tituloActividad>.$titulo_Actividad.</h1> <p id=descripcionActividad>.$descripcion_actividad.</p><cite id=informacionActividad>Inicio Actividad:.$fecha_inicio.fin Actividad.$fecha_fin.hora inicio.$hora_inicio.hora fin.$hora_fin.</cite>";
                $informaciontotal=$div.$datos.$fin_div.$estilo;
                fwrite($escribirdatos, "$informacion");            
            }
        } else {
            $miarchivo = fopen('../Vista/' . $nombre_data . '.data', 'w');
            fclose($miarchivo);
            if ($requiere_respuesta) {
                $escribirdatos = fopen("../Vista/Otros/'.$nombre_data.'.data", "a");
                $datos="<h1 id=tituloActividad>.$titulo_Actividad.</h1> <p id=descripcionActividad>.$descripcion_actividad.</p><cite id=informacionActividad>Inicio Actividad:.$fecha_inicio.fin Actividad.$fecha_fin.hora inicio.$hora_inicio.hora fin.$hora_fin.<a href=>responder</a></cite>";
                $informaciontotal=$div.$datos.$fin_div.$estilo;
                fwrite($escribirdatos, "$informacion");
            }else{
                $escribirdatos = fopen("../Vista/Otros/'.$nombre_data.'.data", "a");
                $datos="<h1 id=tituloActividad>.$titulo_Actividad.</h1> <p id=descripcionActividad>.$descripcion_actividad.</p><cite id=informacionActividad>Inicio Actividad:.$fecha_inicio.fin Actividad.$fecha_fin.hora inicio.$hora_inicio.hora fin.$hora_fin.</cite>";
                $informaciontotal=$div.$datos.$fin_div.$estilo;
                fwrite($escribirdatos, "$informacion");            
            }
            
        }
    }

}

?>