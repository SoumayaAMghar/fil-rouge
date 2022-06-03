<?php
  
    if(isset($_POST['id'])){
        $existDoctor= new DoctorsController();
        $existDoctor->deleteDoctor();
    }

?>