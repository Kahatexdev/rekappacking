<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        Data Produksi <?= $no_model ?>
                    </h4>
                    <div>
                        <a href="<?= base_url('packing') ?>" class="btn btn-info text-white shadow"> <i class="icon-arrow-left"></i>
                            Kembali
                        </a>

                    </div>
                </div>
                <div class="card-body">
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

                    <div class="table-responsive">
                        <table class="table responsive table-striped table-bordered vertical-middle zero-configuration">
                            <thead>
                                <th>Storage</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) :
                                    foreach ($data as $val) :
                                ?>
                                        <tr>
                                            <td><?= $val ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-list-inisial" data-toggle="modal" data-target="#exampleModalLong" data-proses="<?= $val ?>" data-no-model="<?= $no_model ?>">
                                                    Import Produksi
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body align-items-center">
                                        <div class="row align-items-center">
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

                                                <form action="" id="modalForm" method="POST" enctype="multipart/form-data">
                                                    <input type="text" value="<?= $no_model ?>" hidden name="noModel">
                                                    <input type="file" id="fileInput" name="excel_file" multiple accept=".xls , .xlsx" class="form-control mx-3">
                                                    <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                                                </form>
                                            </div>
                                        </div>

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


<script>
    $(document).ready(function() {
        $('.btn-list-inisial').on('click', function() {
            var idProses = $(this).data('proses');
            var noModel = $(this).data('no-model');
            console.log(noModel)
            var ket;
            switch (true) {
                case idProses.startsWith("MC"):
                    ket = "Mesin";
                    break;
                case idProses.startsWith("RS"):
                    ket = "Rosso";
                    break;
                case idProses.startsWith("GS"):
                    ket = "Gudang";
                    break;
                case idProses.startsWith("ST"):
                    ket = "Setting";
                    break;
                case idProses.startsWith("HNP"):
                    ket = "Handprint";
                    break;
                case idProses.startsWith("BO"):
                    ket = "bordir";
                    break;
                case idProses.startsWith("LP"):
                    ket = "Lipat";
                    break;
                case idProses.startsWith("APL"):
                    ket = "aplikasi";
                    break;
                case idProses.startsWith("PC"):
                    ket = "potongcorak";
                    break;
                case idProses.startsWith("OB"):
                    ket = "obras";
                    break;
                default:
                    ket = "";
                    break;
            }

            console.log(ket);
            document.getElementById('exampleModalLongTitle').textContent = "Import Produksi " + idProses
            document.getElementById('modalForm').action = '<?= base_url('packing/importproduksi') ?>' + ket;
        });
    });
</script>




<?php $this->endSection(); ?>