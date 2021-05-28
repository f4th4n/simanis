<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $validator = session()->getFlashdata('validator'); ?>
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><?= $title ?></h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<?= $validator ? $validator->listErrors('alert') : '' ?>
							<br />
							<form method="post" class="form-horizontal form-label-left">
								<?= form_text('nama', 'Nama') ?>
								<?= form_text('no-seri', 'No Seri') ?>
								<?= form_text('merk', 'Merk') ?>
								<?= form_date('tanggal-didaftarkan', 'Tanggal Didaftarkan') ?>
								<?= form_number('nilai-kekayaan', 'Nilai Kekayaan') ?>
								<?= form_text('lokasi-penempatan', 'Lokasi Penempatan') ?>
								<?= form_date('batas-pakai', 'Batas Pakai') ?>
								<?= form_text('keterangan', 'Keterangan') ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Simpan</button>
									<a href="/admin/inventaris" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
