<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

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
                                    <input type="text" class="form-control" name="no_model" id="no_model" placeholder="No Model">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Inisial</label>
                                <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="inisial">
                                        <option selected="selected"> </option>
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">JC</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jc" id="jc" readonly placeholder="JC">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
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
                                    <select class="custom-select mr-sm-2" id="proses1">
                                        <option selected="selected"> </option>
                                        <?php foreach ($Proses as $prs) : ?>
                                            <option value="<?= $prs['nama_proses'] ?>"><?= $prs['nama_proses'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->endSection(); ?>