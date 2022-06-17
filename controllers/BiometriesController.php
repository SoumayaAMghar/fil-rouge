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

            $year=explode('-',$_POST['date']);
            $birthday=explode('-',$_SESSION['birthday']);
            $y=$year[0]-$birthday[0];
            $m=$year[1]-$birthday[1];
            $age=($y.' year(s) '.$m.' month(s)');
            // print_r($age);
            // die;

            $data = array(
                'date' => $_POST['date'],
                'doctor_name' =>$_SESSION['lastname'],
                'age' => $age,
                'weight' => $_POST['weight'],
                'height' => $_POST['height'],
                // 'blood_group' => $_POST['blood_group'],
                'id_patient' =>$_SESSION['id_patient'],
                'id_doctor' =>$_SESSION['id'],
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
    public function getOnebiometry()
    {
        if (isset($_POST['id'])) {
            $data = array('id' => $_POST['id']);
            $biometry = Biometry::getbiometry($data);
            return $biometry;
        }
    }

    public function updatebiometry()
    {
        $year=explode('-',$_POST['date']);
        $birthday=explode('-',$_SESSION['birthday']);
        

        $y=$year[0]-$birthday[0];
        $m=$year[1]-$birthday[1];
        $age=($y.' year(s) '.$m.' month(s)');

            $data = array(
                'id' => $_POST['id'],
                'date' => $_POST['date'],
                'age' => $age,
                'weight' => $_POST['weight'],
                'height' => $_POST['height'],
                'blood_group' => $_POST['blood_group'],
                'id_patient' => $_SESSION['id_patient'],
            );
            $result = Biometry::update($data);
            if ($result === 'ok') {
                // Session::set('success', 'disaese Modifié');
                Redirect::to('displayBiometry');
            } else {
                echo $result;
            }
        
    }
}