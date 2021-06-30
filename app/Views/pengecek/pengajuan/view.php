f<?= $this->extend('default') ?>

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
							<form action="/admin/pengecek/pengajuan/update/<?= $row_pengajuan['id'] ?>" method="post" class="form-horizontal form-label-left" autocomplete="simanis-new-user">
								<input type="hidden" name="id" value="<?= $row_pengajuan['id'] ?>">
								<input type="hidden" name="user-id" value="<?= $row_pengajuan['user_id'] ?>">
								<?= form_text('no-pengajuan', 'No Pengajuan', pengajuan_id_text($row_pengajuan['no_pengajuan']), 'readonly="readonly"') ?>
								<?= form_text('user-id-read-only', 'ID Pengaju', admin_id_text(session()->get('id')), 'readonly="readonly"') ?>

								<?= form_date('tanggal-pengajuan', 'Tanggal Pengajuan', $row_pengajuan['tanggal_pengajuan']) ?>
								<?= form_text('nama-inventaris', 'Inventaris Yang Diajukan', $row_pengajuan['nama_inventaris']) ?>
								<?= form_number('total', 'Banyaknya', $row_pengajuan['total'], '', '') ?>
								<?= form_text('keterangan', 'Keterangan', $row_pengajuan['keterangan']) ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Simpan</button>
									<a href="/admin/pengajuan" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
