<?php


   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   $conn = new conn();
   $con=$conn->conectar();
   session_start();
   
   $que="SELECT citas.id_cita, pacientes.nombres,pacientes.apellidos, citas.observaciones, citas.fech_cita FROM 
   (datos_medics INNER JOIN pacientes ON datos_medics.fk_medico = pacientes.fk_medico) 
   INNER JOIN citas ON pacientes.id_paciente = citas.fk_paciente WHERE pacientes.fk_medico=".$_SESSION['id'].";";
   $objsql= new metodosSQL();
   

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
                            
                                <a href="" class="btn btn-info btn-sm badge-pill" style="width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i></a>
                            
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

