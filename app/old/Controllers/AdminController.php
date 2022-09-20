<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AdminModel;

use App\Models\UserModel;
use App\Models\CodeModel;


class AdminController extends BaseController
{
    public function index()
    {
        return view("admin/login");

    }
    public function dashboard()
    {

        $userModel = new UserModel();

        $usersCount = $userModel->findAll();

        $codeModel = new CodeModel();

        $codeCount = $codeModel->findAll();

        $data = [
            'usersCount' => count($usersCount),
            'codeCount'=>count($codeCount),
        ];
        return view("admin/dashboard",$data);

    }

    public function users()
    {

        $userModel = new UserModel();

        $users = $userModel->findAll();

        $data = [
            'users' => $users,
        ];
        return view("admin/users/list",$data);

    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[3]|max_length[12]|validateAdmin[username,password]',
            ];



            if (!$this->validate($rules)) {


              $logdata =[
                 'username' => $this->request->getVar('username'),
                 'password' => $this->request->getVar('password'),
                  
                  ];
                  
                return $this->response->setJSON(['status' => 'failed', 'message' => 'اطلاعات وارد شده صحیح نمیباشد']);

            } else {
                $model = new AdminModel();

                $admin = $model->where('username', $this->request->getVar('username'))
                    ->first();

                // Stroing session values
                $this->setAdminSession($admin);

                return $this->response->setJSON(['status' => 'success', 'message' => 'Admin logged successfully']);

            }
        }
    }

    private function setAdminSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'username' => $admin['username'],
            'isLoggedInAdmin' => true,
        ];

        session()->set($data);
        return true;
    }

    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
