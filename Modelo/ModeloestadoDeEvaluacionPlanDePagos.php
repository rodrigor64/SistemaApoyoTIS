<?php
    require '../Controlador/Conexion.php';
    function retornarNombreDeLaGEE($codGE,$codUGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $sql="SELECT nombrelargoge FROM grupo_empresa g WHERE g.codgrupo_empresa='$codGE' AND g.usuario_idusuario='$codUGE'";
        $result = pg_query($con,$sql);
        $row = pg_fetch_object($result);
        $nombre = $row->nombrelargoge;
        return $nombre;
    }
    function retornarEstadoDeTablaPagoConsultor(){
        $conec=new Conexion(); 
        $con=$conec->getConection();
        $sql="SELECT * FROM pago_consultor";
        $result=  pg_query($con,$sql);
        $estado= pg_num_rows($result);
        if($estado!=0){
            return "lleno";
        }  else {
            return "basio";
        }
    }
    function retornarEstadoDeEvaluacionesPlanDePagos($codC,$codUC,$codGE,$codUGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $arreglo_entregas = array();
        $sql="SELECT hitooevento,porcentajesatisfaccion,porcentajealcazado,estadopago ";
        $sql.="FROM pago_consultor p ";
        $sql.="WHERE p.consultor_idconsultor='$codC' AND p.consultor_usuario_idusuario='$codUC' AND p.hito_pagable_plan_pago_calendario_grupo_empresa_usuario_idusuar='$codUGE' AND p.hito_pagable_plan_pago_calendario_grupo_empresa_codgrupo_empres='$codGE'";
        $result = pg_query($con,$sql);
        while ($row = pg_fetch_object($result)){
            $h_e = $row->hitooevento;
            $p_s = $row->porcentajesatisfaccion;
            $p_a = $row->porcentajealcazado;
            $s_p = $row->estadopago;
            $arreglo_entregas[] = $h_e;
            $arreglo_entregas[] = $p_s;
            $arreglo_entregas[] = $p_a;
            $arreglo_entregas[] = $s_p;
        }
        return $arreglo_entregas;
        pg_close($con);
    }
?>
