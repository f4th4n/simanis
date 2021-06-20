<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $flash = session()->getFlashdata('msg'); ?>
	<?php $validator = session()->getFlashdata('validator'); ?>
	<?php $update_batas_pakai_mode = isset($_GET['update-batas-pakai']); ?>

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
							<form action="/admin/inventaris/update/<?= $row_inventaris['id'] ?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?= $row_inventaris['id'] ?>">

								<div class="form-group row">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Foto</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<input name="foto" type="file" value="">
									</div>
								</div>
								<?= form_text('no-inventaris', 'No Inventaris', inventaris_id_text($row_inventaris['id']), 'readonly="readonly"') ?>
								<?= form_text('nama', 'Nama', $row_inventaris['nama']) ?>
								<?= form_text('no-seri', 'No Seri', $row_inventaris['no_seri']) ?>
								<?= form_text('merk', 'Merk', $row_inventaris['merk']) ?>
								<?= form_text('warna', 'Warna', $row_inventaris['warna']) ?>
								<?= form_date('tanggal-didaftarkan', 'Tanggal Didaftarkan', $row_inventaris['tanggal_didaftarkan']) ?>
								<?= form_number('nilai-kekayaan', 'Nilai Kekayaan', $row_inventaris['nilai_kekayaan'], '', 'rupiah') ?>
								<?= form_text('lokasi-penempatan', 'Lokasi Penempatan', $row_inventaris['lokasi_penempatan']) ?>
								<?= form_date('batas-pakai', 'Batas Pakai', $row_inventaris['batas_pakai']) ?>
								<?= form_text('keterangan', 'Keterangan', $row_inventaris['keterangan']) ?>
								<?= form_text('pesan', 'Pesan Jatuh Tempo', $row_inventaris['pesan'] ?: 'habis pajak', 'Pesan saat mendekati jatuh tempo') ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Simpan</button>
									<a href="/admin/inventaris" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>QR Code & Foto</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-md-6 col-sm-12 mb-5">
									<?php if($row_inventaris['foto']): ?>
										<a href="<?= '/static/uploads/' . $row_inventaris['foto'] ?>" target="_BLANK">
											<img src="<?= '/static/uploads/' . $row_inventaris['foto'] ?>" class="img-thumbnail" />
										</a>
									<?php endif ?>
								</div>
								<div class="col-md-6 col-sm-12 mb-5">
									<div id="qr"></div>
									<br />
									<a id="download-qr" class="btn btn-success" download="QR <?= inventaris_id_text($row_inventaris['id']) ?>.png" href="">Download QR</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
new QRCode(document.getElementById("qr"), 'INV-<?= $row_inventaris['id'] ?>')

const pointer = setInterval(() => {
	const imgSrc = $('#qr img').attr('src')
	if(!imgSrc) return
	
	$('#download-qr').attr('href', imgSrc)
	clearInterval(pointer)
}, 100);
</script>
<?= $this->endSection() ?>

