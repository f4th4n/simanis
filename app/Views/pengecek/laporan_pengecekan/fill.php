<?= $this->extend('default') ?>

<?= $this->section('css') ?>
	<style>
		.widget-simanis {
			cursor: pointer;
		}
		#scan-method {
			display: none
		}
	</style>
<?= $this->endSection() ?>

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
								<div class="row">
									<div class="col-md-12 col-sm-12">



								<?= form_text('no-inventaris', 'No Inventaris', inventaris_id_text(10), 'readonly="readonly"') ?>






										<div class="mb-4 mt-2">
											<button class="btn btn-success pull-right" data-toggle="modal" data-target="#scan-modal">Scan</button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
									<p class="pull-right">Total Pengecekan <b><?= count($rows) ?></b> dari <b><?= $count_all ?></b> inventaris</p>
									</div>
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

<!-- Modal -->
<div class="modal fade" id="scan-modal" tabindex="-1" aria-labelledby="scan-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scan-modal-label">Buat Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div id="scan-option">
					<div id="scan-barang" class="widget-simanis animated flipInX col-md-12 col-sm-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-camera"></i>
							</div>
							<div class="count">Scan</div>

							<h3></h3>
							<p>Klik untuk mulai scan</p>
						</div>
					</div>
					<div id="cari-manual" class="widget-simanis animated flipInX col-md-12 col-sm-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-align-right"></i>
							</div>
							<div class="count">Manual</div>

							<p>Tulis kode inventori jika scan tidak berjalan</p>
						</div>
					</div>
				</div>

				<div id="scan-method">
					<div class="mb-2">
						<a id="scan-cara-lain" href="#">< Cara lain</a>
					</div>
					<div id="reader" width="600px"></div>
				</div>

				<div id="scan-result">

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<form method="post" class="form-horizontal">
								<?= form_text('no-inventaris', 'No Inventaris', inventaris_id_text(10), 'readonly="readonly"') ?>
							</form>
						</div>
					</div>
				</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>

$('#scan-barang').click(function() {
	var html5QrcodeScanner

	function onScanSuccess(qrMessage) {
		// handle the scanned code as you like, for example:
		console.log(`QR matched = ${qrMessage}`);
		html5QrcodeScanner.clear();
		$('[name="no-inventaris"]').val(qrMessage)
	}

	function onScanFailure(error) {
		// handle scan failure, usually better to ignore and keep scanning.
		// for example:
		console.warn(`QR error = ${error}`);
	}

	$('#scan-option').hide()
	$('#scan-method').show()

	const html5QrCode = new Html5Qrcode("reader");
	const config = { fps: 10, qrbox: 250 };
	html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess);
});

$('#scan-cara-lain').click(function() {
	$('#scan-method').hide()
	$('#scan-option').show()
})

</script>
<?= $this->endSection() ?>
