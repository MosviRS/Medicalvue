
<?php
include_once '../conn.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/SQL.php';

 $conn = new conn();
 $con=$conn->conectar();
 $objsql= new metodosSQL();

 session_start();

 $id=(empty($_POST["id"])) ? NULL : $_POST["id"];

 
 $que="SELECT fk_paciente,enfermedad,drogas,alergias,tipo_sangre,operaciones FROM historial WHERE fk_paciente=".$id.";";

 $array=$objsql->vizualizar($con,$que);
 
 echo json_encode($array);
 ?>