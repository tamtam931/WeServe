
<div id="certificate_div" class="row" style=" text-align: center; ">
		<div class="col-md-12"><b>CERTIFICATE OF PURCHASE AND DELIVERY/TURNOVER</b></div>
		<?php if($ticket_bind) : 
	    	$customer_number = "";
	    	$unit_number = "";
	    	$parking = "";
	    	foreach($ticket_bind as $bind):
	    		$customer_number .= $bind->customer_number . ' ,';
	    		$unit_number .= $bind->unit_number . $bind->unit_desc . ' ,';
	    		$parking .= $bind->parking_number . ' ,';
	    	endforeach;

	     else:
	    	$customer_number = $ticket_details->customer_number;
	    	$unit_number =$ticket_details->unit_number . $ticket_details->unit_desc;
	    	$parking = $ticket_details->parking_number;
	    endif; ?>
		<div class="col-md-12" style="padding-top: 30px;">
			This is to certify that <u><?= $ticket_details->customer_name; ?> </u>has purchased the unit substantially described below:
		</div>
		<div class="col-md-12">
			<ul style="padding-top: 10px; list-style-type: none;">
				<li style="padding-top: 10px;"><b>PROJECT : </b> <?= $ticket_details->project; ?></li>
				<li style="padding-top: 10px;"><b>LOCATION :</b>  <?= $ticket_details->address; ?></li>
				<li style="padding-top: 10px;"><b>PARKING SLOT NO. : </b> <?= $parking ?></li>
				<li style="padding-top: 10px;"><b>PARKING SLOT FLOOR AREA : </b> <?= $ticket_details->parking_floor_area; ?></li>
			</ul>

		</div>

		<div class="col-md-12" style="text-align: justify;">
			I hereby acknowledge to my satisfaction that the above described parking slot conforms to the plans and specifications presented/offered to me, and I hereby  accept the delivery/turnover of the aforesaid parking including receipt of complete set of keys. As a consequence, I shall now be accountable to all obligations, association dues, assessments, taxes, insurance premiums, and other incidental expenses as unit owner effective on the date indicated below.
		</div>

		<div class="col-md-12" style="text-align: justify; padding-bottom: 50px;">
			Lastly, I hereby understand that in case I failed to pay any monthly amortization or any other obligation, such as but not limited to association dues, assessments, taxes, and other incidental expenses pertaining to the above parking slot, the developer or condominium association may temporarily terminate all or any of my utilities in order not to accumulate further expenses, until I fully pay any outstanding obligation including interests, penalties, and reconnection charges, if any.
			<div style="padding-top: 20px;">
				Given this <u><?= date('jS'); ?></u> day of <u><?= date('M'); ?></u>, <?= date('Y'); ?> in <u><?= $ticket_details->address; ?>.</u>
			</div>

		</div>

		<table style="width: 100%;;">
		  <tr>
		    <td>
		    	<br><br>
		    	<u><b><?= $ticket_details->a_lastname ?>, <?= $ticket_details->a_firstname ?></b></u><br>
				Authorized Representative<br>
				<!-- COMPANY -->
				FEDERAL LAND INC.
		    </td>
		    <td>
		    	<!-- SIGNATURE -->
		    	<img style="width: 250px;" src="data:image/png;base64,<?= $ticket_details->acceptance_signature; ?>"><br>
				<!-- NAME -->
				<u><b><?= $ticket_details->customer_name; ?></b></u><br>
				Name and Signature of Unit Owner
		    </d>
		  </tr>

		</table>

		

		<div class="col-md-10" style="text-align: left;">
			<ul style="padding-top: 10px; list-style-type: none;">
				<li style="padding-top: 10px;"><b>START DATE OF MONTHLY DUES</b>  XXXXXXX</li>
				<li style="padding-top: 10px;"><b>Water Reading</b>  XXXXXXX</li>
				<li style="padding-top: 10px;"><b>Electricity Reading</b>  XXXXXXX</li>
				<li style="padding-top: 10px;"><b>LPG Reading</b> XXXXXXX</li>
				<li style="padding-top: 10px;"><b>GENSET Reading</b> XXXXXXX</li>
			</ul>

		</div>



  	</div>