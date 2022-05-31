<?php
  
    if(isset($_POST['id'])){
        $existPatient= new PatientsController();
        $existPatient->deletePatient();
    }

?>