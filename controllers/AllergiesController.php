<?php

class AllergiesController{
    
    public function getAllallergies(){
        // echo "<pre>";
        // print_r($_POST);
        // die;
        $id = $_SESSION['id_patient'];
        
        // print_r($_SESSION['id_patient']);
        $vaccines = Allergie::getAllallerg($id);
        return $vaccines;
    }
    public function addAllergy(){
        if(isset($_POST['submit'])){
            $data = array(
                'date' => $_POST['date'],
                'allergy' => $_POST['allergy'],
                'diagnostic' => $_POST['diagnostic'],
                'treatment' => $_POST['treatment'],
                'id_patient' =>$_SESSION['id_patient'],
            );
            $result = Allergie::add($data);
            if($result === 'ok'){
                // Session::set('success','allery added');
                Redirect::to('displayAllergies');
            }else{
                echo $result;
            }
        }
    }

    public function deleteAllergy()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $result = Allergie::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Patient Supprimé');
                Redirect::to('displayAllergies');
            } else {
                echo $result;
            }
        }
    }

    
}