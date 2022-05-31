<?php

class AdminController{

    public function auth()
    {
        if(isset($_POST['submit']))
        {
            // var_dump($_POST);
            // die;
            $data['email'] = $_POST['email'];
            $result = Admin::login($data);
            // echo '<pre>';
            // echo'hello';
            // print_r($result->password);
            // die;
            
            if($result->email == $_POST['email'] && $_POST['password']==$result->password)
            {
                
                $_SESSION['loginadmin'] = true;
                $_SESSION['login'] = false;
                $_SESSION['email'] = $result->email;
                Redirect::to('homeadmin');

            }
            else{
                Session::set('error','email or password is not correct');
                Redirect::to('loginadmin');
            }
        }
    }
    static public function logout()
    {
        session_destroy();
    }
}