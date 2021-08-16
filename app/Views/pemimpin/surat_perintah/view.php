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
							<form action="/admin/pemimpin/surat-perintah/update/<?= $row_surat_perintah['id'] ?>" method="post" class="form-horizontal form-label-left" autocomplete="simanis-new-user">
								<input type="hidden" name="id" value="<?= $row_surat_perintah['id'] ?>">
								<?= form_text('no-surat', 'No Surat', pengajuan_id_text($row_surat_perintah['no_surat']), 'readonly="readonly"') ?>

								<?= form_date('tanggal-terbit', 'Tanggal Terbit', $row_surat_perintah['tanggal_terbit']) ?>

								<div class="form-group row">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Kepada</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<select name="to-user" class="form-control">
											<?php foreach($users as $user): ?>
												<option value="<?= $user['id'] ?>" <?= $row_surat_perintah['to_user'] == $user['id'] ? 'selected="selected"' : '' ?>><?= admin_id_text($user['id']) ?> <?= $user['nama'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<?= form_text('perintah', 'Perintah', $row_surat_perintah['perintah']) ?>
								<?= form_date('tanggal-pelaksanaan', 'Tanggal Pelaksanaan', $row_surat_perintah['tanggal_pelaksanaan']) ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Simpan</button>
									<a href="/admin/pemimpin/surat-perintah" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
