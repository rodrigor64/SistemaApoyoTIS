<?php  
    require '../Modelo/ModeloGrupoEmpresa.php';
    
    function mostrarListaEmp($a,$u){
        $listaEmpresas = mostrarListaEmpresas($a,$u);
        return $listaEmpresas;
    }
    function mostrarDatosEmp($codGE){
        $nombreRepLegal = mostrarDatosEmpresa($codGE);
        echo $nombreRepLegal;
    }
    function mostrarEmpresa(){
        $listaEmpresas = mostrarEmpresas();
        require_once '../Vista/ListaEmpresas.html';
    }
    
    function conseguir_usuario($cod_ge) {
        return devolver_usuario($cod_ge);
}
?>
