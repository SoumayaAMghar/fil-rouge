<?php

class Patient{

    static public function getAllpa()
    {

        $stmt = DB::connect()->prepare('SELECT * FROM patients WHERE id=id;');
        $stmt->execute();
        $patient = $stmt->fetchAll();
        return $patient;
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO patients (firstname,lastname,birthday,cin,phone,blood_group) VALUES (:firstname,:lastname,:birthday,:cin,:phone,:blood_group)');
        $stmt->bindParam(':firstname',$data['firstname']);
        $stmt->bindParam(':lastname',$data['lastname']);
        $stmt->bindParam(':birthday',$data['birthday']);
        $stmt->bindParam(':cin',$data['cin']);
        $stmt->bindParam(':phone',$data['phone']);
        $stmt->bindParam(':blood_group',$data['blood_group']);

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }
    static public function update($data){
        // echo "<pre>";
        // print_r($data);
        // die;
        $stmt = DB::connect()->prepare('UPDATE patients SET firstname = :firstname , lastname = :lastname ,  birthday = :birthday , cin = :cin , phone = :phone , blood_group = :blood_group WHERE id =:id');
        $stmt->bindParam(':id',$data['id'] );
        $stmt->bindParam(':firstname',$data['firstname'] );
        $stmt->bindParam(':lastname',$data['lastname'] );
        $stmt->bindParam(':birthday',$data['birthday'] );
        $stmt->bindParam(':cin',$data['cin'] );
        $stmt->bindParam(':phone',$data['phone'] );
        $stmt->bindParam(':blood_group',$data['blood_group'] );
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;
    }

    static public function getPatient($data){
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM patients WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $patient = $stmt->fetch(PDO::FETCH_OBJ);
            return $patient;
        }catch(PDOException $ex){
            echo 'error'.$ex->getMessage();
        }
    }
    static public function delete($data){
        $id = $data['id'];
        try{
            $query = 'DELETE FROM patients WHERE id=:id';
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

?>