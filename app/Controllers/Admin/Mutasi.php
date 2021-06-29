<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MutasiModel;
use App\Models\InventarisModel;

class Mutasi extends BaseController {
	public function index() {
		$mutasi_model = new MutasiModel();
		$rows_mutasi = $mutasi_model->findAll();

		$rows_laporan_pengecekan_dto = array_map(function ($row) {
			return MutasiModel::dto($row);
		}, $rows_mutasi);

		$data = [
			'title' => 'Mutasi',
			'rows_mutasi' => $rows_laporan_pengecekan_dto,
		];

		return view('admin/mutasi/index', $data);
	}

	public function view($id) {
		$mutasi_model = new MutasiModel();
		$row_mutasi = $mutasi_model->find($id);

		$data = [
			'title' => 'Data Mutasi',
			'row_mutasi' => MutasiModel::dto($row_mutasi),
		];

		return view('admin/mutasi/view', $data);
	}

	public function create() {
		$mutasi_model = new MutasiModel();

		$data = [
			'title' => 'Tambah Mutasi',
			'count_mutasi' => $mutasi_model->countAll() + 1
		];
		return view('admin/mutasi/create', $data);
	}

	public function delete($id) {
		if(!$id) return;

		$mutasi_model = new MutasiModel();
		$mutasi_model->delete($id);
	}

	public function save($id = null) {
		$mutasi_model = new MutasiModel();
		$inventaris_model = new InventarisModel();

		$is_new = $id === null;
		$failed_redirect_to = $is_new ? '/admin/mutasi/create' : '/admin/mutasi/' . $id;
		$succed_redirect_to = $is_new ? '/admin/mutasi' : '/admin/mutasi/' . $id;

		$validation_rule = [
			'tanggal-mutasi' => 'required',
			'inventaris-id' => 'required',
			'lokasi-awal' => 'required',
			'lokasi-tujuan' => 'required',
		];

		if(!$is_new) {
			$validation_rule['id'] = 'required';
		}

		if(!$this->validate($validation_rule)) {	
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to($failed_redirect_to);
		}

		$data = MutasiModel::rto($this->request, $is_new);
		$inventaris_exist = $inventaris_model->find($data['inventaris_id']);
		if(!$inventaris_exist) {
			session()->setFlashdata('msg', ['msg' => 'Kode inventaris tidak ditemukan', 'type' => 'error']);
			return redirect()->to($failed_redirect_to);
		}

		$mutasi_model->save($data);

		$msg = $is_new ? 'Berhasil membuat mutasi baru' : 'Berhasil menyimpan mutasi';
		session()->setFlashdata('msg', ['msg' => $msg, 'type' => 'success']);
		return redirect()->to($succed_redirect_to);
	}
}
