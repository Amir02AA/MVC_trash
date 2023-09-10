<?php

namespace controller;

use core\Controller;
use core\Render;
use core\Request;
use models\Login;

class LoginController extends Controller
{
    public function loginPage()
    {
        return Render::renderURI('login');
    }

    public function login()
    {
       $data = Request::getInstance()->getSanitizedData();
       $loginModel = new Login();
       $loginModel->loadData($data);
       $errors = $loginModel->validate();

       if (!$errors){
           echo "Validate was OK";
       }else{
           return Render::renderURI('login',params: ['errors' => $errors , 'user' => $data]);
       }

    }
}