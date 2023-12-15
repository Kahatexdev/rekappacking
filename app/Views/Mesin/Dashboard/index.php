<?php $this->extend('Mesin/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <i class="icon-info menu-icon"></i> <strong>INGAT!</strong>


                Pesan atau notif disini


            </div>
        </div>

    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Form Input data produksi
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

                                <div class="custom-file mx-3">
                                    <input type="file" class="custom-file-input ">
                                    <label class="custom-file-label">Import Excel</label>
                                </div>

                            </div>
                        </div>
                </form>
                <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
            </div>

        </div>
    </div>
</div>
</div>

<div class="row" id="card-container">
    <!-- looping disini -->

    <!-- endloop -->


</div>
</div>



<?php $this->endSection(); ?>