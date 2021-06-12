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
							<form action="/admin/perawatan/update/<?= $row_perawatan['id'] ?>" method="post" class="form-horizontal form-label-left">
								<input type="hidden" name="id" value="<?= $row_perawatan['id'] ?>">
								<?= form_text('no-perawatan', 'No Perawatan', perawatan_id_text($row_perawatan['nomor_perawatan']), 'readonly="readonly"') ?>
								<?= form_text('user-id', 'Id Admin', $row_perawatan['user_id'], 'readonly="readonly"') ?>
								<?= form_text('no-inventaris', 'No Inventaris', inventaris_id_text($row_perawatan['inventaris_id']), 'readonly="readonly"') ?>
								<?= form_text('nama-inventaris', 'Nama Inventaris', inventaris_id_text($row_perawatan['inventaris']['nama']), 'readonly="readonly"') ?>

								<?= form_date('tanggal-perawatan', 'Tanggal Perawatan', $row_perawatan['tanggal_perawatan']) ?>
								<?= form_date('tanggal-selesai', 'Tanggal Selesai', $row_perawatan['tanggal_selesai']) ?>
								<?= form_text('tempat-perawatan', 'Tempat Perawatan', $row_perawatan['tempat_perawatan']) ?>
								<?= form_number('biaya-perawatan', 'Biaya Perawatan', $row_perawatan['biaya_perawatan'], '', 'rupiah') ?>

								<div class="form-group row">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Foto Kwitansi</label>
						      <div class="col-md-9 col-sm-9 col-xs-9">
						        <img src="foto-kwitansi">
						      </div>
						    </div>

								<?= form_text('keterangan', 'Keterangan', $row_perawatan['keterangan']) ?>


								<div class="mt-5">
									<!-- <button type="submit" class="btn btn-success pull-right">Simpan</button> -->
									<a href="/admin/perawatan" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
