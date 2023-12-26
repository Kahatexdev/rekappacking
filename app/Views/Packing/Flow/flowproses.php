<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>INGAT!</strong>


                        <br> Silahkan Import Data Master Order.
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
                                <a href="<?= base_url('packing/inputmasterflow') ?>" class="btn btn-info text-white mx-2">
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
                <form>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No Order</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="No Order">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No Model</label>
                                <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected="selected"> </option>
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Material Type</label>
                                <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected="selected"> </option>
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Style Size</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Style Size">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">GW</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="GW">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Inisial</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="Inisial">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info btn-block">Simpan</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-danger btn-block">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->endSection(); ?>