<?= form_open('sap/auth/'.$config['id'].'/edit'); ?>
	<div class="form-group">
		<?= form_label('SAP Protocol', 'sap_scheme') ?>
		<?= form_dropdown('sap_scheme',['http' => 'HTTP','https' => 'HTTPS'],$config['sap_scheme'],['id' => 'sap_scheme','class' => 'form-control','placeholder' => 'HTTPS or HTTP']) ?>		
	</div>
	<div class="form-group">
		<?= form_label('SAP Domain', 'sap_domain') ?>
		<?= form_input("sap_domain",$config['sap_domain'],['id' => 'sap_domain','class' => 'form-control','placeholder' => 'Base Domain']); ?>
	</div>
	<div class="form-group">
		<?= form_label('SAP Base URI.', 'sap_base') ?>
		<?= form_input("sap_base",$config['sap_base'],['id' => 'sap_base','class' => 'form-control','placeholder' => 'Base URI']); ?>
	</div>
	<hr>
	<p class="font-weight-bold">Auth Credentials</p>
	<div class="form-group">
		<div class="row">
			<div class="col-6 col-sm-6 col-md-6 col-lg-6">
				<?= form_label('Username', 'auth_username') ?>
				<?= form_input("auth_username",$config['auth_username'],['id' => 'auth_username','class' => 'form-control','placeholder' => 'SAP API Username']); ?>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-6">
				<?= form_label('Password', 'auth_password') ?>
				<?= form_password("auth_password",$config['auth_password'],['id' => 'auth_password','class' => 'form-control','placeholder' => 'SAP API password']); ?>				
			</div>
		</div>
	</div>
	<div class="messagebox alert alert-success text-center" style="display: none"></div>
	<center><a href="<?= base_url('sap/auth/create') ?>"><button class="check_auth btn btn-warning btn-sm">Check Authentcation</button></a></center>
	<div class="form-group">

		<?= form_label('SAP Client Code', 'sap_client') ?>
		<?= form_input("sap_client",$config['sap_client'],['id' => 'sap_client','class' => 'form-control','placeholder' => 'Client Code for Versioning']); ?>
		<?= form_hidden("auth_cookie",$config['auth_cookie'],['id' => 'auth_cookie','class' => 'form-control','placeholder' => 'Cookie Session from Credentials','readonly' => 'readonly']); ?>		
	</div>
	<hr>	
	<?= form_submit('submit','Update SAP Data',['class' => 'add_auth btn btn-info btn-block']); ?>	
<?= form_close(); ?>