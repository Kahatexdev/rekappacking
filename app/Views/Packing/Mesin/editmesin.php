<?php $this->extend('Packing/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <i class="icon-info menu-icon"></i> <strong>Notes!</strong>

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
                <div class="text-bold">
                    <a href="<?= base_url('admin/datamesin') ?>" aria-expanded="false" class="btn btn-info">
                        <i class="icon-back menu-icon"></i><span class="nav-text"> Kembali</span>
                    </a>
                </div>
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