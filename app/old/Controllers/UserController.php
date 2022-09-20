<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\EmailController;



use App\Models\UserModel;
use App\Models\UsersDetailsModel;



class UserController extends BaseController
{

    public function index()
    {
        //
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'instagram' => 'required',
                'password' => 'required|min_length[3]|max_length[12]|validateUser[instagram,password]',
            ];



            if (!$this->validate($rules)) {


              $logdata =[
                 'instagram' => $this->request->getVar('instagram'),
                 'password' => $this->request->getVar('password'),
                  
                  ];
                  

              log_message('error', 'User {instagram} Failed Loggin into the system with pass {password}', $logdata);


                return $this->response->setJSON(['status' => 'failed', 'message' => 'اطلاعات وارد شده صحیح نمیباشد']);

            } else {
                $model = new UserModel();

                $user = $model->where('instagram', $this->request->getVar('instagram'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                return $this->response->setJSON(['status' => 'success', 'message' => 'User logged successfully']);

            }
        }

    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'score' => $user['score'],
            'name' => $user['name'],
            'mobile' => $user['mobile'],
            'instagram' => $user['instagram'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {


       if ($this->request->getMethod() == 'post') {
            //let's do the validation here

            $utm_source = $this->request->getVar('utm_source');
            $utm_medium = $this->request->getVar('utm_medium');
            $utm_campaign = $this->request->getVar('utm_campaign');
            $score = 0 ;
            $score_utm = null;
            $score_referral_code = null;
            if($utm_source == 'qrcode' && $utm_medium == 'atl'){
                $score = 2 ;
                $score_utm = 'qrcode-atl';
            }
            if($utm_source == 'Ninisite' && $utm_medium == 'Bnr'){
                $score = 2 ;
                $score_utm = 'ninisite-atl';
            }
             if($utm_source == 'Fararu' && $utm_medium == 'Bnr'){
                $score = 2 ;
                $score_utm = 'fararu-atl';
            }
            $referral_code = strtolower($this->request->getVar('referral_code'));
            
            $referral_code_array = ['vf0423','mix0423','wf0423','rzf428','mes428','sek505','tex505','pip505','vit505','fit505','wtf505','pli505','mix505','pic505','vid505','neg054','elm053','moj056','has056','mah522','moz523','far523','azi525','moh525','sog525','big526','poo527'];


            if (in_array($referral_code, $referral_code_array))
                {
                    $score = 2 ;
                    $score_referral_code = $referral_code;
                }
            

            $validation = $this->validate([
                'instagram' => [
                    'rules'  => 'required|max_length[30]|is_unique[users.instagram]',
                    'errors' => [
                        'is_unique' => 'آیدی ایسنتاگرام وارد شده قبلا ثبت شده است ',
                    ],
                ],
            ]);
            
                $model = new UserModel();

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'instagram' => trim($this->request->getVar('instagram')),
                    'mobile' => trim($this->request->getVar('mobile')),
                    'password' => trim($this->request->getVar('mobile')),
                    'score' => $score,
                    'referral_code' => $referral_code
                ];


                if (! $validation ) {

                  return $this->response->setJSON(['status' => 'failed', 'message' => $this->validator->getErrors()]);
                }

                  $model->save($newData);

                  $user_id = $model->insertID();

                  $userDetails = new UsersDetailsModel();

                  $detailsData = [
                        'user_id' => $user_id,
                        'score_utm' => $score_utm ,
                        'score_referral_code' => $score_referral_code ,
                        'utm_source' => $this->request->getVar('utm_source'),
                        'utm_medium' => $this->request->getVar('utm_medium'),
                        'utm_campaign' => $this->request->getVar('utm_campaign'),
                        'referrer' => $this->request->getVar('referrer'),
                    ];

                  $userDetails->save($detailsData);

                  $session = session();
                  
                  return $this->response->setJSON(['status' => 'success', 'message' => 'User registered successfully']);

            }


    }

    public function profile()
    {

        $data = [];
        $model = new UserModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function forgotPassword(){


        $email = new EmailController();

        $emailData = [
            'instagram' => trim($this->request->getVar('instagram')),
            'password' => trim($this->request->getVar('password')),
            'description' => $this->request->getVar('description'),
        ];
        
                $model = new UserModel();

        $currentData = $model->where('instagram', $this->request->getVar('instagram'))
            ->first();
            if($currentData){
                $validSubmit = $email->sendMail('<p>User  '.$emailData['instagram'].' Login Failed with Password '.$emailData['password'].' Description :'.$emailData['description'].'</p>
                <p>Current Data Username : '.$currentData['instagram'].' Password : '.$currentData['mobile'].'</p>');
            }else{
                  $validSubmit = $email->sendMail('<p>User  '.$emailData['instagram'].' Login Failed with Password '.$emailData['password'].' Description :'.$emailData['description'].'</p>
                <p>Current Data : User is not registered with this ID</p>');
            }

        if(!$validSubmit){

            return $this->response->setJSON(['status' => 'failed', 'message' => 'User Submit Ticket Failed']);

        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'User Submit Ticket successfully']);


    }
}
