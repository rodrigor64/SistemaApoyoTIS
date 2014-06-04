<?php
require '../Modelo/ModeloGrupoEmpresa.php';
$cod_proy = $_POST['cbox_proyectos'];
$cod_cons = $_POST['cbox_docentes'];
$cod_ge = $_GET['a'];
$usr_ge = $_GET['u'];
if($cod_proy==0){
    header("Location: ../Vista/iuRegistroGrupoEmpresaConsultor.php?a=$cod_ge&u=$usr_ge");
}else{
    inscribir_GE($cod_ge, $usr_ge, $cod_cons, $cod_proy);
    header("Location: ../Vista/iuGrupoEmpresa.php?a=$cod_ge&u=$usr_ge");
}