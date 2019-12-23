<?= form_open('sap/project/'.$get['id'].'/edit'); ?>
	<p class="lead">Company Data - WeServe version</p>
	<hr>
	<div class="row">
		<div class="col-12 col-sm-6 col-md-6 col-lg-6">
			<p class="font-weight-bold mb-1">Company Code</p>
			<p><?= $get['company_code'] ?></p>			
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-lg-6">
			<p class="font-weight-bold mb-1">Company Description</p>
			<p><?= $get['company_description'] ?></p>			
		</div>		
	</div>
	<div class="row">
		<div class="col-12 col-sm-6 col-md-6 col-lg-6">
			<p class="font-weight-bold mb-1">Date Created</p>
			<p><?= date("F d, Y",strtotime($get['created_at'])) ?></p>			
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-lg-6">
			<p class="font-weight-bold mb-1">Last Update</p>
			<p><?= ($get['updated_at'] == 0 ? 'Data not updated' : date("F d, Y",strtotime($get['updated_at']))) ?></p>			
		</div>		
	</div>
	<div class="form-group">
		<?= form_label('Current Status', 'is_activated') ?>
		<?= form_dropdown('is_activated',['1' => 'Active','0' => 'Deactivate'],$get['is_activated'],['id' => 'is_activated','class' => 'form-control']) ?>
		<?= form_hidden('sap_params','update_company') ?>		
	</div>
	<hr>
	<?= form_submit('update','Update Record',['class' => 'edit_company btn btn-block btn-info']) ?>
<?= form_close() ?>