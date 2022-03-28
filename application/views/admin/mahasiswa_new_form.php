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
                <i class="fas fa-user-graduate mr-1"></i>
                Form Tambah Data Mahasiswa
            </div>
            <!-- End -->

            <form action="" method="POST">
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nim Mahasiswa" required title="Wajib isi Nim" />
                </div>

                <div class="form-group">
                    <label for="id_prodi">Program Studi</label>
                    <select name="id_prodi" id="id_prodi" class="form-control" required>
                        <option value="" disabled selected value>- Pilih Program Studi -</option>
                        <?php foreach ($prodi as $prd) : ?>
                            <option value="<?= $prd['id_prodi'] ?>"><?= $prd['nama_prodi'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa" required title="Wajib isi Nama Mahasiswa" />
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <!-- <input type="text" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" required title="Wajib isi Jenis Kelamin" /> -->
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" id="" required>
                        <option value="" disabled selected value>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required title="Wajib isi Alamat" />
                </div>

                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota" required title="Wajib isi Kota" />
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik" required title="Wajib isi Nik" />
                </div>

                <div>
                    <a href="<?= site_url('admin/mahasiswa') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
                    <button type="submit" name="draft" class="btn btn-primary" value="false" style="float: right;"><i class="fas fa-save mr-1"></i>Simpan</button>
                    <button type="reset" name="draft" class="btn btn-danger mr-2" value="true" style="float: right;"><i class="fas fa-eraser mr-1"></i>Reset</button>
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