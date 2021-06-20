<?= $this->extend('default') ?>

<?= $this->section('css') ?>
<style>
	.expired-almost {
		color: #ffc20a;
	}
	.expired-expired {
		color: red;
	}
</style>
<?= $this->endSection() ?>

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
							<div class="row">
								<div class="tile_count">
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-futbol-o"></i> Total Inventaris</span>
										<div class="count"><?= $summary['total_inventaris'] ?></div>
									</div>
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-clock-o"></i> Kondisi Baik</span>
										<div class="count"><?= $summary['kondisi_baik'] ?></div>
										<span class="count_bottom">Jumlah inventaris</span>
									</div>
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-clock-o"></i> Kondisi Kurang Baik</span>
										<div class="count green"><?= $summary['kondisi_kurang_baik'] ?></div>
										<span class="count_bottom">Jumlah inventaris</span>
									</div>
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-clock-o"></i> Kondisi Rusak</span>
										<div class="count green"><?= $summary['kondisi_rusak'] ?></div>
										<span class="count_bottom">Jumlah inventaris</span>
									</div>
									<div class="col-md-6 col-sm-6  tile_stats_count">
										<span class="count_top"><i class="fa fa-money"></i> Total Kekayaan</span>
										<div class="count green"><?= $summary['total_kekayaan'] ?></div>
										<span class="count_bottom"></span>
									</div>
								</div>
							</div>
							<h2>Notifikasi</h2>
							<?php foreach ($rows_pajak_expired as $row_pajak_expired): ?>
							<p>
							<i class="fa fa-exclamation-circle expired-<?= $row_pajak_expired->status ?>" aria-hidden="true"></i>
							Inventaris <a href="/admin/inventaris/<?= $row_pajak_expired->id ?>?update-batas-pakai=1"><b><?= $row_pajak_expired->nama ?></b></a> <?= $row_pajak_expired->status === 'almost'
								? 'hampir'
								: 'telah' ?> <?= $row_pajak_expired->pesan ?: 'habis pajak' ?>. <a href="/admin/inventaris/<?= $row_pajak_expired->id ?>?update-batas-pakai=1">Update batas pakai</a></p>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
