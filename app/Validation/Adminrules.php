<?php

namespace App\Validation;
use App\Models\AdminModel;


class Adminrules
{
    public function validateAdmin(string $str, string $fields, array $data){
        $model = new AdminModel();
        $admin = $model->where('username', $data['username'])
                      ->first();
    
        if(!$admin)
          return false;
    
        return password_verify($data['password'], $admin['password']);
      }

}
