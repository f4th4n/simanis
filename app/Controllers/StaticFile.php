<?php

namespace App\Controllers;

class StaticFile extends BaseController {
	public function serve($path, $file) {
		$path = WRITEPATH . 'uploads/' . $path . '/' . $file;
		if (($image = file_get_contents($path)) === false) {
			show_404();
		}

		// choose the right mime type
		$file = new \CodeIgniter\Files\File($path);
		$mimeType = $file->getMimeType($file);

		$this->response
			->setStatusCode(200)
			->setContentType($mimeType)
			->setBody($image)
			->send();
	}
}
