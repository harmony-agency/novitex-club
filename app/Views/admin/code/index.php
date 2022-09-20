<?= $this->extend('layouts/admin/app') ?>
        
<?= $this->section('content') ?>

      <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">لیست کد های معرف</h6>
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
                        <th>کد</th>
                        <th>امتیاز</th>
                        <th>وضعیت</th>
                        <th>تاریخ انقضا</th>
                        <th>تاریخ ایجاد</th>
                        <th> عملیات</th>

                    </tr>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                         <th>کد</th>
                        <th>امتیاز</th>
                        <th>وضعیت</th>
                        <th>تاریخ انقضا</th>
                        <th>تاریخ ایجاد</th>
                        <th> عملیات</th>

                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($codes as $code): ?>

                    <tr>
                        <td><?= $code['code']; ?></td>
                        <td><?= $code['score']; ?></td>
                        <td><?= ($code['active']) ? '<span class="badge badge-success">فعال</span>' : '<span class="badge badge-danger">غیرفعال</span>'; ?></td>
                        <td><?= $code['expired']; ?></td>
                        <td><?= $code['created_at']; ?></td>
                        <td><a href="code/edit/<?= $code['id']; ?>" class="btn btn-success">ویرایش</a><a href="code/delete/<?= $code['id']; ?>" class="btn btn-danger">حذف</a></td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<?= $this->endSection() ?>