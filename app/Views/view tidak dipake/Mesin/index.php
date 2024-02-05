<?php $this->extend('User/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Notes!</strong>


                        Silahkan Upload disini
                        <?php if (session()->getFlashdata('success')) : ?>
                            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-end">
                            <li class="icons dropdown">
                                <a href="<?= base_url('mesin') ?>" class="btn btn-info text-white mx-2">
                                    <i class="icon-arrow-up-circle menu-icon text-white"></i><span class="nav-text"> Import Produksi</span>
                                </a>
                            </li>
                            <li class="icons dropdown">
                                <a href="<?= base_url('mesin/data') ?>" class="btn btn-info text-white mx-2">
                                    <i class="icon-chart menu-icon text-white"></i><span class="nav-text my-2"> Data Produksi</span>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>

<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Form Input data produksi
                </h4>

            </div>
            <div class="card-body">
                <div class="row">

                    <div id="drop-area" class="border rounded d-flex justify-content-center align-item-center mx-3" style="height:200px; width: 100%; cursor:pointer;">
                        <div class="text-center mt-5">
                            <i class="icon-cloud-upload" style="font-size: 48px;">

                            </i>
                            <p class="mt-3" style="font-size: 28px;">
                                Upload file here
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pl-0 pr-4">

                        <form action="<?= base_url('mesin/import') ?>" method="post" enctype="multipart/form-data">
                            <input type="file" id="fileInput" name="excel_file" multiple accept=".xls , .xlsx" class="form-control mx-3">
                            <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>

<div class="row" id="card-container">
    <!-- looping disini -->

    <!-- endloop -->


</div>
</div>



<?php $this->endSection(); ?>