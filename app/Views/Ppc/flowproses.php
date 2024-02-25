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
                        <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Import Data</a>
                        </li>
                        <li class="nav-item"><a href="#navpills-2" class="nav-link " data-toggle="tab" aria-expanded="false">Data Flow Proses</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n pn">

                        <div id="navpills-1" class="tab-pane active">
                            <div class="row align-items-center">
                                <div id="drop-area" class="border rounded d-flex justify-content-center align-item-center mx-3" style="height:200px; width: 100%; cursor:pointer;">
                                    <div class="text-center mt-5">
                                        <i class="icon-cloud-upload" style="font-size: 48px;">

                                        </i>wvg
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
                        <div id="navpills-2" class="tab-pane ">
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
                                                        <td><button type="button" class="btn btn-info btn-list-inisial" data-toggle="modal" data-target="#exampleModalLong" data-proses="<?= $dt['id_proses'] ?>" data-proses1="<?= $dt['proses1'] ?>" data-proses2="<?= $dt['proses2'] ?>" data-proses3="<?= $dt['proses3'] ?>" data-proses4="<?= $dt['proses4'] ?>" data-proses5="<?= $dt['proses5'] ?>" data-proses6="<?= $dt['proses6'] ?>" data-proses7="<?= $dt['proses7'] ?>" data-proses8="<?= $dt['proses8'] ?>" data-proses9="<?= $dt['proses9'] ?>" data-proses10="<?= $dt['proses10'] ?>" data-inisial="<?= $dt['inisial'] ?>">
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
                                                                <select name="proses1" id="proses1" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 2</label>
                                                                <select name="proses2" id="proses2" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 3</label>
                                                                <select name="proses3" id="proses3" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 4</label>
                                                                <select name="proses4" id="proses4" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 5</label>
                                                                <select name="proses5" id="proses5" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">

                                                                <label for="proses1">Proses 6</label>
                                                                <select name="proses6" id="proses6" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 7</label>
                                                                <select name="proses7" id="proses7" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 8</label>
                                                                <select name="proses8" id="proses8" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 9</label>
                                                                <select name="proses9" id="proses9" class="form-control">
                                                                    <option value=""></option>
                                                                    <?php foreach ($proses as $pr) : ?>
                                                                        <option value="<?= $pr['nama_proses'] ?>"><?= $pr['nama_proses'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <label for="proses1">Proses 10</label>
                                                                <select name="proses10" id="proses10" class="form-control">
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
            var Proses1 = $(this).data('proses1');
            var Proses2 = $(this).data('proses2');
            var Proses3 = $(this).data('proses3');
            var Proses4 = $(this).data('proses4');
            var Proses5 = $(this).data('proses5');
            var Proses6 = $(this).data('proses6');
            var Proses7 = $(this).data('proses7');
            var Proses8 = $(this).data('proses8');
            var Proses9 = $(this).data('proses9');
            var Proses10 = $(this).data('proses10');
            var inisial = $(this).data('inisial');
            document.getElementById('exampleModalLongTitle').textContent = "Ubah Flow Proses " + inisial
            document.getElementById('idProsesVal').value = idProses
            document.getElementById('proses1').value = Proses1
            document.getElementById('proses2').value = Proses2
            document.getElementById('proses3').value = Proses3
            document.getElementById('proses4').value = Proses4
            document.getElementById('proses5').value = Proses5
            document.getElementById('proses6').value = Proses6
            document.getElementById('proses7').value = Proses7
            document.getElementById('proses8').value = Proses8
            document.getElementById('proses9').value = Proses9
            document.getElementById('proses10').value = Proses10
            document.getElementById('modalForm').action = 'update/' + idProses
        });
    });
</script>




<?php $this->endSection(); ?>