<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GRUPO-EMPRESA</title>
<link href="css/grupo_empresa_2.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body id="body">
<div id="principal_grupoEmpresa">
    <header id="cabecera_grupoEmpresa"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_grupoEmpresa">
                <?php
                $a = $_GET['a'];// $a -> codigo grupo empresa
                $u =$_GET['u'];//$u -> codigo usuario grupo empresa
                echo "<nav id='menu_grupoEmpresa'>
                        <a href='iu.propuestaDePago.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_planDePagos.jpg'/></a>
                            <a href='iu.mostrarPlanDePago.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>    
                            <a href='iu.foroGrupoEmpresa.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_foro.jpg'/></a>
                            <a href='../Vista/iuDiaReunionGE.php?a=$a&u=$u'><img src='imagenes/btn_diaDeReunion.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuCalendarioGrupoEmpresa.php?a=$a&u=$u'><img src='imagenes/btn_calendario.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuGrupoEmpresa.php?a=$a&u=$u'><img src='imagenes/btn_volverMiPagina.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuRegistroSocio.php?a=$a&u=$u'><img src='imagenes/btn_registrarSocio.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Controlador/ControladorFinalizarSesion.php'><img src='imagenes/btn_cerrarSesion.png' width='100%' height='46' alt='btn_1' /></a>
                
                </nav>";
               
                ?>
    <div id="noticias_grupoEmpresa">
        <fieldset> 
        <legend>Formulario Propuesta De Pago</legend>
        <?php 
  echo "<form action='../Controlador/ControladorPropuestaPlanDePago.php?1&a=$a&u=$u' method='post'>"; 
        ?>  
            <h2>Propuesta de Pago</h2>
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                    <td width="30%" align="right"><Strong>Monto Total :</strong></td>
                    <td><input type="text" name="monto_total" id="monto_total" title=" 100000, 950 ,1237374.535 valores numericos" required pattern="[0-9.]+" <?php if(isset($_REQUEST['SMS'])){$mt=$_GET['MT']; echo"value='$mt'"; }?> /><strong> (Bolivianos)</strong></td>
                </tr>
                <tr>
                    <td width="30%" align="right"><strong>Porcentaje de Satisfaccion :</strong></td>
                    <td><input  type="text" name="porcentaje_satisfaccion" id="porcentaje_satisfaccion" title="100, 55, 45, 12 valores numeros" required pattern="[0-9.]+" <?php if(isset($_REQUEST['SMS'])){$ps=$_GET['PS']; echo"value='$ps'"; }?> /><strong> (%)</strong></td>
                </tr>
                <?php
                if(isset($_REQUEST['SMS'])){
          echo "<tr>
                    <td></td>
                    <td><input  type='text' style='background-color:#6B2C37; color: #FFFFFF; border:2px solid #6B2C37' value=' Este % no es valido' readonly='readonly' /></td>
                </tr>";      
                }?>
                <tr>
                    <td width="30%" align="right">&nbsp;</td>
                    <td><input  type="submit" name="btn_registroPago" id="btn_registroProyecto" value="Añadir" /></td>
                </tr>    
            </table>
        </form>
        </fieldset>
    </div>
    </article>
    <footer id="pie_grupoEmpresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>
