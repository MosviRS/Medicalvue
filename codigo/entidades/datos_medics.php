
<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/datos_medics.php';

class datosmedicos extends medicos{

public function cargar(){
$name=(empty($_POST["name"])) ? NULL : $_POST["name"];
$surname=(empty($_POST["surname"])) ? NULL : $_POST["surname"];
$email=(empty($_POST["email"])) ? NULL : $_POST["email"];
$naci=(empty($_POST["born"])) ? NULL : $_POST["born"];
$especialidad=(empty($_POST["especiality"])) ? NULL : $_POST["especiality"];
$telefono=(empty($_POST["Phone"])) ? NULL : $_POST["Phone"];
$tarifa=(empty($_POST["tarifa"])) ? NULL : $_POST["tarifa"];

session_start();
  require_once 'SQL.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/conn.php';
  $conn = new conn();
  $con=$conn->conectar();
  echo $_SESSION['name'];
  $this->setUser($_SESSION['name']);
 
  if($naci &&  $especialidad && $telefono && $name && $surname && $email){
      echo $this->get_Id();
      $values=$this->get_Id().",'$naci','$especialidad','$telefono','$tarifa'";
      $objsql= new metodosSQL();
     
      $que="SELECT b.fecha_naci,b.especialidad,b.telefono FROM datos_medics b WHERE b.fk_medico=".$this->get_Id().";";
      $array=$objsql->vizualizar($con,$que);
      if(empty($array)){
         $que="INSERT INTO datos_medics (fk_medico,fecha_naci,especialidad,telefono,tarifa_consulta)  VALUES (".$values.");";
         $objsql->insertar($con,$que);
         $que="UPDATE users set nombres=".$name.",apellidos=".$surname.",email=".$email." where id=".$this->get_Id().";";
         $objsql->update($con,$que);
      }else{
         $que="UPDATE users set nombres='".$name."',apellidos='".$surname."',email='".$email."' where id=".$this->get_Id().";";
         $objsql->update($con,$que);
         $que="UPDATE datos_medics set fecha_naci='".$naci."',especialidad='".$especialidad."',telefono='".$telefono."',tarifa_consulta=".$tarifa." where fk_medico=".$this->get_Id().";";
         $objsql->update($con,$que); 
      }
      
     header('location:../tabla_medicamentos.php');
   }
}
public function actualizar(){
   session_start();
   $naci=(empty($_POST["born"])) ? NULL : $_POST["born"];
   $especialidad=(empty($_POST["especiality"])) ? NULL : $_POST["especiality"];
   $telefono=(empty($_POST["Phone"])) ? NULL : $_POST["Phone"];

   $idpaciente=(empty($_POST["idpaci"])) ? NULL : $_POST["idpaci"];
   $nombre=(empty($_POST["nom"])) ? NULL : $_POST["nom"];
   $apellidos=(empty($_POST["ape"])) ? NULL : $_POST["ape"];
   $telefono=(empty($_POST["tel"])) ? NULL : $_POST["tel"];
   $correo=(empty($_POST["corr"])) ? NULL : $_POST["corr"];
   $dia=(empty($_POST["fech"])) ? NULL : $_POST["fech"];
   $edad=(empty($_POST["edad"])) ? NULL : $_POST["edad"];
   $direccion=(empty($_POST["direc"])) ? NULL : $_POST["direc"];
   $sexo=(empty($_POST["sexo"])) ? NULL : $_POST["sexo"];
  
      require_once 'SQL.php';
      require_once '../conn.php';
      $conn = new conn();
      $con=$conn->conectar();
    
      $this->setUser($_SESSION['name']);
     
      if($nombre &&  $apellidos && $telefono && $correo && $dia && $edad && $direccion && $sexo ){
          
          $idmedico=$this->get_Id().",'$nombre','$apellidos','$telefono','$direccion','$dia','$sexo','$correo',$edad";
          $objsql= new metodosSQL();
          $que="UPDATE pacientes set nombres='".$nombre."',apellidos='".$apellidos."',telefono='".$telefono."',
             direccion='".$direccion."',fech_nac='".$dia."',sexo='".$sexo."',email='".$correo."',edad=".$edad." WHERE id_paciente=".$idpaciente.";";
       
          $objsql->update($con,$que);
           if(isset($objsql)){
               echo "successAct";
           }
          //header('location:../tabla_pacientes.php');
       }
   }
}
$med= new datosmedicos();
$med->cargar();
?>