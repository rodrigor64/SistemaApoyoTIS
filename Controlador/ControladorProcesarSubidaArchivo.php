<?php
require '../Modelo/ModeloProcesarSubidaArchivo.php';

$nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
$nombreTemporalArchivo=$_FILES['nombre_archivo_subir']['tmp_name'];
$tipoArchivo=$_FILES['nombre_archivo_subir']['type'];
$descripcion=$_POST['text_descripcion'];
$titulo=$_POST['text_titulo'];
$codr=$_GET['a'];
$idUsuario=$_GET['u'];  
 If(isset($_GET['pu']))
   {
    $m=subirArchivoPublico($idUsuario,$codConsultor,$titulo,$tipoArchivo,$nombreArchivo,$nombreTemporalArchivo,$descripcion);
    header("Location:../Vista/iuSubirArchivoConsultor.php?a=$cod&u=$idUsuario&m=$m"); 
   }
 else{
    if(isset($_GET['ge']))
    {
     $m=subirPropuesta($idUsuario,$tipoArchivo,$cod,$nombreArchivo,$nombreTemporalArchivo,$descripcion);
     header("Location:../Vista/iuGrupoEmpresa.php?a=$codConsultor&u=$idUsuario&m=$m");
    }
    }
?>
