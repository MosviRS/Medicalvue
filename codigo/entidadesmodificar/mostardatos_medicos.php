<?php
        include_once '../conn.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/SQL.php';

        $conn = new conn();
        $con=$conn->conectar();
        $objsql= new metodosSQL();

        session_start();

        $id=(empty($_POST["id"])) ? NULL : $_POST["id"];

        $que="SELECT id,nombres,apellidos FROM users  WHERE id=".$id.";";
        $array1=$objsql->vizualizar($con,$que);
        $que="SELECT b.fecha_naci,b.especialidad,b.telefono FROM datos_medics b WHERE b.fk_medico=".$id.";";
        $array2=$objsql->vizualizar($con,$que);
        $que="SELECT email FROM users  WHERE id=".$id.";";
        $array3=$objsql->vizualizar($con,$que);
        $array4=array_merge($array1, $array2);
        $array5=array_merge($array4, $array3);
        
        echo json_encode($array5);
 ?>
