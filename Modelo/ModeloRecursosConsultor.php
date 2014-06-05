<?php
require '../Controlador/Conexion.php';
function insertarNoticia($nombre_archivo,$titulo_archivo,$destino_archivo,$descripcion_archivo)
{
 
 
 $abrir =  fopen("../Vista/Otros/datosNoticias.data", "r");
 $lectura = fread($abrir, filesize("../Vista/Otros/datosNoticias.data"));
 

 $escribir =  fopen("../Vista/Otros/datosNoticias.data", "a"); 
 fwrite($escribir,"<b>Archivo subido:</b> $fecha</b><br/>
                   <b>Titulo:</b>$titulo_archivo</b><br/>
                   <b>Descripción:</b>$descripcion_archivo</b><br/>
                   <b>Nombre:</b>$nombre_archivo</b><br/>
                   <a href='$destino_archivo'>descargar</a><b></p><hr>");
 //fwrite($escribir,"<b>Nombre:</b> $nombre_archivo <br><b><a href='$destino_archivo'></a></b></p><hr>");
 fclose($escribir);
 header('Location:../Vista/iu.consultor.php');
}
function mostrarRecursos($idUsuario,$rol) {
   $res="";
    if($rol==2)
    {
        
        $conec = new Conexion();
        $con = $conec->getConection();
        
        $sql="select idcons_documento,nombredocumento,descripcionconsultordocumento,pathdocumentoconsultor,titulo_consdocumento
        from cons_documento
        where consultor_idconsultor=(select idconsultor 
	from consultor
	where usuario_idusuario='$idUsuario')
	ORDER BY idcons_documento DESC";
        $resultado = pg_query($con,$sql);
        $divParcial="";
        if (!$resultado) {
         echo "Ocurrio un error.\n";
        }
        while ($fila = pg_fetch_row($resultado)) {
                $nombre_documento= $fila[1];
                $descripcion_documento= $fila[2];
                $ruta_documento=$fila[3];
                $titulo_documento=$fila[4];
                
                $divParcial=$divParcial."
                <div class='correcto' >
                        <table  width='200'>
                        <td align='center'>
                        $titulo_documento<br>
                        $descripcion_documento<br>
                        <a href='$ruta_documento'>$nombre_documento</a><br>
                        </td>
                        </table>
                </div>";     
        }
        $res=$divParcial;
    }
    return $res;
}