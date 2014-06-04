<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/estilos_basicos.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="principal">
  <div id="cabecera"><img src="imagenes/encabezado_logo.jpg" width="550" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="350" height="200" alt="cabecera2" /></div>
  <div id="contenido_usuarios">
      
      <div id="menu_consultor" ></div>
    <div id="noticias_consultor">
        <h2> Lista de Grupo Empresas </h2>
        <br />
        <lbl2>Esta es una lista provisional de las grupo empresas.</lbl2>
        <form name="f" action="../Controlador/ControladorGrupoEmpresa.php" method="post">
            <table align=center frame="void" border="0" class="encabezado" width="500" bgcolor=#C6E1E1>
                <br>
                    <caption> GRUPO - EMPRESAS </caption>
                   <thead>
                       <tbody align="center" style="font:  1.1em/1.1em 'FB Armada' arial">
                       <tr><th>Nombre de la Grupo Empresa</th></tr>
                       
                        <?php 
                        include '../Controlador/ControladorGrupoEmpresa.php'; 
                        $fila= mostrarEmpresa();
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
  </div>
  <div id="pie">
    <p>Sistema Apoyo T.I.S.  </p>
  </div>
</div>
</body>
</html>
