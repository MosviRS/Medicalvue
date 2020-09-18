
<?php
include_once '../conn.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/SQL.php';

 $conn = new conn();
 $con=$conn->conectar();
 $objsql= new metodosSQL();

 session_start();

 $id=(empty($_POST["id"])) ? NULL : $_POST["id"];

 
 $que="SELECT citas.id_cita, citas.fk_paciente, pacientes.nombres,citas.fech_cita, citas.observaciones FROM 
 (datos_medics INNER JOIN pacientes ON datos_medics.fk_medico = pacientes.fk_medico) 
 INNER JOIN citas ON pacientes.id_paciente = citas.fk_paciente WHERE citas.id_cita=".$id.";";

 $array=$objsql->vizualizar($con,$que);
 
 echo json_encode($array);
 ?>