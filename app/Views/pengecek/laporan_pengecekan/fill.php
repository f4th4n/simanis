<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php $validator = session()->getFlashdata('validator'); ?>
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
							<?= $validator ? $validator->listErrors('alert') : '' ?>

							<?php if (session()->get('role_id') === 'pengecek'): ?>
								<div class="mb-4 mt-2">
									<a href="/todo" class="btn btn-success pull-right">Scan</a>
								</div>
							<?php endif; ?>

							<table id="list-table" class="table table-striped table-bordered dt-responsive nowrap">
								<thead>
									<tr>
										<th>NO</th>
										<th>ID Inventaris</th>
										<th>Nama Inventaris</th>
										<th>Kondisi</th>
										<th>Informasi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rows as $key => $row): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= inventaris_id_text($row['inventaris_id']) ?></td>
											<td><?= $row['inventaris']['nama'] ?></td>
											<td><?= kondisi_text($row['kondisi']) ?></td>
											<td><?= $row['informasi'] ? $row['informasi'] : '-' ?></td>
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
