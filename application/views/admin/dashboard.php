<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('admin/_partials/head.php') ?>

</head>

<body>
    <main class="main">
        <?php $this->load->view('admin/_partials/side_nav.php') ?>

        <div class="container-fluid mt-n1">

            <!-- Judul -->
            <div class="alert bg-secondary text-white font-weight-bold text" role="alert">
                <i class="fas fa-fw fa-tachometer-alt mr-1"></i>
                Dashboard
            </div>
            <!-- End -->

            <!-- Content Dashboard -->
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Selamat Datang!</h4>
                <p>Selamat Datang <strong><?= htmlentities($current_user->name) ?></strong> di Sistem Infomasi Akademik <strong>KAMPUSKU</strong></p>
                <hr>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-project-diagram"></i>
                    Control Panel
                </button>
                <!-- End Button trigger modal -->

            </div>
            <!-- End Content Dashboard -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lgt">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <i class="fas fa-project-diagram"></i>
                                Control Panel
                            </h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span><span class="sr-only">Close</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <!-- Program Studi -->
                                <div class="card col-md-4t bg-info text-white" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-graduation-cap mr-2 fa-3x"></i>
                                        </div>
                                        <h5 class="card-title">Program Studi</h5>
                                        <div class="display-count"><?= $prodi_total ?></div>
                                        <a href="<?= base_url('admin/prodi') ?>">
                                            <p class="card-text  text-white">Lihat Detail
                                                <i class="fas fa-angle-double-right ml-2"></i>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Program Studi -->

                                <!-- Mata Kuliah -->
                                <div class="card col-md-4t bg-info text-white" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-book fa-3x mr-2"></i>
                                        </div>
                                        <h5 class="card-title">Mata Kuliah</h5>
                                        <div class="display-count"><?= $matkul_total ?></div>
                                        <a href="<?= base_url('admin/matkul') ?>">
                                            <p class="card-text  text-white">Lihat Detail
                                                <i class="fas fa-angle-double-right ml-2"></i>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Mata Kuliah -->

                                <!-- Mahasiswa -->
                                <div class="card col-md-4t bg-info text-white" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-user-graduate fa-3x mr-2"></i>
                                        </div>
                                        <h5 class="card-title">Mahasiswa</h5>
                                        <div class="display-count"><?= $mahasiswa_total ?></div>
                                        <a href="<?= base_url('admin/mahasiswa') ?>">
                                            <p class="card-text  text-white">Lihat Detail
                                                <i class="fas fa-angle-double-right ml-2"></i>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Mahasiswa -->

                                <!-- KRS -->
                                <div class="card col-md-4t bg-info text-white" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-address-card fa-3x mr-2"></i>
                                        </div>
                                        <h5 class="card-title">KRS</h5>
                                        <div class="display-count"><?= $krs_total ?></div>
                                        <a href="<?= base_url('admin/krs') ?>">
                                            <p class="card-text  text-white">Lihat Detail
                                                <i class="fas fa-angle-double-right ml-2"></i>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <!-- End KRS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <?php $this->load->view('admin/_partials/footer.php') ?>
        </div>
    </main>
</body>

</html>