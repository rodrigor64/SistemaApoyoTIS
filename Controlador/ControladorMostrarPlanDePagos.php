<?php
require('../Modelo/ModeloMostrarPlanDePagos.php');
    function retornarEstadoTablaPlanDePagos(){
        $estadoTabla = retornarEstadoDeTablaPlan();
        return $estadoTabla;
    }
    function mostrarPlan($codGE,$codUsuarioGE){
        $listaPlanDePago = mostrarPlanDePago($codGE,$codUsuarioGE);
    return $listaPlanDePago;    
    }
?>
