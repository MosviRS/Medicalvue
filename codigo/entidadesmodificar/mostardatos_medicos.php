<?php
        include_once '../conn.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/SQL.php';

        $conn = new conn();
        $con=$conn->conectar();
        $objsql= new metodosSQL();

        session_start();

        $id=(empty($_POST["id"])) ? NULL : $_POST["id"];

        
        $que="SELECT b.fk_medico,a.nombres,a.apellidos,b.fecha_naci,b.especialidad,b.telefono,a.email FROM users a,datos_medics b WHERE a.id=b.fk_medico and b.fk_medico=".$id.";";

        $array=$objsql->vizualizar($con,$que);
        
        echo json_encode($array);
 ?>
