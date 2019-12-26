  		<table class="table" id="status_details_table">
  			<?= $quotation ?>
		  	<thead class="thead-light">
			    <tr>
			      <th scope="col">Unit Owner</th>
			      <th scope="col">Unit/Parking Number</th>
			      <th scope="col">Related Unit/Parking Number</th>
			      <th scope="col">Status</th>
			      <th scope="col">Accepted by QCD</th>
			      <th scope="col">Accepted by Handover</th>
			      <th scope="col">Approved TOAS</th>
			      <th scope="col">Building Turnover</th>
			      <th scope="col">Sending of Schedule</th>
			      <th scope="col">Turnover Schedule</th>
			      <th scope="col">Accepted by Unit Owner</th>
			      <th scope="col">Accepted with Punchlist</th>
			      <th scope="col">Not Accepted with Punchlist</th>
			      <th scope="col">Not Accepted with Other Concerns</th>
			      <th scope="col">Deemed legally accepted</th>

			    </tr>
		  	</thead>
		  	<tbody>
		  		<?php
		  			for($x = 0; $x < $count_quotation;$x++){
		  				?>
		  					<tr>
		  						<td></td>
		  					</tr>
		  				<?php

		  			}

		  		?>
			    <tr>
			      <th scope="row">Viel Parale</th>
			      <th scope="row">8A</th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			  	</tr>

			  	<tr>
			       <th scope="row">Jasmine Tookes</th>
			      <th scope="row">28A</th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			      <th scope="row"></th>
			  	</tr>
			</tbody>
		</table>