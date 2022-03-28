<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/_partials/head.php') ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
    <main class="main">
        <?php $this->load->view('admin/_partials/side_nav.php') ?>

        <div class="container-fluid mt-n1">

            <!-- Judul -->
            <div class="alert bg-secondary text-white font-weight-bold text" role="alert">
                <i class="fas fa-file-alt mr-1"></i>
                Form Edit Data Nilai <span style="color: yellow">#<?= $nilai->id_nilai ?></span>
            </div>
            <!-- End -->

            <form action="<?= base_url('admin/nilai/fungsi_edit') ?>" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" value="<?= $nilai->id_nilai ?>" required />
                    <label for="id_nilai_huruf">Nilai Huruf*</label>
                    <input type="text" class="form-control" id="id_nilai_huruf" name=" id_nilai_huruf" placeholder="Masukkan Nilai Huruf" required title="Wajib isi nilai huruf" value="<?= $nilai->id_nilai_huruf ?>" />
                </div>

                <div class="form-group">
                    <label for="nilai_mutu">Nilai Mutu*</label>
                    <input type="text" class="form-control" step="any" id="nilai_mutu" name="nilai_mutu" placeholder="Masukkan Nilai Mutu" required title="Wajib isi Nilai Mutu" value="<?= $nilai->nilai_mutu ?>" />
                </div>

                <div class="form-group">
                    <label for="ng">Mengulang*</label>
                    <select class="form-control" name="is_ulang" name="is_ulang" id="" required>
                        <?php if ($nilai->is_ulang == "T") { ?>
                            <option selected value="T">Ya</option>
                            <option value="F">Tidak</option>
                        <?php } else if ($nilai->is_ulang == "F") { ?>
                            <option value="T">Ya</option>
                            <option selected value="F">Tidak</option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <a href="<?= site_url('admin/nilai') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
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