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
                List Tambah Data KRS<span style="color: yellow"> Baru</span>
            </div>
            <!-- End -->

            <form action="" method="POST">
                <div class="form-group">
                    <label for="id_krs">Id Krs</label>
                    <input type="text" class="form-control" id="id_krs" name="id_krs" placeholder="Masukkan id Krs" required title="Wajib isi id Krs" />
                </div>

                <div class="form-group">
                    <label for="nim">Nim</label>
                    <select name="nim" class="form-control" required>
                        <option value="" id="nim" disabled selected value>- Pilih Nim -</option>
                        <?php foreach ($nim as $nim) : ?>
                            <option value="<?= $nim['nim'] ?>"><?= $nim['nim'] ?> - <?= $nim['nama_mahasiswa'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_semester">Semester</label>
                    <select name="id_semester" class="form-control" id="id_semester" required>
                        <option value="" disabled selected value>- Pilih Semester -</option>
                        <?php foreach ($semester as $sms) : ?>
                            <option value="<?= $sms['id_semester'] ?>"><?= $sms['id_semester'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_nilai">Nilai (Huruf)</label>
                    <select name="id_nilai" class="form-control" id="id_nilai" required>
                        <option value="" disabled selected value>- Pilih Nilai Huruf -</option>
                        <?php foreach ($nilai as $nilai) : ?>
                            <option value="<?= $nilai['id_nilai'] ?>"><?= $nilai['id_nilai_huruf'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kode_mk">Kode Matkul</label>
                    <select name="kode_mk" class="form-control" required>
                        <option value="" id="kode_mk" disabled selected value>- Pilih Matkul -</option>
                        <?php foreach ($matkul as $matkul) : ?>
                            <option value="<?= $matkul['kode_mk'] ?>"><?= $matkul['kode_mk'] ?> - <?= $matkul['nama_mk'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <!-- <label for="nilai_angka">Nilai (Angka)</label> -->
                    <input type="text" class="form-control" style="display: none;" id="nilai_angka" name="nilai_angka" placeholder="Masukkan Nilai Angka" required title="Wajib Nilai Angka" />
                </div>

                <div class="form-group">
                    <!-- <label for="is_lulus">Lulus</label> -->
                    <input type="text" class="form-control" id="is_lulus" style="display: none;" name="is_lulus" placeholder="Masukkan Lulus" required title="Wajib isi Lulus" />
                </div>

                <div>
                    <a href="<?= site_url('admin/krs') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
                    <button type="submit" onclick="aksi()" name="draft" class="btn btn-primary" value="false" style="float: right;"><i class="fas fa-save mr-1"></i>Simpan</button>
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

<script src="js/scripts.js"></script>
<script>
    function aksi() {
        if (document.getElementById("id_nilai").value == 1) {
            document.getElementById("nilai_angka").value = 4.00;
            document.getElementById("is_lulus").value = "L";
        } else if (document.getElementById("id_nilai").value == 2) {
            document.getElementById("nilai_angka").value = 3.50;
            document.getElementById("is_lulus").value = "L";
        } else if (document.getElementById("id_nilai").value == 3) {
            document.getElementById("nilai_angka").value = 3.00;
            document.getElementById("is_lulus").value = "L";
        } else if (document.getElementById("id_nilai").value == 4) {
            document.getElementById("nilai_angka").value = 2.50;
            document.getElementById("is_lulus").value = "L";
        } else if (document.getElementById("id_nilai").value == 5) {
            document.getElementById("nilai_angka").value = 2.00;
            document.getElementById("is_lulus").value = "L";
        } else if (document.getElementById("id_nilai").value == 6) {
            document.getElementById("nilai_angka").value = 1.00;
            document.getElementById("is_lulus").value = "T";
        } else if (document.getElementById('id_nilai').value == 7) {
            document.getElementById("nilai_angka").value = 0.00;
            document.getElementById("is_lulus").value = "T";
        }
    }
</script>

</html>