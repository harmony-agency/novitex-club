
<?= $this->extend('layouts/admin/app') ?>
        
        <?= $this->section('content') ?>


<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">تایید تصاویر ارسالی</h6>
                                </div>
                                <div class="card-body">

         <?php
        // Display Response
            if(session()->has('message')){
            ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('message') ?>
            </div>
            <?php
            }
            ?>

                                 <form id="editImage" action="<?= site_url('admin/image/update/'.$image['id']); ?>" method="post">
                                     <input type="hidden" name="user_id" id="user_id" value="<?= $image['user_id']; ?>">
                                    <div class="mb-3">
                                        <label for="score" class="form-label">تصویر</label>
                                        <img src="<?= base_url() . '/uploads/' . $image['type'].'/'.$image['name'] ;?>" style="width: 100%;"/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="score" class="form-label">امتیاز</label>
                                        <input type="number" class="form-control" id="score" name="score">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">وضعیت</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="1">تایید</option>
                                            <option value="0">عدم تایید</option>
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                    </form>
                                </div>
                            </div>


        <?= $this->endSection() ?>