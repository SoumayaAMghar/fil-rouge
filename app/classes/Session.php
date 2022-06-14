<?php

class Session{
    static public function set($type,$message){
        setcookie($type,$message,time() + 5, "/");
    }
    static public function alert(){
        echo"<script>alert('Patente or password is not correct')</script>";
    }
}

?>