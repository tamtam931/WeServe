<?= $this->load->view('top', '', TRUE) ?>

<div class="container mt-2">
	<div class="row">
		<div class="col-12 col-sm-6 col-md-4 col-lg-4 p-1">
			<div class="card">
				<div class="card-header">
					<h3 class="mb-0">SAP - Auth Config</h3>
				</div>				
				<div class="card-body dash_content">
					<p class="mb-1 font-weight-bold">Configuration module for SAP Interface</p>
					<ul class="mb-0">
						<li>Interface URL</li>
							<ul>
								<li>Protocol/Scheme</li>
								<li>Interface Domain</li>
								<li>Base URI</li>
							</ul>
						<li>Interface Authentication</li>
							<ul>
								<li>Credentials</li>
								<li>Cookie Session</li>
							</ul>
					</ul>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('sap/auth') ?>"><button class="load_auth btn btn-success btn-block">Browse</button></a>
				</div>
			</div>			
		</div>
		<div class="col-12 col-sm-6 col-md-4 col-lg-4 p-1">
			<div class="card">
				<div class="card-header">
					<h3 class="mb-0">SAP - Projects</h3>
				</div>				
				<div class="card-body dash_content">
					<p class="mb-1 font-weight-bold">Interface Data Configurations</p>
					<ul class="mb-0">
						<li>SAP Initialization Data</li>
						<ul>
							<li>Company</li>
							<li>Project</li>
							<li>Towers</li>
						</ul>
						<li>Units</li>
						<ul>
							<li>Unit Types</li>
							<li>Floors</li>
						</ul>
					</ul>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('sap/project') ?>"><button class="load_projects btn btn-success btn-block">Browse</button></a>
				</div>
			</div>			
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-4 p-1">
			<div class="card">
				<div class="card-header">
					<h3 class="mb-0">SAP - Customer List</h3>
				</div>
				<div class="card-body dash_content">
					<p class="mb-1 font-weight-bold">List of customers based on SAP API</p>
					<ul>
						<li>Personal Information</li>
						<li>Contact Information</li>
					</ul>	
				</div>
				<div class="card-footer">
					<a href="<?= base_url('sap/customer') ?>" data-tb="1"><button class="load_customers btn btn-success btn-block">Browse</button></a>
				</div>
			</div>			
		</div>						
	</div>
	<hr>
	<div class="messagebox alert alert-success text-center" style="display: none"></div>
	<div class="row" id="app">
	</div>
	<div class="modal fade" id="main_modal" tabindex="-1" role="dialog" aria-labelledby="main_modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="main_modalLabel">SAP Configuration</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
				
				</div>
			</div>
		</div>
	</div>	
</div>
