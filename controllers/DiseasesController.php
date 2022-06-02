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
    public function addDisease(){
        if(isset($_POST['submit'])){
            $data = array(
                'date' => $_POST['date'],
                'disease' => $_POST['disease'],
                'status' => $_POST['status'],
                'id_patient' =>$_SESSION['id_patient'],
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
}