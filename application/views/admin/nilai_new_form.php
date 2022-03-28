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
                <i class="fas fa-file-alt mr-1"></i>
                Form Tambah Data Nilai
            </div>
            <!-- End -->

            <!-- Content Dashboard -->
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Note</h4>
                <p>Silahkan masukkan nilai huruf (A / B+ / B / C+ / C / D / E).</p>
            </div>
            <!-- End Content Dashboard -->

            <form action="" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" required />
                    <label for="id_nilai_huruf">Nilai Huruf</label>
                    <input type="text" class="form-control" id="id_nilai_huruf" name="id_nilai_huruf" placeholder="Masukkan Nilai Huruf" required title="Wajib isi Nilai Huruf" />
                </div>

                <div class="form-group">
                    <!-- <label for="nilai_mutu">Nilai Mutu</label> -->
                    <input type="text" style="display: none;" class="form-control" id="nilai_mutu" name="nilai_mutu" placeholder="Masukkan Nilai Mutu" required title="Wajib isi Nilai Mutu" />
                </div>

                <div class="form-group">
                    <!-- <label for="is_ulang">Mengulang</label> -->
                    <select name="is_ulang" class="form-control" style="display: none;" id="is_ulang" required>
                        <option value="" disabled selected value>- Pilih -</option>
                        <option value="F">Tidak</option>
                        <option value="T">Ya</option>
                    </select>
                </div>

                <div>
                    <a href="<?= site_url('admin/nilai') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
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
        if (document.getElementById("id_nilai_huruf").value == "A") {
            document.getElementById("nilai_mutu").value = 4.00;
            document.getElementById("is_ulang").value = "F";
        } else if (document.getElementById("id_nilai_huruf").value == "B+") {
            document.getElementById("nilai_mutu").value = 3.50;
            document.getElementById("is_ulang").value = "F";
        } else if (document.getElementById("id_nilai_huruf").value == "B") {
            document.getElementById("nilai_mutu").value = 3.00;
            document.getElementById("is_ulang").value = "F";
        } else if (document.getElementById("id_nilai_huruf").value == "C+") {
            document.getElementById("nilai_mutu").value = 2.50;
            document.getElementById("is_ulang").value = "F";
        } else if (document.getElementById("id_nilai_huruf").value == "C") {
            document.getElementById("nilai_mutu").value = 2.00;
            document.getElementById("is_ulang").value = "T";
        } else if (document.getElementById("id_nilai_huruf").value == "D") {
            document.getElementById("nilai_mutu").value = 1.00;
            document.getElementById("is_ulang").value = "T";
        } else if (document.getElementById("id_nilai_huruf").value == "E") {
            document.getElementById("nilai_mutu").value = 0.00;
            document.getElementById("is_ulang").value = "T";
        }
    }
</script>

</html>