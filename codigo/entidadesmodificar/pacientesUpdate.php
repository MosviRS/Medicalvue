<?php

 include_once '../conn.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/SQL.php';

 $conn = new conn();
 $con=$conn->conectar();
 $objsql= new metodosSQL();

 session_start();

 $id=(empty($_POST["id"])) ? NULL : $_POST["id"];

 $que="SELECT id_paciente,nombres,apellidos,telefono,fech_nac,email,sexo,edad,direccion
  FROM pacientes where id_paciente=".$id.";";

 $array=$objsql->vizualizar($con,$que);
 
 echo json_encode($array);

 

?>