<?php
require '../Modelo/ModeloRegistroEvaluacionHitoPagable.php';
        $codC=$_GET['a'];
        $codUC=$_GET['u'];
        $codGE=$_GET['c_a'];
        $codUGE=$_GET['i_u'];
        $codHE=$_GET['c_h'];
        $nombreHE=$_GET['n_h'];
        
        $hitoE=$_POST['hitoEvento'];
        $montoP=$_POST['monto_pago'];
        $porcentajeS=$_POST['porcentajeSatisfaccion'];
        $porcentajeA=$_POST['porcentajeAlcanzado'];
        
        registraPagoDelConsultor($codC, $codUC, $codGE, $codUGE, $hitoE, $montoP, $porcentajeS, $porcentajeA);
        eliminarElPuntoDataDeEvaluacionHitosGE($codHE,$nombreHE);
        header("Location: ../Vista/iu.mostrarPlanDePagosGE.php?a=$codC&u=$codUC&c_a=$codGE&i_u=$codUGE");
?>
