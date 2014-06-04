<?php
require('../Controlador/Conexion.php');
    function insertarPropuestaDePago($monto_total, $porcentaje_satisfaccion, $cod_grupoE, $cod_usuarioGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        $cod_calendario=retornarCodCalendario($cod_grupoE,$cod_usuarioGE);
        $sql = "INSERT INTO plan_pago (calendario_codcalendario,calendario_grupo_empresa_codgrupo_empresa,calendario_grupo_empresa_usuario_idusuario,montototal,porcentajesatisfaccion)";
        $sql.= "VALUES ('$cod_calendario','$cod_grupoE','$cod_usuarioGE','$monto_total','$porcentaje_satisfaccion')";
        pg_query($con,$sql) or die ("ERROR :( " .pg_last_error());
    }

    function insertarRegistroDePlanDePago($monto_total, $porcentaje_satisfaccion, $hito_evento, $porcentaje_pago, $fecha_pago, $codigoPlan, $cod_grupoE, $cod_usuarioGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();
        $cod_calendario=  retornarCodCalendario($cod_grupoE, $cod_usuarioGE);
        $monto=establecerMonto($monto_total,$porcentaje_satisfaccion,$porcentaje_pago);
        if($monto!=0){
        $sql = "INSERT INTO hito_pagable (plan_pago_codplan_pago,plan_pago_calendario_codcalendario,plan_pago_calendario_grupo_empresa_codgrupo_empresa,plan_pago_calendario_grupo_empresa_usuario_idusuario,hitoevento,porcentajepago,monto,fechapago)";
        $sql.= "VALUES ('$codigoPlan','$cod_calendario','$cod_grupoE','$cod_usuarioGE','$hito_evento','$porcentaje_pago','$monto','$fecha_pago')";
        pg_query($con,$sql) or die ("ERROR :( " .pg_last_error());
        }
    }
    function establecerMonto($monto_total,$porcentaje_satisfaccion,$porcentaje_pago){
        $monT = $monto_total;
        $porS = $porcentaje_satisfaccion;
        $porP = $porcentaje_pago;
        $monto = 0;
        if ($monT!=0) {
            $monto = (($monT*$porP)/$porS);  
        }   
        return $monto;
    }
   
        //esta funcion recupera del BD el codigo dela tabla plan_pago
    function retornarCodCalendario($cod_grupoE,$cod_usuarioGE){
        $conec=new Conexion();
        $con=$conec->getConection();
        $sql="SELECT codcalendario FROM calendario c WHERE c.grupo_empresa_codgrupo_empresa='$cod_grupoE' AND c.grupo_empresa_usuario_idusuario='$cod_usuarioGE'";
        $consulta = pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $cod = $row->codcalendario;
        return $cod;        
    }

    function retornarCodPlanDePago($monto_total,$porcentaje_satisfaccion){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        $mt=$monto_total;
        $pt=$porcentaje_satisfaccion;
        //$sql="SELECT codplan_pago FROM plan_pago p WHERE p.montototal='$mt' and p.porcentajesatisfaccion='$pt'";
        $sql="SELECT max(codplan_pago) plan_pago FROM plan_pago p WHERE p.montototal='$mt' and p.porcentajesatisfaccion='$pt'";
        //$sql="SELECT max(codplan_pago) FROM plan_pago p WHERE p.montototal='$mt' AND p.porcentajesatisfaccion='pt'";
        $consulta=pg_query($con,$sql);
        $row = pg_fetch_array($consulta);
        $cod = $row[0];
        echo $cod;
        return $cod;
    }
    function retornarCodHitoEvento($hito_evento,$porcentaje_pago,$fecha_pago){
        $conec=new Conexion();
        $con=$conec->getConection();
        $h_e = $hito_evento;
        $p_p = $porcentaje_pago;
        $f_p = $fecha_pago;
        
        $sql="SELECT codhito_pagable FROM hito_pagable h WHERE h.hitoevento='$h_e' and h.porcentajepago='$p_p' and h.fechapago='$f_p'";
        $consulta = pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $cod = $row->codhito_pagable;
        return $cod;
    }
?>