<?= form_open('sap/auth/'.$config['id'].''); ?>
	<h4>This Configuration is currently <strong><?= ($config['deleted_at'] ? 'in-active' : 'active') ?></strong></h4>
	<p class="lead">Do you want to <strong><?= ($config['deleted_at'] ? 'activate' : 'disable') ?></strong> this configuration?</h4></p>
	<hr>
	<?= form_submit('submit',($config['deleted_at'] ? 'Activate' : 'Disable'),['class' => 'del_auth btn btn-primary btn-block btn-sm']); ?>
<?= form_close(); ?>