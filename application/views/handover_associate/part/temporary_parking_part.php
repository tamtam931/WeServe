<!--
	Updated: from weserve_merge
	date: 12-27-19
	Author: Ben Zarmaynine E. Obra
-->
<div id="temporary_parking_div" class="row" style="padding: 10px;  font-family: verdana; font-size: 12px;">
	
		<div class="col-md-12"><b>TEMPORARY PARKING SLOT ALLOCATION</b></div>
		
		<div class="col-md-12" style="padding-top: 30px;">
			To the Management:
		</div>
		<div class="col-md-12">
			<ul style="padding-top: 10px; list-style-type: none;">
				<li style="padding-top: 10px;"><b>(A) Actual Assigned Parking Slot : </b> <?= $ticket_details->parking_number ?> </li>
				<li style="padding-top: 10px;"><b>(B) Temporary Parking Slot :</b> <?= $temporary_parking[0]->temporary_parking ?></li>
			</ul>

		</div>

		<div class="col-md-12" style="text-align: justify;">
			I <?= $ticket_details->customer_name ?>, owner of <?= $ticket_details->unit_number ?><?= $ticket_details->unit_desc ?>, located in <?= $ticket_details->project_name ?> hereby acknowledge and agree to the following:<br><br><br>
			1. Location of my actual parking slot (A) has not yet been cleared for use, therefore, is currently inaccessible; <br><br>
			2. The Property Management has agreed to provide a temporary slot (B) for the owner until parking slot (A) has been for use; <br><br>
			3. Parking B is a temporary slot, and rights to the said slot will be removed from the owner on subject (1) upon availability of parking slot A, or (2) until such time that the Property Management Office needs to re-assign the owner to a different temporary slot. <br><br>
			4. Transfer title and turnover acceptance certificate will both state parking slot (A) as the actual parking slot of the owner on subject. <br><br>

			Thank you very much, <br>
			

		</div>

		<div class="col-md-12">
			<!-- SIGNATURE -->
			<img style="width: 250px;" src="data:image/png;base64,<?= $ticket_details->acceptance_signature; ?>"><br>
			<span style="text-align: center;"><b><?= $ticket_details->customer_name ?></b></span><br>
			<span style="text-align: center">Name and Signature of Unit Owner</span>
		</div>

		<div class="col-md-12" style="padding-top: 30px;">
			Assisted by:<br><br>
			<b><?= user('firstname') ?> <?= user('lastname') ?></b><br>
			Authorized Representative <br>
			FEDERAL LAND INC.
		</div>
	</div>