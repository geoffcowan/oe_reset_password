<div class="panel">
	<div class="panel-heading">
		<div class="title-bar">
			<h3 class="title-bar__title"><?= lang('oe_reset_password_settings') ?></h3>
		</div>
	</div>
	<div class="panel-body">
		<?= ee('CP/Alert')->getAllInlines() ?>

		<p>This addon adds a CLI Command that allows you to update a members password simply call it with:</p>
		<p><code>php eecli.php member:reset-password</code></p>
	</div>
</div>
