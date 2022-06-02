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
        $stmt = DB::connect()->prepare('INSERT INTO allergy (date,disease,status,id_patient) VALUES (:date,:disease,:status,:id_patient);');
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':disease',$data['disease']);
        $stmt->bindParam(':status',$data['status']);
        $stmt->bindParam(':id_patient',$data['id_patient']);
        
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }
}