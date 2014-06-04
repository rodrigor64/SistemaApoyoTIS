<?php
require '../Controlador/Conexion.php';
    function retornarNombreDeLaGE($codGE,$codUGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $sql="SELECT nombrelargoge FROM grupo_empresa g WHERE g.codgrupo_empresa='$codGE' AND g.usuario_idusuario='$codUGE'";
        $result = pg_query($con,$sql);
        $row = pg_fetch_object($result);
        $nombre = $row->nombrelargoge;
        return $nombre;
    }
    function retornarEstadoTablaPlanGE(){
        $conec =  new Conexion();
        $con = $conec->getConection();
        $sql="SELECT * FROM hito_pagable";
        $result = pg_query($con,$sql);
        $estado = pg_num_rows($result);
        if($estado!=0){
            return "lleno";
        }  else {
            return "basio";
        }
    }
    function retornarPlanDePagosGE($codGE,$codUGE,$codC,$codUC){
            $conec=new Conexion(); 
            $con=$conec->getConection();  
            $sql = "SELECT codhito_pagable,hitoevento,porcentajepago,monto,fechapago FROM hito_pagable h WHERE h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$codGE'";
            $result = pg_query($con,$sql);
            while ($row = pg_fetch_object($result)){
                $c_hito = $row->codhito_pagable;
                $n_hito = $row->hitoevento;
                $p_pago = $row->porcentajepago;
                $monto = $row->monto;
                $f_pago = $row->fechapago;
                $p_s = retornarPorcentajeSatisfaccionPlanDePago($c_hito,$codGE);
                echo "<tr>"
                        . "<td><a href = '../Vista/iu.evaluacionHitoPagableGE.php?tablaEvaluacion&c_h=$c_hito&n_h=$n_hito&a=$codC&u=$codUC&c_a=$codGE&i_u=$codUGE&monto=$monto&p_s=$p_s'>$n_hito</a></td>" 
                        . "<td>$p_pago</td>" 
                        . "<td>$monto</td>" 
                        . "<td>$f_pago</td>" 
                . "</tr>";
                }
            exit();
            pg_close($con);
    }
    function retornarCodPlanDePago($c_hito,$codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        
        $sql="SELECT codplan_pago ";
        $sql.="FROM hito_pagable h, plan_pago p "; 
        $sql.="WHERE h.plan_pago_codplan_pago=p.codplan_pago and h.codhito_pagable='$c_hito' and h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$codGE'";
        $consulta=pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $cod = $row->codplan_pago;
        echo $cod;
        return $cod;
    }
        function retornarPorcentajeSatisfaccionPlanDePago($c_hito,$codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        
        $sql="SELECT porcentajesatisfaccion ";
        $sql.="FROM hito_pagable h, plan_pago p "; 
        $sql.="WHERE h.plan_pago_codplan_pago=p.codplan_pago and h.codhito_pagable='$c_hito' and h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$codGE'";
        $consulta=pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $p_s = $row->porcentajesatisfaccion;
        echo $p_s;
        return $p_s;
    }
?>
