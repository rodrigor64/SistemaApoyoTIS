<?php
require '../Controlador/Conexion.php';
function mostrarEntregables($codplan_papo,$cod_hito,$cod_ge,$cod_usuarioGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $c_p=$codplan_papo;
        $c_h=$cod_hito;
        $c_ge=$cod_ge;
        $c_uge=$cod_usuarioGE;
            // Ejecutar la consulta SQL
        $sql ="SELECT entregable "; 
        $sql.="FROM entregables e ";
        $sql.="WHERE e.hito_pagable_plan_pago_calendario_grupo_empresa_usuario_idusuar='$c_uge' AND e.hito_pagable_plan_pago_calendario_grupo_empresa_codgrupo_empres='$c_ge' AND e.hito_pagable_plan_pago_codplan_pago='$c_p' AND e.hito_pagable_codhito_pagable='$c_h'";
        $result = pg_query($con,$sql);
        $array_entregables = array();
        while ($row = pg_fetch_object($result)){
            $e = $row->entregable;
            $array_entregables[] = "- ".$e; 
        }
        return $array_entregables;
        pg_close($con);
}
?>
