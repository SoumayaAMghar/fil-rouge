<?php

class Attachement
{

    static public function getAllatt()
    {

        $id = $_SESSION['id_patient'];
        $stmt = DB::connect()->prepare('
            SELECT attachement.*, patients.id as id_patient 
            FROM attachement 
            JOIN patients On patients.id= attachement.id_patient
            WHERE patients.id=:id;');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function add($data)
    {
            $file = $_FILES['attachement']['name'];
            
            if (move_uploaded_file($_FILES['attachement']['tmp_name'], 'views/includes/images/'.$file))
            {

            $stmt = DB::connect()->prepare('INSERT INTO attachement (date,doctor_name,type,titre,id_patient,attachement,id_doctor) VALUES (:date,:doctor_name,:type,:titre,:id_patient,:attachement,:id_doctor);');
            $stmt->bindParam(':date', $data['date']);
            $stmt->bindParam(':doctor_name', $data['doctor_name']);
            $stmt->bindParam(':type', $data['type']);
            $stmt->bindParam(':titre', $data['titre']);
            $stmt->bindParam(':attachement', $file);
            $stmt->bindParam(':id_patient', $data['id_patient']);
            $stmt->bindParam(':id_doctor',$data['id_doctor']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $stmt = null;
            }
        }

        static public function delete($data){
            $id = $data['id'];
            try{
                $query = 'DELETE FROM attachement WHERE id=:id';
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
            
            $file = $_FILES['attachement']['name'];
            if (move_uploaded_file($_FILES['attachement']['tmp_name'], 'views/includes/images/'.$file))
            {
            $stmt = DB::connect()->prepare('UPDATE attachement SET date = :date , type = :type , titre = :titre , attachement = :attachement , id_patient = :id_patient WHERE id =:id');
            $stmt->bindParam(':id',$data['id'] );
            $stmt->bindParam(':date',$data['date'] );
            $stmt->bindParam(':type',$data['type'] );
            $stmt->bindParam(':titre',$data['titre'] );
            $stmt->bindParam(':attachement',$file);
            $stmt->bindParam(':id_patient',$data['id_patient'] );
                if($stmt->execute()){
                    return 'ok';
                }else{
                    return 'error';
                }
                $stmt = null;
            }
        }
    
        static public function getAttachement($data){
            $id = $data['id'];
            try{
                $query = 'SELECT * FROM attachement WHERE id=:id';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":id" => $id));
                $attachement = $stmt->fetch(PDO::FETCH_OBJ);
                return $attachement;
            }catch(PDOException $ex){
                echo 'error'.$ex->getMessage();
            }
        }
}
