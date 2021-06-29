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
							<form
								action="/admin/perawatan/create-from-kondisi-inventaris/<?= $row_kondisi_inventaris['id'] ?>"
								method="post"
								class="form-horizontal form-label-left"
								enctype="multipart/form-data">

								<input type="hidden" name="id" value="<?= $row_kondisi_inventaris['id'] ?>">
								<input type="hidden" name="inventaris-id" value="<?= $row_kondisi_inventaris['inventaris_id'] ?>">
								<?= form_text('no-perawatan', 'No Perawatan', perawatan_id_text($nomor_perawatan), 'readonly="readonly"') ?>
								<?= form_text('user-id', 'Id Admin', $row_kondisi_inventaris['user_id'], 'readonly="readonly"') ?>
								<?= form_text('no-inventaris', 'No Inventaris', inventaris_id_text($row_kondisi_inventaris['inventaris_id']), 'readonly="readonly"') ?>
								<?= form_text('nama-inventaris', 'Nama Inventaris', $row_kondisi_inventaris['inventaris']['nama'], 'readonly="readonly"') ?>

								<?= form_date('tanggal-perawatan', 'Tanggal Perawatan', $row_perawatan ? $row_perawatan['tanggal_perawatan'] : '', 'readonly="readonly"') ?>
								<?= form_date('tanggal-selesai', 'Tanggal Selesai', $row_perawatan ? $row_perawatan['tanggal_selesai'] : '', 'readonly="readonly"') ?>
								<?= form_text('tempat-perawatan', 'Tempat Perawatan', $row_perawatan ? $row_perawatan['tempat_perawatan'] : '', 'readonly="readonly"') ?>
								<?= form_number('biaya-perawatan', 'Biaya Perawatan', $row_perawatan ? $row_perawatan['biaya_perawatan'] : '', 'readonly="readonly"', 'rupiah') ?>
								<?= form_text('keterangan', 'Keterangan', $row_perawatan ? $row_perawatan['keterangan'] : '', 'readonly="readonly"') ?>


								<div class="mt-5">
									<a href="/admin/perawatan/tindakan-perawatan" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Foto Kwitansi</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-md-6 col-sm-12 mb-5">
									<?php if($row_perawatan['foto_kwitansi']): ?>
										<a href="<?= '/static/uploads/' . $row_perawatan['foto_kwitansi'] ?>" target="_BLANK">
											<img src="<?= '/static/uploads/' . $row_perawatan['foto_kwitansi'] ?>" class="img-thumbnail" />
										</a>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
