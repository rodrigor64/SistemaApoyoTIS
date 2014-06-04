<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>NOTICIAS</title>
        <link href="css/noticias.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico"/>
    </head>
</html>

<?php
require '../Controlador/ControladorPopUp.php';
$cod = $_GET['cod'];
mostrar_publicas($cod);