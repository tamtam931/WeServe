<div class="col-md-12">
	<table class="table table-bordered" id="unit_type_table">
		<thead class="thead-light">
		    <tr>
		      <th scope="col">Unit Type</th>
		      <th scope="col">Areas of Checking</th>
		      <th scope="col">Required to Check?</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach($unit_types as $unit_type): ?>
		    <tr>
		      <th scope="row"> 
		      	<button type="button" data-id="<?= $unit_type->id ?>" id="btn_unit_area<?= $unit_type->id ?>" class="btn_unit_area btn btn-sm btn-primary my-1 my-sm-0"><?= $unit_type->unit_type ?></button>
		      </th>
		      <?php $checking_areas = $this->Admin_model->get_checking_areas_by_unit_type($unit_type->id); ?>
		      <th scope="row">
		      	<?php foreach($checking_areas as $area): ?>
		      		- <?= $area->area_description ?><br>
		      	<?php endforeach; ?>
		      </th>
		      <th scope="row">
		      	<?php foreach($checking_areas as $area): ?>
	      			<?php if($area->required == 0) {
	      				echo '- No';
	      			} else {
	      				echo '- Yes';
	      			} ?><br>
		      	<?php endforeach; ?>
		      </th>
		  	</tr>
		  	<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="col-md-12" id="unit_type_details" style="margin-top: 50px; border: 2px solid #343758; padding-top: 10px;">

</div>