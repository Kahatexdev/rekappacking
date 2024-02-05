<?php $this->extend('Ppc/layout'); ?>
<?php $this->section('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        Data Flow Proses <?= $no_model ?>
                    </h4>
                    <div>
                        <a href="<?= base_url('ppc') ?>" class="btn btn-info text-white shadow"> <i class="icon-arrow-left"></i>
                            Kembali
                        </a>
                        <a href="<?= base_url('export/format') ?>" class="btn btn-success text-white shadow"> <i class="icon-doc"></i>
                            Download Format Flowproses
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
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Data PDK</a>
                        </li>
                        <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Import Data</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="navpills-1" class="tab-pane active">
                            <div class="row align-items-center">
                                <div class="table-responsive">

                                    <table class="table  table-striped table-bordered vertical-middle zero-configuration" id="tabel">
                                        <thead>
                                            <tr>
                                                <th>Inisial</th>
                                                <th>P1 </th>
                                                <th>P2 </th>
                                                <th>P3 </th>
                                                <th>P4 </th>
                                                <th>P5 </th>
                                                <th>P6 </th>
                                                <th>P7 </th>
                                                <th>P8 </th>
                                                <th>P9 </th>
                                                <th>P11 </th>
                                                <th>P12 </th>
                                                <th>P13 </th>
                                                <th>P14 </th>
                                                <th>P15 </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($Data)) {
                                                foreach ($Data as $dt) {
                                            ?>
                                                    <tr>
                                                        <td><?= $dt['inisial'] ?></td>
                                                        <td><?= $dt['proses1'] ?></td>
                                                        <td><?= $dt['proses2'] ?></td>
                                                        <td><?= $dt['proses3'] ?></td>
                                                        <td><?= $dt['proses4'] ?></td>
                                                        <td><?= $dt['proses5'] ?></td>
                                                        <td><?= $dt['proses6'] ?></td>
                                                        <td><?= $dt['proses7'] ?></td>
                                                        <td><?= $dt['proses8'] ?></td>
                                                        <td><?= $dt['proses9'] ?></td>
                                                        <td><?= $dt['proses10'] ?></td>
                                                        <td><?= $dt['proses11'] ?></td>
                                                        <td><?= $dt['proses12'] ?></td>
                                                        <td><?= $dt['proses13'] ?></td>
                                                        <td><?= $dt['proses14'] ?></td>
                                                        <td><?= $dt['proses15'] ?></td>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">List Inisial</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body align-items-center">
                                                    <!-- Tabel untuk menampilkan data inisial -->
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
                        <div id="navpills-2" class="tab-pane">
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

                                    <form action="<?= base_url('packing/importFlowProses') ?>" method="post" enctype="multipart/form-data">
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

</div>




<?php $this->endSection(); ?>