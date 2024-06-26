<?php $this->extend('Ppc/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        Master Data
                    </h4>
                    <div>
                        <a href="<?= base_url('export/formatPdk') ?>" class="btn btn-success text-white shadow"> <i class="icon-doc"></i>
                            Download Format Master PDK
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
                        <li class="nav-item"><a href="#navpills-2" class="nav-link " data-toggle="tab" aria-expanded="false">Data PDK</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="navpills-1" class="tab-pane active">
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

                                    <form action="<?= base_url('ppc/import') ?>" method="post" enctype="multipart/form-data">
                                        <input type="file" id="fileInput" name="excel_file" multiple accept=".xls , .xlsx" class="form-control mx-3">
                                        <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="navpills-2" class="tab-pane ">
                            <div class="row align-items-center">
                                <div class="table-responsive">

                                    <table class="table responsive table-striped table-bordered vertical-middle zero-configuration" id="tabel">
                                        <thead>
                                            <tr>
                                                <th>No Model</th>
                                                <th>No Order</th>
                                                <th>Buyer</th>
                                                <th>Inisial </th>
                                                <th>Proses </th>
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
                                                        <td> <button type="button" class="btn btn-info btn-list-inisial" data-toggle="modal" data-target="#exampleModalLong" data-no-model="<?= $dt['no_model'] ?>">
                                                                List Inisial
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <form action="<?= base_url('ppc/flowproses/' . $dt['no_model']); ?>" id="" method="get">
                                                                <button type="submit" class="btn btn-success detail text-white  ">Flowproses</button>
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
    </div>

</div>




<script>
    $(document).ready(function() {
        $('.btn-list-inisial').on('click', function() {
            var noModel = $(this).data('no-model');
            console.log(noModel)
            $.ajax({
                url: 'ppc/getInisial',
                type: 'POST',
                data: {
                    no_model: noModel
                },
                dataType: 'json',
                success: function(data) {
                    // Kosongkan tabel sebelum mengisi data baru
                    $('#inisial-list-table').empty();
                    document.getElementById('exampleModalLongTitle').textContent = "List Inisial " + noModel
                    // Loop untuk setiap data inisial dan tambahkan ke tabel
                    var total = data.length
                    var totalPo = 0;
                    document.getElementById('jumInisial').textContent = "Jumlah inisial : " + total
                    for (var i = 0; i < data.length; i++) {
                        var row = '<tr><td>' + data[i].inisial + '</td><td>' + data[i].po_inisial + '</td></tr>';
                        $('#inisial-list-table').append(row);
                        totalPo += parseFloat(data[i].po_inisial);
                    }
                    document.getElementById('totalPo').textContent = "Total Po : " + totalPo
                }
            });
        });
    });
</script>

<?php $this->endSection(); ?>