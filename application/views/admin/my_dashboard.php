<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">

<div class="container-fluid">

		<div class = "row">
			<h3 class="mb-3">MY DASHBOARD</h3>
			<div class="col-md-4 mb-3">
					<select class="custom-select d-block w-100" id="role" name="role" onchange="filtered_ticket(this.value);" required>
						<option value=""> -- Filter Dashboard by Group --</option>
						<option value="2" <?php if(user('position') == 0){echo '';}elseif(user('position') == 1){echo '';}elseif(user('position') == 2){echo '';}else{echo 'hidden';}  ?>>All Inbound Group</option>
						<option value="3" <?php if(user('position') == 0){echo '';}elseif(user('position') == 1){echo '';}elseif(user('position') == 3){echo '';}else{echo 'hidden';}  ?>>All Outbound Group</option>
						<option value="5" <?php if(user('position') == 0){echo '';}elseif(user('position') == 1){echo '';}elseif(user('position') == 5){echo '';}else{echo 'hidden';}  ?>>All Handover Group</option>
					</select>
			</div>
		</div>
	
  		<div class="row">
		  <form action="" method="post" role="form" class="needs-validation">
			  <input type="hidden" class="form-control" id="role" name = "role" value="">
		  </form>
	  		<div class="col-md-2">
	  			<div class="ht-tm-element card bg-primary text-white mb-3 text-center">
				  <div class="card-body">
				    <h3 class="card-title"><span class="fa fa-folder-open"></span></h3>
				    <p class="card-text">Open <span class="badge badge-warning badge-pill">1</span></p>
				  </div>
				</div>

	  			<div class="ht-tm-element card bg-primary text-white mb-3 text-center">
				  <div class="card-body">
				    <h3 class="card-title"><span class="fa fa-exclamation-triangle"></span></h3>
				    <p class="card-text">Overdue <span class="badge badge-warning badge-pill">0</span></p>
				  </div>
				</div>
	
	  			<div class="ht-tm-element card bg-primary text-white mb-3 text-center">
				  <div class="card-body">
				    <h3 class="card-title"><span class="fa fa-clock"></span></h3>
				    <p class="card-text">Due Today <span class="badge badge-warning badge-pill">0</span></p>
				  </div>
				</div>

	  			<div class="ht-tm-element card bg-primary text-white mb-3 text-center">
				  <div class="card-body">
				    <h3 class="card-title"><span class="fa fa-check"></span></h3>
				    <p class="card-text">Complete Activity <span class="badge badge-warning badge-pill">50</span></p>
				  </div>
				</div>
	  	
	  			<div class="ht-tm-element card bg-primary text-white mb-3 text-center">
				  <div class="card-body">
				    <h3 class="card-title"><span class="fa fa-unlock-alt"></span></h3>
				    <p class="card-text">Closed <span class="badge badge-warning badge-pill">40</span></p>
				  </div>
				</div>

		  	</div>
		  	<div class="col-md-10">
		  		<div class="row">
			  		<div class="col-md-5">
			  			<div class="card border-primary mb-3">
						  <div class="card-body text-primary">
						    <h1 class="card-title text-center"><span class="fa fa-handshake"></span></h1>
						    <h5 class="card-title text-center">TURNOVER</h5>
						    <p class="card-text">
						    	<ul class="list-group mb-3">
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Open 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Due Today 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Complete Activity 
						    			<span class="badge badge-primary badge-pill">20</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Closed 
						    			<span class="badge badge-primary badge-pill">10</span>
						    		</li>
						    	</ul>
						    </p>
						  </div>
						</div>
			  		</div>

			  		<div class="col-md-5">
			  			<div class="card border-primary mb-3">
						  <div class="card-body text-primary">
						    <h1 class="card-title text-center"><span class="fa fa-comment"></span></h1>
						    <h5 class="card-title text-center">INQUIRY</h5>
						    <p class="card-text">
						    	<ul class="list-group mb-3">
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Open 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Due Today 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Complete Activity 
						    			<span class="badge badge-primary badge-pill">20</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Closed 
						    			<span class="badge badge-primary badge-pill">10</span>
						    		</li>
						    	</ul>
						    </p>
						  </div>
						</div>
			  		</div>

			  		<div class="col-md-5">
			  			<div class="card border-primary mb-3">
						  <div class="card-body text-primary">
						    <h1 class="card-title text-center"><span class="fa fa-exclamation-circle"></span></h1>
						    <h5 class="card-title text-center">REQUEST</h5>
						    <p class="card-text">
						    	<ul class="list-group mb-3">
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Open 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Due Today 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Complete Activity 
						    			<span class="badge badge-primary badge-pill">20</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Closed 
						    			<span class="badge badge-primary badge-pill">10</span>
						    		</li>
						    	</ul>
						    </p>
						  </div>
						</div>
			  		</div>

			  		<div class="col-md-5">
			  			<div class="card border-primary mb-3">
						  <div class="card-body text-primary">
						    <h1 class="card-title text-center"><span class="fa fa-bullhorn"></span></h1>
						    <h5 class="card-title text-center">COMPLAINT</h5>
						    <p class="card-text">
						    	<ul class="list-group mb-3">
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Open 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Due Today 
						    			<span class="badge badge-primary badge-pill">2</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Complete Activity 
						    			<span class="badge badge-primary badge-pill">20</span>
						    		</li>
						    		<li  class="list-group-item d-flex justify-content-between lh-condensed" style="padding:5px;">Closed 
						    			<span class="badge badge-primary badge-pill">10</span>
						    		</li>
						    	</ul>
						    </p>
						  </div>
						</div>
			  		</div>

		  		</div>
		  	</div>
		  	<div class= "col-md-12">
			 <!--  <a href="<?= base_url('admin/my_dashboard_filtered_tickets/'.user('id')) ?>" class="pl-md-0 p-3 text-black">Filter by group tickets</a> -->

				  <table class="table" id="tickets_table">
				  	<thead class="thead-light">
					    <tr>
					      <th scope="col">Ticket No.</th>
					      <th scope="col">Created By</th>
					      <th scope="col">Category</th>
					      <th scope="col">Subject</th>
					      <th scope="col">Status</th>
					      <th scope="col">Date Created</th>
					      <th scope="col">Date Assigned</th>
					      <th scope="col">TAT (DD:MM:SS)</th>
					    </tr>
				  	</thead>
				  	<tbody>
				  		<?php foreach($tickets as $ticket): ?>
					    <tr>
						  <th scope="row"><a href="<?= base_url('admin/ticket_details/'.$ticket->ticket_id); ?>"> <?= $ticket->ticket_number; ?></a></th>
					      <th scope="row"> <?= $ticket->lastname; ?>, <?= $ticket->firstname; ?></th>
					      <th scope="row"><?= $ticket->category; ?></th>
					      <th scope="row"><?= $ticket->subject; ?></th>
					      <th scope="row"><?= $ticket->status_description;; ?></th>
					      <th scope="row"><?= $ticket->date_created; ?></th>
					      <th scope="row"><?= $ticket->date_assigned; ?></th>
					      <th scope="row">0</th>
					  	</tr>
					  <?php endforeach; ?>
					</tbody>
				</table>
		  	</div>
		</div>
  	</div>
  </div>

  <script type="text/javascript">
  	window.onload = function() {
	  	$(document).ready(function () {
			$('#tickets_table').DataTable({
				destroy: true , 
				/* "columnDefs": [ {
				"targets": 0,
				"data": "download_link",
				"render": function ( data, type, row, meta ) {
				return '<a href="'+data+'">Download</a>';
				}
			} ] */
			});
		});
	  }
	
	function filtered_ticket(role){
			$("#role").val(role)
			console.log($("#role").val());
			$('#tickets_table').DataTable( {
					"columnDefs": [ {
					"targets": 0,
					"data": "download_link",
					"render": function ( data, type, row, meta ) {
					return '<a href="'+data+'">Download</a>';
					}
				} ],
			destroy: true, 
				"columnDefs": [ {
				"targets": 0,
				"data": "download_link",
				"render": function ( data, type, row, meta ) {
					return '<a href=<?= base_url('admin/ticket_details/');?>'+row["ticket_id"]+'>'+data+'</a>';
				}
			} ],
			ajax: {
				url: '<?= base_url('admin/get_ticket_filtered'); ?>',
				data: {
					role: role
				},
				dataSrc: ''
			},
			columns: [
				{ data: 'ticket_number'},
				{ data: 'fullname' },
				{ data: 'category' },
				{ data: 'subject' },
				{ data: 'status' },
				{ data: 'date_created' },
				{ data: 'date_assigned' },
				{ data: 'status' }
			]
		} );
	}
  </script>