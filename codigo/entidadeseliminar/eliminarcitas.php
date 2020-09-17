<?php

 include_once '../conn.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/entidades/SQL.php';

 $conn = new conn();
 $con=$conn->conectar();
 $objsql= new metodosSQL();

 session_start();

 $id=(empty($_POST["id"])) ? NULL : $_POST["id"];

 $que="DELETE FROM citas where id_cita=".$id.";";

 $array=$objsql->eliminar($con,$que);

  if($array==1){
    echo 'successElim';
  }
       


?>