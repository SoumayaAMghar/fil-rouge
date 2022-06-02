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
        $stmt = DB::connect()->prepare('INSERT INTO biometry (age,weight,height,blood_group,id_patient) VALUES (:age,:weight,:height,:blood_group,:id_patient);');
        $stmt->bindParam(':age',$data['age']);
        $stmt->bindParam(':weight',$data['weight']);
        $stmt->bindParam(':height',$data['height']);
        $stmt->bindParam(':blood_group',$data['blood_group']);
        $stmt->bindParam(':id_patient',$data['id_patient']);
        
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
}