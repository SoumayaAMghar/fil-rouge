<?php
  
    if(isset($_POST['id'])){
        $data= new VaccinesController();
        $data->deleteVaccine();
    }

