<?php

class Disease{

    static public function getAlldis($id_patient)
    {     
            $stmt = DB::connect()->prepare('SELECT * FROM diseases WHERE id_patient=:id_patient');
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
            return $stmt->fetchAll();
    }


    // static public function getDisease($data){
    //     $id = $data['id'];
    //     try{
    //         $query = 'SELECT * FROM diseases WHERE id=:id';
    //         $stmt = DB::connect()->prepare($query);
    //         $stmt->execute(array(":id" => $id));
    //         $disease = $stmt->fetch(PDO::FETCH_OBJ);
    //         return $disease;
    //     }catch(PDOException $ex){
    //         echo 'error'.$ex->getMessage();
    //     }
    // }
}