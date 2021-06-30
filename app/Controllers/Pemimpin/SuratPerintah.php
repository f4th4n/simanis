<?php

namespace App\Controllers\Pemimpin;

use App\Controllers\BaseController;
use App\Models\SuratPerintahModel;
use App\Models\UserModel;

class SuratPerintah extends BaseController {
	public function index() {
		$surat_perintah_model = new SuratPerintahModel();
		$rows_surat_perintah = $surat_perintah_model->findAll();
		$rows_surat_perintah = array_map(function($row) {
			return SuratPerintahModel::dto($row);
		}, $rows_surat_perintah);

		$data = [
			'title' => 'Nilai Kekayaan',
			'rows_surat_perintah' => $rows_surat_perintah,
		];

		return view('pemimpin/surat_perintah/index', $data);
	}
	public function view($id) {
		$surat_perintah_model = new SuratPerintahModel();
		$user_model = new UserModel();
		$row_surat_perintah = $surat_perintah_model->find($id);

		$data = [
			'title' => 'Data SuratPerintah',
			'row_surat_perintah' => SuratPerintahModel::dto($row_surat_perintah),
			'users' => $user_model->findAll()
		];

		return view('pemimpin/surat_perintah/view', $data);
	}

	public function create() {
		$surat_perintah_model = new SuratPerintahModel();
		$user_model = new UserModel();

		$data = [
			'title' => 'Tambah SuratPerintah',
			'count_surat_perintah' => $surat_perintah_model->countAll() + 1,
			'users' => $user_model->findAll()
		];
		return view('pemimpin/surat_perintah/create', $data);
	}

	public function delete($id) {
		if(!$id) return;

		$surat_perintah_model = new SuratPerintahModel();
		$surat_perintah_model->delete($id);
	}

	public function save($id = null) {
		$surat_perintah_model = new SuratPerintahModel();

		$is_new = $id === null;
		$failed_redirect_to = $is_new ? '/admin/pemimpin/surat-perintah/create' : '/admin/pemimpin/surat-perintah/' . $id;
		$succed_redirect_to = $is_new ? '/admin/pemimpin/surat-perintah' : '/admin/pemimpin/surat-perintah/' . $id;

		$validation_rule = [
			'tanggal-terbit' => 'required',
			'to-user' => 'required',
			'perintah' => 'required',
			'tanggal-pelaksanaan' => 'required'
		];

		if(!$is_new) {
			$validation_rule['id'] = 'required';
		}

		if(!$this->validate($validation_rule)) {	
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to($failed_redirect_to);
		}

		$data = SuratPerintahModel::rto($this->request, $is_new);

		$surat_perintah_model->save($data);

		$msg = $is_new ? 'Berhasil membuat surat_perintah baru' : 'Berhasil menyimpan surat_perintah';
		session()->setFlashdata('msg', ['msg' => $msg, 'type' => 'success']);
		return redirect()->to($succed_redirect_to);
	}
}