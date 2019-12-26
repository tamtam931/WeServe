<?= form_open('sap/customer'); ?>
	<h4 class="text-info">Fetching Customer Data Reminder</h4>
	<p>All Data from SAP will directly save to WeServer Database</p>
	<p>WeServe will only fetch newly created/updated SAP data</p>
	<p class="text-danger">Fetching Data might cause a minute or so, please do not close the window and wait until the process has done before closing the page</p>
	<hr>
	<div class="from-group">
		<?= form_label('SAP Customer Resource', 'sap_resource') ?>
		<?= form_input("sap_resource",'Customers',['id' => 'sap_resource','class' => 'form-control','placeholder' => 'API Resource','readonly' => 'readonly']); ?>		
	</div>
	<hr>
	<p class="lead">Do you really want to Fetch data from SAP</p>
	<?= form_submit('submit','Fetch Now',['class' => 'add_customer btn btn-primary btn-block btn-sm']); ?>
<?= form_close() ?>