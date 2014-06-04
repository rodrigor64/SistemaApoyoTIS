<?php
require '../Modelo/ModeloSeguimientoSemanal.php';

$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];
$detalle = $_POST['detalle'];
$realizado = $_POST['realizado'];
$observaciones = $_POST['observaciones'];

ingresarDetalleConsultor($a, $b, $c, $realizado, $observaciones, $detalle);

header("Location: ../Vista/iuTablaSeguimientoDocenteGE.php?a=$a&b=$b");