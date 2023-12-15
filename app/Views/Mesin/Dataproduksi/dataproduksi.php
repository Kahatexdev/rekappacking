<?php $this->extend('Mesin/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <i class="icon-info menu-icon"></i> <strong>INGAT!</strong>


                Pesan atau notif disini


            </div>
        </div>

    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <<div class="card-body">
                <h4 class="card-title">Tabel Data Produksi</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>No Model</th>
                                <th>No Order</th>
                                <th>IN</th>
                                <th>Style</th>
                                <th>GW</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>TS0101</td>
                                <td>41860601</td>
                                <td>Yups</td>
                                <td>J434184-1 24X18</td>
                                <td>20.9</td>
                                <td><a href="<?= base_url('update_pemesanan') ?>" class="btn btn-primary"><i class="icon-pencil menu-icon"></i></a></td>
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

<div class="row">
    <!-- looping disini -->

    <!-- endloop -->


</div>
</div>



<?php $this->endSection(); ?>