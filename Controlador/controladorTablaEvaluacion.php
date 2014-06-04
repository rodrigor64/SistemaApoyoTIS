<?php
require '../Modelo/ModeloEvaluacion.php';

function mostrarTabla($cod_cons,$usr_cons, $cod_ge,$usr_ge){
    mostrar_lista_criterios($cod_cons,$usr_cons, $cod_ge,$usr_ge);
    require_once '../Vista/iuTablaCriteriosEvaluacion.php';
}

function mostrar_tabla_registro($cod_cons, $cod_proyecto){
    mostrar_lista_registro_criterios($cod_cons, $cod_proyecto);
    require_once '../Vista/iuTablaCriteriosEvaluacion.php';
}