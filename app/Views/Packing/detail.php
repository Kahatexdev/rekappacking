<?php $this->extend('Packing/layout'); ?>
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
                                                <th>P1 </th>
                                                <th>P2 </th>
                                                <th>P3 </th>
                                                <th>P4 </th>
                                                <th>P5 </th>
                                                <th>P6 </th>
                                                <th>P7 </th>
                                                <th>P8 </th>
                                                <th>P9 </th>
                                                <th>P10 </th>
                                                <th>Aksi </th>

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
                                                        <td><button type="button" class="btn btn-info btn-list-inisial" data-toggle="modal" data-target="#exampleModalLong" data-proses="<?= $dt['id_proses'] ?>" data-inisial="<?= $dt['inisial'] ?>">
                                                                Edit
                                                            </button></td>

                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="11" class="text-center">Tidak ada data</td>
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
                                                    <form action="<?= base_url('ppc/updateFlow/') ?>" method="POST" id="modalForm">
                                                        <input type=text" hidden id="idProsesVal">
                                                        <input type=text" hidden id="noModel" name="noModel" value="<?= $no_model ?>">
                                                        <div class="row form-group">
                                                            <div class="col-lg-6">

                                                                <label for="proses1">Proses 1</label>
                                                                <select name="proses1" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 2</label>
                                                                <select name="proses2" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 3</label>
                                                                <select name="proses3" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 4</label>
                                                                <select name="proses4" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 5</label>
                                                                <select name="proses5" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">

                                                                <label for="proses1">Proses 6</label>
                                                                <select name="proses6" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 7</label>
                                                                <select name="proses7" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 8</label>
                                                                <select name="proses8" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 9</label>
                                                                <select name="proses9" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 10</label>
                                                                <select name="proses10" id="proses" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger text-white" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                                </form>
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

                                    <form action="<?= base_url('ppc/importFlowProses') ?>" method="POST" enctype="multipart/form-data">
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


<script>
    $(document).ready(function() {
        $('.btn-list-inisial').on('click', function() {
            var idProses = $(this).data('proses');
            var inisial = $(this).data('inisial');
            console.log(idProses)
            console.log(inisial)
            document.getElementById('exampleModalLongTitle').textContent = "Ubah Flow Proses " + inisial
            document.getElementById('idProsesVal').value = idProses
            document.getElementById('modalForm').action = 'update/' + idProses
        });
    });
</script>




<?php $this->endSection(); ?>