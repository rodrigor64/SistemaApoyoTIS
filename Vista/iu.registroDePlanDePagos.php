<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GRUPO-EMPRESA</title>
<link href="css/grupo_empresa_2.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
<link href="js/custom-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
<link href="js/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.20.js"></script>

<script>
    $(document).ready(function(){
        $( "#fecha_pago" ).datepicker({ dateFormat: "yy/mm/dd", minDate: '0' });
        var endingDate = $(this).attr('endingDate');
    });
</script>
</head>

<body id="body">
<div id="principal_grupoEmpresa">
    <header id="cabecera_grupoEmpresa"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_grupoEmpresa">
                <?php
                $a = $_GET['a'];
                $u = $_GET['u'];
                echo "<nav id='menu_grupoEmpresa'>
                            <a href='iu.propuestaDePago.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_planDePagos.jpg'/></a>
                            <a href='iu.mostrarPlanDePago.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>    
                            <a href='iu.foroGrupoEmpresa.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_foro.jpg'/></a>
                            <a href='../Vista/iuDiaReunionGE.php?a=$a&u=$u'><img src='imagenes/btn_diaDeReunion.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuCalendarioGrupoEmpresa.php?a=$a&u=$u'><img src='imagenes/btn_calendario.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuGrupoEmpresa.php?a=$a&u=$u'><img src='imagenes/btn_volverMiPagina.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Controlador/ControladorFinalizarSesion.php'><img src='imagenes/btn_cerrarSesion.png' width='100%' height='46' alt='btn_1' /></a>
                      </nav>"
                ?>
    <div id="noticias_grupoEmpresa">
        <fieldset id="fieldsetForo" > 
        <legend>Formulario Plan De Pagos</legend>
            <?php 
            echo "<form action='../Controlador/ControladorPropuestaPlanDePago.php?2&a=$a&u=$u' method='post'>"; 
            ?>
            <h2>Registro Plan de Pagos</h2>
            <table width="100%" border="2" cellspacing="2" cellpadding="2">
                <tr>
                    <td>
                        <table width="400" border="2">
                            <tr>
                                <td align="right"><Strong>Hito o Evento :</strong></td>
                                <td width="130"><input type="text" name="hito_evento" id="hito_evento" required/></td>
                            </tr>
                            <tr>
                                <td align="right"><Strong>Porcentaje de Pago :</strong></td>
                                <td width="130"><input type="text" name="porcentaje_pago" id="porcentaje_pago" required pattern="[0-9.]+"/><strong> (%)</strong></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Fecha de Pago :</strong></td>
                                <td width="130"><input type="text" name="fecha_pago" id="fecha_pago" placeholder="Seleccione una fecha" required/></td>
                            </tr>
                            <tr>
                                <td width="130"><input name="codPlan_pago" value="<?=$_GET['c_p'];?>" type="hidden"></td>
                            </tr>   
                        </table>
                    </td>
                    <td>    
                        <table width="300" border="2">
                            <tr>
                                <td align="center"><strong>Monto Restante :</strong></td>         
                            </tr>
                            <tr>
                                <td width="100" align="center"><input value="<?=$_GET['m_t'];?>" type="text" name="monto_total" id="monto_total" readonly="readonly"/><strong> (Bolivianos)</strong></td>  
                            </tr>
                            <tr>
                                <td align="center"><strong>Porcentaje Restante :</strong></td>         
                            </tr>
                            <tr>
                                <td width="100" align="center"><input size="3" value="<?=$_GET['p_s'];?>" type="text" name="porcentaje_satisfaccion" id="porcentaje_satisfaccion" readonly="readonly"/><strong> (%)</strong></td>  
                            </tr>
                        </table>
                    </td> 
                </tr>
                <tr>
                   
                    <td width="20">
                    <label>
                        <input <?php if(isset($_REQUEST['AVI'])){ echo "type='submit'";}?>  readonly="readonly" name="btn_registroPago" id="btn_registroHitoEvento" value="Añadir Hito Evento" />
                    </label>
                 
                    <?php
                        if($_GET['m_t']==0){
                        //if (isset($_REQUEST['linkMPP'])) {
                            $c_ge=$_GET['a'];
                            $c_uge=$_GET['u'];
                            $c_p=$_GET['c_p'];
                            echo "<td width='60' >"
                                    ."<a href='iu.mostrarPlanDePago.php?a=$c_ge&u=$c_uge&c_p=$c_p'><strong>Mostra plan de Pagos</strong></a>"
                                ."</td>";
                        //}
                        }
                    ?>
                    </td>    
                </tr>     
            </table>
        </form>
        </fieldset>
        
        <?php
                if(isset($_REQUEST['tabla'])){
                    $codplan_papo=$_GET['c_p'];
                    $cod_hito = $_GET['c_h'];
                    $cod_ge=$_GET['a'];
                    $cod_usuarioGE=$_GET['u'];
                    echo"<fieldset id='fieldsetForo' >" 
                       ."<legend>Registro de los Entregables</legend>";
                    echo"<form name'f' action='../Controlador/ContriladorMostrarPlanDePago.php' method='post'>"
                            ."<table align='center' width='50%' border='2' cellspacing='2' cellpadding='2' bgcolor=#C6E1E1>"
                                ."<thead>"
                                    ."<tbody  style='font:  1.1em/1.1em 'FB Armada' arial'>"
                                    ."<tr><th>Entregables</th></tr>";
                                        require '../Controlador/ControladorMostrarEntregables.php';
                                        $lista = mostrarE($codplan_papo,$cod_hito,$cod_ge,$cod_usuarioGE);
                                        foreach($lista as $post):?>
                                            <tr>
                                                <td><?php echo $post?></td>
                                            </tr>
                                            <?php endforeach;
                    echo            "</tbody>"
                                ."</thead>"
                            ."</table>"
                       ."</form>"
                       ."</fieldset>";
                    
                }?>
        
       
            <?php
            //if($_GET){
            if(isset($_REQUEST['c_h'])){    
                $c_h = $_GET['c_h'];
                $c_p =$_GET['c_p'];
                $m_t=$_GET['m_t'];
                $p_s=$_GET['p_s'];
           
            echo "<fieldset id='fieldsetForo' >" 
                ."<legend>El Hito Asido Agregado Correctamente Registre los Entregables</legend>";
            echo "<form action='../Controlador/ControladorRegistroEntregables.php?2&a=$a&u=$u&c_h=$c_h&c_p=$c_p&m_t=$m_t&p_s=$p_s' method='post'>"; 
            
            echo "<table width='100%' border='2' cellspacing='2' cellpadding='2'>"   
                        ."<tr>"
                            ."<td width='30%' align='right'><strong>Entregable :</strong></td>"
                            ."<td><textarea name='entregable' cols='70%' rows='1%' required></textarea></td>"
                        ."</tr>"
                        ."<tr>"
                            ."<td width='20'>"
                                ."<label>"
                                    ."<input  type='submit' name='btn_registroEntregable' id='btn_registroEntregable' value='Añadir Entregable' />"
                                ."</label>"
                            ."</td>"
                            ."<td width='20'>"
                                ." <a href='iu.registroDePlanDePagos.php?AVI&a=$a&u=$u&m_t=$m_t&p_s=$p_s&c_p=$c_p'><strong>Terminar Registro</strong></a>"
                            ."</td>"
                        ."</tr>"                   
                ."</table>"
                ."</form>"
                ."</fieldset>";
        }?>    

    </div>
    </article>
    <footer id="pie_grupoEmpresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>