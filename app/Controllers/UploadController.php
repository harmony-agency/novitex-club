<?php

namespace App\Controllers;

use App\Models\UploadModel;
use App\Models\UserModel;
use App\Models\UsersDetailsModel;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;



class UploadController extends BaseController
{
    protected $helpers = ['form'];

    public function getStory()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('type','story');
        $builder->join('images', 'images.user_id = users.id','left');
        $query = $builder->get()->getResultArray();

        $data = [
            'usersData' => $query,
        ];


        return view('admin/image/index',$data);
    }

    public function getPaint()
    {
        
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('type','paint');
        $builder->join('images', 'images.user_id = users.id','left');
        $query = $builder->get()->getResultArray();

        $data = [
            'usersData' => $query,
        ];


        return view('admin/image/index',$data);
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
                'rules'  => 'uploaded[pic_story]|is_image[pic_story]|max_size[pic_story,2048]|mime_in[pic_story,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'فرمت غیرمجاز',
                    'max_size'=>'حداکثر حجم مجاز 2 مگابایت می باشد',
                    'is_image' =>'فرمت غیرمجاز',
                ],

            ],
        ];

        if (! $this->validate($validationRule)) {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'تصویر بعلت فرمت غیر مجاز یا حداکثر حجم 2 مگابایت ارسال نشد']);
        }

        $img = $this->request->getFile('pic_story');


        if (! $img->hasMoved()) {
            
            $fileName = $img->getRandomName();

            $img->move(FCPATH.'uploads/story/', $fileName);

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
                'rules'  => 'uploaded[pic_paint]|is_image[pic_paint]|max_size[pic_paint,5120]|mime_in[pic_paint,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'فرمت غیرمجاز',
                    'max_size'=>'حداکثر حجم مجاز 5 مگابایت می باشد',
                    'is_image' =>'فرمت غیرمجاز',
                ],

     
            ],
        ];

        if (! $this->validate($validationRule)) {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'تصویر بعلت فرمت غیر مجاز یا حداکثر حجم 2 مگابایت ارسال نشد']);
        }

        $img = $this->request->getFile('pic_paint');


        if (! $img->hasMoved()) {
            


            $fileName = $img->getRandomName();

            $img->move(FCPATH.'uploads/paint/', $fileName);

            
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

    public function edit($id = 0)
    {



        $uploadModel = new UPloadModel();

        $upload = $uploadModel->find($id);

        $data = [
            'image' => $upload,
        ];


        return view('admin/image/edit',$data);

    }

    public function update($id = 0)
    {

            //let's do the validation here

            $status = $this->request->getVar('status');

            $score = $this->request->getVar('score');

            $user_id = $this->request->getVar('user_id');




                    $model = new UploadModel();





                    $updateData = [
                        'status' => $status,
                    ];

                    $model->update($id,$updateData);



                    $userModel = new UserModel();


                    $userDetailsModel  = new UsersDetailsModel();




                $userScore = $userModel->where('id', $user_id)
                ->first();

                $userDetailsScore = $userDetailsModel->where('user_id', $user_id)
                ->first();

                    $updateDataUser = [
                        'score' => $userScore['score'] + $score,
                    ];

                    if( $status == 'paint'){
                        $updateDataUserDetails = [
                            'score_paint' => $userDetailsScore['score_paint'] + $score,
                        ];

                    }else{
                        $updateDataUserDetails = [
                            'score_story' => $userDetailsScore['score_story'] + $score,
                        ];
                    }
     

                    $userModel->update($user_id,$updateDataUser);

                    $userDetailsModel->update($userDetailsScore['id'],$updateDataUserDetails);


                    session()->setFlashdata('message', 'Image Update Successfully!');
                    session()->setFlashdata('alert-class', 'alert-success');
  
                    return redirect()->to('admin/paint-images');

    }


    public function delete($id=0)
    {

        $uploadModel = new UploadModel();

        ## Check record
        if($uploadModel->find($id)){
  
           ## Delete record
           $uploadModel->delete($id);

           session()->setFlashdata('message', 'Deleted Successfully!');
           session()->setFlashdata('alert-class', 'alert-success');

        }else{

            session()->setFlashdata('message', 'Record not found!');
            session()->setFlashdata('alert-class', 'alert-danger');

        }
        return redirect()->route('admin/paint-images');

    }
}
