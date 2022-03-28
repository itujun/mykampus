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
                <i class="fas fa-graduation-cap mr-1"></i>
                Form Edit Data Program Studi <span style="color: yellow">#<?= $info_program_studi->id_prodi ?></span>
            </div>
            <!-- End -->

            <form action="" method="POST">
                <div class="form-group">
                    <label for="id_prodi">Id Prodi*</label>
                    <input type="text" class="form-control" id="id_prodi" name="id_prodi" placeholder="Masukkan Id Prodi" required title="Wajib isi id prodi" value="<?= $info_program_studi->id_prodi ?>" />
                </div>

                <div class="form-group">
                    <label for="nama_prodi">Nama Program Studi*</label>
                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Program Studi" required title="Wajib isi Nama Program Studi" value="<?= $info_program_studi->nama_prodi ?>" />
                </div>

                <div>
                    <a href="<?= site_url('admin/prodi') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
                    <button type="submit" name="draft" class="btn btn-primary " value="false" style="float: right;"><i class="fas fa-save mr-1"></i>Simpan</button>
                    <button type="reset" name="draft" class="btn btn-danger mr-2" value="true" style="float: right;"><i class="fas fa-save mr-1"></i>Reset</button>
                </div>
            </form>

            <?php $this->load->view('admin/_partials/footer.php') ?>
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script>
                var quill = new Quill('#editor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, 4, 5, 6, false]
                            }],
                            [{
                                font: []
                            }],
                            ["bold", "italic"],
                            ["link", "blockquote", "code-block", "image"],
                            [{
                                list: "ordered"
                            }, {
                                list: "bullet"
                            }],
                            [{
                                script: "sub"
                            }, {
                                script: "super"
                            }],
                            [{
                                color: []
                            }, {
                                background: []
                            }],
                        ]
                    },
                });
                quill.on('text-change', function(delta, oldDelta, source) {
                    document.querySelector("input[name='content']").value = quill.root.innerHTML;
                });
            </script>
        </div>
    </main>
</body>

</html>