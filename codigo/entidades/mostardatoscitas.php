<?php

   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   $conn = new conn();
   $con=$conn->conectar();
   session_start();
   $name=(empty($_POST["name"])) ? NULL : $_POST["name"];
   
 
   if(is_null($name)){
        $que="SELECT citas.id_cita, pacientes.nombres,pacientes.apellidos, citas.observaciones, citas.fech_cita FROM 
        (datos_medics INNER JOIN pacientes ON datos_medics.fk_medico = pacientes.fk_medico) 
        INNER JOIN citas ON pacientes.id_paciente = citas.fk_paciente WHERE pacientes.fk_medico=".$_SESSION['id'].";";
   }else{
        $que="SELECT citas.id_cita, pacientes.nombres,pacientes.apellidos, citas.observaciones, citas.fech_cita FROM 
        (datos_medics INNER JOIN pacientes ON datos_medics.fk_medico = pacientes.fk_medico) 
        INNER JOIN citas ON pacientes.id_paciente = citas.fk_paciente WHERE pacientes.fk_medico=".$_SESSION['id']." and pacientes.nombres LIKE '".$name."%' or pacientes.apellidos LIKE '".$name."%';";
   }
   $objsql= new metodosSQL();
   
   $data = array("'entidadesmodificar/citasUpdate.php'","'#formcitas-actualziar'");
   $emin = array("'entidadeseliminar/eliminarcitas.php'","'entidades/mostardatoscitas.php'","'#tabladatoscitas'");

   $table="";
   $array=$objsql->vizualizar($con,$que);

        foreach ($array as $value) {
            $table=$table . '
                            <tr>
                            <th>'.$value['id_cita'].'</th>
                            <th>'.$value['nombres'].'</th>
                            <th>'.$value['apellidos'].'</th>
                            <th>'.$value['observaciones'].'</th>
                            <th>'.$value['fech_cita'].'</th>
                            
                            
                            <th class="text-center">
                            
                            <div class="btn-group">
          
                            <a type="button" class="btn btn-info btn-sm badge-pill dropdown-toggle"
                            data-toggle="dropdown" style="color:#FFFF; width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i><span class="caret"></span></a>
                            <div class="dropdown-menu  bg-dark" >
                            <a class="dropdown-item text-light" onclick="Eliminar('.$value['id_cita'].','.$emin[0].','.$emin[1].','.$emin[2].');"><i class="far fa-trash-alt fa-fw"></i>Eliminar</a>
                            <a class="dropdown-item text-light" data-toggle="modal" data-target="#form-citas-actualizar" onclick="
                            modificar('.$value['id_cita'].','.$data[0].','.$data[1].');"><i class="far fa-edit fa-fw"></i></i>Modificar</a>
                            </div>
                            </div>
                            
                            </th>
                        </tr> ';
           
        }
     
        $con->close();
        echo '
        <h5 class="card-title">Datos de tabla Citas</h5>
                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>observaciones</th>
                                                        <th>fceha de cita</th>
                                                
                                                        <th class="text-center">Accion</th>
                                                    </tr>    
                                                </thead>
            <tbody>'.$table.'
  
        </tbody>

    </table> ';
 ?>

