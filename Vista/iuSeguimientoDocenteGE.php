<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Consultor</title>
        <link href="css/seguimiento.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
    </head>

    <body id="body">
        <div id="principal_seguimiento">
            <header id="cabecera_seguimiento"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_seguimiento">
                <?php
                include '../Controlador/ControladorSeguimientoGE.php'; 
                //a = codigo de la grupoempresa
                $a = $_GET['a'];
                //b = codigo del calendario de la grupoempresa
                $b = $_GET['b'];
                //c = codigo del registro de un detalle
                $c = $_GET['c'];
              
                echo "<nav id='menu_seguimiento'>"
                ."<a href='../Controlador/ControladorContrato.php?a=$a'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?a=$a'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"     
                    ."<a href='iuListaEmpresas.php'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"
                    . "<a href='../Vista/iuDocenteGECalendario.php?a=$a'><img src='imagenes/btn_calendario_docenteGE.jpg' width='100%' height='48' alt='btn_1' /></a>"         
                . " </nav>";
                ?>
                <div id="noticias_seguimiento">
                    <h2> Seguimiento: Reunión semanal </h2>
                    <lbl2>Registro de seguimiento del avance semanal</lbl2>
                    <?php
                    echo "<form name='formulario' method='POST' action='../Controlador/ControladorSeguimientoDocenteGE.php?a=$a&b=$b&c=$c'>"
                    ?>
                    <lbl>Rol:</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="rol" required="" pattern="[a-zA-Z0-9.,+_-]+" readonly="readonly"><?php mostrar_rol($c); ?></textarea>
                    <br />
                    <lbl>Qué se hara?</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="esperado" required="" pattern="[a-zA-Z0-9.,+_-]+" readonly="readonly" ><?php mostrar_esperado($c) ?></textarea>
                    <br />
                    <lbl>Detalle</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="detalle" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);"><?php mostrar_detalle_esperado($c); ?></textarea>
                    <br />
                    <lbl>Qué se hizo?</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="realizado" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);"><?php mostrar_realizado($c); ?></textarea>
                    <br />
                    <lbl>Observaciones</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="observaciones" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);"><?php mostrar_observaciones($c); ?></textarea>
                    <br />
                    
                    <input type="submit" name="btn_regAvance" id="btn_regAvance" value="Registrar">

                    </form>
                    <br />

                    <br />
                    <br />
                    <script>
                        function clearContents(element) {
                            element.value = '';
                        }
                    </script>
                </div>   
            </article>
            <footer id="pie_seguimiento"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>