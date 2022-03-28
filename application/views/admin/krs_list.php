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
                <i class="fas fa-address-card mr-1"></i>
                List Data KRS
            </div>
            <!-- End -->

            <div class="toolbar">
                <a href="<?= site_url('tambah-data-krs-baru') ?>" class="btn btn-danger" role="button"><i class="fa fa-plus fa-sm mr-1"></i>Tambah Data Krs</a>
            </div>

            <table class="table table-bordered table-striped table-hover mt-2">
                <tr>
                    <th>Kode Krs</th>
                    <th>Kode Semester</th>
                    <th>Kode Nilai</th>
                    <th>Nim</th>
                    <th>Kode Matkul</th>
                    <th>Nilai</th>
                    <th>Lulus</th>
                    <th colspan="2">AKSI</th>
                </tr>

                <?php foreach ($krs as $krs) : ?>
                    <tr>
                        <td>
                            <div><?= $krs->id_krs ?></div>
                        </td>
                        <td>
                            <div><?= $krs->id_semester ?></div>
                        </td>
                        <td>
                            <div><?= $krs->id_nilai ?></div>
                        </td>
                        <td>
                            <div><?= $krs->nim ?></div>
                        </td>
                        <td>
                            <div><?= $krs->kode_mk ?></div>
                        </td>
                        <td>
                            <div><?= $krs->nilai_angka ?></div>
                        </td>
                        <td>
                            <div><?= $krs->is_lulus ?></div>
                        </td>
                        <td width="20px">
                            <a href="<?= site_url('admin/krs/edit/' . $krs->id_krs) ?>" class="btn btn-success btn-sm" role="button"><i class="fa fa-edit"></i></a>
                        </td>
                        <td width="20px">
                            <a href="#" data-delete-url="<?= site_url('admin/krs/delete/' . $krs->id_krs) ?>" class="btn btn-sm btn-danger" role="button" onclick="deleteConfirm(this)"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>

            <?php $this->load->view('admin/_partials/footer.php') ?>
        </div>

    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteConfirm(event) {
            Swal.fire({
                title: 'Delete Confirmation!',
                text: 'Are you sure to delete the item?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes Delete',
                confirmButtonColor: 'red'
            }).then(dialog => {
                if (dialog.isConfirmed) {
                    window.location.assign(event.dataset.deleteUrl);
                }
            });
        }
    </script>

    <?php if ($this->session->flashdata('message')) : ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('message') ?>'
            })
        </script>
    <?php endif ?>

</body>

</html>