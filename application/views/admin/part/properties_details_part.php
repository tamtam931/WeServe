
<?php if($customer_number):
	$documents = $this->Admin_model->get_documents_by_customer_number($customer_number); 
	$charges = $this->Admin_model->get_charges_by_customer_number($customer_number);
	$payments = $this->Admin_model->get_payments_by_customer_number($customer_number);

?>
<div class="col-md-12" style="border: 3px solid #343758">
<?php if($payments):?>
	<div class="col-md-12" style="padding-top: 20px;">
		<span style="font-weight: 600">PAYMENT OF TOTAL CONTRACT PRICE (TCP)</span>
		<table class="table table-bordered" id="payments">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">Net Selling Amount</th>
		      <th scope="col">Outstanding Balance</th>
		      <th scope="col">Amount Collected</th>
		      <th scope="col">Percent Collected</th>
		      <th scope="col">Collection Date at 100%</th>
		      <th scope="col">eSOA</th>
		    </tr>
		  </thead>
		  <tbody>
		 <?php foreach ($payments as $payment) : ?>
		    <tr> 
		   	  <td scope="row"><?= number_format($payment->net_selling_amount,2) ?></td>
		      <td scope="row"><?= number_format($payment->outstanding_balance,2) ?></td>
		      <td scope="row"><?= number_format($payment->amount_collected,2) ?></td>
		      <td scope="row"><?= $payment->percent_collected ?></td>
		      <td scope="row"><?= $payment->collection_date ?></td>
		      <td scope="row">
		      	<input type="date" name="esoa_date" id="esoa_date" class="form-control">
		      	 <a href="" class="btn btn-sm btn-primary my-1 my-sm-0">
		          <span class="fas fa-eye mr-1"></span>
		          View</a>
		      </th>
		  	</tr>
		  <?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif;?>


<?php if($charges):?>
	<div class="col-md-12">
		<span style="font-weight: 600">PAYMENT OF ADVANCED REGISTRATION CHARGES</span>
		<table class="table" id="charges">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">ARC Billing Date</th>
		      <th scope="col">ARC Billing Amount</th>
		      <th scope="col">ARC Payment Date</th>
		      <th scope="col">ARC Amount Paid</th>
		      <th scope="col">ARC Computation</th>
		    </tr>
		  </thead>
		  <tbody>
		 <?php foreach ($charges as $charge) : ?>
		    <tr> 
		   	  <td scope="row"><?= $charge->arc_billing_date ?></td>
		      <td scope="row"><?= number_format($charge->arc_billing_amount,2) ?></td>
		      <td scope="row"><?= $charge->arc_payment_date ?></td>
		      <td scope="row"><?= number_format($charge->arc_amount_paid,2) ?></td>
		      <td scope="row">
		      	 <a href="" class="btn btn-sm btn-primary my-1 my-sm-0">
		          <span class="fas fa-eye mr-1"></span>
		          View</a>
		      </th>
		  	</tr>
		  <?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif;?>

<?php if($documents):?>
	<div class="col-md-12">
		<table class="table table-bordered" id="documents">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">Document</th>
		      <th scope="col">Status</th>
		      <th scope="col">Received Date</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
			  <td colspan="3"><b>DOCUMENTARY</b></td>
			</tr>
		 <?php foreach ($documents as $document) : ?>
		 	<?php if($document->document_type == 'DOCUMENTARY'): ?>
		    <tr> 
		   	  <td scope="row"><?= $document->document_description ?></td>
		      <td scope="row"><?= $document->document_status ?></td>
		      <td scope="row"><?= $document->status_date ?></td>
		  	</tr>
		  	<?php endif; ?>
		  <?php endforeach; ?>
		   <tr>
			  <td colspan="3"><b>LEGAL DOCUMENT PROCESSING</b></td>
			</tr>
		  <?php foreach ($documents as $document) : ?>
		 	<?php if($document->document_type == 'LEGAL_DOCUMENT'): ?>
		    <tr> 
		   	  <td scope="row"><?= $document->document_description ?></td>
		      <td scope="row"><?= $document->document_status ?></td>
		      <td scope="row"><?= $document->status_date ?></td>
		  	</tr>
		  	<?php endif; ?>
		  <?php endforeach; ?>
		    <tr>
			  <td colspan="3"><b>LIST OF NOTICE ISSUED</b></td>
			</tr>
		  <?php foreach ($documents as $document) : ?>
		 	<?php if($document->document_type == 'NOTICE'): ?>
		    <tr> 
		   	  <td scope="row"><?= $document->document_description ?></td>
		      <td scope="row"><?= $document->document_status ?></td>
		      <td scope="row"><?= $document->status_date ?></td>
		  	</tr>
		  	<?php endif; ?>
		  <?php endforeach; ?>

			</tbody>
		</table>
	</div>
<?php endif;?>

</div>

<?php endif; ?>