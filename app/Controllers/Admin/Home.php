<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController {
	public function index() {
		$data = [
			'title' => 'Beranda'
		];
		return view('home/index', $data);
	}
}
