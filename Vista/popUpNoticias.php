<!DOCTYPE HTML>
<html>

<head>
  <title>Detalle Actividades</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link href="css/detalle_actividad.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body>
  <div id="main">
    <div id="site_content">
        <?php
            require '../Controlador/ControladorPopUp.php';
            $cod = $_GET['cod'];
            mostrar_publicas($cod);
        ?>    
   </div>  
  </div>
</body>
</html>

