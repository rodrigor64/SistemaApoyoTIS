<?php
require '../Controlador/Conexion.php';
    function retornarEstadoDeTablaPlan(){
        $conec=new Conexion(); 
        $con=$conec->getConection();
        $sql="SELECT * FROM hito_pagable";
        $result=  pg_query($con,$sql);
        $estado= pg_num_rows($result);
        if($estado!=0){
            return "lleno";
        }  else {
            return "basio";
        }
    }
    function mostrarPlanDePago($codGE,$codUsuarioGE){
        
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $codplan_papo = retornarCodPlanDePago($codGE,$codUsuarioGE);
        $sql = "SELECT hitoevento,porcentajepago,monto,fechapago FROM plan_pago p,hito_pagable h WHERE p.codplan_pago= h.plan_pago_codplan_pago and p.codplan_pago='$codplan_papo'";
        $result = pg_query($con,$sql);
        $array_planpagos = array();
        while ($row = pg_fetch_object($result)){
            $h = $row->hitoevento;
            $p = $row->porcentajepago;
            $m = $row->monto;
            $f = $row->fechapago;
            
            $array_planpagos[] = $h;
            $array_planpagos[] = $p;
            $array_planpagos[] = $m;
            $array_planpagos[] = $f;
            
            /*echo "<tr>"
                    . "<td>$h</td>" 
                    . "<td>$p</td>" 
                    . "<td>$m</td>" 
                    . "<td>$f</td>" 
               . "</tr>";
             * 
             */
            }
            return $array_planpagos;
        //exit();
        pg_close($con);
    }
    function retornarCodPlanDePago($codGE,$codUsuarioGE){
        $conec=new Conexion();
        $con=$conec->getConection();
        //$sql="SELECT codplan_pago FROM plan_pago p WHERE p.calendario_grupo_empresa_codgrupo_empresa='$codGE' AND p.calendario_grupo_empresa_usuario_idusuario='$codUsuarioGE'";
        $sql="SELECT max(codplan_pago) plan_pago FROM plan_pago p WHERE p.calendario_grupo_empresa_codgrupo_empresa='$codGE' and p.calendario_grupo_empresa_usuario_idusuario='$codUsuarioGE'";
        $consulta = pg_query($con,$sql);
        $row = pg_fetch_array($consulta);
        $cod = $row[0];
        return $cod;        
    }
?>
