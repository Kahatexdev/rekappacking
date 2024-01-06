<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Notes! </strong>

                        <ul>
                            <li>Data Produksi mesin = Inflow Rosso di ERP</li>
                        </ul>
                        <br>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Import Data Produksi Mesin
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

                        <form action="<?= base_url('packing/importproduksi') ?>" method="post" enctype="multipart/form-data">
                            <input type="file" id="fileInput" name="excel_file" multiple accept=".xls , .xlsx" class="form-control mx-3">
                            <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="row ">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    <?= $Tabel ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table  table-striped table-bordered vertical-middle zero-configuration" id="tabel">
                        <thead>
                            <tr>
                                <th>No PDK</th>
                                <th>Inisial</th>
                                <th>Style</th>
                                <th>Colour</th>
                                <th>Tgl Prod</th>
                                <th>Bagian</th>
                                <th>QTY Prod</th>
                                <th>BS Prod</th>
                                <th>No Box</th>
                                <th>No Label</th>
                                <th>Delivery</th>
                                <th>Tgl Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($Data)) {

                            ?>
                                <tr>
                                    <td><?= $Data['no_model'] ?></td>
                                    <td><?= $Data['inisial'] ?></td>
                                    <td><?= $Data['style'] ?></td>
                                    <td><?= $Data['colour'] ?></td>
                                    <td><?= $Data['tgl_prod'] ?></td>
                                    <td><?= $Data['bagian'] ?></td>
                                    <td><?= $Data['qty_prod'] ?></td>
                                    <td><?= $Data['bs_prod'] ?></td>
                                    <td><?= $Data['no_box'] ?></td>
                                    <td><?= $Data['no_label'] ?></td>
                                    <td><?= $Data['delivery'] ?></td>
                                    <td><?= $Data['tgl_upload'] ?></td>


                                </tr>
                            <?php

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

<div class="row">

</div>
</div>



<?php $this->endSection(); ?>