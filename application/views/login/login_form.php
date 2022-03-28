<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_partials/head.php'); ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <br><br><br>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="icon-object border-danger-800 text-danger-600">
                                            <i class="fas fa-user fa-5x mb-2 indigo-text"></i>
                                        </div>
                                        <h5 class="content-group mb-3">Selamat Datang di KAMPUSKU
                                            <small class="display-block">Silahkan masukan akun Anda</small>
                                        </h5>

                                        <?php if ($this->session->flashdata('message_login_error')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $this->session->flashdata('message_login_error') ?>
                                            </div>
                                        <?php endif ?>

                                        <form action="" method="post" style="max-width: 600px;">
                                            <div class="form-group">
                                                <input type="text" required class="form-control form-control-user <?= form_error('username') ? 'invalid' : '' ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username..." name="username">
                                                <div class="invalid-feedback">
                                                    <?= form_error('username') ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" required class="form-control form-control-user <?= form_error('password') ? 'invalid' : '' ?>" id="exampleInputPassword" placeholder="Password..." name="password">
                                                <div class="invalid-feedback">
                                                    <?= form_error('password') ?>
                                                </div>
                                            </div>

                                            <div>
                                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <?php $this->load->view('_partials/footer.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>