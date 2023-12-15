<?php $this->extend('User/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Notes!</strong>


                        Silahkan Upload disini

                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-end">
                            <li class="icons dropdown">
                                <a href="<?= base_url('user/rosso') ?>" class="btn btn-info text-white mx-2">
                                    <i class="icon-arrow-up-circle menu-icon text-white"></i><span class="nav-text"> Import Produksi</span>
                                </a>
                            </li>
                            <li class="icons dropdown">
                                <a href="<?= base_url('user/rosso/data') ?>" class="btn btn-info text-white mx-2">
                                    <i class="icon-chart menu-icon text-white"></i><span class="nav-text my-2"> Data Produksi</span>
                                </a>
                            </li>
                        </div>
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
                    Form Input data produksi
                </h4>

            </div>
            <div class="card-body">
                <form>
                    <div class="row">

                        <div id="droparea" class="border rounded d-flex justify-content-center align-item-center mx-3" style="height:200px; width: 100%; cursor:pointer;">
                            <div class="text-center mt-5">
                                <i class="icon-cloud-upload" style="font-size: 48px;">

                                </i>
                                <p class="mt-3" style="font-size: 28px;">
                                    Upload file here
                                </p>
                            </div>
                        </div>
                        <input type="file" id="fileElem" class="form-control mx-3">
                </form>
                <button type="submit" class="btn btn-info btn-block mx-3"> Simpan</button>
            </div>
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


<script>
    let dropArea = document.getElementById("drop-area");

    ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    ["dragenter", "dragover"].forEach((eventName) => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ["dragleave", "drop"].forEach((eventName) => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    dropArea.addEventListener("drop", handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        dropArea.classList.add("highlight");
    }

    function unhighlight(e) {
        dropArea.classList.remove("highlight");
    }

    function handleDrop(e) {
        let dt = e.dataTransfer;
        let files = dt.files;
        handleFiles(files);
    }

    function handleFiles(files) {
        [...files].forEach(uploadFile);
    }

    function uploadFile(file) {
        console.log("Uploading", file.name);
    }

    dropArea.addEventListener("click", () => {
        fileElem.click();
    });

    let fileElem = document.getElementById("fileElem");
    fileElem.addEventListener("change", function(e) {
        handleFiles(this.files);
    });
</script>
<?php $this->endSection(); ?>