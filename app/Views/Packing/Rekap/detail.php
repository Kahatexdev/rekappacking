<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Rekap Data <?= $pdk ?></h4>
        <a href="" class="btn btn-info">Export Data</a>
    </div>
    <div class="card-body ">
        <div class="row text-center align-items-center border">
            <div class="col-lg-2 ">
                <img src="<?= base_url('assets/images/loho.png') ?>" class="w-50" alt="">
                <br>
                <b> PT KAHATEX </b>
            </div>
            <div class="col-lg-10  ">
                <h5>
                    FORMULIR
                </h5>
                <strong>
                    DEPARTEMEN KAOS KAKI

                </strong>
                <br>
                <strong>

                    REKAPAN DATA PRODUKSI
                </strong>

            </div>
        </div>
        <div class="row border">
            <div class="col-lg-6">
                <div class="label py-0 mt-2 mb-0">

                    <label for="nodokumen"> No. Dokumen : FOR–KK–612/REV_00/HAL 1/1</label>
                </div>
            </div>
            <div class="col-lg-6 text-left">
                <div class="label py-0 mt-2 mb-0 ">

                    <label for="tanggl"> Tanggal Revisi : 16 Februari 2021</label>
                </div>
            </div>
        </div>
        <div class="row border">
            <div class="col-lg-4">
                <div class="label py-0 mt-2 mb-0">

                    <label for="no_model"> PDK : <?= $pdk ?></label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty" id="total"> Total Qty PDK :</label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty"> Description : Desc</label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="user"> Dibuat Oleh : <?= $User ?></label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="label py-0 mt-2 mb-0">

                    <label for="no_model"> No Order : <?= $no_order ?></label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty"> Buyer : <?= $buyer ?> </label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="label py-0 mt-2 mb-0">

                    <label for="no_model"> Area : </label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty"> Order : </label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty"> Export : </label>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table-responsive text-center" border="1" id="myTable">
                <thead>
                    <tr>
                        <th rowspan="2">Style</th>
                        <th rowspan="2">Inisial</th>
                        <th rowspan="2">QTY (dz)</th>
                        <th rowspan="2">Colour</th>
                        <th colspan="5">Prod (dz)</th>
                        <th colspan="3">Perbaikan (dz)</th>
                        <th colspan="2">Stocklot (dz)</th>
                        <th colspan="3">Gudang Setting (dz)</th>
                        <th rowspan="2">Tagihan MC</th>
                        <th rowspan="2">Lebih Mesin</th>
                        <th rowspan="2">BS Belum Ganti</th>
                        <th rowspan="2">(+) Packing</th>
                        <th rowspan="2">Total</th>
                        <th rowspan="2">Ket</th>

                    </tr>
                    <tr>
                        <th>Mesin</th>
                        <th>Sisa Rosso</th>
                        <th>Rosso</th>
                        <th>Sisa Setting</th>
                        <th>Setting</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Sisa </th>
                        <th>PB Stc</th>
                        <th>Other</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($inisial)) {

                    ?>
                        <?php foreach ($inisial as $Data) : ?>
                            <tr>
                                <td><?= $Data['style'] ?></td>
                                <td><?= $Data['inisial'] ?></td>
                                <td class="qty"><?= $Data['qtyIns'] ?></td>
                                <td><?= $Data['colour'] ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td class="total">0</td>
                                <td>-</td>

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
        </div>

    </div>
</div>

<script>
    function loop() {
        var table = document.getElementById('myTable')
        var rowCount = table.rows.length;
        for (let i = 1; i <= rowCount; i++) {
            let value = table.rows[i].querySelector('.qty').value; // Mengambil data dari sel ke-3 (index 2) di setiap baris
            console.log("Baris ke " + i + " nilainya " + value);
        }
    }
    loop()
</script>

<?php $this->endSection(); ?>