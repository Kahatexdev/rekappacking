<?php $this->extend('Ppc/layout'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        Master Data
                    </h4>

                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <script>
                            $(document).ready(function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: '<?= session()->getFlashdata('success') ?>',
                                });
                            });
                        </script>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <script>
                            $(document).ready(function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: '<?= session()->getFlashdata('error') ?>',
                                });
                            });
                        </script>
                    <?php endif; ?>
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Request (+)</a>
                        </li>
                        <li class="nav-item"><a href="#navpills-2" class="nav-link " data-toggle="tab" aria-expanded="false">Approved</a>
                        </li>
                        <li class="nav-item"><a href="#navpills-3" class="nav-link " data-toggle="tab" aria-expanded="false">Decline</a>
                        </li>
                      
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="navpills-1" class="tab-pane active">
                            <div class="row align-items-center">
                                <div class="table-responsive">

                                    <table class="table responsive table-striped table-bordered vertical-middle " id="tabel">
                                        <thead>
                                            
                                                <th>No Model</th>
                                                <th>Lihat Permintaan</th>
                                           
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($DataRequest)) {
                                                foreach ($DataRequest as $dt) {
                                            ?>
                                                    <tr>
                                                        <td data-id="<?= $dt['no_model'] ?>">
                                                        <?= $dt['no_model'] ?>
                                                        </td>

                                                        <td>
                                                            <form action="<?= base_url('ppc/detailrequest/' . $dt['no_model']); ?>" id="" method="post">
                                                                <button type="submit" class="btn btn-success detail text-white  ">Lihat</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="navpills-2" class="tab-pane ">
                            <div class="row align-items-center">
                                <div class="table-responsive">

                                    <table class="table responsive table-striped table-bordered vertical-middle zero-configuration" id="tabel" name="tabel2">
                                        <thead>
                                                <th>No Model</th>
                                                <th>Aksi </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($DataApprove)) {
                                                foreach ($DataApprove as $dt) {
                                            ?>
                                                <tr>
                                                        <td data-id="<?= $dt['no_model'] ?>">
                                                        <?= $dt['no_model'] ?>
                                                
                                                        </td>
                                                <td>

                                                    <a href="<?= base_url('ppc/export/' . $dt['no_model']); ?>" class="btn btn-success detail text-white  ">Lihat</a>
                                                </td>
                                                 
                                                 </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                              </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="navpills-3" class="tab-pane ">
                            <div class="row align-items-center">
                                <div class="table-responsive">

                                    <table class="table responsive table-striped table-bordered vertical-middle " id="tabel" name="tabel3">
                                        <thead>
                                                <th>No Model</th>
                                                <th>Aksi </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($DataDecline)) {
                                                foreach ($DataDecline as $dt) {
                                            ?>
                                                <tr>
                                                        <td data-id="<?= $dt['no_model'] ?>">
                                                        <?= $dt['no_model'] ?>
                                                
                                                        </td>

                                                        <td>
                                                           
                                                                <a href="<?= base_url('ppc/detailrequest/' . $dt['no_model']); ?>" class="btn btn-success detail text-white  ">Lihat</a>
                                                 
                                                        </td>
                                                 </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                              </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->endSection(); ?>