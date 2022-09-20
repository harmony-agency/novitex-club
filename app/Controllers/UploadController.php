<?php

namespace App\Controllers;

use App\Models\UploadModel;
use App\Models\UsersDetailsModel;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;



class UploadController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        //
    }

    public function storyUpload()
    {  
         

        $userDetails = new UsersDetailsModel();


        $session = session();

        $user_id = $session->get('id');



        $limit = $userDetails->where('user_id', $user_id)->first();


        if ($limit['limit_story'] >= 2){

            return $this->response->setJSON(['status' => 'failed', 'message' => 'حداکثر تعداد مجاز آپلود استوری 2 می باشد.']);

        }

        
        $validationRule = [
            'pic_story' => [
                'rules'  => 'uploaded[pic_story]|is_image[pic_story]|mime_in[pic_story,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'فرمت غیرمجاز',
                ],

     
            ],
        ];

        if (! $this->validate($validationRule)) {
            return $this->response->setJSON(['status' => 'failed', 'message' => $this->validator->getErrors()]);
        }

        $img = $this->request->getFile('pic_story');


        if (! $img->hasMoved()) {
            
            $filepath = WRITEPATH . 'uploads/' . $img->store('story/');


            $upload = new UPloadModel();

            $detailsUpload = [
                'user_id' => $user_id,
                'name' => $img->getName(),
                'type' => 'story' ,
            ];

             $upload->save($detailsUpload);


             $detailsData = [
                   'limit_story' => $limit['limit_story'] +1 ,
               ];

               $userDetails->update($limit['id'],$detailsData);


               return $this->response->setJSON(['status' => 'success', 'message' => 'تصویر با موفقیت ارسال شد پس از تایید امتیاز شما افزایش می یابد']);

        }

        return $this->response->setJSON(['status' => 'failed', 'message' => 'Image Upload failed']);
    }

    public function paintUpload()
    {  
         

        $userDetails = new UsersDetailsModel();


        $session = session();

        $user_id = $session->get('id');


        $limit = $userDetails->where('user_id', $user_id)->first();


        if ($limit['limit_paint'] >= 5){

            return $this->response->setJSON(['status' => 'failed', 'message' => 'حداکثر تعداد مجاز آپلود نقاشی 5 می باشد.']);

        }

        
        $validationRule = [
            'pic_paint' => [
                'rules'  => 'uploaded[pic_paint]|is_image[pic_paint]|mime_in[pic_paint,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'فرمت غیرمجاز',
                ],

     
            ],
        ];

        if (! $this->validate($validationRule)) {
            return $this->response->setJSON(['status' => 'failed', 'message' => $this->validator->getErrors()]);
        }

        $img = $this->request->getFile('pic_paint');


        if (! $img->hasMoved()) {
            
            $filepath = WRITEPATH . 'uploads/' . $img->store('paint/');


            $upload = new UPloadModel();

            $detailsUpload = [
                'user_id' => $user_id,
                'name' => $img->getName(),
                'type' => 'paint' ,
            ];

             $upload->save($detailsUpload);


             $detailsData = [
                   'limit_paint' => $limit['limit_paint'] +1 ,
               ];

               $userDetails->update($limit['id'],$detailsData);


             return $this->response->setJSON(['status' => 'success', 'message' => 'تصویر با موفقیت ارسال شد پس از تایید امتیاز شما افزایش می یابد']);

        }

        return $this->response->setJSON(['status' => 'failed', 'message' => 'Image Upload failed']);
    }
}
