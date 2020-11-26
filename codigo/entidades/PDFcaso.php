<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/PDFcaso.php';

class Pdfconsultas extends medicos{
    

    public function cargar(){
    session_start();
    $id=(empty($_POST["idpaciente"])) ? NULL : $_POST["idpaciente"];
    $fecha=(empty($_POST["fecha"])) ? NULL : $_POST["fecha"];
    $motivo=(empty($_POST["motivo"])) ? NULL : $_POST["motivo"];
    $diagnostico=(empty($_POST["Enfermedad"])) ? NULL : $_POST["Enfermedad"];
    

       require_once 'SQL.php';
       require_once '../conn.php';
       $conn = new conn();
       $con=$conn->conectar();
      // echo $_SESSION['name'];
       $this->setUser($_SESSION['name']);
      
       if($id &&  $fecha && $motivo && $diagnostico){
           $values=$id.",'$motivo','$fecha','$diagnostico'";
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
  $consulta= new Pdfconsultas();
  if(!empty($_POST["idpaciente"])){
    $consulta->cargar();
  }
?>