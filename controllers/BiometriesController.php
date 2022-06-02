<?php

class BiometriesController{
    
    public function getAllbiometries(){
        // echo "<pre>";
        // print_r($_POST);
        // die;
        $id = $_SESSION['id_patient'];
        
        // print_r($_SESSION['id_patient']);
        $biometries = Biometry::getAllbiom($id);
        return $biometries;
    }
    public function add(){
        if(isset($_POST['submit'])){
            $data = array(
                'age' => $_POST['age'],
                'weight' => $_POST['weight'],
                'height' => $_POST['height'],
                'blood_group' => $_POST['blood_group'],
                'id_patient' =>$_SESSION['id_patient'],
            );
            $result = Biometry::add($data);
            if($result === 'ok'){
                // Session::set('success','Biometry added');
                Redirect::to('displayBiometry');
            }else{
                echo $result;
            }
        }
    }
    public function deleteBiometry()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $result = Biometry::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Patient Supprimé');
                Redirect::to('displayBiometry');
            } else {
                echo $result;
            }
        }
    }
}