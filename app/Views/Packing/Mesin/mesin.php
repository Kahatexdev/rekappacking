<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>INGAT!</strong>


                        Pesan atau notif disini

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

                        <form action="<?= base_url('packing/mesin/import') ?>" method="post" enctype="multipart/form-data">
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $Tabel ?></h4>
                <div class="d-flex justify-content-between">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Dari</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="dari">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">sampai</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="sampai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-info">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end ">

                            <form action="<?= base_url('export') ?>" method="post">
                                <button type="submit" class="btn btn-success text-white"><i class="icon-note menu-icon"></i> Export Spreadsheet</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">

                    <table class="table  table-striped table-bordered vertical-middle " id="tabel">
                        <thead>
                            <tr>
                                <th>.</th>
                                <th>No</th>
                                <th>JC</th>
                                <th>Inisial</th>
                                <th>Colour </th>
                                <th>Qty Prod </th>
                                <th>Qty BS </th>
                                <th>Qty Total </th>
                                <th>Desc</th>
                                <th>Tanggal</th>
                                <th>Admin</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($Produk)) {
                                foreach ($Produk as $dt) {
                            ?>
                                    <tr>
                                        <td><input type="checkbox" name="selected[]" id="" value="<?= $dt['id']; ?>" class="form"></td>
                                        <td><?= $dt['id'] ?></td>
                                        <td><?= $dt['jc'] ?></td>
                                        <td><?= $dt['inisial'] ?></td>
                                        <td><?= $dt['colour'] ?></td>
                                        <td><?= $dt['qtyprod'] ?></td>
                                        <td><?= $dt['qtybs'] ?></td>
                                        <td><?= $dt['qtytotal'] ?></td>
                                        <td><?= $dt['deskripsi'] ?></td>
                                        <td><?= $dt['created_at'] ?></td>
                                        <td><?= $dt['admin'] ?></td>

                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data</td>
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
</div>

<div class="row">

</div>
</div>



<?php $this->endSection(); ?>