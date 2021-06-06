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
								<a href="/admin/inventaris/create" class="btn btn-success">Tambah</a>
							</div>

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
											<td><?= no_inventaris($row['no_inventaris']) ?></td>
											<td><?= $row['nama'] ?></td>
											<td>TODO kondisi</td>
											<td>
												<a class="btn btn-sm btn-success pull-right" href="/admin/inventaris/<?= $row['id'] ?>">Lihat</a>
												<button class="delete-row btn btn-sm btn-danger pull-right" data-id="<?= $row['id'] ?>">Hapus</button>
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

		$('.delete-row').click(function() {
			const res = confirm('Apakah anda yakin akan menghapus ini?')
			if(res) {
				const id = $(this).data('id')
				fetch('/admin/inventaris/delete/' + id, { method: 'DELETE' }).then(() => {
					window.location.reload();
				})
			}
		})
	</script>

<?= $this->endSection() ?>