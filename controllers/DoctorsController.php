<?php

class DoctorsController
{
    public function getOneDoctor()
    {
        
            $data = array('id' =>$_SESSION['id']);
            $doctor = Doctor::getdoctor($data);
            return $doctor;
        
    }
    public function auth()
    {
        if (isset($_POST['submit'])) {

            $data['patente'] = $_POST['patente'];
            $result = Doctor::login($data);

            // echo '<pre>';
            // echo'helllllllllo';
            // print_r($result);
            // die;

            if ($result->patente == $_POST['patente'] && password_verify($_POST['password'], $result->password) && $result->status == 'accepted') {
                // echo '<pre>';
                // print_r($result);
                // die;
                $_SESSION['login'] = true;
                $_SESSION['loginadmin'] = false;
                $_SESSION['patente'] = $result->patente;
                $_SESSION['lastname'] = $result->lastname;
                $_SESSION['status'] = $result->status;
                $_SESSION['id'] = $result->id;

                Redirect::to('homeuser');
            } else if ($result->patente == $_POST['patente'] && password_verify($_POST['password'], $result->password) && $result->status == 'pending') {
                // echo '<pre>';
                // print_r($result);
                // die;
                $_SESSION['login'] = true;
                $_SESSION['loginadmin'] = false;
                $_SESSION['patente'] = $result->patente;
                $_SESSION['lastname'] = $result->lastname;
                $_SESSION['status'] = $result->status;
                $_SESSION['id'] = $result->id;
                Redirect::to('pending');
            } else if ($result->patente == $_POST['patente'] && password_verify($_POST['password'], $result->password) && $result->status == 'rejected') {
                $_SESSION['login'] = true;
                $_SESSION['loginadmin'] = false;
                $_SESSION['patente'] = $result->patente;
                $_SESSION['lastname'] = $result->lastname;
                $_SESSION['status'] = $result->status;
                $_SESSION['id'] = $result->id;

                Redirect::to('rejected');
            } else {
                Session::set('error', 'Patente or password is not correct');
                // echo"<script>alert('Patente or password is not correct')</script>";
                Redirect::to('login');
            }
        }
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
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
            if ($result === 'ok') {
                // Session::set('success', 'account has been created successfully');
                Redirect::to('login');
            } else {
                echo $result;
            }
        }
    }
    static public function logout()
    {
        session_destroy();
    }
    public function getAlldoctors()
    {
        $doctors = Doctor::getAlldoc();
        return $doctors;
    }
    public function getAllpending()
    {
        $doctors = Doctor::getAllpend();
        return $doctors;
    }
    public function updateDoctor($id, $status)
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        // if (isset($_POST['submit'])) {

            $data = array(
                'id' => $id,
                'status' => $status
            );
            $result = Doctor::update($data);
            if ($result === 'ok') {
                // Session::set('success', 'doctor Modifié');
                header('refresh:0', 'Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo $result;
            }
        // }
    }

    public function getNbrOfDoctors()
    {
        $Doctors = Doctor::nbrOfDoctors();
        return $Doctors;
    }
    public function getNbrOfPending()
    {
        $Doctors = Doctor::nbrOfPending();
        return $Doctors;
    }


    public function getNbrOfAccepted()
    {
        $Doctors = Doctor::nbrOfAccepted();
        return $Doctors;
    }
    public function findDoctors()
    {
        if (isset($_POST['search'])) {
            $data = array('search' => $_POST['search']);
        }
        $Doctors = Doctor::searchDoctors($data);
        return $Doctors;
    }
    public function deleteDoctor()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Doctor::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Doctor Supprimé');
                Redirect::to('homeadmin');
                // header('refresh:0', 'Location: ' . $_SERVER['HTTP_REFERER']);

            } else {
                echo $result;
            }
        }
    }
}
