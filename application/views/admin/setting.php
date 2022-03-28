<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('admin/_partials/side_nav.php') ?>

        <div class="container-fluid mt-n1">

            <!-- Judul  -->
            <div class="alert bg-secondary text-white font-weight-bold text" role="alert">
                <i class="fas fa-fw fa-cogs mr-1"></i>
                Setting
            </div>
            <!-- End  -->

            <div class="card mb-1 border border-dark mb-2">
                <div class="card-header bg-dark text-white">
                    <b>Avatar</b>
                    <a href="#" data-delete-url="<?= site_url('admin/setting/remove_avatar') ?>" class="btn btn-danger btn-sm fw-bold" style="float: right;" onclick="deleteConfirm(this)"><i class="fa fa-trash mr-1"></i>Hapus Avatar</a>
                    <a href="<?= site_url('admin/setting/upload_avatar') ?>" class="btn btn-success btn-sm fw-bold mr-2" style="float: right;"><i class="fa fa-edit mr-1"></i>Ubah Avatar</a>
                </div>
                <div class="card-body">
                    <?php
                    $avatar = $current_user->avatar ?
                        base_url('upload/avatar/' . $current_user->avatar)
                        : get_gravatar($current_user->email)
                    ?>
                    <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80">
                </div>
            </div>

            <div class="card mb-1 border border-dark mb-2">
                <div class="card-header bg-dark text-white">
                    <b>Profile Settings</b>
                    <a href="<?= site_url('admin/setting/edit_profile') ?> " class="btn btn-success btn-sm" style="float: right;"><i class="fa fa-edit mr-1"></i>Edit Profile</a>
                </div>
                <div class="card-body">
                    Name: <span class="text-gray"><?= html_escape($current_user->name) ?></span>
                    <br>
                    Email: <span class="text-gray"><?= html_escape($current_user->email) ?></span>
                </div>
            </div>

            <div class="card mb-1 border border-dark mb-2">
                <div class="card-header bg-dark text-white  ">
                    <b>Security & Password</b>
                    <a href="<?= site_url('admin/setting/edit_password') ?>" class="btn btn-success btn-sm" style="float: right;" class="btn btn-success btn-sm" style="float: right;"><i class="fa fa-edit mr-1"></i>Edit Password</a>
                </div>
                <div class="card-body">
                    Your Password: <span class="text-gray">******</span>
                    <br>
                    Last Changed: <span class="text-gray"><?= $current_user->password_updated_at ?></span>
                </div>
            </div>

            <?php $this->load->view('admin/_partials/footer.php') ?>
        </div>
    </main>


    <?php if ($this->session->flashdata('message')) : ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus?',
            text: 'Anda yakin ingin menghapus foto avatar ?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Iya Hapus',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }
</script>

</html>