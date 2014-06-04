
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
                
                //$a es el codigo de la grupo-empresa
                $a = $_GET['a'];
                $b = $_GET['b'];                  
                echo "<nav id='menu_seguimiento'>"
                ."<a href='../Controlador/ControladorContrato.php?a=$a'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?a=$a'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"     
                    ."<a href='iuListaEmpresas.php'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"
                    . "<a href='../Vista/iuDocenteGECalendario.php?a=$a'><img src='imagenes/btn_calendario_docenteGE.jpg' width='100%' height='48'/></a>"         
                . " </nav>";
                ?>
                <div id="noticias_seguimiento">
                    <h2> Avance Semanal </h2>
        <lbl2>Pulse sobre uno de los codigos para acceder al registro.</lbl2>
        
                    <form name="f" action="../Controlador/ControladorSeguimientoGE.php" method="post">
            <table align=center frame="void" border="0" class="encabezado" width="500" bgcolor=#C6E1E1>
                <br>
                   <thead>
                       <tbody align="center" style="font:  1.1em/1.1em 'FB Armada' arial">
                       <tr><th>Codigo</th><th>Rol</th><th>Esperado</th></tr>
                       
                        <?php 
                        include '../Controlador/ControladorSeguimientoGE.php'; 
                        $fila= mostrarRegistroAvanceGE($a,$b);
                        foreach ($fila as $elemento){ ?>
                        <tr>
                            <td><?php echo $elemento['grupoempresa'] ?></td>
                            </tr>
                        <?php } ?>
                        
                       <tbody>
                        </thead>
                </table> 
          </form> 
                </div>   
            </article>
            <footer id="pie_seguimiento"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>