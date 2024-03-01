<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Rekap Data <?= $pdk ?></h4>
        <a href="" target="_blank" class="btn btn-info">Simpan Data</a>
    </div>
    <div class="card-body border">
        <div class="row text-center align-items-center border">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <img src="<?= base_url('assets/images/loho.png') ?>" class="w-50" alt="">
                <br>
                <b> PT KAHATEX </b>
            </div>
            <div class="col-lg-10  col-md-10 col-sm-10">
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
        <div class="row border rounded">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="label py-0 mt-2 mb-0">

                    <label for="nodokumen"> No. Dokumen : FOR–KK–612/REV_00/HAL 1/1</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-left">
                <div class="label py-0 mt-2 mb-0 ">

                    <label for="tanggl"> Tanggal Revisi : 16 Februari 2021</label>
                </div>
            </div>
        </div>
        <div class="row border">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="label py-0 mt-2 mb-0">

                    <label for="no_model"> PDK : <?= $pdk ?></label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty" id="total"> Total Qty PDK : <?= $poInisial ?></label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="desc"> Description :

                    </label>
                    <input type="text" name="desc" id="" class="form-control form-control-sm">
                </div>
                <div class="label py-0 mt-2 mb-0">

                    <label for="user"> Dibuat Oleh : <?= $User ?></label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="label py-0 mt-2 mb-0">

                    <label for="qty"> Buyer : <?= $buyer ?> </label>
                </div>
                <div class="label py-0 mb-0">

                    <label for="no_model"> Area : <?= $area ?></label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty"> No Order : <?= $no_order ?></label>
                </div>
                <div class="label py-0  mb-0">

                    <label for="qty"> Export : </label>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table-striped text-center w-100" border="1" id="myTable" style=" background-image: url('<?= base_url('assets/images/bg5.png') ?>');
            background-size: cover; ">
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
                        <?php foreach ($header_prod as $key => $value) : ?>
                            <th><?= $value ?></th>
                        <?php endforeach ?>
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
                                <td class="qty"><?= $Data["po_inisial"] ?></td>
                                <td><?= $Data['colour'] ?></td>
                                <td class="mesin"><?= round(number_format($Data["proses"][$header_prod[0]], 1, '.', ''))  ?></td>
                                <td class="sisaRosso"><?= round(number_format($Data["proses"][$header_prod[1]], 1, '.', ''))  ?></td>
                                <td class="rosso"><?= round(number_format($Data["proses"][$header_prod[2]], 1, '.', ''))  ?></td>
                                <td class="sisaSetting"><?= round(number_format($Data["proses"][$header_prod[3]], 1, '.', ''))  ?></td>
                                <td class="setting"><?= round(number_format($Data["proses"][$header_prod[4]], 1, '.', ''))  ?></td>
                                <td class="perbaikanIn"><?= round(number_format($Data["proses"]["perbaikanIn"], 1, '.', ''))  ?></td>
                                <td class="perbaikanOut"><?= round(number_format($Data["proses"]["perbaikanOut"], 1, '.', ''))  ?></td>
                                <td class="sisaPerbaikan"><?= round(number_format($Data["proses"]["sisaPerbaikan"], 1, '.', ''))  ?></td>
                                <td class="pbstc"><?= round(number_format($Data["proses"]["pbstc"], 1, '.', ''))  ?></td>
                                <td class="stocklot"><?= round(number_format($Data["proses"]["other"], 1, '.', ''))  ?></td>

                                <td class="gsIn"><?= round(number_format($Data["proses"]["gsIn"], 1, '.', ''))  ?></td>
                                <td class="gsOut"><?= round(number_format($Data["proses"]["gsOut"], 1, '.', ''))  ?></td>
                                <td class="sisaGudang"><?= round(number_format($Data["proses"]["sisaGudang"], 1, '.', ''))  ?></td>
                                <td class="tagihanMesin"><?= round(number_format($Data["proses"]["tagihanMesin"], 1, '.', ''))  ?></td>
                                <td class="lebihMesin"><?= round(number_format($Data["proses"]["lebihMesin"], 1, '.', ''))  ?></td>
                                <td class="BsBelumGanti">0</td>
                                <td class="">
                                    <input type="text" class="form-control form-control-sm" name="idInisial" hidden value="<?= $Data["proses"]["idInisial"] ?>">
                                    <input type="number" class="form-control form-control-sm" id="plusPacking" oninput="" value="0">
                                </td>
                                <td class="">
                                    <input type="number" class="form-control form-control-sm" id="totalPacking" oninput="" value="0">
                                </td>
                                <td class=""><input type="text" class="form-control"></td>

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
                <tfoot>
                    <td colspan="4"> Total per Storage</td>
                    <td id="totalMesin"> </td>
                    <td id="totalSisaRosso"> </td>
                    <td id="totalRosso"> </td>
                    <td id="totalSisaSetting"> </td>
                    <td id="totalSetting"> </td>
                    <td id="totalPerbaikanIn"> </td>
                    <td id="totalPerbaikanOut"> </td>
                    <td id="totalSisaPerbaikan"> </td>
                    <td id="totalPBSTC"> </td>
                    <td id="totalStocklot"> </td>
                    <td id="totalGsIn"> </td>
                    <td id="totalGsOut"> </td>
                    <td id="totalSisaGudang"> </td>
                    <td id="totalTagihanMesin"> </td>
                    <td id="totalLebihMesin"> </td>
                    <td id="totalBsBelumGanti"> </td>
                </tfoot>
            </table>
        </div>

    </div>
</div>

<script>
    var mesinElements = document.querySelectorAll('.mesin');
    var sisaRossoElements = document.querySelectorAll('.sisaRosso');
    var rossoElements = document.querySelectorAll('.rosso');
    var sisaSettingElements = document.querySelectorAll('.sisaSetting');
    var settingElements = document.querySelectorAll('.setting');
    var perbaikanInElements = document.querySelectorAll('.perbaikanIn');
    var perbaikanOutElements = document.querySelectorAll('.perbaikanOut');
    var sisaPerbaikanElements = document.querySelectorAll('.sisaPerbaikan');
    var pbstcElements = document.querySelectorAll('.pbstc');
    var stocklotElements = document.querySelectorAll('.stocklot');
    var gsInElements = document.querySelectorAll('.gsIn');
    var gsOutElements = document.querySelectorAll('.gsOut');
    var sisaGudangElements = document.querySelectorAll('.sisaGudang');
    var tagihanMesinElements = document.querySelectorAll('.tagihanMesin');
    var lebihMesinElements = document.querySelectorAll('.lebihMesin');
    var BsBelumGantiElements = document.querySelectorAll('.BsBelumGanti');

    // Fungsi untuk mengakumulasi nilai dari elemen-elemen
    function accumulateValues(elements) {
        var total = 0;
        elements.forEach(function(element) {
            total += parseFloat(element.textContent); // Mengkonversi teks ke angka dan menjumlahkannya
        });
        return total;
    }

    // Akumulasi nilai untuk setiap kolom
    var totalMesin = accumulateValues(mesinElements);
    var totalSisaRosso = accumulateValues(sisaRossoElements);
    var totalRosso = accumulateValues(rossoElements);
    var totalSisaSetting = accumulateValues(sisaSettingElements)
    var totalSetting = accumulateValues(settingElements)
    var totalPerbaikanIn = accumulateValues(perbaikanInElements)
    var totalPerbaikanOut = accumulateValues(perbaikanOutElements)
    var totalSisaPerbaikan = accumulateValues(sisaPerbaikanElements)
    var totalStocklot = accumulateValues(stocklotElements);
    var totalPBSTC = accumulateValues(pbstcElements);
    var totalGsIn = accumulateValues(gsInElements);
    var totalGsOut = accumulateValues(gsOutElements)
    var totalSisaGudang = accumulateValues(sisaGudangElements)
    var totalTagihanMesin = accumulateValues(tagihanMesinElements)
    var totalLebihMesin = accumulateValues(lebihMesinElements)
    var totalBsBelumGanti = accumulateValues(BsBelumGantiElements)

    // Set nilai total ke elemen-elemen <td> di bagian <tfoot>
    document.getElementById('totalMesin').textContent = totalMesin;
    document.getElementById('totalSisaRosso').textContent = totalSisaRosso;
    document.getElementById('totalRosso').textContent = totalRosso;
    document.getElementById('totalSisaSetting').textContent = totalSisaSetting;
    document.getElementById('totalSetting').textContent = totalSetting;
    document.getElementById('totalPerbaikanIn').textContent = totalPerbaikanIn;
    document.getElementById('totalPerbaikanOut').textContent = totalPerbaikanOut;
    document.getElementById('totalSisaPerbaikan').textContent = totalSisaPerbaikan;
    document.getElementById('totalPBSTC').textContent = totalPBSTC;
    document.getElementById('totalStocklot').textContent = totalStocklot;
    document.getElementById('totalGsIn').textContent = totalGsIn;
    document.getElementById('totalGsOut').textContent = totalGsOut;
    document.getElementById('totalSisaGudang').textContent = totalSisaGudang;
    document.getElementById('totalTagihanMesin').textContent = totalTagihanMesin;
    document.getElementById('totalLebihMesin').textContent = totalLebihMesin;
    document.getElementById('totalBsBelumGanti').textContent = totalBsBelumGanti;
</script>

<?php $this->endSection(); ?>