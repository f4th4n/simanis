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
	<?php $query_year = isset($_GET['year']) ? $_GET['year'] : date('Y'); ?>
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
										<div class="count green"><?= $summary['total_inventaris'] ?></div>
									</div>
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-clock-o"></i> Kondisi Baik</span>
										<div class="count"><?= $summary['kondisi_baik'] ?></div>
										<span class="count_bottom">Jumlah inventaris</span>
									</div>
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-clock-o"></i> Kondisi Kurang Baik</span>
										<div class="count"><?= $summary['kondisi_kurang_baik'] ?></div>
										<span class="count_bottom">Jumlah inventaris</span>
									</div>
									<div class="col-md-4 col-sm-4  tile_stats_count">
										<span class="count_top"><i class="fa fa-clock-o"></i> Kondisi Rusak</span>
										<div class="count"><?= $summary['kondisi_rusak'] ?></div>
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

							<br />
							<br />
							<br />

							<h2>Biaya Perawatan</h2>
							<form method="GET">
								<select name="year">
									<?php $year = (int) date('Y'); ?>
									<?php for($i = 2021; $i < ($year + 5); $i++): ?>
										<option value="<?= $i ?>" <?= $query_year == $i ? 'selected="selected"' : '' ?>><?= $i ?></option>
									<?php endfor ?>
								</select>

								<button>Submit</button>
							</form>
						  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
							<div id="chart_div"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Biaya Perawatan');

      data.addRows([
				[0, 0],
				[1, <?= $stats[0] ?>],
				[2, <?= $stats[1] ?>],
				[3, <?= $stats[2] ?>],
				[4, <?= $stats[3] ?>],
				[5, <?= $stats[4] ?>],
				[6, <?= $stats[5] ?>],
				[7, <?= $stats[6] ?>],
				[8, <?= $stats[7] ?>],
				[9, <?= $stats[8] ?>],
				[10, <?= $stats[9] ?>],
				[11, <?= $stats[10] ?>],
				[12, <?= $stats[11] ?>],
      ]);

      var options = {
        hAxis: {
          title: 'Bulan'
        },
        vAxis: {
          title: 'Biaya'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
<?= $this->endSection() ?>
