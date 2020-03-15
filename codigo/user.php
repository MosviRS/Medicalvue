<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['name'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['name'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}


?>