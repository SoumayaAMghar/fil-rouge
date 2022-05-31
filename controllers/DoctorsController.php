<?php

class DoctorsController {
    public function auth(){
        if(isset($_POST['submit'])){

            $data['patente'] = $_POST['patente'];
            $result = Doctor::login($data);

            // echo '<pre>';
            // echo'helllllllllo';
            // print_r($result);
            // die;

            if($result->patente == $_POST['patente'] && password_verify($_POST['password'], $result->password) && $result->status == 'accepted' )
            {
                $_SESSION['login'] = true;
                $_SESSION['loginadmin'] = false;
                $_SESSION['patente'] = $result->patente;
                $_SESSION['status'] = $result->status;
                $_SESSION['id'] = $result->id;
               
                Redirect::to('homeuser');

            }else if($result->status == 'pending'){
                Redirect::to('pending');
                
            }else if($result->status == 'rejected'){
                Redirect::to('rejected');
                
            }else
            {
                Session::set('error','Patente or password is not correct');
                Redirect::to('login');
            }
        }
    }
    public function register(){
        if(isset($_POST['submit'])){
            $options = [
              'cost' => 12
            ];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'speciality' => $_POST['speciality'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => $password,
                'patente' => $_POST['patente'],
                // 'role' => 0
                // 'statut' => 'pending'
            );
            $result = Doctor::createDoctor($data);
            if($result === 'ok'){
                Session::set('success','account has been created successfully');
                Redirect::to('login');
            }else{
                echo $result;
            }
        }
    }
    static public function logout(){
        session_destroy();
    }
    public function getAlldoctors(){
        $doctors = Doctor::getAlldoc();
        return $doctors;
    }
    public function updateDoctor(){
        if(isset($_POST['submit'])){
           
            $data = array(
                'id' => $_POST['id'],
                'status'=>$_POST['status']
            );
            $result = Doctor::update($data);
            if($result === 'ok'){
                Session::set('success','doctor Modifié');
                Redirect::to('homeadmin');
            }else{
                echo $result;
            }
        }
    }
    
}