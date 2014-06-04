<?php

require('../Modelo/ModeloRegistroSocio.php');

$usuario=$_POST['nombre_usuario'];
$contrasena=$_POST['contraseña_usuario1'];
$nombre=$_POST['nombre_socio'];
$apellidos=$_POST['apellidos_socio'];
$correo=$_POST['correo_socio'];
$direccion=$_POST['direccion_socio'];
$profesion=$_POST['profesion_socio'];
$estado_civil=$_POST['combo_estado_civil'];
$tipo_socio=$_POST['combo_cargo'];;
$a = $_GET['a'];// $a -> codigo grupo empresa
$u =$_GET['u'];//$u -> codigo usuario grupo empresa

if(cantidadDeSocios($a)<5&&isset($_POST['nombre_usuario'])){
    echo 'es posible';
RegistrarUsuario($usuario, $contrasena);
RegistrarSocio($usuario,$a,$tipo_socio,$u,$nombre,$apellidos,$estado_civil,$direccion,$profesion);
}
else{
    header("Location: ../Vista/iuRegistroDenegadoSocio.php?a=$a&u=$u");
}


