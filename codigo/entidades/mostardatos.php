 <?php


   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   $conn = new conn();
   $con=$conn->conectar();
   session_start();
   $name=(empty($_POST["name"])) ? NULL : $_POST["name"];
   if(is_null($name)){
        $que="SELECT id_paciente,nombres,apellidos,telefono,direccion,sexo,email,edad FROM pacientes where fk_medico=".$_SESSION['id'].";";
   }else{
    
        $que="SELECT id_paciente,nombres,apellidos,telefono,direccion,sexo,email,edad FROM pacientes where fk_medico=".$_SESSION['id']." and nombres LIKE '".$name."%' or apellidos LIKE '".$name."%' or email LIKE '".$name."%' or telefono LIKE '".$name."%' ;";
   }
  
   $objsql= new metodosSQL();
   
   $data = array("'entidadesmodificar/pacientesUpdate.php'", "'#formapacientes-actu'");
   $emin = array("'entidadeseliminar/eliminarpaci.php'", "'entidades/mostardatos.php'","'#tabladatospaciente'");
   
   $table="";
   $array=$objsql->vizualizar($con,$que);
   
        foreach ($array as $value) {
            $table=$table . '
                                        <tr>
                                            <th style="display:none">'.$value['id_paciente'].'</th>
                                            <th>'.$value['nombres'].'</th>
                                            <th>'.$value['apellidos'].'</th>
                                            <th>'.$value['telefono'].'</th>
                                            <th>'.$value['direccion'].'</th>
                                            <th>'.$value['sexo'].'</th>
                                            <th><a href="" >'.$value['email'].'</a></th>
                                            <th>'.$value['edad'].'</th>

                                            <th class="text-center">
                                            <div class="btn-group">

                                            
                                            <a type="button" class="btn btn-info btn-sm badge-pill dropdown-toggle"
                                            data-toggle="dropdown" style="color:#FFFF; width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i><span class="caret"></span></a>
                                            <div class="dropdown-menu  bg-dark" >
                                            <a class="dropdown-item text-light" onclick="Eliminar('.$value['id_paciente'].','.$emin[0].','.$emin[1].','.$emin[2].');"><i class="far fa-trash-alt fa-fw"></i>Eliminar</a>
                                            <a class="dropdown-item text-light" data-toggle="modal" data-target="#form-pacientes-actualizar" onclick="modificar('.$value['id_paciente'].','.$data[0].','.$data[1].');"><i class="far fa-edit fa-fw"></i></i>Modificar</a>
                                            <a class="dropdown-item text-light"  href="historialclinico.php?id='.$value['id_paciente'].'"><i class="fas fa-file-medical-alt fa-fw"></i>Historial clinico</a>
                                            </div>
                                           
                                            </div>
                                          
                                                
                                            </th>
                                        </tr>';
           
        }
     
        $con->close();
        echo '
        <h5 class="card-title">Datos de Pacientes</h5>
            <table class="table table-hover table-bordered" style="text-size:12px;">
            <thead>
                <tr>
                    <th style="display:none">Codigo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Edad</th>
                        
                    <th class="text-center">Accion</th>
                </tr>    
            </thead>
            <tbody>'.$table.'

         
           
        </tbody>

    </table> ';
 ?>



