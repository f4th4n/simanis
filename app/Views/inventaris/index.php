<?= $this->extend('default') ?>

<?= $this->section('content') ?>
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
							<?php if($flash): ?>
								<div class="alert alert-<?= $flash['type'] ?> alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<?= $flash['msg'] ?>
								</div>
							<?php endif ?>

							<div class="mb-2 mt-2">
								<a href="/admin/inventaris/create" class="btn btn-success">Tambah</a>
							</div>

							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>No Inventaris</th>
										<th>Nama</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rows_inventaris as $row): ?>
										<tr>
											<td><?= $row['id'] ?></td>
											<td><?= $row['no_inventaris'] ?></td>
											<td><?= $row['nama'] ?></td>
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
