<?php


include 'DB.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/SQL.php';

class User extends DB{
    public $conn;
   

    public function userExists($emailss,$pass){
        include_once 'conn.php';
        // Connection variables
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // data sent from form login.html 
    
        
        // Query sent to database
        $result = mysqli_query($this->conn, "SELECT nombres, apellidos, email, passwrd FROM users WHERE email = '$emailss'");
        
        // Variable $row hold the result of the query
        $row = mysqli_fetch_assoc($result);
        
        // Variable $hash hold the password hash on database
        $hash = $row['passwrd'];
        
        /* 
        password_Verify() function verify if the password entered by the user
        match the password hash on the database. If everything is OK the session
        is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
        */
        
        if (password_verify($pass, $hash)) {	
            
            return true;
           
        
        } else {
            return false;
            		
        }
    
    }
    public function existDataDoctor($id){
   
        // Connection variables
        $conn = new conn();
        $con=$conn->conectar();
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Query sent to database
        $result = mysqli_query($con, "SELECT fk_medico,fecha_naci,especialidad,telefono FROM datos_medics WHERE fk_medico = '$id'");
        
        // Variable $row hold the result of the query
        $row = mysqli_fetch_assoc($result);
        if(isset($row)){
            return true;
        }else{
            return false;
        }
     
    }

}

?>