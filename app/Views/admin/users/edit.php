
<?= $this->extend('layouts/admin/app') ?>
        
        <?= $this->section('content') ?>


<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ویرایش  کاربر </h6>
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

                                 <form id="editUser" action="<?= site_url('admin/user/update/'.$user['id']); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="user" class="form-label">آیدی اینستاگرام</label>
                                       <h3><?= $user['instagram']; ?></h3>
                                    </div>
                                    <div class="mb-3">
                                        <label for="score" class="form-label">نام</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="score" class="form-label">امتیاز</label>
                                        <input type="number" class="form-control" id="score" name="score" value="<?= $user['score']; ?>" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">رمز عبور</label>
                                        <input  type="password"  class="form-control" id="password" name="password">
                                        <p>در صورت خالی بودم رمز عبور تغییر نمیکند(رمز عبور پیش فرض شماره همراه است)</p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">کد معرف </label>
                                        <p><?= $user['referral_code']; ?>" </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">تاریخ ثبت نام</label>
                                        <p><?= $user['created_at']; ?>" </p>
                                    </div>


                                    <button type="submit" class="btn btn-primary">ویرایش کاربر</button>
                                    </form>
                                </div>
                            </div>


        <?= $this->endSection() ?>