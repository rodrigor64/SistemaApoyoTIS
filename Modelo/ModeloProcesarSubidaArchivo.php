<?php    
require '../Controlador/Conexion.php';

function subirPropuesta($idUsuario,$tipo_Archivo,$codGrupoempresa,$nombreArchivo,$nombreTemporalArchivo,$descripcion)
{
    $res;
    if($tipo_Archivo=='application/pdf'){
    $carpetaRaiz="../Archivos/";
    $gestion=date("Y");
    
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql="select login from usuario
          where idusuario=(select consultor_usuario_idusuario 
                            from	consultor_proyecto_grupo_empresa
                            where grupo_empresa_codgrupo_empresa='$codGrupoempresa')";
    $result = pg_query($con,$sql);
    $aux = pg_fetch_object($result);
    $nombre_consultor = $aux->login;
    
    $sql1="select nombreproyecto from proyecto
           where codproyecto=(select proyecto_codproyecto 
                              from  consultor_proyecto_grupo_empresa
                              where grupo_empresa_codgrupo_empresa='$codGrupoempresa')";
    
    $result1 = pg_query($con,$sql1);
    $aux1 = pg_fetch_object($result1);
    $nombre_proyecto = $aux1->nombreproyecto;
    
    
    
    $sql2="select login from usuario where idusuario='$idUsuario'";
    $result2 = pg_query($con,$sql2);
    $aux2 = pg_fetch_object($result2);
    $login_Grupoempresa = $aux2->login;
    
    
    
    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$gestion."/".$nombre_proyecto."/".$login_Grupoempresa."/"; 
    
     if(file_exists($carpetaDestino)){
              $nombreFinal=guardarArchivo($carpetaDestino,$nombreArchivo,$nombreTemporalArchivo);
              $rutaFinal=$carpetaDestino.$nombreFinal;
              guardarRutaGrupoEmpresa($codGrupoempresa,$idUsuario,$nombreFinal,$rutaFinal,$descripcion);
              $res=2;
              
        }
        else{
            if(!mkdir($carpetaDestino, 0777, true)) {
                 die('Fallo al crear las carpetas...');
               }
            else{
              $nombreFinal=guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
              $rutaFinal=$carpetaDestino.$nombreFinal;
              guardarRutaGrupoEmpresa($codGrupoempresa,$idUsuario,$nombreFinal,$rutaFinal,$descripcion);
              $res=2;
            }
        }
    
    }
    else{
        $res=1;
    }
}

function subirArchivoPublico($idUsuario,$codGrupoempresa,$titulo,$tipo_Archivo,$nombre_Archivo,$nombre_Temporal_Archivo,$descripcion)
{
   $res=0;
   if($tipo_Archivo=='application/pdf'){
    $carpetaRaiz="../Archivos/";
    $gestion=date("Y");
    $carpetaDestino=$carpetaRaiz."Documentos publicos/".$gestion."/";    
    
    if(file_exists($carpetaDestino)){
              $nombreFinal=guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
              $rutaFinal=$carpetaDestino.$nombreFinal;
              guardarParaTodos($titulo,$nombreFinal, $descripcion, $rutaFinal);
              $res=2;
                          
        }
        else{
            if(!mkdir($carpetaDestino, 0777, true)) {
                 die('Fallo al crear las carpetas...');
               }
            else{
              $nombreFinal=guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
              $rutaFinal=$carpetaDestino.$nombreFinal;
              guardarParaTodos($titulo,$nombreFinal, $descripcion, $rutaFinal);
             $res=2;
            }
        }
   }
   else{
       $res=1;
   }

return $res;        
}

function subirArchivo($visible_para,$nombre_gestion,$nombre_proyecto,$nombre_consultor,$nombre_Archivo,$nombre_Temporal_Archivo,$tipo_Archivo)
{   
    
    if($tipo_Archivo=='application/pdf'){
    $carpetaRaiz="../Archivos/";
        if($visible_para=="publico"){
            $carpetaDestino=$carpetaRaiz."Documentos publicos/".$nombre_gestion."/";
    
        }
        elseif ($visible_para=="yo_mismo") {
                $carpetaDestino=$carpetaRaiz.$nombre_consultor."/Privado/";
                }
            elseif ($visible_para=="todos_grupos") {
                    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/Documentos publicos grupo empresas/";
                    }
                else{                  
                    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/".$nombre_proyecto."/".$nombre_Grupoempresa."/";
                    }
                        
        if(file_exists($carpetaDestino)){
              guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
              
              header('Location:../Vista/iu.ingresar.html');
              
        }
        else{
            if(!mkdir($carpetaDestino, 0777, true)) {
                 die('Fallo al crear las carpetas...');
               }
            else{
              guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
            }
        }
    }
    else{
      header('Location:../Vista/iu.subidaArchivo.html');
    }
    }   

function subirArchivoPrivadoCons($idusuario_consultor,$tipo_Archivo,$nombre_Archivo,$nombre_Temporal_Archivo,$descripcion)
{
    if($tipo_Archivo=='application/pdf'){
    $carpetaRaiz="../Archivos/";
    $gestion=date("Y");
    $carpetaDestino=$carpetaRaiz.$idusuario_consultor."/Privado/";   
    }
    
}

function guardarArchivo($ruta,$nombre,$tmp_Archivo){
    $destino=$ruta.$nombre;
    
    if(file_exists($destino)){
        return renombrar($ruta,$nombre,$tmp_Archivo);
        
    }
    else{
        copy($tmp_Archivo,$destino);
        move_uploaded_file($tmp_Archivo,$destino); 
        return $nombre;
    }
                
}
function renombrar($rutaArchivo,$nom,$tmp_Archivo_r){
    $desfragmentado=explode(".",$nom);
    $extension=".".$desfragmentado[1];
    
    $n=1;
    $nombreParcial=$desfragmentado[0].$n.$extension;
    
    while(file_exists($rutaArchivo.$nombreParcial)){
        $nombreParcial=$desfragmentado[0].$n.$extension;
        $n++;
    
    }
    guardarArchivo($rutaArchivo,$nombreParcial,$tmp_Archivo_r);
    return $nombreParcial;
}

function guardarRutaConsultor($idConsultor,$nombre,$descripcion,$ruta,$titulo) {
    $conec = new Conexion();
    $con = $conec->getConection();

    $sql="INSERT INTO cons_documento(consultor_idconsultor, nombredocumento, descripcionconsultordocumento, 
                                     pathdocumentoconsultor,titulo_consdocumento)
                             VALUES ('$idConsultor','$nombre','$descripcion','$ruta','$titulo')";
    pg_query($con,$sql) or die("ERROR :(".pg_last_error());
}
function guardarRutaGrupoEmpresa($codGE,$idGEUsuario,$nombre,$ruta,$descripcion,$titulo) {
    $conec = new Conexion();
    $con = $conec->getConection();
    
    $sql="INSERT INTO ge_documento(grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario, 
                                   nombredocumento, pathdocumentoge,descripciongedocumento,titulo_gedocumento)
                                  VALUES ('$codGE','$idGEUsuario','$nombre','$ruta','$descripcion','$titulo')";
    pg_query($con,$sql) or die("ERROR :(".pg_last_error());
}

function guardarParaTodos($titulo,$nombre,$descripcion,$ruta) {
    
    
    $conec = new Conexion();
    $con = $conec->getConection();

    $result1 = pg_query($con, "SELECT codgrupo_empresa, usuario_idusuario FROM grupo_empresa");
    if (!$result1) {
         echo "Ocurrio un error.\n";
        }
        while ($row = pg_fetch_row($result1)) {
                $codgrupo_empresa= $row[0];
                $usuario_idusuario= $row[1];
                guardarRutaGrupoEmpresa($codgrupo_empresa,$usuario_idusuario, $nombre,$ruta,$descripcion,$titulo);
        }  
    $result2 = pg_query($con, "SELECT idconsultor FROM consultor");
    if (!$result2) {
         echo "Ocurrio un error.\n";
        }
        while ($row = pg_fetch_row($result2)) {
                $idConsultor= $row[0];
                guardarRutaConsultor($idConsultor,$nombre,$descripcion,$ruta,$titulo);
        }
    //llenarPublicos($nombre, $descripcion, $ruta, $titulo);    
    
}
function llenarPublicos($nombre,$descripcion,$ruta,$titulo)
{
    $conec = new Conexion();
    $con = $conec->getConection();
    
    $sql="INSERT INTO documentos_publicos( titulo_docuemnto, descripcion_documento, nombre_documento, 
            ruta_documento)
            VALUES ('$titulo','$descripcion','$nombre','$ruta');";
    pg_query($con,$sql) or die("ERROR :(".pg_last_error());
}
