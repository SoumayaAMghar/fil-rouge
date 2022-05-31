<?php

class DiseasesController {
    
    public function getAlldiseases(){
        $id = $_POST['id'];
        $diseases = Disease::getAlldis($id);
        return $diseases;
    }

    // public function getOneDisease(){
    //     if(isset($_POST['id'])){
    //         $data = array('id' => $_POST['id']);
    //         $patient = Patient::getDisease($data);
    //         return $patient;
    //     }
    // }
    
    // public function addPatient(){
    //     if(isset($_POST['submit'])){
    //         $data = array(
    //             'firstname' => $_POST['firstname'],
    //             'lastname' => $_POST['lastname'],
    //             'birthday' => $_POST['birthday'],
    //             'cin' => $_POST['cin'],
    //             'phone' => $_POST['phone'],
    //             'blood_group' => $_POST['blood_group'],
    //         );
    //         $result = Patient::add($data);
    //         if($result === 'ok'){
    //             Session::set('success','Patient Ajouté');
    //             Redirect::to('homeuser');
    //         }else{
    //             echo $result;
    //         }
    //     }
    // }
}