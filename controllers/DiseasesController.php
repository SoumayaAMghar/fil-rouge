<?php

class DiseasesController {
    

    public function getAlldiseases(){
        // echo "<pre>";
        // print_r($_POST);
        // die;
        $id =$_SESSION['id_patient'];
        // print_r($_SESSION['id_patient']);
        $diseases = Disease::getAlldis($id);
        return $diseases;
    }

    public function findDiseases()
    {
        if (!empty($_POST['search'])) {
            $data = array('search' => $_POST['search']);
            $Diseases = Disease::searchDiseases($data);
            return $Diseases;
        }
        else{
            return $this->getAlldiseases();
        }
     
    }
    public function addDisease(){
        if(isset($_POST['submit'])){
            $data = array(
                'date' => $_POST['date'],
                'doctor_name' =>$_SESSION['lastname'],
                'disease' => $_POST['disease'],
                'status' => $_POST['status'],
                'id_patient' =>$_SESSION['id_patient'],
                'id_doctor' =>$_SESSION['id'],
            );
            $result = Disease::add($data);
            if($result === 'ok'){
                // Session::set('success','Disease added');
                Redirect::to('displayDisease');
            }else{
                echo $result;
            }
        }
    }
    public function deleteDisease()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $result = Disease::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Patient Supprimé');
                Redirect::to('displayDisease');
            } else {
                echo $result;
            }
        }
    }
    public function getOneDisease()
    {
        if (isset($_POST['id'])) {
            $data = array('id' => $_POST['id']);
            $Disease = Disease::getDisease($data);
            return $Disease;
        }
    }

    public function updateDisease()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (isset($_POST['submit'])) {

            $data = array(
                'id' => $_POST['id'],
                'date' => $_POST['date'],
                'disease' => $_POST['disease'],
                'status' => $_POST['status'],
                'id_patient' => $_SESSION['id_patient'],
            );
            $result = Disease::update($data);
            if ($result === 'ok') {
                // Session::set('success', 'disaese Modifié');
                Redirect::to('displayDisease');
            } else {
                echo $result;
            }
        }
    }
}