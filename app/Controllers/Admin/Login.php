<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController {
	public function view() {
		return view('login/index');
	}

	public function login() {
		$session = session();
		$model = new UserModel();
		$input_username = $this->request->getVar('username');
		$input_password = $this->request->getVar('password');
		$row = $model->where('username', $input_username)->first();

		if (!$row) {
			$flash_data = ['msg' => 'User tidak ditemukan', 'type' => 'error'];
			$session->setFlashdata('msg', $flash_data);
			return redirect()->to('/admin/login');
		}

		$password_match = password_verify($input_password, $row['password']);
		if (!$password_match) {
			$flash_data = ['msg' => 'Password salah', 'type' => 'error'];
			$session->setFlashdata('msg', $flash_data);
			return redirect()->to('/admin/login');
		}

		$sess_data = [
			'id' => $row['id'],
			'username' => $row['username'],
			'nama' => $row['nama'],
			'role_id' => $row['role_id'],
			'logged_in' => true,
		];
		$session->set($sess_data);
		return redirect()->to('/admin/beranda');
	}
}
