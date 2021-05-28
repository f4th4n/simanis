    <?php foreach ($errors as $error) : ?>
				<div class="alert alert-error alert-dismissible " role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<?= esc($error) ?>
				</div>
    <?php endforeach ?>
