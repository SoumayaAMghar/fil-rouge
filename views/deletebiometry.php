<?php
  
    if(isset($_POST['id'])){
        $data= new BiometriesController();
        $data->deleteBiometry();
    }

