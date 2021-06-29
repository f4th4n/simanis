<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PerawatanModel;
use App\Models\KondisiInventarisModel;

class Perawatan extends BaseController {
	public function index() {
		$perawatan_model = new PerawatanModel();

		$data = [
			'title' => 'Data Perawatan',
			'rows_daftar_perawatan' => PerawatanModel::get_daftar_perawatan(),
		];

		return view('admin/perawatan/index', $data);
	}

	public function tindakanPerawatan() {
		$perawatan_model = new PerawatanModel();
		$rows_perawatan = $perawatan_model->findAll();
		$rows_perawatan_dto = array_map(function($row) {
			return PerawatanModel::dto($row);
		}, $rows_perawatan);

		$data = [
			'title' => 'Data Perawatan',
			'rows_perawatan' => $rows_perawatan_dto,
		];

		return view('admin/perawatan/tindakan_perawatan', $data);
	}

	public function viewDafarPerawatan($kondisi_inventaris_id) {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$perawatan_model = new PerawatanModel();
		$row_kondisi_inventaris = $kondisi_inventaris_model->find($kondisi_inventaris_id);
		$row_perawatan = $perawatan_model->where('kondisi_inventaris_id', $kondisi_inventaris_id)->first();

		$data = [
			'title' => 'Form Data Perawatan',
			'row_kondisi_inventaris' => KondisiInventarisModel::dto($row_kondisi_inventaris),
			'nomor_perawatan' => $perawatan_model->countAll(),
			'row_perawatan' => $row_perawatan
		];

		return view('admin/perawatan/view', $data);
	}

	public function viewTindakanPerawatan($perawatan_id) {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$perawatan_model = new PerawatanModel();
		$row_perawatan = $perawatan_model->find($perawatan_id);
		$row_kondisi_inventaris = $kondisi_inventaris_model->find($row_perawatan['kondisi_inventaris_id']);
		$row_perawatan = PerawatanModel::dto($row_perawatan);

		$data = [
			'title' => 'Form Data Perawatan',
			'row_kondisi_inventaris' => KondisiInventarisModel::dto($row_kondisi_inventaris),
			'nomor_perawatan' => $perawatan_model->countAll(),
			'row_perawatan' => $row_perawatan
		];

		return view('admin/perawatan/view_tindakan_perawatan', $data);
	}

	public function createFromKondisiInventaris($kondisi_inventaris_id) {
		$kondisi_inventaris_model = new KondisiInventarisModel();
		$perawatan_model = new PerawatanModel();
		$row_kondisi_inventaris = $kondisi_inventaris_model->find($kondisi_inventaris_id);
		$row_perawatan = $perawatan_model->where('kondisi_inventaris_id', $kondisi_inventaris_id)->first();

		$validation_rule = [
			'nama' => 'required|min_length[3]|max_length[512]',
			'user-id' => 'required',
			'inventaris-id' => 'required',
			'tanggal-perawatan' => 'required',
			'tanggal-selesai' => 'required',
			'tempat-perawatan' => 'required',
			'biaya-perawatan' => 'required',
			'keterangan' => 'required',
		];

		if (!$this->validate($validation_rule)) {
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to($failed_redirect_to);
		}

		$data = PerawatanModel::rto($this->request, $kondisi_inventaris_id, true);

		// file upload handler
		$file_foto = $this->request->getFile('foto');
		if ($file_foto->isValid()) {
			$foto_path = $file_foto->store();
			$data['foto_kwitansi'] = $foto_path;
		}

		$perawatan_model->save($data);

		$msg = 'Berhasil membuat data perawatan';
		session()->setFlashdata('msg', ['msg' => $msg, 'type' => 'success']);
		return redirect()->to('/admin/perawatan');
	}

	public function delete($id) {
		if(!$id) return;

		$perawatan_model = new PerawatanModel();
		$perawatan_model->delete($id);
	}
}
