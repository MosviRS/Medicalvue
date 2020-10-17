<?php


   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   $conn = new conn();
   $data = array("'entidadesmodificar/medicamentosUpdate.php'", "'#formmedicamentos-actualizar'");
   $emin = array("'entidadeseliminar/eliminarmedicam.php'","'entidades/mostardatosmedicam.php'","'#tabladatosmedicamentos'");
   $con=$conn->conectar();
   session_start();
   $name=(empty($_POST["name"])) ? NULL : $_POST["name"];
   if(is_null($name)){
       $que="SELECT id_medicamento,nombre,forma_fa,presentacion,concentracion FROM medicamentos where fk_medico=".$_SESSION['id'].";";
   }else{
    
       $que="SELECT id_medicamento,nombre,forma_fa,presentacion,concentracion FROM medicamentos where fk_medico=".$_SESSION['id']." and nombre LIKE  '".$name."%' or  forma_fa LIKE '".$name."%' or presentacion LIKE '".$name."%' ;";
   }
  
   $objsql= new metodosSQL();
   

   $table="";
   $array=$objsql->vizualizar($con,$que);

        foreach ($array as $value) {
            $table=$table . '
            <tr>
            <th>'.$value['id_medicamento'].'</th>
            <th>'.$value['nombre'].'</th>
            <th>'.$value['forma_fa'].'</th>
            <th>'.$value['presentacion'].'</th>
            <th>'.$value['concentracion'].'</th>
            <th class="text-center">
               
            <div class="btn-group">

                                            
            <a type="button" class="btn btn-info btn-sm badge-pill dropdown-toggle"
            data-toggle="dropdown" style="color:#FFFF; width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i><span class="caret"></span></a>
            <div class="dropdown-menu  bg-dark" >
            <a class="dropdown-item text-light" onclick="Eliminar('.$value['id_medicamento'].','.$emin[0].','.$emin[1].','.$emin[2].');"><i class="far fa-trash-alt fa-fw"></i>Eliminar</a>
            <a class="dropdown-item text-light" data-toggle="modal" data-target="#form-medicamentos-actualizar" onclick="modificar('.$value['id_medicamento'].','.$data[0].','.$data[1].');"><i class="far fa-edit fa-fw"></i></i>Modificar</a>
            </div>
           
            </div>
            
              
            </th>
        </tr>     ';
           
        }
     
        $con->close();
        echo '
        <h5 class="card-title">Datos de tabla Medicamentos</h5>
                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>F.Farmaceutica</th>
                                                        <th>Presentacion</th>
                                                        <th>Concentracion</th>
                                                        <th class="text-center">Accion</th>
                                                    </tr>    
                                                </thead>
                                                <tbody> '.$table.' 
           
        </tbody>

    </table> ';
 ?>
