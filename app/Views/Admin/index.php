<?php $this->extend('Admin/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Notes!</strong>



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

                            <button type="#" class="btn btn-success text-white"><i class="icon-note menu-icon"></i> Export Spreadsheet</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered vertical-middle">
                        <thead>
                            <tr>

                                <th>ID Produksi</th>
                                <th>Tgl Produksi</th>
                                <th>ID Master Produksi</th>
                                <th>Bagian </th>
                                <th>Stok Awal</th>
                                <th>Stok Akhir</th>
                                <th>Qty Prod</th>
                                <th>BS </th>
                                <th>No Box</th>
                                <th>No Label</th>
                                <th>No Palet</th>
                                <th>Admin</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>TS0101</td>

                                <td>T2</td>
                                <td>J434184-1 24X18</td>
                                <td>Deskripsi</td>
                                <td>Teh teh</td>
                                <td>Teh teh</td>
                                <td>Teh teh</td>
                                <td>Teh teh</td>
                                <td>Teh teh</td>
                                <td>Teh teh</td>
                                <td><a href="<?= base_url('admin/mesin/update') ?>" class="btn btn-primary"><i class="icon-pencil menu-icon"></i></a></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
</div>

</div>




<?php $this->endSection(); ?>