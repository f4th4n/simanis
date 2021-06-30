<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/static/uploads/(:any)', 'StaticFile::serve/$1/$2');

$routes->get('/admin/login', '\App\Controllers\Admin\Login::view');
$routes->post('/admin/login', '\App\Controllers\Admin\Login::login');
$routes->get('/admin/logout', '\App\Controllers\Admin\Logout::logout');

// home
$routes->get('/admin/beranda', '\App\Controllers\Admin\Home::index');

$routes->get('/admin/inventaris', '\App\Controllers\Admin\Inventaris::index');
$routes->get('/admin/inventaris/(:num)', '\App\Controllers\Admin\Inventaris::view/$1');
$routes->get('/admin/inventaris/create', '\App\Controllers\Admin\Inventaris::create');
$routes->post('/admin/inventaris/create', '\App\Controllers\Admin\Inventaris::save');
$routes->post('/admin/inventaris/update/(:num)', '\App\Controllers\Admin\Inventaris::save/$1');
$routes->delete('/admin/inventaris/delete/(:num)', '\App\Controllers\Admin\Inventaris::delete/$1');

$routes->get('/admin/laporan-pengecekan', '\App\Controllers\Admin\LaporanPengecekan::index');
$routes->get('/admin/laporan-pengecekan/(:num)', '\App\Controllers\Admin\LaporanPengecekan::view/$1');
$routes->get('/admin/laporan-pengecekan/create', '\App\Controllers\Admin\LaporanPengecekan::create');
$routes->post('/admin/laporan-pengecekan/create', '\App\Controllers\Admin\LaporanPengecekan::save');
$routes->post('/admin/laporan-pengecekan/update/(:num)', '\App\Controllers\Admin\LaporanPengecekan::save/$1');
$routes->delete('/admin/laporan-pengecekan/delete/(:num)', '\App\Controllers\Admin\LaporanPengecekan::delete/$1');
$routes->get('/admin/laporan-pengecekan/kondisi/(:any)', '\App\Controllers\Admin\LaporanPengecekan::kondisiInventaris/$1');

$routes->get('/admin/perawatan', '\App\Controllers\Admin\Perawatan::index');
$routes->get('/admin/perawatan/(:num)', '\App\Controllers\Admin\Perawatan::viewDafarPerawatan/$1');
$routes->get('/admin/perawatan/tindakan-perawatan', '\App\Controllers\Admin\Perawatan::tindakanPerawatan');
$routes->get('/admin/perawatan/tindakan-perawatan/(:num)', '\App\Controllers\Admin\Perawatan::viewTindakanPerawatan/$1');
$routes->get('/admin/perawatan/create', '\App\Controllers\Admin\Perawatan::create');
$routes->post('/admin/perawatan/create', '\App\Controllers\Admin\Perawatan::save');
$routes->post('/admin/perawatan/update/(:num)', '\App\Controllers\Admin\Perawatan::save/$1');
$routes->delete('/admin/perawatan/delete/(:num)', '\App\Controllers\Admin\Perawatan::delete/$1');
$routes->post('/admin/perawatan/create-from-kondisi-inventaris/(:num)', '\App\Controllers\Admin\Perawatan::createFromKondisiInventaris/$1');

$routes->get('/admin/mutasi', '\App\Controllers\Admin\Mutasi::index');
$routes->get('/admin/mutasi/(:num)', '\App\Controllers\Admin\Mutasi::view/$1');
$routes->get('/admin/mutasi/create', '\App\Controllers\Admin\Mutasi::create');
$routes->post('/admin/mutasi/create', '\App\Controllers\Admin\Mutasi::save');
$routes->post('/admin/mutasi/update/(:num)', '\App\Controllers\Admin\Mutasi::save/$1');
$routes->delete('/admin/mutasi/delete/(:num)', '\App\Controllers\Admin\Mutasi::delete/$1');

$routes->get('/admin/pengajuan', '\App\Controllers\Admin\Pengajuan::index');
$routes->get('/admin/pengajuan/(:num)', '\App\Controllers\Admin\Pengajuan::view/$1');
$routes->get('/admin/pengajuan/create', '\App\Controllers\Admin\Pengajuan::create');
$routes->post('/admin/pengajuan/create', '\App\Controllers\Admin\Pengajuan::save');
$routes->post('/admin/pengajuan/update/(:num)', '\App\Controllers\Admin\Pengajuan::save/$1');
$routes->delete('/admin/pengajuan/delete/(:num)', '\App\Controllers\Admin\Pengajuan::delete/$1');


$routes->get('/admin/surat-perintah', '\App\Controllers\Admin\SuratPerintah::index');
$routes->get('/admin/surat-perintah/(:num)', '\App\Controllers\Admin\SuratPerintah::view/$1');

$routes->get('/admin/admin', '\App\Controllers\Admin\Admin::index');
$routes->get('/admin/admin/(:num)', '\App\Controllers\Admin\Admin::view/$1');
$routes->get('/admin/admin/create', '\App\Controllers\Admin\Admin::create');
$routes->post('/admin/admin/create', '\App\Controllers\Admin\Admin::save');
$routes->post('/admin/admin/update/(:num)', '\App\Controllers\Admin\Admin::save/$1');
$routes->delete('/admin/admin/delete/(:num)', '\App\Controllers\Admin\Admin::delete/$1');

$routes->get('/admin/nilai-kekayaan', '\App\Controllers\Admin\NilaiKekayaan::index');

// Pengecek
$routes->get('/admin/pengecek/laporan-pengecekan/inventaris/(:num)', '\App\Controllers\Pengecek\LaporanPengecekan::getInventaris/$1');

$routes->get('/admin/pengecek/laporan-pengecekan', '\App\Controllers\Pengecek\LaporanPengecekan::index');
$routes->get('/admin/pengecek/laporan-pengecekan/(:num)', '\App\Controllers\Pengecek\LaporanPengecekan::view/$1');
$routes->get('/admin/pengecek/laporan-pengecekan/create', '\App\Controllers\Pengecek\LaporanPengecekan::create');
$routes->post('/admin/pengecek/laporan-pengecekan/create', '\App\Controllers\Pengecek\LaporanPengecekan::start');
$routes->get('/admin/pengecek/laporan-pengecekan/fill/(:any)', '\App\Controllers\Pengecek\LaporanPengecekan::fill/$1');
$routes->post('/admin/pengecek/laporan-pengecekan/update-kondisi', '\App\Controllers\Pengecek\LaporanPengecekan::updateKondisi');

$routes->post('/admin/pengecek/laporan-pengecekan/update/(:num)', '\App\Controllers\Pengecek\LaporanPengecekan::save/$1');
$routes->delete('/admin/pengecek/laporan-pengecekan/delete/(:num)', '\App\Controllers\Pengecek\LaporanPengecekan::delete/$1');

$routes->get('/admin/pengecek/inventaris', '\App\Controllers\Pengecek\Inventaris::index');
$routes->get('/admin/pengecek/inventaris/(:num)', '\App\Controllers\Pengecek\Inventaris::view/$1');

$routes->get('/admin/pengecek/pengajuan', '\App\Controllers\Pengecek\Pengajuan::index');
$routes->get('/admin/pengecek/pengajuan/(:num)', '\App\Controllers\Pengecek\Pengajuan::view/$1');
$routes->get('/admin/pengecek/pengajuan/create', '\App\Controllers\Pengecek\Pengajuan::create');
$routes->post('/admin/pengecek/pengajuan/create', '\App\Controllers\Pengecek\Pengajuan::save');
$routes->post('/admin/pengecek/pengajuan/update/(:num)', '\App\Controllers\Pengecek\Pengajuan::save/$1');
$routes->delete('/admin/pengecek/pengajuan/delete/(:num)', '\App\Controllers\Pengecek\Pengajuan::delete/$1');

$routes->get('/admin/pengecek/surat-perintah', '\App\Controllers\Pengecek\SuratPerintah::index');
$routes->get('/admin/pengecek/surat-perintah/(:num)', '\App\Controllers\Pengecek\SuratPerintah::view/$1');

// Pemimpin
$routes->get('/admin/pemimpin/surat-perintah', '\App\Controllers\Pemimpin\SuratPerintah::index');
$routes->get('/admin/pemimpin/surat-perintah/(:num)', '\App\Controllers\Pemimpin\SuratPerintah::view/$1');
$routes->get('/admin/pemimpin/surat-perintah/create', '\App\Controllers\Pemimpin\SuratPerintah::create');
$routes->post('/admin/pemimpin/surat-perintah/create', '\App\Controllers\Pemimpin\SuratPerintah::save');
$routes->post('/admin/pemimpin/surat-perintah/update/(:num)', '\App\Controllers\Pemimpin\SuratPerintah::save/$1');
$routes->delete('/admin/pemimpin/surat-perintah/delete/(:num)', '\App\Controllers\Pemimpin\SuratPerintah::delete/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
