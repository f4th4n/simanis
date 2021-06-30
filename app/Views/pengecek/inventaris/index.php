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
							
							<table id="list-table" class="table table-striped table-bordered dt-responsive nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>No Inventaris</th>
										<th>Nama</th>
										<th>Kondisi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rows_inventaris as $row): ?>
										<tr>
											<td><?= $row['id'] ?></td>
											<td><?= inventaris_id_text($row['id']) ?></td>
											<td><?= $row['nama'] ?></td>
											<td><?= kondisi_text($row['kondisi']) ?></td>
											<td>
												<a class="btn btn-sm btn-success pull-right" href="/admin/pengecek/inventaris/<?= $row['id'] ?>">Lihat</a>
											</td>
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
