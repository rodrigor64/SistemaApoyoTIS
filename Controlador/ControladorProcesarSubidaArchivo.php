<?php
require '../Modelo/ModeloProcesarSubidaArchivo.php';

$nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
$nombreTemporalArchivo=$_FILES['nombre_archivo_subir']['tmp_name'];
$tipoArchivo=$_FILES['nombre_archivo_subir']['type'];
$descripcion=$_POST['text_descripcion'];
if(isset($_POST['visiblePara']))
  {
    $visiblePara=$_POST['visiblePara'];
    $consultorUsuario=$_GET['u'];    
  }
  else{
      $codConsultor=$_GET['a'];
      $idUsuario=$_GET['u'];  
      subirArchivoPublico($tipoArchivo,$nombreArchivo,$nombreTemporalArchivo,$descripcion);
  }
 if(isset($_GET['m']))
   {
      $codGrupoempresa=$_GET['a'];
      $idUsuario=$_GET['u']; 
      subirPropuesta($idUsuario,$tipoArchivo,$codGrupoempresa,$nombreArchivo,$nombreTemporalArchivo,$descripcion);
     
   }
    
?>
