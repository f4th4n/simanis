<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $validator = session()->getFlashdata('validator'); ?>
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><?= $title ?></h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<?= $validator ? $validator->listErrors('alert') : '' ?>
							<br />
							<form method="post" class="form-horizontal form-label-left">
								<?= form_text('no-laporan-pengecekan', 'No Laporan Pengecekan', 'PCK-'. str_pad($current_index, 3, '0', STR_PAD_LEFT), 'readonly="readonly"') ?>
								<?= form_text('id-user-pengecek', 'Id User Pengecek', 'BPCK-' . str_pad($user_id, 3, '0', STR_PAD_LEFT), 'readonly="readonly"') ?>
								<?= form_text('nama-pengecek', 'Nama Pengecek', session()->get('nama'), 'readonly="readonly"') ?>
								<?= form_date('tanggal-pengecekan', 'Tanggal Pengecekan', date('d-m-Y')) ?>

								<div class="mt-5">
									<button type="submit" class="btn btn-success pull-right">Mulai Pengecekan</button>
									<a href="/admin/laporan_pengecekan" class="btn btn-danger pull-right">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
