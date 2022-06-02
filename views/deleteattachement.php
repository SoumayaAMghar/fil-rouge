<?php
  
    if(isset($_POST['id'])){
        $data= new AttachementsController();
        $data->deleteAttachement();
    }

