<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Silahkan Import Data Master Order.</strong>


                        <br>
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
                                <a href="<?= base_url('packing') ?>" class="btn btn-info text-white mx-2">
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

<div class="row mx-2">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Data Master
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table  table-striped table-bordered vertical-middle zero-configuration" id="tabel">
                        <thead>
                            <tr>
                                <th>No Model</th>
                                <th>No Order</th>
                                <th>Buyer</th>
                                <th>PO </th>
                                <th>Style </th>
                                <th>Area </th>
                                <th>Inisial </th>
                                <th>Colour</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($Data)) {
                                foreach ($Data as $dt) {
                            ?>
                                    <tr>
                                        <td><?= $dt['no_model'] ?></td>
                                        <td><?= $dt['no_order'] ?></td>
                                        <td><?= $dt['buyer'] ?></td>
                                        <td><?= $dt['po_inisial'] ?></td>
                                        <td><?= $dt['style'] ?></td>
                                        <td><?= $dt['area'] ?></td>
                                        <td><?= $dt['inisial'] ?></td>
                                        <td><?= $dt['colour'] ?></td>


                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
</div>


<?php $this->endSection(); ?>