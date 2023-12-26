<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

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

                        <form action="<?= base_url('packing/import') ?>" method="post" enctype="multipart/form-data">
                            <input type="file" id="fileInput" name="excel_file" multiple accept=".xls , .xlsx" class="form-control mx-3">
                            <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                        </form>
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