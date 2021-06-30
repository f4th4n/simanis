<?php
$role_id = session()->get('role_id');
?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="/admin/beranda" class="site_title"><i class="fa fa-barcode"></i> <span><?= config('Simanis')->app_name ?></span></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
			</div>
			<div class="profile_info">
				<span>Hai,</span>
				<h2><?= session()->get('nama') ?></h2>
			</div>
		</div>
		<!-- /menu profile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<ul class="nav side-menu">
					<li <?= strpos(current_url(), '/admin/beranda') ? 'class="current-page"' : '' ?>><a href="/admin/beranda"><i class="fa fa-home"></i> Beranda</a></li>
					<?php if($role_id === 'admin'): ?>
						<li <?= strpos(current_url(), '/admin/admin') ? 'class="current-page"' : '' ?>>
							<a href="/admin/admin"><i class="fa fa-users"></i> Admin</a>
						</li>
						<li <?= strpos(current_url(), '/admin/inventaris') ? 'class="current-page"' : '' ?>>
							<a href="/admin/inventaris"><i class="fa fa-laptop"></i> Inventaris</a>
						</li>
						<li <?= strpos(current_url(), '/admin/laporan-pengecekan') ? 'class="current-page"' : '' ?>>
							<a href="/admin/laporan-pengecekan"><i class="fa fa-file"></i> Laporan Pengecekan</a>
						</li>
						<li <?= strpos(current_url(), '/admin/perawatan') ? 'class="current-page"' : '' ?>>
							<a href="/admin/perawatan"><i class="fa fa-gear"></i> Data Perawatan</a>
						</li>
						<li <?= strpos(current_url(), '/admin/mutasi') ? 'class="current-page"' : '' ?>>
							<a href="/admin/mutasi"><i class="fa fa-car"></i> Data Mutasi</a>
						</li>
						<li <?= strpos(current_url(), '/admin/pengajuan') ? 'class="current-page"' : '' ?>>
							<a href="/admin/pengajuan"><i class="fa fa-shopping-basket"></i> Pengajuan</a>
						</li>
						<li <?= strpos(current_url(), '/admin/nilai-kekayaan') ? 'class="current-page"' : '' ?>>
							<a href="/admin/nilai-kekayaan"><i class="fa fa-money"></i> Nilai Kekayaan</a>
						</li>
						<li <?= strpos(current_url(), '/admin/surat-perintah') ? 'class="current-page"' : '' ?>>
							<a href="/admin/surat-perintah"><i class="fa fa-"></i> Surat Perintah</a>
						</li>
					<?php elseif($role_id === 'pengecek'): ?>
						<li <?= strpos(current_url(), '/admin/pengecek/laporan-pengecekan') ? 'class="current-page"' : '' ?>>
							<a href="/admin/pengecek/laporan-pengecekan"><i class="fa fa-folder"></i> Laporan Pengecekan</a>
						</li>
					<?php endif ?>
				</ul>
			</div>

		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="/admin/logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>

<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<div class="nav toggle">
			<a id="menu_toggle"><i class="fa fa-bars"></i></a>
		</div>
		<nav class="nav navbar-nav">
			<ul class=" navbar-right">
				<li class="nav-item dropdown open" style="padding-left: 15px;">
					<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
						<?= session()->get('nama') ?>
					</a>
					<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
					</div>
				</li>

			</ul>
		</nav>
	</div>
</div>
<!-- /top navigation -->
