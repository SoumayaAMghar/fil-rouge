<?php
  
    if(isset($_POST['id'])){
        $data= new DiseasesController();
        $data->deleteDisease();
    }

