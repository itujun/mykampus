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
                Ubah Profile
            </div>
            <!-- End -->

            <form action="" method="POST">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control <?= form_error('name') ? 'invalid' : '' ?>" value="<?= form_error('name') ? set_value('name') : $current_user->name ?>" required maxlength="32" />
                    <div class="invalid-feedback">
                        <?= form_error('name') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control <?= form_error('email') ? 'invalid' : '' ?>" value="<?= form_error('email') ? set_value('email') : $current_user->email ?>" required maxlength="32" />
                    <div class="invalid-feedback">
                        <?= form_error('email') ?>
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