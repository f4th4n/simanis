<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Logout extends BaseController {
	public function logout() {
		$session = session();
		$session->destroy();
		return redirect()->to('/admin/login');
	}
}
