<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model {
	protected $table      = 'inventaris';
	protected $useAutoIncrement = true;

	protected $allowedFields = ['no_inventaris'];
	protected $useTimestamps = true;
}
