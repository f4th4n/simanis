<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\InventarisModel;

class Pengajuan extends BaseController {
	public function index() {
		$pengajuan_model = new PengajuanModel();
		$rows_pengajuan = $pengajuan_model->findAll();

		$rows_laporan_pengecekan_dto = array_map(function ($row) {
			return PengajuanModel::dto($row);
		}, $rows_pengajuan);

		$data = [
			'title' => 'Pengajuan',
			'rows_pengajuan' => $rows_laporan_pengecekan_dto,
		];

		return view('admin/pengajuan/index', $data);
	}

	public function view($id) {
		$pengajuan_model = new PengajuanModel();
		$row_pengajuan = $pengajuan_model->find($id);

		$data = [
			'title' => 'Data Pengajuan',
			'row_pengajuan' => PengajuanModel::dto($row_pengajuan),
		];

		return view('admin/pengajuan/view', $data);
	}

	public function create() {
		$pengajuan_model = new PengajuanModel();

		$data = [
			'title' => 'Tambah Pengajuan',
			'count_pengajuan' => $pengajuan_model->countAll() + 1
		];
		return view('admin/pengajuan/create', $data);
	}

	public function delete($id) {
		if(!$id) return;

		$pengajuan_model = new PengajuanModel();
		$pengajuan_model->delete($id);
	}

	public function save($id = null) {
		$pengajuan_model = new PengajuanModel();
		$inventaris_model = new InventarisModel();

		$is_new = $id === null;
		$failed_redirect_to = $is_new ? '/admin/pengajuan/create' : '/admin/pengajuan/' . $id;
		$succed_redirect_to = $is_new ? '/admin/pengajuan' : '/admin/pengajuan/' . $id;

		$validation_rule = [
			'user-id' => 'required',
			'tanggal-pengajuan' => 'required',
			'nama-inventaris' => 'required',
			'total' => 'required',
		];

		if(!$is_new) {
			$validation_rule['id'] = 'required';
		}

		if(!$this->validate($validation_rule)) {	
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to($failed_redirect_to);
		}

		$data = PengajuanModel::rto($this->request, $is_new);

		$pengajuan_model->save($data);

		$msg = $is_new ? 'Berhasil membuat pengajuan baru' : 'Berhasil menyimpan pengajuan';
		session()->setFlashdata('msg', ['msg' => $msg, 'type' => 'success']);
		return redirect()->to($succed_redirect_to);
	}
}
