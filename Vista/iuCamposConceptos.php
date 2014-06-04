<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CONSULTOR</title>
        <link href="css/evaluacion.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico"/>
    </head>

    <body id="body">
        <div id="principal_seguimiento">
            <header id="cabecera_seguimiento"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_seguimiento">
                <nav id="menu_seguimiento" >
                <?php
                $a=$_GET['a'];// $a -> codigo del consultor
                $u=$_GET['u'];// $u -> codigo de usuario del consultor
               echo"<a href='iu.registroProyecto.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_registrarProyecto.jpg'/></a>    
                    <a href='iuListaEmpresas.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>
                    <a href='iuAddActividad.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_añadirActividad.jpg'/></a>
                    <a href='iu.foroConsultor.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_foro.jpg'/></a>
                    <a href='iusubirArchivoConsultor.php?a=$a&u=$u&m=0'><img width='100%' height='48' src='imagenes/btn_subirArchivo.jpg'/></a>
                    <a href='iuSeleccionProyectoEvaluacion.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_registroEvaluacion.jpg'/></a>
                    <a href='iuRecursos.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_recusos.jpg'/></a>
                    <a href='../Controlador/ControladorBackup.php'><img width='100%' height='48' src='imagenes/btn_backup.jpg'/></a>
                    <a href='../Controlador/ControladorFinalizarSesion.php'><img src='imagenes/btn_cerrarSesion.png' width='100%' height='46' /></a>";
                ?>       
                </nav>
                <div id="noticias_seguimiento">
                    <h2> REGISTRO DE EVALUACION </h2>
                    <?php
                    $tipo_evaluacion = $_GET['te'];
                    $num_campos = $_POST['cant_conceptos'];
                            $nombre_criterio = $_GET['ncr'];
                            $proyecto = $_GET['cp'];
                            $porcen_calif = $_GET['pcent'];
                            $porcen_rest = $_GET['pcr'];
                    echo "<form name='formulario' method='POST' action='../Controlador/ControladorCamposConceptos.php?a=$a&u=$u&te=$tipo_evaluacion&nc=$num_campos&ncr=$nombre_criterio&cp=$proyecto&pcent=$porcen_calif&pcr=$porcen_rest'>";

                    for ($i = 1; $i <= $num_campos; $i++) {
                        echo 'Concepto:          ';
                        echo 'Puntaje del concepto:<br />';
                        echo '<input type=text name=concepto'.$i.'>';
                        echo '<input type=text name=puntaje'.$i.'><br>';
                    }

                    echo '<input type="submit" name="btn_regAvance" value="Registrar"> </form>';
                    ?>
                    <br />
                    </form>
                </div>
            </article>
            <footer id="pie_seguimiento"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>
