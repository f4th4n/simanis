<?php

function form_text($column_name, $text, $value = '', $attr = '', $help = '') {
	?>
		<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
				<input name="<?= $column_name ?>" type="text" class="form-control" value="<?= $value ?>" <?= $attr ?>>
        <span class="glyphicon glyphicon-font form-control-feedback right" aria-hidden="true"></span>
				<p><i><?= $help ?></i></p>
      </div>
    </div>
	<?php
}

function form_password($column_name, $text, $value = '', $attr = '', $help = '') {
	?>
		<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
				<input name="<?= $column_name ?>" type="password" class="form-control" value="<?= $value ?>" <?= $attr ?> autocomplete="new-password">
        <span class="glyphicon glyphicon-font form-control-feedback right" aria-hidden="true"></span>
				<p><i><?= $help ?></i></p>
      </div>
    </div>
	<?php
}

function form_number($column_name, $text, $value = '', $attr = '', $help = '') {
	?>
		<div class="form-group row <?= $help === 'rupiah' ? 'wrapper-rupiah' : '' ?>">
			<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <input name="<?= $column_name ?>" type="number" class="form-control" value="<?= $value ?>" <?= $attr ?> autocomplete="new-password">
        <span class="fa fa-sort-numeric-asc form-control-feedback right" aria-hidden="true"></span>
				<p><i class="helper-rupiah"><?= $help ?></i></p>
      </div>
    </div>

	<?php
}

function form_date($column_name, $text, $value = '') {
	?>
		<div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
				<input name="<?= $column_name ?>" type="text" class="form-date form-control" value="<?= $value ?>">
        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
      </div>
    </div>
	<?php
}

function no_inventaris($val) {
	return str_pad($val, 5, '0', STR_PAD_LEFT);
}

function inventaris_id_text($val) {
	return 'INV-' . str_pad($val, 3, '0', STR_PAD_LEFT);
}

function kondisi_text($kondisi_key) {
	if($kondisi_key === 'baik') return 'Baik';
	elseif($kondisi_key === 'kurang_baik') return 'Kurang Baik';
	elseif($kondisi_key === 'rusak') return 'Rusak';
}
