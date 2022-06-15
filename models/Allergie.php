<?php

class Allergie{

    static public function getAllallerg($id_patient)
    {     
            $stmt = DB::connect()->prepare('SELECT * FROM allergy WHERE id_patient=:id_patient');
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
            return $stmt->fetchAll();
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO allergy (date,doctor_name,allergy,diagnostic_method,treatment,id_patient,id_doctor) VALUES (:date,:doctor_name,:allergy,:diagnostic,:treatment,:id_patient,:id_doctor);');
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':doctor_name',$data['doctor_name']);
        $stmt->bindParam(':allergy',$data['allergy']);
        $stmt->bindParam(':diagnostic',$data['diagnostic_method']);
        $stmt->bindParam(':treatment',$data['treatment']);
        $stmt->bindParam(':id_patient',$data['id_patient']);
        $stmt->bindParam(':id_doctor',$data['id_doctor']);
        
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function delete($data){
        $id = $data['id'];
        try{
            $query = 'DELETE FROM allergy WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if($stmt->execute()){
                return 'ok';
            }
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
    static public function update($data){
        // echo "<pre>";
        // print_r($data);
        // die;
        $stmt = DB::connect()->prepare('UPDATE allergy SET allergy = :allergy , date = :date , treatment = :treatment , diagnostic_method = :diagnostic , id_patient = :id_patient WHERE id =:id');
        $stmt->bindParam(':id',$data['id'] );
        $stmt->bindParam(':allergy',$data['allergy'] );
        $stmt->bindParam(':date',$data['date'] );
        $stmt->bindParam(':diagnostic',$data['diagnostic_method'] );
        $stmt->bindParam(':treatment',$data['treatment'] );
        $stmt->bindParam(':id_patient',$data['id_patient'] );
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function getAllergy($data){
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM allergy WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $patient = $stmt->fetch(PDO::FETCH_OBJ);
            return $patient;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
}