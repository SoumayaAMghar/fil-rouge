<?php

class PatientsController
{

    public function getAllpatients()
    {
        $patients = Patient::getAllpa();
        return $patients;
    }

    public function getNbrOfPatients()
    {
        $patients = Patient::nbrOfPatients();
        return $patients;
    }
    public function getNbrOfMales()
    {
        $patients = Patient::nbrOfMales();
        return $patients;
    }


    public function getNbrOfFemales()
    {
        $patients = Patient::nbrOfFemales();
        return $patients;
    }


    public function findPatients()
    {
        if (isset($_POST['search'])) {
            $data = array('search' => $_POST['search']);
        }
        $Patients = Patient::searchPatients($data);
        return $Patients;
    }

    public function addPatient()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'birthday' => $_POST['birthday'],
                'cin' => $_POST['cin'],
                'phone' => $_POST['phone'],
                'blood_group' => $_POST['blood_group'],
            );
            $result = Patient::add($data);
            if ($result === 'ok') {
                // Session::set('success','Patient Ajouté');
                Redirect::to('homeuser');
            } else {
                echo $result;
            }
        }
    }
    public function getOnePatient()
    {
        if (isset($_POST['id'])) {
            $data = array('id' => $_POST['id']);
            $patient = Patient::getPatient($data);
            return $patient;
        }
    }

    public function updatePatient()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die;
        if (isset($_POST['submit'])) {

            $data = array(
                'id' => $_POST['id'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'birthday' => $_POST['birthday'],
                'cin' => $_POST['cin'],
                'phone' => $_POST['phone'],
                'blood_group' => $_POST['blood_group'],
            );
            $result = Patient::update($data);
            if ($result === 'ok') {
                Session::set('success', 'pateint Modifié');
                Redirect::to('homeuser');
            } else {
                echo $result;
            }
        }
    }

    public function deletePatient()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $result = Patient::delete($data);
            if ($result === 'ok') {
                // Session::set('success', 'Patient Supprimé');
                Redirect::to('homeuser');
            } else {
                echo $result;
            }
        }
    }
}
