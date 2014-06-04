<?php

require_once '../Modelo/ModeloCalendarioGrupoEmpresa.php';
$codigo_ge = $_GET['a'];

function mostrar_reuniones() {
    global $codigo_ge;
    $arreglo_fechas_semanales = recuperar_fechas_reunionsemanal($codigo_ge);
    foreach ($arreglo_fechas_semanales as $fecha) {
        $fecha_unix = strtotime($fecha);
        $di = date("j", $fecha_unix);
        $me = date("n", $fecha_unix);
        $an = date("Y", $fecha_unix);
        
        $dia = date("d", $fecha_unix);
        $mes = date("m", $fecha_unix);
        $anio = date("Y", $fecha_unix);
        
        $cod_evaluacion = conseguir_id_fecha($codigo_ge, $dia, $mes, $anio);
        
        echo '<div data-role="day" data-day="' . $an . $me . $di . '">
               <div data-role="event" data-codigo = "'.$cod_evaluacion.'" data-name="Reunion semanal de seguimiento" data-start="" data-end="" data-location="' . $codigo_ge . '"></div>
               </div>';
    }
}

function mostrar_hitos() {
    global $codigo_ge;
    $arreglo_fechas_hitos = recuperar_fechas_hitos($codigo_ge);
    foreach ($arreglo_fechas_hitos as $fecha) {
        $fecha_unix = strtotime($fecha);
        $di = date("j", $fecha_unix);
        $me = date("n", $fecha_unix);
        $an = date("Y", $fecha_unix);
        
        $dia = date("d", $fecha_unix);
        $mes = date("m", $fecha_unix);
        $anio = date("Y", $fecha_unix);
        
        $cod_hito = conseguir_id_hito($codigo_ge, $dia, $mes, $anio);
        $nom_hito = conseguir_nombre_hito($cod_hito);
        echo '<div data-role="day" data-day="' . $an . $me . $di . '">
               <div data-role="event" data-codigo = "'.$cod_hito.'" data-name="'.$nom_hito.'" data-start="" data-end="" data-location="' . $codigo_ge . '"></div>
               </div>';
    }
}

function registrarOtros() {
    echo '<div data-role="day" data-day="2014112">
    <div data-role="event" data-name="This is an event" data-start="" data-end="" data-location=""></div>
    </div>';

    echo '<div data-role="day" data-day="2014521">
    <div data-role="event" data-name="This is an event 2" data-start="" data-end="" data-location=""></div>
    </div>';

    echo '<div data-role="day" data-day="2014521">
    <div data-role="event" data-name="Reunion semanal de seguimiento" data-start="" data-end="" data-location=""></div>
</div>';
}

function dia_fijado() {
    global $codigo_ge;
    $res = ver_dia_fijado($codigo_ge);

    $r;
    if($res == "f")
        $r = FALSE;
    else
        $r = TRUE;
    return $r;
}