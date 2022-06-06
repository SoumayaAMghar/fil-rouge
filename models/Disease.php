<?php

class Disease{

    static public function getAlldis($id_patient)
    {     
            $stmt = DB::connect()->prepare('SELECT * FROM diseases WHERE id_patient=:id_patient');
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
            return $stmt->fetchAll();
    }

    static public function searchDiseases($data){
        $search = $data['search'];
        try{
            $query = 'SELECT * FROM diseases WHERE disease  LIKE ? OR status LIKE ?';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
            $patients =$stmt->fetchAll();
            return $patients;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO diseases (date,disease,status,id_patient) VALUES (:date,:disease,:status,:id_patient);');
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
    static public function delete($data){
        $id = $data['id'];
        try{
            $query = 'DELETE FROM diseases WHERE id=:id';
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
        $stmt = DB::connect()->prepare('UPDATE diseases SET disease = :disease , date = :date , status = :status , id_patient = :id_patient WHERE id =:id');
        $stmt->bindParam(':id',$data['id'] );
        $stmt->bindParam(':disease',$data['disease'] );
        $stmt->bindParam(':date',$data['date'] );
        $stmt->bindParam(':status',$data['status'] );
        $stmt->bindParam(':id_patient',$data['id_patient'] );
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function getDisease($data){
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM diseases WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $patient = $stmt->fetch(PDO::FETCH_OBJ);
            return $patient;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
}