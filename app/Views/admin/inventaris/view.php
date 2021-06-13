<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $flash = session()->getFlashdata('msg'); ?>
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
							<?php if($flash): ?>
								<div class="alert alert-<?= $flash['type'] ?> alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<?= $flash['msg'] ?>
								</div>
							<?php endif ?>
							<?= $validator ? $validator->listErrors('alert') : '' ?>
							<br />
							<form action="/admin/inventaris/update/<?= $row_inventaris['id'] ?>" method="post" class="form-horizontal form-label-left">
								<input type="hidden" name="id" value="<?= $row_inventaris['id'] ?>">
								<?= form_text('no-inventaris', 'No Inventaris', inventaris_id_text($row_inventaris['id']), 'readonly="readonly"') ?>
								<?= form_text('nama', 'Nama', $row_inventaris['nama']) ?>
								<?= form_text('no-seri', 'No Seri', $row_inventaris['no_seri']) ?>
								<?= form_text('merk', 'Merk', $row_inventaris['merk']) ?>
								<?= form_text('warna', 'Warna', $row_inventaris['warna']) ?>
								<?= form_date('tanggal-didaftarkan', 'Tanggal Didaftarkan', $row_inventaris['tanggal_didaftarkan']) ?>
								<?= form_number('nilai-kekayaan', 'Nilai Kekayaan', $row_inventaris['nilai_kekayaan']) ?>
								<?= form_text('lokasi-penempatan', 'Lokasi Penempatan', $row_inventaris['lokasi_penempatan']) ?>
								<?= form_text('batas-pakai', 'Batas Pakai', $row_inventaris['batas_pakai']) ?>
								<?= form_text('keterangan', 'Keterangan', $row_inventaris['keterangan']) ?>

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
