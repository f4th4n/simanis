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
							<h2><?= $title ?> <?= $row['role_id'] ?></h2>
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
							<form action="/admin/admin/update/<?= $row['id'] ?>" method="post" class="form-horizontal form-label-left" autocomplete="off">
								<input autocomplete="off" name="hidden" type="text" style="display:none;">
								<input type="hidden" name="id" value="<?= $row['id'] ?>">
								<?= form_text('username', 'Username', $row['username']) ?>
								<?= form_password('password', 'Password', '', '', 'Kosongkan jika tidak mengganti password') ?>
								<?= form_text('nama', 'Nama', $row['nama']) ?>

								<div class="form-group row">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Role</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<select name="role_id" class="form-control">
											<?php foreach(config('Simanis')->roles as $role): ?>
												<option value="<?= $role['value'] ?>" <?= $row['role_id'] == $role['value'] ? 'selected="selected"' : '' ?>><?= $role['name'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<?= form_text('keterangan', 'Keterangan', $row['keterangan']) ?>

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
