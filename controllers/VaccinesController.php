<?php

class VaccinesController{
    
    public function getAllvaccines(){
        // echo "<pre>";
        // print_r($_POST);
        // die;
        $id = $_SESSION['id_patient'];
        
        // print_r($_SESSION['id_patient']);
        $vaccines = Vaccine::getAllvac($id);
        return $vaccines;
    }
    public function add(){
        if(isset($_POST['submit'])){
            $data = array(
                'date' => $_POST['date'],
                'type' => $_POST['type'],
                'vaccine' => $_POST['vaccine'],
                'id_patient' =>$_SESSION['id_patient'],
            );
            $result = Vaccine::add($data);
            if($result === 'ok'){
                // Session::set('success','Vaccine added');
                Redirect::to('displayVaccine');
            }else{
                echo $result;
            }
        }
    }
    public function deleteVaccine()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $result = Vaccine::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Patient Supprimé');
                Redirect::to('displayVaccine');
            } else {
                echo $result;
            }
        }
    }
    public function getOneVaccine()
    {
        if (isset($_POST['id'])) {
            $data = array('id' => $_POST['id']);
            $Vaccine = Vaccine::getVaccine($data);
            return $Vaccine;
        }
    }

    public function updateVaccine()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (isset($_POST['submit'])) {

            $data = array(
                'id' => $_POST['id'],
                'date' => $_POST['date'],
                'type' => $_POST['type'],
                'vaccine' => $_POST['vaccine'],
                'id_patient' => $_SESSION['id_patient'],
            );
            $result = Vaccine::update($data);
            if ($result === 'ok') {
                // Session::set('success', 'disaese Modifié');
                Redirect::to('displayVaccine');
            } else {
                echo $result;
            }
        }
    }
}