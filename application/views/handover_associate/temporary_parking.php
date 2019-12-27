<!--
  Updated: from weserve_merge
  date: 12-27-19
  Author: Ben Zarmaynine E. Obra
-->
<div class="container py-5 mb5" style="text-align: center;">
	<?php
	$ticket_details = $this->Admin_model->get_ticket_by_id($this->uri->segment(3));
	 $data = array(
          'ticket_details' => $ticket_details,
          'temporary_parking' => $this->Admin_model->get_ticket_other_concern_by_ticket_id($this->uri->segment(3))
      );
	?>
	 <?= $this->load->view('handover_associate/part/temporary_parking_part', $data, TRUE) ?>

	 <!-- Confirmation Modal -->
      <div class="modal fade" id="saveConfirm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            	Temporary parking will be assigned to Unit <?= $ticket_details->unit_number ?><?= $ticket_details->unit_desc ?>, do you wish to continue? 
            </div>
            <div class="modal-footer">
              <!-- check if with temporary parking -->
             
               <a href="<?= base_url('handover/save_pdf_temporary_parking/'.$ticket_details->ticket_id); ?>"  class="btn btn-primary my-1 my-sm-0">
                    Yes</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Confirmation Modal -->

	<div class="col-md-12" style=" text-align: center; padding-top: 50px;">
      <button type="button" data-toggle="modal" data-target="#saveConfirm" class="btn btn-primary"><span class="fas fa-download mr-1"></span>Save</button>
       <button type="button" onclick="printDiv()" class="btn btn-outline-dark"><span class="fas fa-print mr-1"></span>Print</button>
  		<button type="button" class="btn btn-secondary">Back</button>
  	</div>
</div>

 <script type="text/javascript">
    function printDiv() {
    var content=document.getElementById('temporary_parking_div').innerHTML;
    var mywindow = window.open('', 'Print');
    mywindow.document.write('<html><head><title></title>');
    mywindow.document.write('</head><body>');
    mywindow.document.write(content);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus()
    mywindow.print();
    mywindow.close();
    return true;
    }
  </script>
