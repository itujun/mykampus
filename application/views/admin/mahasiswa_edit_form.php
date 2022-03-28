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
                Form Edit Data Mahasiswa <span style="color: yellow">#<?= $mahasiswa->nim ?></span>
            </div>
            <!-- End -->

            <form action="<?= base_url('admin/mahasiswa/fungsi_edit') ?>" method="POST">
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" name="nim" placeholder="Masukkan Nim Mahasiswa" required title="Wajib isi Nim" value="<?= $mahasiswa->nim ?>" />
                </div>

                <div class="form-group">
                    <label for="id_prodi">Program Studi</label>
                    <select name="id_prodi" class="form-control">
                        <option value="" disabled selected value>- Pilih Program Studi -</option>
                        <?php foreach ($prodi as $prd) :
                            if ($mahasiswa->id_prodi == $prd['id_prodi']) { ?>
                                <option selected value="<?= $prd['id_prodi']; ?>"><?= $prd['nama_prodi']; ?></option>
                            <?php } else if ($mahasiswa->id_prodi != $prd['id_prodi']) { ?>
                                <option value="<?= $prd['id_prodi']; ?>"><?= $prd['nama_prodi']; ?></option>
                        <?php }
                        endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa" required title="Wajib isi Nama Mahasiswa" value="<?= $mahasiswa->nama_mahasiswa ?>" />
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="" required>
                        <?php if ($mahasiswa->jenis_kelamin == "L") { ?>
                            <option selected value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        <?php } else if ($mahasiswa->jenis_kelamin == "P") { ?>
                            <option value="L">Laki-Laki</option>
                            <option selected value="P">Perempuan</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required title="Wajib isi Alamat" value="<?= $mahasiswa->alamat ?>" />
                </div>

                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" required title="Wajib isi Kota" value="<?= $mahasiswa->kota ?>" />
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan Nik" required title="Wajib isi Nik" value="<?= $mahasiswa->nik ?>" />
                </div>

                <div>
                    <a href="<?= site_url('admin/mahasiswa') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
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