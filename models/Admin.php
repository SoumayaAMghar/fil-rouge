<?php

class Admin{
    
    static public function login($data){
        try{
            // print_r($data);
            // die;
            $stmt = DB::connect()->prepare('SELECT * FROM admin WHERE email=:email');
            $stmt->bindParam(':email',$data['email']);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_OBJ);
            return $admin;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
}