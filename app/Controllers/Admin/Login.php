<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController {
	public function view() {
		return view('login/index');
	}

	public function login() {
		echo 'test';
	}
}
