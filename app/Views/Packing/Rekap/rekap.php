<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>
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
                                <th> Status </th>
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
                                            <form action="<?= base_url('packing/detailrekap/' . $Item['no_model']); ?>" id="" method="post">
                                                <button type="submit" class="btn btn-success detail text-white  ">Request Tambahan</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?= $Item['status'] ?>
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