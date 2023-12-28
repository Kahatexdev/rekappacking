<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Silahkan Import Data Master Order.!</strong>


                        <br>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-end">
                            <li class="icons dropdown">
                                <a href="<?= base_url('/packing') ?>" class="btn btn-info text-white mx-2">
                                    <i class="icon-arrow-up-circle menu-icon text-white"></i><span class="nav-text"> Import Data Master</span>
                                </a>
                            </li>
                            <li class="icons dropdown">
                                <a href="<?= base_url('packing/flowproses') ?>" class="btn btn-info text-white mx-2">
                                    <i class="icon-chart menu-icon text-white"></i><span class="nav-text my-2"> Input Flow Prosses</span>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    <?= $Header ?>
                </h4>

            </div>
            <div class="card-body">

                <form action="<?= base_url('packing/inputproses') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No Model</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_model" id="no_model" autocomplete="off" placeholder="No Model">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Inisial</label>
                                <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="inisial" name="inisial">
                                        <option value="">Pilih inisial</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">JC</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="style" id="style" readonly placeholder="JC">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">area</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="area" id="area" readonly value="" placeholder="area">
                                </div>
                            </div>


                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 1</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses1" name="proses1">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 2</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses2" name="proses2">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 3</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses3" name="proses3">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 4</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses4" name="proses4">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 5</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses5" name="proses5">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 6</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses6" name="proses6">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 7</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses7" name="proses7">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 8</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses8" name="proses8">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 9</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses9" name="proses9">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 10</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses10" name="proses10">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 11</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses11" name="proses11">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 12</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses12" name="proses12">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 13</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" id="proses13" name="proses13">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 14</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" name="proses14" id="proses14">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"> Proses 15</label>
                                <div class="col-sm-8">
                                    <select class="custom-select mr-sm-2" name="proses15" id="proses15">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-lg-12">
        <div class="card pb-0">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Data Master
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table  table-striped table-bordered vertical-middle zero-configuration" id="tabel">
                        <thead>
                            <tr>
                                <th>No Model</th>
                                <th>Inisial </th>
                                <th>Style </th>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                                <th>P7</th>
                                <th>P8</th>
                                <th>P9</th>
                                <th>P10</th>
                                <th>P11</th>
                                <th>P12</th>
                                <th>P13</th>
                                <th>P12</th>
                                <th>P15</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($Data)) {
                                foreach ($Data as $dt) {
                            ?>
                                    <tr>
                                        <td><?= $dt['no_model'] ?></td>
                                        <td><?= $dt['inisial'] ?></td>
                                        <td><?= $dt['style'] ?></td>
                                        <td><?= $dt['proses_1'] ?></td>
                                        <td><?= $dt['proses_2'] ?></td>
                                        <td><?= $dt['proses_3'] ?></td>
                                        <td><?= $dt['proses_4'] ?></td>
                                        <td><?= $dt['proses_5'] ?></td>
                                        <td><?= $dt['proses_6'] ?></td>
                                        <td><?= $dt['proses_7'] ?></td>
                                        <td><?= $dt['proses_8'] ?></td>
                                        <td><?= $dt['proses_9'] ?></td>
                                        <td><?= $dt['proses_10'] ?></td>
                                        <td><?= $dt['proses_11'] ?></td>
                                        <td><?= $dt['proses_12'] ?></td>
                                        <td><?= $dt['proses_13'] ?></td>
                                        <td><?= $dt['proses_14'] ?></td>
                                        <td><?= $dt['proses_15'] ?></td>




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
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        // Fungsi untuk mendapatkan inisials berdasarkan no_model
        function getInisialsByNoModel(noModel) {
            $.ajax({
                url: 'getInisialByNoModel',
                method: 'POST',
                data: {
                    no_model: noModel
                },
                dataType: 'json',
                success: function(response) {
                    // Tampilkan inisials dalam dropdown/select option
                    var inisials = response.inisials;
                    var options = '<option value="">Pilih Inisial</option>';
                    for (var i = 0; i < inisials.length; i++) {
                        options += '<option value="' + inisials[i].id_inisial + '">' + inisials[i].inisial + '</option>';
                    }
                    $('#inisial').html(options);
                }
            });
        }

        // Event listener untuk input no_model
        $('#no_model').on('input', function() {
            var noModel = $(this).val();
            getInisialsByNoModel(noModel);
        });

        // Event listener untuk select inisial
        $('#inisial').on('change', function() {
            var selectedInisialId = $(this).val();

            // Mengisi nilai input style dan area berdasarkan inisial yang dipilih
            if (selectedInisialId) {
                // Mendapatkan data lebih lanjut dari server berdasarkan id_inisial
                $.ajax({
                    url: 'http://localhost:8080/packing/getDataByIdInisial', // Sesuaikan dengan URL yang benar
                    method: 'POST',
                    data: {
                        id_inisial: selectedInisialId
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Mengisi nilai input style dan area
                        $('#style').val(response.style);
                        $('#area').val(response.area);
                    }
                });
            } else {
                // Reset nilai input style dan area jika inisial tidak dipilih
                $('#style').val('');
                $('#area').val('');
            }
        });
    });
</script>

<?php $this->endSection(); ?>