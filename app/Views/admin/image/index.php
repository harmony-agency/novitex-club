<?= $this->extend('layouts/admin/app') ?>
        
<?= $this->section('content') ?>

      <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">لیست  تصاویر ارسالی</h6>
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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                   <th>آیدی کاربر</th>
                   <th>امتیاز کاربر</th>
                        <th>نوع</th>
                        <th>تصویر</th>
                        <th>وضعیت</th>
                        <th>تاریخ ارسال</th>
                        <th> عملیات</th>
                    </tr>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>آیدی کاربر</th>
                    <th>امتیاز کاربر</th>
                       <th>نوع</th>
                        <th>تصویر</th>
                        <th> وضعیت</th>
                        <th>تاریخ ارسال</th>
                        <th> عملیات</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($usersData as $userData): ?>

                    <tr>
                    <td><?= ($userData['instagram']); ?></td>
                    <td><?= ($userData['score']); ?></td>
                        <td><?= ($userData['type']); ?></td>
                        <td><img src="<?= base_url() . '/uploads/' . $userData['type'].'/'.$userData['name'] ;?>" style=" width: 200px;"/></td>
                        <td><?= ($userData['status']) ? '<span class="badge badge-success">تایید شده</span>' : '<span class="badge badge-danger">تایید نشده</span>'; ?></td>
                        <td><?= $userData['created_at']; ?></td>
                        <td><a href="image/edit/<?= $userData['id']; ?>" class="btn btn-success">مشاهده</a><a href="image/delete/<?= $userData['id']; ?>" class="btn btn-danger">حذف</a></td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<?= $this->endSection() ?>