<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="card pb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <i class="icon-info menu-icon"></i> <strong>INGAT!</strong>


                <br> Silahkan Import Data Master Order.
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
                        <a href="<?= base_url('packing/inputmasterflow') ?>" class="btn btn-info text-white mx-2">
                            <i class="icon-arrow-up-circle menu-icon text-white"></i><span class="nav-text"> Import Data Master</span>
                        </a>
                    </li>
                    <li class="icons dropdown">
                        <a href="<?= base_url('packing/flowproses') ?>" class="btn btn-info text-white mx-2">
                            <i class="icon-chart menu-icon text-white"></i><span class="nav-text my-2"> Input Flow Prosses</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>

    </div>


</div>
</div>

<div class="row mx-2">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Import Data Master
                </h4>


            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form">
                            <form action="<?= base_url('packing/importinisial') ?>" method="post" enctype="multipart/form-data">

                                <label for="no_model" class="form">No model : </label>
                                <select name="no_model" id="no_model" class="form custom-select">
                                    <option value="--"></option>
                                    <?php foreach ($NoModel as $nm) : ?>
                                        <option value="<?= $nm['no_model'] ?>"> <?= $nm['no_model'] ?> </option>

                                    <?php endforeach ?>
                                </select>
                                <label for="no_model" class="form">Area : </label>
                                <input type="text" class="form-control" name="area">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="drop-area" class="border rounded d-flex justify-content-center align-item-center mx-3" style="height:200px; width: 100%; cursor:pointer;">
                            <div class="text-center mt-5">
                                <i class="icon-cloud-upload" style="font-size: 48px;">

                                </i>
                                <p class="mt-3" style="font-size: 28px;">
                                    Upload file here
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pl-0 pr-4">

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

<div class="row">

</div>
</div>

<?php $this->endSection(); ?>