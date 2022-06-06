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
                // Session::set('success','attachement added');
                Redirect::to('displayAttachement');
            }else{
                echo $result;
            }
        }
    }
    public function deleteAttachement()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $result = Attachement::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Patient Supprimé');
                Redirect::to('displayAttachement');
            } else {
                echo $result;
            }
        }
    }
    public function getOneAttachement()
    {
        if (isset($_POST['id'])) {
            $data = array('id' => $_POST['id']);
            $Attachement = Attachement::getAttachement($data);
            return $Attachement;
        }
    }

    public function updateAttachement()
    {
        // echo "<pre>";
        // print_r($_FILES['attachement']['name']);
        // die;
            $data = array(
                'id' => $_POST['id'],
                'date' => $_POST['date'],
                'type' => $_POST['type'],
                'titre' => $_POST['titre'],
                'attachement' => $_FILES['attachement']['name'],
                'id_patient' => $_SESSION['id_patient'],
            );
            $result = Attachement::update($data);
            if ($result === 'ok') {
                // Session::set('success', 'disaese Modifié');
                Redirect::to('displayAttachement');
            } else {
                echo $result;
            }
        
    }
}