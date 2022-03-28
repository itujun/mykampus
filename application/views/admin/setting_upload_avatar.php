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
                <i class="fas fa-fw fa-cogs mr-1"></i>
                Ubah Avatar
            </div>
            <!-- End -->

            <form action="" method="POST" enctype="multipart/form-data">
                <!--  ecntype="multipart/form-data" ini adalah tipe enkripsi untuk upload file. -->
                <div class="form-group">
                    <label for="avatar">Pilih Gambar Avatar</label>
                    <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg, image/gif" class="form-control">
                </div>

                <?php if (isset($error)) : ?>
                    <div class="invalid-feedback"><?= $error ?></div>
                <?php endif; ?>

                <div class="mt-3">
                    <a href="<?= site_url('admin/setting') ?>" class="btn btn-success "><i class="fas fa-chevron-circle-left mr-1"></i>Kembali</a>
                    <button type="submit" name="save" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                </div>
            </form>

            <?php $this->load->view('admin/_partials/footer.php') ?>
        </div>
    </main>
</body>

</html>