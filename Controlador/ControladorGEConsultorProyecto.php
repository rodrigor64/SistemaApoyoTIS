<?php
require '../Modelo/ModeloGrupoEmpresa.php';
function empresa_registrada($cod_GE){
    return esta_registrado($cod_GE);
}

function mostrar_proyectos() {
    conseguir_proyectos();
}

function mostrar_docentes() {
    conseguir_docentes();
}