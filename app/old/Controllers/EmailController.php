<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public function index()
    {
        //
    }

    function sendMail($message) { 
        $to = 'navakads@gmail.com';
        $subject = 'Club Novitex';
        
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('club@novitex.ir', 'Login Failed');
        
        $email->setSubject($subject);
        $email->setMessage($message);
      if($email->send()){
            return true;
        }else{
            return false;
        }
    }
}
