<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $Judul ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon-16x16.png') ?>">
    <!-- Pignose Calender -->
    <link href=" <?= base_url('assets/plugins/pg-calendar/css/pignose.calendar.min.css') ?>" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href=" <?= base_url('assets/plugins/chartist/css/chartist.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') ?>">

    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/tables/css/datatable/select.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- <script src="<?= base_url('assets\plugins\jquery\jquery.min.js') ?>"> -->

    </script>

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
</head>

<body style="background-color: white; ">
    <div class="container-fluid h-auto">

        <div class="card kertas" style="  background-image: url('<?= base_url('assets/images/bg01.png') ?>'); background-size:cover;">
            <div class="card-header d-flex justify-content-between">
                <button id="exportBtn" onclick="Hide()" class="btn btn-info">Cetak</button>
            </div>
            <div class="card-body hitam">
                <div class="row text-center align-items-center ">
                    <div class="col-lg-1 col-md-2 col-sm-2" style="border: 1px solid;">
                        <img src="<?= base_url('assets/images/loho.png') ?>" style="width: 55px;" alt="">
                        <br>
                        <h5>PT KAHATEX </h5>
                    </div>
                    <div class="col-lg-11  col-md-10 col-sm-10" style="border: 1px solid;">
                        <h3>
                            FORMULIR
                        </h3>
                        <strong>
                            DEPARTEMEN KAOS KAKI

                        </strong>
                        <br>
                        <strong>

                            REKAPAN DATA PRODUKSI
                        </strong>

                    </div>
                </div>

                <div class="flex d-flex justify-content-between">
                    <div>
                        <label for="nodokumen"> No. Dokumen : FOR–KK–612/REV_00/HAL 1/1</label>

                    </div>
                    <div>
                        <label for="tanggal"> Tanggal Revisi : 16 Februari 2021</label>
                    </div>
                </div>


                <div class="row hitam" style="border: 2px solid;">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <table>
                            <tr>
                                <td>
                                    PDK
                                </td>
                                <td>
                                    : <?= $pdk ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Qty PDK
                                </td>
                                <td>
                                    : <?= $poInisial ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Status
                                </td>
                                <td>
                                    : <?=$status?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dibuat Oleh
                                </td>
                                <td>
                                    : <?= $User ?>
                                </td>
                            </tr>

                        </table>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">

                        <table>
                            <tr>
                                <td>
                                    Buyer
                                </td>
                                <td>
                                    : <?= $buyer ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Area
                                </td>
                                <td>
                                    : <?= $area ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    No Order
                                </td>
                                <td>
                                    : <?= $no_order ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Export
                                </td>
                                <td>
                                    :
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>
                <div class="row">

                    <div class="table-responsive">

                        <table class="table-bordered text-center w-100" id="myTable" style="color:black; ">
                            <thead>
                                <tr>
                                    <th rowspan="2">Style</th>
                                    <th rowspan="2">Inisial</th>
                                    <th rowspan="2">Colour</th>
                                    <th rowspan="2">QTY (dz)</th>
                                    <th colspan="5">Prod (dz)</th>
                                    <th colspan="3">Perbaikan (dz)</th>
                                    <th colspan="2">Stocklot (dz)</th>
                                    <th colspan="3">Gudang Setting (dz)</th>
                                    <th rowspan="2">Deffect After Gudang</th>
                                    <th rowspan="2">Tagihan MC</th>
                                    <th rowspan="2">Lebih Mesin</th>
                                    <th rowspan="2">BS Belum Ganti</th>
                                    <th rowspan="2">(+) Packing</th>
                                    <th rowspan="2">Total</th>
                                    <th rowspan="2">Keterangan</th>

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
                                            <td><?= $Data['colour'] ?></td>
                                            <td class="qty"><?= $Data["po_inisial"] ?></td>
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
                                            <td class="deffectAfterGudang"><?= round(number_format($Data["proses"]["deffect"], 1, '.', ''))  ?></td>
                                            <td class="tagihanMesin"><?= round(number_format($Data["proses"]["tagihanMesin"], 1, '.', ''))  ?></td>
                                            <td class="lebihMesin"><?= round(number_format($Data["proses"]["lebihMesin"], 1, '.', ''))  ?></td>
                                            <td class="BsBelumGanti"><?= round(number_format($Data["proses"]["bsBelumGanti"], 1, '.', ''))  ?></td>
                                            <td class="plusPacking">
                                                <?= $Data["proses"]["plusPacking"]; ?>
                                            </td>
                                            <td class="totalAmount">

                                                <?= $Data["proses"]["totalPacking"]; ?>
                                            </td>
                                            <td class=""><?= $Data["proses"]["ket"]; ?></td>


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
                                <tr>
                                    <td colspan="3"> Total per Storage</td>
                                    <td id="totalQty"> <?= $poInisial ?> </td>
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
                                    <td id="totalDeffectAfterGudang"> </td>
                                    <td id="totalTagihanMesin"> </td>
                                    <td id="totalLebihMesin"> </td>
                                    <td id="totalBsBelumGanti"> </td>
                                    <td id="totalPlusPacking">0 </td>
                                    <td id="totalAmount"> 0</td>
                                    <td id="persentase"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- <div class="card-footer align-items-center text-center">
                <table border="0" class="table " style="color:black">
                    <thead class="px-2 p-y-2">
                        <th class="px-2 p-y-2"> MNG. Packing</th>
                        <th>MNG. MESIN</th>
                        <th> KEPALA AREA</th>
                        <th> MNG.ROSSO & SETTING</th>
                        <th> KEPALA GUDANG</th>
                        <th> PLANNER MESIN</th>
                        <th>DISETUJUI OLEH</th>
                        <th> DISETUJUI OLEH</th>
                        <th> MENGETAHUI</th>
                    </thead>
                    <tbody>
                        <tr class="px-2 p-y-2" style="width: 100; height: 50px;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>(.........................................)</td>
                            <td>(.........................................)</td>
                            <td>(.........................................)</td>
                            <td>(.........................................)</td>
                            <td>(.........................................)</td>
                            <td>(.........................................)</td>
                            <td>(.........................................)</td>

                            <td>Mr.Willy</td>
                            <td>(.........................................)</td>

                        </tr>
                        <tr>
                            <td colspan="9">
                                ket: Data sisa tersebut merupakan sisa label yang belum keluar pada system ERP, tidak menutup kemungkinan jika barang lolos tidak terinput oleh user. Dengan itu dimohon management setiap bagian untuk cek pada area kerja masing-masing untuk menghindari tertinggalnya barang
                            </td>
                        </tr>
                    </tbody>

                </table>


            </div> -->
        </div>
    </div>

    <script>
        function Hide() {
            document.getElementById('exportBtn').classList.add("d-none");
            window.print()
        }
    </script>

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
        var deffectAfterGudangElements = document.querySelectorAll('.deffectAfterGudang');
        var tagihanMesinElements = document.querySelectorAll('.tagihanMesin');
        var lebihMesinElements = document.querySelectorAll('.lebihMesin');
        var BsBelumGantiElements = document.querySelectorAll('.BsBelumGanti');
        var plusPackingElements = document.querySelectorAll('.plusPacking');
        var totalAmountElements = document.querySelectorAll('.totalAmount');

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
        var totalDeffectAfterGudang = accumulateValues(deffectAfterGudangElements)
        var totalTagihanMesin = accumulateValues(tagihanMesinElements)
        var totalLebihMesin = accumulateValues(lebihMesinElements)
        var totalBsBelumGanti = accumulateValues(BsBelumGantiElements)
        var totalPlusPacking = accumulateValues(plusPackingElements)
        var totalAmount = accumulateValues(totalAmountElements)

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
        document.getElementById('totalDeffectAfterGudang').textContent = totalDeffectAfterGudang;
        document.getElementById('totalTagihanMesin').textContent = totalTagihanMesin;
        document.getElementById('totalLebihMesin').textContent = totalLebihMesin;
        document.getElementById('totalBsBelumGanti').textContent = totalBsBelumGanti;
        document.getElementById('totalPlusPacking').textContent = totalPlusPacking;
        document.getElementById('totalAmount').textContent = totalAmount;

        var totalQty = document.getElementById('totalQty').textContent
        var persen = (totalPlusPacking / totalQty) * 100
        document.getElementById('persentase').textContent = persen.toFixed(2) + "%"
        // Ambil semua elemen dengan kelas 'totalInput'
        var inputs = document.querySelectorAll('#myTable .totalInput');

        // Inisialisasi total
        var total = 0;

        // Iterasi melalui setiap input dan tambahkan nilainya ke total
        inputs.forEach(function(input) {
            input.addEventListener('input', function() {
                total = 0; // Reset total sebelum menghitung ulang
                inputs.forEach(function(input) {
                    total += parseFloat(input.value); // Tambahkan nilai input ke total
                });
                document.getElementById('totalAmount').innerText = total; // Perbarui teks total
            });
        });
    </script>
    <script>
        // Ambil semua elemen dengan kelas 'totalInput'
        var inputs = document.querySelectorAll('#myTable .plusPacking');

        // Inisialisasi total
        var total = 0;

        // Iterasi melalui setiap input dan tambahkan nilainya ke total
        inputs.forEach(function(input) {
            input.addEventListener('input', function() {
                total = 0; // Reset total sebelum menghitung ulang
                inputs.forEach(function(input) {
                    total += parseFloat(input.value); // Tambahkan nilai input ke total
                });
                document.getElementById('totalPlusPacking').innerText = total; // Perbarui teks total
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editable').on('change', function() {
                var id = $(this).data('id');
                var field = $(this).data('field');
                var value = $(this).val();

                // Mengirim data ke server menggunakan AJAX
                $.ajax({
                    url: '<?= site_url('packing/saveRekap') ?>', // URL endpoint untuk memperbarui data
                    type: 'POST',
                    dataType: 'json', // Menentukan tipe data yang diharapkan dari server
                    data: JSON.stringify({ // Mengubah data menjadi format JSON
                        id: id,
                        field: field,
                        value: value
                    }),
                    success: function(response) {
                        alert('Data berhasil diperbarui');
                        // Lakukan tindakan lain setelah data diperbarui jika diperlukan
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            });
        });
    </script>

    <script src="<?= base_url('assets/plugins/common/common.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/settings.js') ?>"></script>
    <script src="<?= base_url('assets/js/gleek.js') ?>"></script>
    <script src="<?= base_url('assets/js/styleSwitcher.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>

    <script src="<?= base_url('assets/plugins/tables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Chartjs -->

    <script src="<?= base_url('assets/plugins/chart.js/Chart.bundle.min.js') ?>"></script>
    <!-- Circle progress -->
    <script src="<?= base_url('assets/plugins/circle-progress/circle-progress.min.js') ?>"></script>
    <!-- Datamap -->
    <script src="<?= base_url('assets/plugins/d3v3/index.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/topojson/topojson.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datamaps/datamaps.world.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dashboard/dashboard-1.js') ?>"></script>

    <!-- Morrisjs -->
    <script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/morris/morris.min.js') ?>"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/pg-calendar/js/pignose.calendar.min.js') ?>"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url('assets/plugins/chartist/js/chartist.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') ?>"></script>







</body>

</html>