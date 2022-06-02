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
        $stmt = DB::connect()->prepare('INSERT INTO allergy (date,allergy,diagnostic,treatment,id_patient) VALUES (:date,:allergy,:diagnostic,:treatment,:id_patient);');
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':allergy',$data['allergy']);
        $stmt->bindParam(':diagnostic',$data['diagnostic']);
        $stmt->bindParam(':treatment',$data['treatment']);
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
}