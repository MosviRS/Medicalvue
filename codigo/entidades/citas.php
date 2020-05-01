<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/entidades/citas.php';

class citas extends medicos{
    

    public function cargar(){

    $idpaciente=(empty($_POST["idpaciente"])) ? NULL : $_POST["idpaciente"];
    $nombre=(empty($_POST["nombre"])) ? NULL : $_POST["nombre"];
    $fecha=(empty($_POST["fecha"])) ? NULL : $_POST["fecha"];
    $observaciones=(empty($_POST["observaciones"])) ? NULL : $_POST["observaciones"];
   
       require_once 'SQL.php';
       require_once '../conn.php';
       $conn = new conn();
       $con=$conn->conectar();
     
      
      
       if($idpaciente && $nombre && $fecha && $observaciones){
           
           $values=$idpaciente.",'$observaciones','$fecha'";
           $objsql= new metodosSQL();
           $que="INSERT INTO citas(fk_paciente,observaciones,fech_cita) VALUES (".$values.");";
        
           $objsql->insertar($con,$que);
         echo "exito";
           //header('location:../tabla_pacientes.php');
        }
    }
}

  
    $cita= new citas();
  
    $cita->cargar();