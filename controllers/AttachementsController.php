<?php

class AttachementsController {
    
    public function getAllattachements(){
        $id = $_POST['id'];
        $diseases = Attachement::getAllatt($id);
        return $diseases;
    }
}