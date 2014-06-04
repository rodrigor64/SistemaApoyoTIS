<?php
require '../Modelo/ModeloRegistroEntregables.php';
$codGE=$_GET['a'];
$codUGE=$_GET['u'];
$codPlanPago=$_GET['c_p'];
$codHito=$_GET['c_h'];
$entregable=$_POST['entregable'];
$m_t=$_GET['m_t'];
$p_s=$_GET['p_s'];
insertarEntrgables($codGE,$codUGE ,$codPlanPago, $codHito, $entregable);
header("Location: ../Vista/iu.registroDePlanDePagos.php?tabla&a=$codGE&u=$codUGE&c_p=$codPlanPago&c_h=$codHito&m_t=$m_t&p_s=$p_s");
?>
