<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>
<style type="text/css">
    @media print {
        @page {
            size: landscape;
        }
    }

    .hitam {
        color: black;
        border-color: black;
    }

    .kertas {
        height: 1000px;
    }
</style>
<div class="card hitam">
    <div class="card-header">
        <h4>Data Perjalanan <?= $noModel ?></h4>
    </div>
    <div class="card-body">

        <div class="row">
            <!-- loop here? -->

            <div class="col-lg-12 mx-3 border solid">
                <div class="row">
                    <div class="col-lg-2">
                        <h5>Style </h5>
                    </div>
                    <div class="col-lg-10">

                        <h5>: <?= $style ?></h5>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <h5>Warna </h5>
                    </div>
                    <div class="col-lg-10">

                        <h5>: <?= $warna ?></h5>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <table class=" table-bordered text-center w-100">
                            <th> No Label</th>
                            <th> No Box</th>
                            <?php foreach ($header as $key => $value) : ?>
                                <th><?= $value ?></th>
                            <?php endforeach ?>
                            <?php foreach ($dataProd as $value) : ?>
                                <tr>

                                    <td><?= $value['no_label'] ?></td>
                                    <td><?= $value['no_box'] ?></td>
                                    <td><?= $value['mesin'] ?></td>
                                    <td><?= $value['rosso'] ?></td>
                                    <td><?= $value['setting'] ?></td>
                                    <td><?= $value['gudang'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php $this->endSection(); ?>