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
							<form method="post" class="form-horizontal form-label-left" autocomplete="simanis-new-user">
								<?= form_text('username', 'Username') ?>
								<?= form_password('password', 'Password', '', '', 'Kosongkan jika tidak mengganti password') ?>
								<?= form_text('nama', 'Nama') ?>

								<div class="form-group row">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Role</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<select name="role_id" class="form-control">
											<?php foreach(config('Simanis')->roles as $role): ?>
												<option value="<?= $role['value'] ?>"><?= $role['name'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<?= form_text('keterangan', 'Keterangan') ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Simpan</button>
									<a href="/admin/admin" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
