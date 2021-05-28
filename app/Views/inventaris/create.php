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
								<?= form_text('no_seri', 'No Seri') ?>
								<?= form_text('merk', 'Merk') ?>
								<?= form_date('tanggal_didaftarkan', 'Tanggal Didaftarkan') ?>
								<?= form_number('nilai_kekayaan', 'Nilai Kekayaan') ?>
								<?= form_text('lokasi_penempatan', 'Lokasi Penempatan') ?>
								<?= form_text('batas_pakai', 'Batas Pakai') ?>
								<?= form_text('keterangan', 'Keterangan') ?>

								<button type="submit" class="btn btn-success pull-right">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
