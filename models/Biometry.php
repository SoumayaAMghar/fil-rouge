<?php

class Biometry{

    static public function getAllbiom($id_patient)
    {     
            $stmt = DB::connect()->prepare('SELECT * FROM biometry WHERE id_patient=:id_patient');
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
            return $stmt->fetchAll();
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO biometry (date,doctor_name,age,weight,height,blood_group,id_patient,id_doctor) VALUES (:date,:doctor_name,:age,:weight,:height,:blood_group,:id_patient,:id_doctor);');
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':doctor_name',$data['doctor_name']);
        $stmt->bindParam(':age',$data['age']);
        $stmt->bindParam(':weight',$data['weight']);
        $stmt->bindParam(':height',$data['height']);
        $stmt->bindParam(':blood_group',$data['blood_group']);
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
            $query = 'DELETE FROM biometry WHERE id=:id';
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
        $stmt = DB::connect()->prepare('UPDATE biometry SET date = :date , age = :age , weight = :weight ,height = :height ,blood_group = :blood_group , id_patient = :id_patient WHERE id =:id');
        $stmt->bindParam(':id',$data['id'] );
        $stmt->bindParam(':date',$data['date'] );
        $stmt->bindParam(':age',$data['age'] );
        $stmt->bindParam(':weight',$data['weight'] );
        $stmt->bindParam(':height',$data['height'] );
        $stmt->bindParam(':blood_group',$data['blood_group'] );
        $stmt->bindParam(':id_patient',$data['id_patient'] );
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt = null;
    }

    static public function getbiometry($data){
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM biometry WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $biometry = $stmt->fetch(PDO::FETCH_OBJ);
            return $biometry;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
}