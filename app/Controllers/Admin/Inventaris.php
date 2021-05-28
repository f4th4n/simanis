<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Inventaris extends BaseController {
	public function index() {
		$inventaris_model = new \App\Models\InventarisModel();
		$rows_inventaris = $inventaris_model->findAll();

		$data = [
			'title' => 'Tambah Inventaris',
			'rows_inventaris' => $rows_inventaris,
		];

		return view('inventaris/index', $data);
	}

	public function view($id) {
		$inventaris_model = new \App\Models\InventarisModel();
		$row_inventaris = $inventaris_model->find($id);

		$data = [
			'row_inventaris' => $row_inventaris,
		];

		return view('inventaris/view', $data);
	}

	public function create() {
		$data = [
			'title' => 'Tambah Inventaris',
		];
		return view('inventaris/create', $data);
	}

	public function save() {
		$inventaris_model = new \App\Models\InventarisModel();

		if(!$this->validate([
      'nama' => 'required|min_length[3]|max_length[255]',
      'body'  => 'required',
		])) {	
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to('/admin/inventaris/create');
		}

		$data = [
			'no_inventaris' => ($inventaris_model->countAll() + 1),
			'nama' => $this->request->getPost('nama'),
			'no_seri' => $this->request->getPost('no_seri'),
			'merk' => $this->request->getPost('merk'),
			'tanggal_didaftarkan' => date_create_from_format('d-m-Y', $this->request->getPost('tanggal_didaftarkan'))->format('Y-m-d 0:0:0'),
			'nilai_kekayaan' => $this->request->getPost('nilai_kekayaan'),
			'lokasi_penempatan' => $this->request->getPost('lokasi_penempatan'),
			'batas_pakai' => $this->request->getPost('batas_pakai'),
			'keterangan' => $this->request->getPost('keterangan'),
		];
		$inventaris_model->save($data);

		session()->setFlashdata('msg', ['msg' => 'Holaa ' . json_encode($data), 'type' => 'success']);
		return redirect()->to('/admin/inventaris');
	}
}
