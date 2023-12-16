<?php $this->extend('Admin/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">

        <div class="card pb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <i class="icon-info menu-icon"></i> <strong>Notes!</strong>



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

                        <div id="drop-area" class="border rounded d-flex justify-content-center align-item-center mx-3" style="height:200px; width: 100%; cursor:pointer;">
                            <div class="text-center mt-5">
                                <i class="icon-cloud-upload" style="font-size: 48px;">

                                </i>
                                <p class="mt-3" style="font-size: 28px;">
                                    Upload file here
                                </p>
                            </div>
                        </div>
                        <input type="file" id="fileInput" multiple accept=".xls , xlsx" class="form-control mx-3">
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
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('file-input');

    // Prevent default behavior for drag and drop events
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight drop area when file is dragged over
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    // Remove highlight when file is dragged out
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Handle dropped files
    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('highlight');
    }

    function unhighlight() {
        dropArea.classList.remove('highlight');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);
    }

    function handleFiles(files) {
        // Handle uploaded files here
        for (const file of files) {
            if (isExcelFile(file)) {
                // You can perform additional processing or upload to server here
                console.log('Excel file:', file.name);
            } else {
                alert('Please upload a valid Excel file.');
            }
        }
    }

    function isExcelFile(file) {
        return file.type === 'application/vnd.ms-excel' || file.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    }
</script>

<?php $this->endSection(); ?>