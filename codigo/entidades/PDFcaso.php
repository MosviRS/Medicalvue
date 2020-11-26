<?php
include_once 'medico.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/PDFcaso.php';

class medicamentos extends medicos{
    

    public function cargar(){
    session_start();
    $id=(empty($_POST["idpaci"])) ? NULL : $_POST["idpaci"];
    $fecha=(empty($_POST["fecha_consulta"])) ? NULL : $_POST["fecha_consulta"];
    $motivo=(empty($_POST["motivo"])) ? NULL : $_POST["motivo"];
    $diagnostico=(empty($_POST["Enfermedad"])) ? NULL : $_POST["Enfermedad"];
    

       require_once 'SQL.php';
       require_once '../conn.php';
       $conn = new conn();
       $con=$conn->conectar();
      // echo $_SESSION['name'];
       $this->setUser($_SESSION['name']);
      
       if($id &&  $fecha && $motivo && $diagnostico){
           $values=$id.",'$fecha','$motivo','$diagnostico'";
           $objsql= new metodosSQL();
           $que="INSERT INTO consultas(fk_paciente,motivo,fecha_consulta,diagnostico)  VALUES (".$values.");";
        
           $objsql->insertar($con,$que);
           if(isset($objsql)){
            echo "successGuard";
           }
         //  header('location:../tabla_medicamentos.php');
        }
    }
   
}
  $medicamento= new medicamentos();
  if(!empty($_POST["idpaci"])){
    $medicamento->cargar();
  }
?>