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
                <i class="fas fa-book mr-1"></i>
                Form Edit Data Mata Kuliah <span style="color: yellow">#<?= $matkul->kode_mk ?></span>
            </div>
            <!-- End -->

            <form action="<?= base_url('admin/matkul/fungsi_edit') ?>" method="POST">
                <div class="form-group">
                    <label for="kode_mk">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Masukkan kode Mata Kuliah" required title="Wajib isi kode mata kuliah" value="<?= $matkul->kode_mk ?>" />
                </div>

                <div class="form-group">
                    <label for="nama_mk">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" name="nama_mk" id="nama_mk" placeholder="Masukkan Nama Mata Kuliah" required title="Wajib isi Nama mata kuliah" value="<?= $matkul->nama_mk ?>" />
                </div>

                <div class="form-group">
                    <label for="sks_mk">SKS</label>
                    <select name="sks_mk" id="sks_mk" class="form-control" required>
                        <?php if ($matkul->sks_mk == "1") { ?>
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        <?php } else if ($matkul->sks_mk == "2") { ?>
                            <option value="1">1</option>
                            <option selected value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        <?php } else if ($matkul->sks_mk == "3") { ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option selected value="3">3</option>
                            <option value="4">4</option>
                        <?php } else if ($matkul->sks_mk == "4") { ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option selected value="4">4</option>
                        <?php } ?>

                    </select>
                </div>

                <div>
                    <a href="<?= site_url('admin/matkul') ?>" class="btn btn-success"><i class=" fas fa-chevron-circle-left mr-1"></i>Kembali</a>
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