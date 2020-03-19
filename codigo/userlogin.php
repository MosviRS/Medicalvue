<?php


include 'DB.php';
class User extends DB{
    
    public $email;
    public $username;
    public $surname;
    

    public function userExists($emailss,$pass){
       
        include 'conn.php';
        // Connection variables
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // data sent from form login.html 
    
        
        // Query sent to database
        $result = mysqli_query($conn, "SELECT nombres, apellidos, email, passwrd FROM users WHERE email = '$emailss'");
        
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

    public function setUser($emails){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE email = :emails');
        $query->execute(['emails' => $emails]);

        foreach ($query as $currentUser) {
            $this->username = $currentUser['nombres'];
            $this->surname=$currentUser['apellidos'];
            $this->email = $currentUser['email'];
            echo $this->email;
            
        }
    }

    public function getNombre(){
        return $this->username;
    }
    public function getSurname(){
        return $this->$surname;
    }
    
    public function getEmail(){
        return $this->email;
    }
}

?>