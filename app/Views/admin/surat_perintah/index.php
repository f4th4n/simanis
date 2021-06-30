<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $flash = session()->getFlashdata('msg'); ?>
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="row">
				<div class="col-md-12 col-sm-12">
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

							<div class="mb-4 mt-2">
							</div>

							<table id="list-table" class="table table-striped table-bordered dt-responsive nowrap">
								<thead>
									<tr>
										<th>No</th>
										<th>No Surat</th>
										<th>Tgl Terbit</th>
										<th>Kepada</th>
										<th>Perintah</th>
										<th>Tgl Pelaksanaan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rows_surat_perintah as $key => $row): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= surat_id_text($row['no_surat']) ?></td>
											<td><?= $row['tanggal_terbit'] ?></td>
											<td><?= $row['to_user'] ?></td>
											<td><?= $row['perintah'] ?></td>
											<td><?= $row['tanggal_pelaksanaan'] ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
	<script>
		$('#list-table').DataTable();
	</script>
<?= $this->endSection() ?>
