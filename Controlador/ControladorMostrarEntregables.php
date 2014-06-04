<?php
require('../Modelo/ModeloMostrarEntregables.php');
    
    function mostrarE($codplan_papo,$cod_hito,$cod_ge,$cod_usuarioGE){
        $listaEntregables = mostrarEntregables($codplan_papo,$cod_hito,$cod_ge,$cod_usuarioGE);
    return $listaEntregables;    
    }
?>
