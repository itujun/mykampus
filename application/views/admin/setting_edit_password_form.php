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
                Ubah Password
            </div>
            <!-- End -->

            <form action="" method="POST">
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control <?= form_error('password') ? 'invalid' : '' ?>" value="<?= set_value("password") ?>" required />
                    <div class="invalid-feedback"><?= form_error('password') ?></div>
                </div>

                <div class="form-group">
                    <label for="password_confirm">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control <?= form_error('password_confirm') ? 'invalid' : '' ?>" value="<?= set_value("password_confirm") ?>" required />
                    <div class="invalid-feedback">
                        <?= form_error('password_confirm') ?>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="<?= site_url('admin/setting') ?>" class="btn btn-success "><i class="fas fa-chevron-circle-left mr-1"></i>Kembali</a>
                    <button type="submit" name="save" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
                </div>
            </form>

            <?php $this->load->view('admin/_partials/footer.php') ?>
        </div>
    </main>
</body>

</html>