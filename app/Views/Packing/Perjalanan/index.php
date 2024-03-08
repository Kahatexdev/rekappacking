<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>


<div class="row ">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <div class="col-lg-6">

                    <h4>
                        <?= $Tabel ?>
                    </h4>
                </div>

            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table  table-striped table-bordered vertical-middle zero-configuration" id="productionTable">
                        <thead>
                            <tr>
                                <th>No PDK</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($inidata)) {

                            ?>
                                <?php foreach ($inidata as $Item) : ?>
                                    <tr>
                                        <td><?= $Item['no_model'] ?></td>
                                        <td>
                                        <td> <button type="button" class="btn btn-info btn-list-inisial" data-toggle="modal" data-target="#exampleModalLong" data-no-model="<?= $Item['no_model'] ?>">
                                                List Inisial
                                            </button>
                                        </td>



                                    </tr>
                                <?php endforeach ?>
                            <?php

                            } else {
                            ?>
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data</td>
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">List Style </h5>
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
                                                <th>Styke</th>
                                                <th>Aksi</th>
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

<div class="row">

</div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-list-inisial').on('click', function() {
            var noModel = $(this).data('no-model');
            console.log(noModel)
            $.ajax({
                url: 'getInisial',
                type: 'POST',
                data: {
                    no_model: noModel
                },
                dataType: 'json',
                success: function(data) {
                    // Kosongkan tabel sebelum mengisi data baru
                    $('#inisial-list-table').empty();
                    document.getElementById('exampleModalLongTitle').textContent = "Data Perjalanan " + noModel
                    // Loop untuk setiap data inisial dan tambahkan ke tabel
                    var total = data.length
                    var totalPo = 0;

                    document.getElementById('jumInisial').textContent = "Jumlah Style : " + total
                    for (var i = 0; i < data.length; i++) {

                        var link = '<?= base_url("packing/detailperjalanan/") ?>' + data[i].id_inisial;
                        var row = '<tr><td>' + data[i].inisial + '</td><td><a href="' + link + '" class="btn btn-info">Lihat</a>' + '</td></tr>';
                        $('#inisial-list-table').append(row);
                        totalPo += parseFloat(data[i].po_inisial);
                    }
                    document.getElementById('totalPo').textContent = "Total QTY PO : " + totalPo
                }
            });
        });
    });
</script>
<script>
    var selectAllCheckbox = document.getElementById('selectAll');
    selectAllCheckbox.addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.exportCheckbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    function exportSelected() {
        var selectedIds = [];
        var checkboxes = document.querySelectorAll('.exportCheckbox:checked');
        checkboxes.forEach(function(checkbox) {
            selectedIds.push(checkbox.getAttribute('data-id'));
        });

        // Redirect to the export endpoint with selected IDs
        var url = '<?= base_url('export/handprint'); ?>';
        if (selectedIds.length > 0) {
            url += '/' + selectedIds.join(',');
        }
        window.location.href = url;
    }
</script>


<?php $this->endSection(); ?>