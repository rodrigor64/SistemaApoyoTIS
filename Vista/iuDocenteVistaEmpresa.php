<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONSULTOR</title>
<link href="css/consultor.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body id="body">
<div id="principal_consultor">
    <header id="cabecera_consultor"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_consultor">
       <?php
       $codGE=$_GET['c_a']; //codigo de la grupo empresa
       $codUGE=$_GET['i_u']; // codigo de usuario de la grupo empresa
       $a=$_GET['a'];// $a -> codigo del consultor
       $u=$_GET['u'];// $u -> codigo de usuario del consultor
            echo "<nav id='menu_consultor'>"
                    ."<a href='../Controlador/ControladorContrato.php?a=$a&u=$u&c_a=$codGE&i_u=$codUGE'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?a=$a&u=$u&c_a=$codGE&i_u=$codUGE'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"     
                    ."<a href='iu.estadoDeEvaluacionPlanDePagos.php?a=$a&u=$u&c_a=$codGE&i_u=$codUGE'><img width='100%' height='48' src='imagenes/btn_verEvaluacionPlanDePagos.jpg'/></a>"     
                    ."<a href='iuListaEmpresas.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"
                    . "<a href='../Vista/iuDocenteGECalendario.php?a=$a&u=$u&c_a=$codGE&i_u=$codUGE'><img src='imagenes/btn_calendario_docenteGE.jpg' width='100%' height='48' alt='btn_1' /></a>"
                    ."<a href='../Controlador/ControladorFinalizarSesion.php'><img src='imagenes/btn_cerrarSesion.png' width='100%' height='46' /></a>"
                ."</nav>";
        ?>  
    </article>
    <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>

