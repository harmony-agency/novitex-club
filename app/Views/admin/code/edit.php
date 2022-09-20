
<?= $this->extend('layouts/admin/app') ?>
        
        <?= $this->section('content') ?>


<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ویرایش کد معرف </h6>
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


                                 <form id="editCode" action="<?= site_url('admin/code/update/'.$code['id']); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">کد معرف</label>
                                        <input type="text" class="form-control" id="code" name="code" value="<?= $code['code']; ?>" readonly>
                                        <div id="code" class="form-text"> کد معرف قابل ویرایش نیست</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="score" class="form-label">امتیاز</label>
                                        <input type="number" class="form-control" id="score" name="score" value="<?= $code['score']; ?>" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">تاریخ انقضا</label>
                                        <input  type="datetime-local"  class="form-control" id="expired" name="expired" value="<?= $code['expired']; ?>" >
                                    </div>
                                    

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">وضعیت</label>

                                        <select class="form-select" name="active" id="active">
                                            <option value="1">فعال</option>
                                            <option value="0">غیرفعال</option>
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">ویرایش کد</button>
                                    </form>
                                </div>
                            </div>


        <?= $this->endSection() ?>