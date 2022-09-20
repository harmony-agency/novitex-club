<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

use App\Models\CodeModel;



class CodeController extends BaseController
{



    public function index()
    {

        $codeModel = new CodeModel();

        $Codes = $codeModel->findAll();


        $data = [
            'codes' => $Codes,
        ];

        $this-> expireCode();

        return view('admin/code/index',$data);
    }
    public function create()
    {

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here

            $code = $this->request->getVar('code');
            $score = $this->request->getVar('score');
            $expired = $this->request->getVar('expired');


            if(empty($expired)){
                $expired = '2030-08-01 00:00:00';
            }


            $validation = $this->validate([
                'code' => [
                    'rules'  => 'required|max_length[30]|is_unique[codes.code]',
                    'errors' => [
                        'is_unique' => 'کد وارد شده قبلا ثبت شده است',
                    ],
                ],
            ]);
            
                $model = new CodeModel();

                $newData = [
                    'code' => strtolower($code),
                    'score' => $score,
                    'expired' => $expired
                ];


                if (! $validation ) {

                  return $this->response->setJSON(['status' => 'failed', 'message' => $this->validator->getErrors()]);

                }

                  $model->save($newData);


                  $session = session();

                  session()->setFlashdata('message', 'Code registered successfully');
                  session()->setFlashdata('alert-class', 'alert-success');
                  
                  return $this->response->setJSON(['status' => 'success', 'message' => 'Code registered successfully']);

        }

        return view('admin/code/create');

    }

    public function edit($id = 0)
    {

                                
        $codeModel = new CodeModel();

        $code = $codeModel->find($id);

        $data['code'] = $code;

        return view('admin/code/edit',$data);

    }

    public function update($id = 0)
    {

            //let's do the validation here

            $score = $this->request->getVar('score');
            $expired = $this->request->getVar('expired');
            $active = $this->request->getVar('active');



            if(empty($expired)){
                $expired = '2030-08-01 00:00:00';
            }

            $validation = $this->validate([
                'score' => [
                    'rules'  => 'required',
                ],
            ]);
            
                if (! $validation ) {

                    session()->setFlashdata('message', 'Code Updated Failed!');
                    session()->setFlashdata('alert-class', 'alert-danger');

                    return redirect()->to('admin/code/edit/'.$id)->withInput()->with('validation',$this->validator); 
                
                }else{

                    $model = new CodeModel();

                    $updateData = [
                        'score' => $score,
                        'expired' => $expired,
                        'active' => $active
                    ];

                    $model->update($id,$updateData);

                  
                    session()->setFlashdata('message', 'Code Update Successfully!');
                    session()->setFlashdata('alert-class', 'alert-success');
  
                    return redirect()->to('admin/codes');

                }


    }


    public function delete($id=0)
    {

        $codeModel = new CodeModel();

        ## Check record
        if($codeModel->find($id)){
  
           ## Delete record
           $codeModel->delete($id);

           session()->setFlashdata('message', 'Deleted Successfully!');
         session()->setFlashdata('alert-class', 'alert-success');

        }else{

            session()->setFlashdata('message', 'Record not found!');
            session()->setFlashdata('alert-class', 'alert-danger');

        }
        return redirect()->route('admin/codes');

    }

    public function expireCode(){


        $currentTime = Time::now('Asia/Tehran');


        $codeModel = new CodeModel();

        $Codes = $codeModel->where('active', 1)->findAll();

        $dataExpire = [
            'active' => 0
        ];

        foreach($Codes as $code) {

           $expireTime = Time::parse($code['expired'], 'Asia/Tehran');

           if($currentTime->isAfter($expireTime)){

                 $codeModel->update($code['id'], $dataExpire);

           }
        }
    }

}
