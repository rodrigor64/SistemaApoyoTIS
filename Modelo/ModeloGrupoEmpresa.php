<?php

require_once '../Controlador/Conexion.php';

function mostrarListaEmpresas($a, $u) {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta = pg_query($c, 'select nombrelargoge, grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario 
                            from consultor_proyecto_grupo_empresa, grupo_empresa 
                            where consultor_idconsultor = '.$a);
    $array_GE = array();
    while ($f = pg_fetch_object($consulta)) {
        $cge = $f->grupo_empresa_codgrupo_empresa;
        $cuge = $f->grupo_empresa_usuario_idusuario;
        $nge = $f->nombrelargoge;

        $array_GE[] = "<a href = '../Vista/iuDocenteVistaEmpresa.php?a=$a&u=$u&c_a=$cge&i_u=$cuge'>$nge</a>";
        /* echo "<tr>"
          . "<td><a href = '../Vista/iuDocenteVistaEmpresa.php?a=$a&u=$u&c_a=$cge&i_u=$cuge'>$nge</a></td>"
          . "</tr>";
         */
    }
    return $array_GE;
    //exit();
    pg_close($c);
}

function mostrarDatosEmpresa($codEmpresa) {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta1 = pg_query($c, 'SELECT ge.nombrelargoge, ge.nombrecortoge, s.nombresocio, s.apellidossocio '
            . 'FROM grupo_empresa ge, socio s '
            . 'WHERE codgrupo_empresa=' . $codEmpresa . ' and tipo_socio_codtipo_socio = 1;');
    while ($f = pg_fetch_object($consulta1)) {
        $nlargo = $f->nombrelargoge;
        $ncorto = $f->nombrecortoge;
        $nomrepresentante = $f->nombresocio;
        $aperepresentante = $f->apellidossocio;
        echo "$nlargo<br>$ncorto<br>$nomrepresentante\n$aperepresentante";
    }
    exit();
    pg_close($c);
}

function mostrarEmpresas() {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta = pg_query($c, 'select codgrupo_empresa, nombrelargoge from grupo_empresa');
    while ($f = pg_fetch_object($consulta)) {
        $a = $f->codgrupo_empresa;
        $nge = $f->nombrelargoge;
        echo "<tr>"
        . "<td><a href = '../Vista/iuGrupoEmpresa.php?a=$a'>$nge</a></td>"
        . "</tr>";
    }
    exit();
    pg_close($c);
}


function devolver_usuario($cod_grupo_empresa) {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta = pg_query($c, "select usuario_idusuario from grupo_empresa where codgrupo_empresa = $cod_grupo_empresa;");
    while ($f = pg_fetch_object($consulta)) {
        $a = $f->usuario_idusuario;
    }
    return $a;
    pg_close($c);
}

function esta_registrado($cod_GE) {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta_cantidad_conseguida = pg_query($c, "select count(*) from consultor_proyecto_grupo_empresa where grupo_empresa_codgrupo_empresa = $cod_GE;");
    $f = pg_fetch_object($consulta_cantidad_conseguida);
    $cant = $f->count;
    if ($cant > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
    pg_close($c);
}

function conseguir_proyectos() {
    $con = new Conexion();
    $c = $con->getConection();

    $consulta_cantidad_conseguida = pg_query($c, "select count(*) from proyecto;");
    $f = pg_fetch_object($consulta_cantidad_conseguida);
    $cant = $f->count;

    if ($cant == 0) {
        echo '<option value="">No existen proyectos</option>';
    } else {
        $consulta_proyectos = pg_query($c, "select nombreproyecto, codproyecto from proyecto;");
        while ($f_proyectos = pg_fetch_object($consulta_proyectos)) {
            $nombre_proyecto = $f_proyectos->nombreproyecto;
            $cod_proyecto = $f_proyectos->codproyecto;
            echo "<option value='" . $cod_proyecto . "'>" . $nombre_proyecto . "</option>";
        }
    }
    pg_close($c);
}

function conseguir_docentes() {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta_cantidad_conseguida = pg_query($c, "select count(*) from consultor;");
    $f = pg_fetch_object($consulta_cantidad_conseguida);
    $cant = $f->count;

    if ($cant == 0) {
        echo '<option value="">No existen docentes disponibles</option>';
    } else {
        $consulta_docentes = pg_query($c, "select nombreconsultor,idconsultor from consultor as c, usuario as u where c.usuario_idusuario= u.idusuario and habilitada ='t';");
        while ($f_docentes = pg_fetch_object($consulta_docentes)) {
            $nombre_consultor = $f_docentes->nombreconsultor;
            $id_consultor = $f_docentes->idconsultor;
            echo "<option value='" . $id_consultor . "'>" . $nombre_consultor . "</option>";
        }
    }
    pg_close($c);
}

function inscribir_GE($cod_GE, $usr_GE, $cod_cons, $cod_proy) {
    $con = new Conexion();
    $c = $con->getConection();

    $consulta_usr_cons = pg_query($c, "select usuario_idusuario from consultor where idconsultor=$cod_cons;");
    $usr_conseguido = pg_fetch_object($consulta_usr_cons);
    $usr_consul = $usr_conseguido->usuario_idusuario;

    pg_query($c, "INSERT INTO consultor_proyecto_grupo_empresa(
            consultor_usuario_idusuario, consultor_idconsultor, grupo_empresa_usuario_idusuario, 
            grupo_empresa_codgrupo_empresa, proyecto_codproyecto)
    VALUES ($usr_consul, $cod_cons, $usr_GE, 
            $cod_GE, '$cod_proy');");
    echo "inscrito";
    pg_close($c);
}

function obtenerActividadesGE($usr_grupo_empresa) {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "select codcons_actividad, visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion from cons_actividad where visiblepara='$usr_grupo_empresa' or visiblepara='publica' and now()<=fechafin and now()>=fechainicio ORDER BY fechainicio desc";
    $rows = $conexion->ejecutarSql($sql);
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
        $codigo_actividad = $row['codcons_actividad'];
        $visible = $row['visiblepara'];
        $requiere = $row['requiererespuesta'];
        $fechaini = $row['fechainicio'];
        $fechafin = $row['fechafin'];
        $horaini = $row['horainicio'];
        $horafin = $row['horafin'];
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        
        echo "<lbl3>$titulo</lbl3><br />";
        echo "<lbl2>Fecha de inicio: $fechaini</lbl2><br />";
        echo "<lbl2>Fecha de fin: $fechafin</lbl2><br />";
        if ($requiere == "si_requiere") {
            
        echo "<a href '' onclick='openWin($codigo_actividad, $usr_grupo_empresa);'>Ver Mas |</a><a href=''> Responder</a><br />";
        }  else {
            
        echo "<a href='' onclick='openWin($codigo_actividad, $usr_grupo_empresa);'>Ver Mas </a><br />";
        }
        echo "<lbl2>________________________________________________________________________________________________________________</lbl2><br />";
    }
}