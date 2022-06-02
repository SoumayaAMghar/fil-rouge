<?php
  
    if(isset($_POST['id'])){
        $data= new AllergiesController();
        $data->deleteAllergy();
    }

