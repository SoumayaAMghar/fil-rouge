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
            $stmt = DB::connect()->prepare('INSERT INTO attachement (date,type,titre,id_patient,attachement) VALUES (:date,:type,:titre,:id_patient,:attachement);');
            $stmt->bindParam(':date', $data['date']);
            $stmt->bindParam(':type', $data['type']);
            $stmt->bindParam(':titre', $data['titre']);
            $stmt->bindParam(':attachement', $file);
            $stmt->bindParam(':id_patient', $data['id_patient']);

            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $stmt = null;
        }
}
