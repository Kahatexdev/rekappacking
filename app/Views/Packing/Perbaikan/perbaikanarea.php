<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>


<div class="row ">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Data Perbaikan Area
                </h4>
                <div>
                    <a href="<?= base_url('packing/details/' .  $no_model) ?>" class="btn btn-info text-white shadow"> <i class="icon-arrow-left"></i>
                        Kembali
                    </a>

                </div>
            </div>

            <div class="card-body">
                <div class="d-flex flex justify-content-between mx-3">

                    <div class="col-lg-6">
                        <label for="selectAll">Select All: </label>
                        <input type="checkbox" id="selectAll" onchange="toggleCheckAll()"> Check All
                    </div>
                    <div class="d-flex ">

                        <button id="exportBtn" onclick="exportSelected()" class="btn btn-success text-white"> <i class="icon-doc"></i> Export Selected to PDF</button>
                    </div>

                </div>
                <div class="table-responsive">

                    <table class="table  table-striped table-bordered vertical-middle zero-configuration" id="productionTable">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Tgl Produksi</th>
                                <th>Storage Awal</th>
                                <th>Storage Akhir</th>
                                <th>No PDK</th>
                                <th>Inisial</th>
                                <th>Style</th>
                                <th>Colour</th>
                                <th>QTY</th>
                                <th>No Box</th>
                                <th>No Label</th>
                                <th>Tgl Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($Data)) {

                            ?>
                                <?php foreach ($Data as $Data) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="exportCheckbox" data-id="<?= $Data['id_production']; ?>"></td>
                                        <td><?= $Data['tgl_prod'] ?></td>
                                        <td><?= $Data['bagian'] ?></td>
                                        <td><?= $Data['storage_akhir'] ?></td>
                                        <td><?= $Data['no_model'] ?></td>
                                        <td><?= $Data['inisial'] ?></td>
                                        <td><?= $Data['style'] ?></td>
                                        <td><?= $Data['colour'] ?></td>
                                        <td><?= $Data['qty_prod'] ?></td>
                                        <td><?= $Data['no_box'] ?></td>
                                        <td><?= $Data['no_label'] ?></td>
                                        <td><?= $Data['tgl_upload'] ?></td>


                                    </tr>
                                <?php endforeach ?>
                            <?php

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
                    </form>


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