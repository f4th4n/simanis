<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;

class Inventaris extends BaseController {
	public function index() {
		$inventaris_model = new InventarisModel();
		$rows_inventaris = $inventaris_model->findAll();

		$data = [
			'title' => 'Inventaris',
			'rows_inventaris' => $rows_inventaris,
		];

		return view('admin/inventaris/index', $data);
	}

	public function view($id) {
		$inventaris_model = new InventarisModel();
		$row_inventaris = $inventaris_model->find($id);

		$data = [
			'title' => 'Data Inventaris',
			'row_inventaris' => InventarisModel::dto($row_inventaris),
		];

		return view('admin/inventaris/view', $data);
	}

	public function create() {
		$inventaris_model = new InventarisModel();

		$data = [
			'title' => 'Tambah Inventaris',
			'count_inventaris' => $inventaris_model->countAll() + 1,
		];
		return view('admin/inventaris/create', $data);
	}

	public function delete($id) {
		if (!$id) {
			return;
		}

		$inventaris_model = new InventarisModel();
		$inventaris_model->delete($id);
	}

	public function save($id = null) {
		$inventaris_model = new InventarisModel();

		$is_new = $id === null;
		$failed_redirect_to = $is_new ? '/admin/inventaris/create' : '/admin/inventaris/' . $id;
		$succed_redirect_to = $is_new ? '/admin/inventaris' : '/admin/inventaris/' . $id;

		$validation_rule = [
			'nama' => 'required|min_length[3]|max_length[512]',
			'no-seri' => 'required',
			'merk' => 'required',
			'tanggal-didaftarkan' => 'required',
			'nilai-kekayaan' => 'required',
			'lokasi-penempatan' => 'required',
			'batas-pakai' => 'required',
			'keterangan' => 'required',
		];

		if (!$is_new) {
			$validation_rule['id'] = 'required';
		}

		if (!$this->validate($validation_rule)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to($failed_redirect_to);
		}

		$data = InventarisModel::rto($this->request, $is_new);

		// file upload handler
		$file_foto = $this->request->getFile('foto');
		if ($file_foto->isValid()) {
			$foto_path = $file_foto->store();
			$data['foto'] = $foto_path;
		}

		$inventaris_model->save($data);

		$msg = $is_new ? 'Berhasil membuat inventaris baru' : 'Berhasil menyimpan inventaris';
		session()->setFlashdata('msg', ['msg' => $msg, 'type' => 'success']);
		return redirect()->to($succed_redirect_to);
	}
}
