<?= $this->load->view('top', '', TRUE) ?>
<div class="container">
  	<div class="row">
  		<h3 class="mt-3">TURN OVER DASHBOARD</h3>
  		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
		    	<form action="<?= base_url('admin/dashboard') ?>" method="GET" role="form">
					<div class="form-group">
						<?= form_label('Project', 'project') ?>
						<div class="input-group">
							<?= form_dropdown('project',$projects,null,['id' => 'project','class' => 'form-control','placeholder' => 'Project List']) ?>
							<div class="input-group-append">
								<?= form_submit('submit','SEARCH',['class' => 'search_unit btn btn-outline-dark','id' => 'search_unit']) ?>
							</div>        					
						</div>
					</div>
				</form>				
			</div>  			
  		</div>
	</div>
	<hr>
	<div class="row" id="app">

	</div>
</div>