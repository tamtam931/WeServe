<?= form_open('sap/project'); ?>
	<h4 class="text-info">Fetching Data Reminder</h4>
	<p>All Data from SAP will directly save to WeServer Database</p>
	<p>WeServe will only fetch newly created/updated SAP data</p>
	<hr>
	<div class="from-group">
		<?= form_label('SAP Company Resource', 'sap_resource') ?>
		<?= form_input("sap_resource",'Phases',['id' => 'sap_resource','class' => 'form-control','placeholder' => 'API Resource','readonly' => 'readonly']); ?>		
	</div>
	<hr>
	<p class="lead">Do you really want to Fetch data from SAP</p>
	<?= form_submit('submit','Fetch Now',['class' => 'add_company btn btn-primary btn-block btn-sm']); ?>
<?= form_close() ?>