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
				List Data KRS
			</div>
			<!-- End -->

			<div class="toolbar">
				<a href="<?= site_url('admin/krs/neww') ?>" class="btn btn-danger" role="button"><i class="fa fa-plus fa-sm mr-1"></i>Tambah Data Krs</a>
			</div>
			<br>
			<div>
				<p class="text-uppercase mt-2"><b>SAAT INI TIDAK ADA DATA KRS YANG BISA DITAMPILKAN (KOSONG). SILAHKAN MENAMBAHKAN DATA KRS</b></p>
			</div>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>