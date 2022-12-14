<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\UserModel;
use App\Models\UsersDetailsModel;
use App\Models\CodeModel;


class DashboardController extends BaseController
{
    public function index()
    {
        
          $user_id = session()->get('id');

        $userModel = new UserModel();

        $user = $userModel->where('id', $user_id)->first();

        $userDetails = new UsersDetailsModel();

        $userScores = $userDetails->where('user_id', $user_id)->findAll();

        
        $data =[
            
            'userScore' => $user['score'],
            'scores'=>$userScores
        ];

        return view("dashboard",$data);
    }
    public function referralCode()
    {


        $user_id = session()->get('id');

        $referral_code = strtolower($this->request->getVar('referral_code'));

        $checkCode = false;
                           
        $userModel = new UserModel();

        $user = $userModel->where('id', $user_id)->first();

        $userDetails = new UsersDetailsModel();


        // $timeLimit = Time::parse('2022-07-11 00:00:00', 'Asia/Tehran');
        // $register_time = Time::parse($user['created_at'], 'Asia/Tehran');

        // strpos($referral_code, 'novi') !== false
        //   $referral_code_array = ['vf0423','mix0423','wf0423','rzf428','mes428','sek505','tex505','pip505','vit505','fit505','wtf505','pli505','mix505','pic505','vid505','neg054','elm053','moj056','has056','mah522','moz523','far523','azi525','moh525','sog525','big526','poo527'];

        if(empty($user['referral_code'])){



            if($referral_code !=null){
                $codeModel = new CodeModel();

                $code = $codeModel->where('code',  $referral_code)
                ->first();
                 if($code != null){
                   
                             $checkCode = $this->checkExpireCode($referral_code);

               }
            }


            if ($code != null && $code['active'] && $checkCode == false)
            {
                    $score = $code['score'] ;
                    $referral_code = $code['code'];

                    $data = [
                        'referral_code' =>$referral_code,
                        'score' => $user['score'] + $score,
                    ];
                    $detailsData = [
                        'score_referral_code' =>$referral_code,
                    ];
    
    
                    $userModel->update($user_id, $data);
    
                    $userDetails->update($user_id,$detailsData);
    
    
                    return $this->response->setJSON(['status' => 'success', 'score' => $data['score'] ]);

            }else{
                    $score = 0 ;
                    return $this->response->setJSON(['status' => 'failed', 'message' => '???? ???????? ?????? ?????????? ??????????????']);
            }

        }else{
            return $this->response->setJSON(['status' => 'failed', 'message' => '?????? ???????? ???? ???????? ' .$user['referral_code']. '???????? ???????? ??????']);
        }

    }

    public function checkExpireCode($referral_code){


        $currentTime = Time::now('Asia/Tehran');


        $codeModel = new CodeModel();


        $code = $codeModel->where('code', $referral_code)
        ->first();

        $expireTime = Time::parse($code['expired'], 'Asia/Tehran');

        if($currentTime->isAfter($expireTime)){

            return true;

        }else{
            return false;
        }
        
    }
}
