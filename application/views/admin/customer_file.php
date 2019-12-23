<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">CUSTOMER MASTER FILE</h3>
  	<div class="row">
  		<div class="col-md-12">
  		</div>
		<div class="col-md-12" id="table_div" style="padding-top: 50px; border-top: 2px solid #343758">
		<?php if($customers): ?>
			<table class="table" id="customers_table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Property</th>
			      <th scope="col">Tower</th>
			      <th scope="col">Unit Owner</th>
			      <th scope="col">Unit Type</th>
			      <th scope="col">Unit Number</th>
			      <th scope="col">Customer Number</th>
			      <th scope="col">Option</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach($customers as $user): ?>
			    <tr>
			   	  <th scope="row"><?= $user->project ?></th>
			      <th scope="row"><?= $user->tower ?></th>
			      <th scope="row"><?= $user->customer_name ?></th>
			      <th scope="row"><?= $user->unit_type ?></th>
			      <th scope="row"><?= $user->unit_number ?><?= $user->unit_desc ?></th>
			      <th scope="row"><?= $user->customer_number ?></th>
			      <th scope="row">
			      	 <a href="<?= base_url('admin/buyer_details/'.$user->customer_number) ?>" class="btn btn-sm btn-primary my-1 my-sm-0">
			          <span class="fas fa-eye mr-1"></span>
			          View</a>
			      </th>
			  	</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>

		</div>
	</div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#customers_table').DataTable();
}
</script>