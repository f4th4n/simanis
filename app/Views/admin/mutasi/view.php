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
							<form action="/admin/mutasi/update/<?= $row_mutasi['id'] ?>" method="post" class="form-horizontal form-label-left" autocomplete="off">
								<input autocomplete="off" name="hidden" type="text" style="display:none;">
								<input type="hidden" name="id" value="<?= $row_mutasi['id'] ?>">


								<?= form_text('no-mutasi', 'No Mutasi', mutasi_id_text($row_mutasi['id']), 'readonly="readonly"') ?>
								<?= form_date('tanggal-mutasi', 'Tanggal Mutasi', $row_mutasi['tanggal_mutasi']) ?>
								<?= form_text('inventaris-id', 'Inventaris Id', inventaris_id_text($row_mutasi['inventaris_id'])) ?>
								<?= form_text('lokasi-awal', 'Lokasi Awal', $row_mutasi['lokasi_awal']) ?>
								<?= form_text('lokasi-tujuan', 'Lokasi Tujuan', $row_mutasi['lokasi_tujuan']) ?>
								<?= form_text('keterangan', 'Keterangan', $row_mutasi['keterangan']) ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Simpan</button>
									<a href="/admin/mutasi" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
