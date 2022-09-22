<?= $this->extend('layouts/admin/app') ?>
        
<?= $this->section('content') ?>

      <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">لیست کاربران</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="user_dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                        <th>نام</th>
                        <th>موبایل</th>
                        <th>آیدی اینستاگرام</th>
                        <th>امتیاز</th>
                        <th>کد معرف</th>
                        <th>تاریخ ثبت نام</th>
                        <th> عملیات</th>

                    </tr>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>نام</th>
                        <th>موبایل</th>
                        <th>آیدی اینستاگرام</th>
                        <th>امتیاز</th>
                        <th>کد معرف</th>
                        <th>تاریخ ثبت نام</th>
                        <th> عملیات</th>


                    </tr>
                </tfoot>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

 
<?= $this->endSection() ?>