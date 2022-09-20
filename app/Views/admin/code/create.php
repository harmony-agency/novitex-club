
<?= $this->extend('layouts/admin/app') ?>
        
        <?= $this->section('content') ?>


<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">افزودن کد معرف </h6>
                                </div>
                                <div class="card-body">
                                 <form id="addCode">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">کد معرف</label>
                                        <input type="text" class="form-control" id="code" name="code" aria-describedby="emailHelp">
                                        <div id="code" class="form-text">قبلا نباید ثبت شده باشد</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="score" class="form-label">امتیاز</label>
                                        <input type="number" class="form-control" id="score" name="score" value="2">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">تاریخ انقضا</label>
                                        <input  type="datetime-local"  class="form-control" id="expired" name="expired">
                                    </div>

                                    <button type="submit" class="btn btn-primary">ثبت کد</button>
                                    </form>
                                    <div class="result-code"></div>
                                </div>
                            </div>


        <?= $this->endSection() ?>