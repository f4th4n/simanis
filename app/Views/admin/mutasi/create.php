<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $validator = session()->getFlashdata('validator'); ?>
	<?php $flash = session()->getFlashdata('msg'); ?>
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
							<?php if($flash): ?>
								<div class="alert alert-<?= $flash['type'] ?> alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<?= $flash['msg'] ?>
								</div>
							<?php endif ?>
							<br />
							<form method="post" class="form-horizontal form-label-left">
								<?= form_text('no-mutasi', 'No Mutasi', mutasi_id_text($count_mutasi), 'readonly="readonly"') ?>
								<?= form_date('tanggal-mutasi', 'Tanggal Mutasi') ?>
								<?= form_text('inventaris-id', 'Inventaris Id', 'INV-') ?>
								<?= form_text('lokasi-awal', 'Lokasi Awal') ?>
								<?= form_text('lokasi-tujuan', 'Lokasi Tujuan') ?>
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
