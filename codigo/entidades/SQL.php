<?php 
  
class metodosSQL {
    public function vizualizar($conexion,$sql){
               
               
               $result=mysqli_query($conexion,$sql);
               
               return mysqli_fetch_all($result,MYSQLI_ASSOC);
              

    }
public function insertar($conexion,$sql){
     
        

        return $result=mysqli_query($conexion,$sql);
     
}
public function update($conexion,$sql){
     
        

    return $result=mysqli_query($conexion,$sql);
    
 
}
public function eliminar($conexion,$sql){
     
        

    return $result=mysqli_query($conexion,$sql);
               
    

}
} 
?>