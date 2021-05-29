<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController {
	public function index() {
		$admin_model = new UserModel();
		$rows_admin = $admin_model->findAll();

		$data = [
			'title' => 'Admin',
			'rows_admin' => $rows_admin,
		];

		return view('admin/index', $data);
	}

	public function view($id) {
		$admin_model = new UserModel();
		$row_admin = $admin_model->find($id);

		$data = [
			'title' => 'Data Admin',
			'row' => UserModel::dto($row_admin),
		];

		return view('admin/view', $data);
	}

	public function create() {
		$data = [
			'title' => 'Tambah Admin',
		];
		return view('admin/create', $data);
	}

	public function delete($id) {
		if(!$id) return;

		$admin_model = new UserModel();
		$admin_model->delete($id);
	}

	public function save($id = null) {
		$admin_model = new UserModel();

		$is_new = $id === null;
		$failed_redirect_to = $is_new ? '/admin/admin/create' : '/admin/admin/' . $id;
		$succed_redirect_to = $is_new ? '/admin/admin' : '/admin/admin/' . $id;

		$validation_rule = [
      'nama' => 'required|min_length[3]|max_length[512]',
      'role_id' => 'required|in_list[admin,pemimpin,pengecek]',
		];

		if(!$is_new) {
			$validation_rule['username'] = 'required|is_unique[users.username,id,' . $id . ']';
		}

		// change password
		if($this->request->getPost('password')) {
			$validation_rule['password'] = 'min_length[6]|max_length[64]';
		}

		if(!$is_new) {
			$validation_rule['id'] = 'required';
		}

		if(!$this->validate($validation_rule)) {	
			session()->setFlashdata('validator', $this->validator);
			return redirect()->to($failed_redirect_to);
		}

		$data = UserModel::rto($this->request, $is_new);
		$admin_model->save($data);

		$msg = $is_new ? 'Berhasil membuat admin baru' : 'Berhasil menyimpan admin';
		session()->setFlashdata('msg', ['msg' => $msg, 'type' => 'success']);
		return redirect()->to($succed_redirect_to);
	}
}
