<?php

class Attachement{

    static public function getAllatt($id_disease)
    {     

            $stmt = DB::connect()->prepare('SELECT * FROM attachement WHERE id_disease=:id_disease');
            $stmt->bindParam(':id_disease', $id_disease);
            $stmt->execute();
            return $stmt->fetchAll();
    }
}