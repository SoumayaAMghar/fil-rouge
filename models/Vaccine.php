<?php

class Vaccine{

    static public function getAllvac($id_patient)
    {     
            $stmt = DB::connect()->prepare('SELECT * FROM vaccine WHERE id_patient=:id_patient');
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
            return $stmt->fetchAll();
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO vaccine (date,type,vaccine,id_patient) VALUES (:date,:type,:vaccine,:id_patient);');
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':type',$data['type']);
        $stmt->bindParam(':vaccine',$data['vaccine']);
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
            $query = 'DELETE FROM vaccine WHERE id=:id';
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