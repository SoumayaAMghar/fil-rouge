<?php

class Doctor{
    
    static public function login($data){
        try{
            // print_r($data);
            // die;
            $stmt = DB::connect()->prepare('SELECT * FROM doctors WHERE patente=:patente');
            $stmt->bindParam(':patente',$data['patente']);
            $stmt->execute();
            $doctor = $stmt->fetch(PDO::FETCH_OBJ);
            // echo 'hellooooo';
            // print_r($doctor);
            // die;
            return $doctor;
            
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
    static public function createDoctor($data){
        try{
        $stmt = DB::connect()->prepare('INSERT INTO doctors (firstname,lastname,speciality,phone,email,password,patente) VALUES (:firstname,:lastname,:speciality,:phone,:email,:password,:patente)');
        $stmt->bindParam(':firstname',$data['firstname']);
        $stmt->bindParam(':lastname',$data['lastname']);
        $stmt->bindParam(':speciality',$data['speciality']);
        $stmt->bindParam(':phone',$data['phone']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':password',$data['password']);
        $stmt->bindParam(':patente',$data['patente']);
        if($stmt->execute()){
            return 'ok';
        }
        }catch(PDOException $ex){
            return '<div style="background-color : #ff3851;"><h4 style="color:red;">Patente Does Not Exist Choose an other One </h4></div>';
        }

        $stmt = null;
    }
    static public function getAlldoc()
    {

        $stmt = DB::connect()->prepare('SELECT * FROM doctors WHERE status="pending";');
        $stmt->execute();
        $doctor = $stmt->fetchAll();
        return $doctor;
    }

    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE doctors SET status = :status WHERE id =:id');
        $stmt->bindParam(':id',$data['id'] );
        $stmt->bindParam(':status',$data['status'] );

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }
   
}

?>