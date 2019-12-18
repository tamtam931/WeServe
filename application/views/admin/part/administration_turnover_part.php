<div class="col-md-12">
	<table class="table table-bordered" id="turnover_management_table">
		<thead class="thead-light">
		    <tr>
		      <th scope="col">Project</th>
		      <th scope="col">Tower</th>
		      <th scope="col">Exact Address</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach($projects as $project): ?>
		    <tr>
		      <th scope="row"> 
		      	<button type="button" data-id="<?= $project->id ?>" id="btn_proj<?= $project->id ?>" class="btn_proj btn btn block btn-sm btn-primary my-1 my-sm-0"><?= $project->project ?></button>
		      </th>
		      <th scope="row"> 
		      	<?= $project->tower ?>
		      </th>
		      <th scope="row"> 
		      	<?= $project->address ?>
		      </th>
		      
		  	</tr>
		  	<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="col-md-12" id="project_details" style="margin-top: 50px; border: 2px solid #343758; padding-top: 10px;">

</div>