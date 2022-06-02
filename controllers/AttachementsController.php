<?php

class AttachementsController {
    
    public function getAllattachements(){
      
        $diseases = Attachement::getAllatt();
        return $diseases;
    }
    
    public function addAttachement(){
        if(isset($_POST['submit'])){
            $data = array(
                'date' => $_POST['date'],
                'type' => $_POST['type'],
                'titre' => $_POST['titre'],
                'attachement' => $_FILES['attachement']['name'],
                'id_patient' =>$_SESSION['id_patient'],
            );
            // print_r($_FILES);
            $result = Attachement::add($data);
            if($result === 'ok'){
                Session::set('success','attachement added');
                Redirect::to('displayPatient');
            }else{
                echo $result;
            }
        }
    }
}