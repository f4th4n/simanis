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

						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a id="tab-selector-1" class="nav-link active" data-toggle="tab" href="#daftar-perawatan" role="tab">Daftar Perawatan</a>
							</li>
							<li class="nav-item">
								<a id="tab-selector-2" class="nav-link" href="/admin/perawatan/tindakan-perawatan" role="tab">Tindakan Perawatan</a>
							</li>
						</ul>

						<div class="tab-content" role="tablist">
							<div class="tab-pane active" id="daftar-perawatan" role="tabpanel">
								<br />
								<br />

								<div class="row">
									<div class="col-md-12 col-sm-12">
										<table id="list-table" class="table table-striped table-bordered dt-responsive nowrap">
											<thead>
												<tr>
													<th>NO</th>
													<th>Id Inventaris</th>
													<th>Nama Inventaris</th>
													<th>Kondisi</th>
													<th>Keterangan</th>
													<?php if(session()->get('role_id') === 'admin'): ?>
														<th></th>
													<?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($rows_daftar_perawatan as $key => $row): ?>
													<tr>
														<td><?= $key + 1 ?></td>
														<td><?= inventaris_id_text($row['inventaris_id']) ?></td>
														<td><?= $row['inventaris']['nama'] ?></td>
														<td><?= kondisi_text($row['kondisi']) ?></td>
														<td><?= $row['informasi'] ?></td>
														<?php if(session()->get('role_id') === 'admin'): ?>
															<td>
																<a class="btn btn-sm btn-success pull-right" href="/admin/perawatan/<?= $row['id'] ?>">Buat Laporan Perawatan</a>
															</td>
														<?php endif ?>
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
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
	$('#list-table').DataTable();

	$('.delete-row').click(function() {
		const res = confirm('Apakah anda yakin akan menghapus ini?')
		if(res) {
			const id = $(this).data('id')
			fetch('/admin/perawatan/delete/' + id, { method: 'DELETE' }).then(() => {
				window.location.reload();
			})
		}
	})
</script>

<?= $this->endSection() ?>
