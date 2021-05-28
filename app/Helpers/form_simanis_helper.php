<?php

function form_text($column_name, $text) {
	?>
		<div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
				<input name="<?= $column_name ?>" type="text" class="form-control">
        <span class="glyphicon glyphicon-font form-control-feedback right" aria-hidden="true"></span>
      </div>
    </div>
	<?php
}

function form_number($column_name, $text) {
	?>
		<div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <input name="<?= $column_name ?>" type="number" class="form-control">
        <span class="fa fa-sort-numeric-asc form-control-feedback right" aria-hidden="true"></span>
      </div>
    </div>
	<?php
}

function form_date($column_name, $text) {
	?>
		<div class="form-group row">
		<label class="control-label col-md-3 col-sm-3 col-xs-3"><?= $text ?></label>
      <div class="col-md-9 col-sm-9 col-xs-9">
				<input name="<?= $column_name ?>" type="text" class="form-date form-control">
        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
      </div>
    </div>
	<?php
}
