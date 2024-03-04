<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Data Produksi
                    </h4>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <script>
                            $(document).ready(function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: '<?= session()->getFlashdata('success') ?>',
                                });
                            });
                        </script>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <script>
                            $(document).ready(function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: '<?= session()->getFlashdata('error') ?>',
                                });
                            });
                        </script>
                    <?php endif; ?>
                    <div class="row align-items-center">
                        <div class="table-responsive">

                            <table class="table responsive table-striped table-bordered vertical-middle zero-configuration" id="tabel">
                                <thead>
                                    <tr>
                                        <th>No Model</th>
                                        <th>No Order</th>
                                        <th>Buyer</th>
                                        <th>Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($Data)) {
                                        foreach ($Data as $dt) {
                                    ?>
                                            <tr>
                                                <td data-id="<?= $dt['no_model'] ?>"><?= $dt['no_model'] ?></td>
                                                <td><?= $dt['no_order'] ?></td>
                                                <td><?= $dt['buyer'] ?></td>
                                                <td>
                                                    <form action="<?= base_url('packing/details/' . $dt['no_model']); ?>" id="" method="get">
                                                        <button type="submit" class="btn btn-success detail text-white  ">Lihat data</button>
                                                    </form>
                                                </td>
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
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">List Inisial </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body align-items-center">
                                            <!-- Tabel untuk menampilkan data inisial -->
                                            <p id="jumInisial"></p>
                                            <p id="totalPo"></p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Inisial</th>
                                                        <th>PO Inisial</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="inisial-list-table">
                                                    <!-- Tempat untuk menampilkan data inisial -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>




<?php $this->endSection(); ?>