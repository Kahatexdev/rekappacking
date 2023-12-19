<?php $this->extend('User/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>INGAT!</strong>


                        Pesan atau notif disini
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

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Data Produksi</h4>

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
                                <th>Desc</th>
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
                                        <td><?= $dt['deskripsi'] ?></td>
                                        <td><?= $dt['admin'] ?></td>

                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
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

<script>
    $(document).ready(function() {
        $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('mesin/getData'); ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "jc"
                },
                // Tambahkan kolom lainnya sesuai kebutuhan
            ]
        });
    });
</script>


<?php $this->endSection(); ?>