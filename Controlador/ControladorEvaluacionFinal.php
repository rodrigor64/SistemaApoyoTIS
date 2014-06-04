<?php
require '../Modelo/ModeloEvaluacion.php';

$a = $_GET['a'];
$u = $_GET['u'];
                            
$tipo_evaluacion = $_POST['cbox_evaluaciones'];
$nombre_criterio = $_POST['criterio'];
$proyecto = $_POST['cod_proyecto'];
$porcen_calif = $_POST['porcentaje_calif'];
$porcent_rest = $_POST['porcentaje_restante'] - $porcen_calif;

insertar_registro_criterio($tipo_evaluacion, $proyecto, $u, $a, $nombre_criterio, $porcen_calif);
if($tipo_evaluacion==1){
    registrar_verdadero_falso($tipo_evaluacion, $proyecto, $u, $a, $nombre_criterio);
    header("Location: ../Vista/iuRegistroEvaluacion.php?a=$a&u=$u&p=$porcent_rest&proyecto=$proyecto");
}
if($tipo_evaluacion==2){
    registrar_numerico($tipo_evaluacion, $proyecto, $u, $a, $nombre_criterio);
    header("Location: ../Vista/iuRegistroEvaluacion.php?a=$a&u=$u&p=$porcent_rest&proyecto=$proyecto");
}
if($tipo_evaluacion==3){
    header("Location: ../Vista/iuNumeroConceptos.php?a=$a&u=$u&te=$tipo_evaluacion&ncr=$nombre_criterio&cp=$proyecto&pcent=$porcen_calif&pcr=$porcent_rest");
}
if($tipo_evaluacion==4){
    header("Location: ../Vista/iuNumeroConceptos.php?a=$a&u=$u&te=$tipo_evaluacion&ncr=$nombre_criterio&cp=$proyecto&pcent=$porcen_calif&pcr=$porcent_rest");
}
