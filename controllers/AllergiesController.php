<?php

class AllergiesController{
    
    public function getAllallergies(){
        // echo "<pre>";
        // print_r($_POST);
        // die;
        $id = $_SESSION['id_patient'];
        
        // print_r($_SESSION['id_patient']);
        $diseases = Allergie::getAllallerg($id);
        return $diseases;
    }
    // public function addDisease(){
    //     if(isset($_POST['submit'])){
    //         $data = array(
    //             'date' => $_POST['date'],
    //             'disease' => $_POST['disease'],
    //             'status' => $_POST['status'],
    //             'id_patient' =>$_SESSION['id_patient'],
    //         );
    //         $result = Disease::add($data);
    //         if($result === 'ok'){
    //             Session::set('success','Disease added');
    //             Redirect::to('displayPatient');
    //         }else{
    //             echo $result;
    //         }
    //     }
    // }
}