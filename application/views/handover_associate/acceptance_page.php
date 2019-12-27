<!--
  Updated: from weserve_merge
  date: 12-27-19
  Author: Ben Zarmaynine E. Obra
-->
<div class="container py-5 mb5" style="text-align: center;">
  <h3 class="mb-3">ACCEPTANCE OF UNIT / PARKING</h3>
  	<div id="certificate_div">
    	<?php $data = array(
    		'ticket_details' => $ticket_details,
    		'ticket_bind' => $ticket_bind
    	); ?>
      <!-- UNIT ONLY -->
      <?php  if($ticket_type == 'U') :?>
   	  <?= $this->load->view('handover_associate/part/certificate_unit', $data, TRUE) ?>
     	<!-- PARKING ONLY -->
     	<?php elseif($ticket_type == 'P') :?>
     	<?= $this->load->view('handover_associate/part/certificate_parking', $data, TRUE) ?>
     	<!-- UNIT AND PARKING -->
     	<?php elseif($ticket_type == 'UP') :?>
     	<?= $this->load->view('handover_associate/part/certificate_unit_parking', $data, TRUE) ?>
    	<?php endif; ?>
    </div>
  	<div class="col-md-12" style="padding-top: 50px;">
      <button type="button" data-toggle="modal" data-target="#saveConfirm" class="btn btn-primary"><span class="fas fa-download mr-1"></span>Save</button>
       <button type="button" onclick="printDiv()" class="btn btn-outline-dark"><span class="fas fa-print mr-1"></span>Print</button>
  		<button type="button" class="btn btn-secondary">Back</button>
  	</div>


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
             Acceptance of Unit/Parking will be completed. Do you wish to continue?
            </div>
            <div class="modal-footer">
              <!-- check if with temporary parking -->
              <?php
              $temp_parking_flag = 'N';
              $check_temp = $this->Admin_model->check_temporary_parking_by_ticket_id($ticket_details->ticket_id);
              if($check_temp) {
                //if($check_temp->temporary_parking != "") {
                   $temp_parking_flag = 'Y';
                }
              //}
              ?>

              <?php if($ticket_type == 'U') :?>
               <a href="<?= base_url('handover/save_pdf_unit_only/'.$ticket_id.'/'.$temp_parking_flag); ?>"  class="btn btn-primary my-1 my-sm-0">
                    Yes</a>
                <!-- PARKING ONLY -->
                <?php elseif($ticket_type == 'P') :?>
               <a href="<?= base_url('handover/save_pdf_parking_only/'.$ticket_id.'/'.$temp_parking_flag); ?>"  class="btn btn-primary my-1 my-sm-0">
                    Yes</a>
                <!-- UNIT AND PARKING -->
                <?php elseif($ticket_type == 'UP') :?>
               <a href="<?= base_url('handover/save_pdf_unit_parking/'.$ticket_id.'/'.$temp_parking_flag); ?>"  class="btn btn-primary my-1 my-sm-0">
                    Yes</a>
                <?php endif; ?>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Confirmation Modal -->

  </div>

  <script type="text/javascript">
    function printDiv() {
    var content=document.getElementById('certificate_div').innerHTML;
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
