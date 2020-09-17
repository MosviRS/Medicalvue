<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/entidades/medicamentos.php';

class medicamentos extends medicos{
    

    public function cargar(){
    session_start();
    $nombre=(empty($_POST["nombre"])) ? NULL : $_POST["nombre"];
    $apellidos=(empty($_POST["formaf"])) ? NULL : $_POST["formaf"];
    $telefono=(empty($_POST["prest"])) ? NULL : $_POST["prest"];
    $correo=(empty($_POST["conc"])) ? NULL : $_POST["conc"];

       require_once 'SQL.php';
       require_once '../conn.php';
       $conn = new conn();
       $con=$conn->conectar();
      // echo $_SESSION['name'];
       $this->setUser($_SESSION['name']);
      
       if($nombre &&  $apellidos && $telefono && $correo){
           $values=$this->get_Id().",'$nombre','$apellidos','$telefono','$correo'";
           $objsql= new metodosSQL();
           $que="INSERT INTO medicamentos(fk_medico,nombre,forma_fa,presentacion,concentracion)  VALUES (".$values.");";
        
           $objsql->insertar($con,$que);
           if(isset($objsql)){
            echo "successGuard";
           }
         //  header('location:../tabla_medicamentos.php');
        }
    }
    public function actualizar(){

        $idmedica=(empty($_POST["idmedica"])) ? NULL : $_POST["idmedica"];
        $nombre=(empty($_POST["nombre"])) ? NULL : $_POST["nombre"];
        $forma=(empty($_POST["formaf"])) ? NULL : $_POST["formaf"];
        $present=(empty($_POST["prest"])) ? NULL : $_POST["prest"];
        $concentra=(empty($_POST["conc"])) ? NULL : $_POST["conc"];
        session_start();
    
       
           require_once 'SQL.php';
           require_once '../conn.php';
           $conn = new conn();
           $con=$conn->conectar();
           
           
          
           if(   $idmedica && $nombre && $forma && $present && $concentra ){
              
               $objsql= new metodosSQL();
               $que="UPDATE medicamentos SET nombre='".$nombre."',forma_fa='".$forma."',presentacion='".$present."',concentracion='".$concentra."' where id_medicamento=".$idmedica.";";
               
               $objsql->update($con,$que);
               if(isset($objsql)){
                  echo "successAct";
               }
               
               //header('location:../tabla_pacientes.php');
           }
        }
}
  $medicamento= new medicamentos();
  if(!empty($_POST["idmedica"])){
  $medicamento->actualizar();
  }else{
  $medicamento->cargar();
  }  
?>