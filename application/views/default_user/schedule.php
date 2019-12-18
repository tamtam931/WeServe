
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER SCHEDULE</h3>
 <?php $ticket_id = $ticket_number_decrypt; ?>
 <?php if($ticket_id) :?>
	<?php $detail = $this->Admin_model->get_ticket_by_id($ticket_number_decrypt); ?>
  <?php endif;  ?>
  	<div class="row">
  		<div class="col-md-12">
	    	<div id="turnover_schedule">
		    	<form action="<?= base_url('default_user/add_schedule_available'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="logged_user" name = "logged_user" value="<?= user('id'); ?>">
	        		<input type="hidden" class="form-control" id="customer_number" name = "customer_number" value="<?= $detail->customer_number?>">
					<input type="hidden" class="form-control" id="project_id" name = "project_id" value="<?= $detail->project_code?>">
					<input type="hidden" class="form-control" id="ticket_id" name = "ticket_id" value="<?= $ticket_id?>">
					<input type="hidden" class="form-control" id="time" name = "time" value="">
					<input type="hidden" class="form-control" id="assign_to" name = "assign_to" value="">
					<div class="row">
	        			<div class="col-md-4 mb-3">
				            <label for="property">Property</label>
				            <input type="text" class="form-control" data-input="<?= $detail->project_id ?>" id="property" name = "property" value="<?= $detail->project ?>" readonly>
						</div>
				        <div class="col-md-4 mb-3">
				            <label for="unit_number">Unit Number </label>
				            <input type="text" class="form-control" id="unit_number" name = "unit_number" value="<?= $detail->unit_number . $detail->unit_desc?>" readonly>
				        </div>
	        		</div>
			    	<div class="row">
			    		<div class="col-md-4 mb-3">
				            <label for="parking">Parking Number</label>
				            <input type="text" class="form-control" id="parking" name = "parking" value="<?= $detail->parking_number?>" readonly>
				        </div>
				
			    	</div>
<!-- 			    
			    	<span><b>DISCLAIMER: </b> You may select your preference date and time from Monday to Saturday. In the event that your preferred schedule is not available, we will still capture this information. Should this become available, you will be notified. In the meantime, please select on the available schedule.</span> -->

			    	<div id="calendar_details" class="modal fade">
				        <div class="modal-dialog">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <h4 id="modalTitle" class="modal-title"></h4>
				                    <input type="hidden" class="form-control" id="selected_dt" name = "selected_dt" >
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                </div>
				                <div id="modalBody" class="modal-body">

				                </div>
				               <div class="modal-footer" id="modalBtns">
							        <button type="submit" class="btn btn-dark">Save</button>
							        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
							     </div>
				            </div>
				        </div>
				    </div>

				</form>
			</div>
		</div>

		<div class="col-md-12">
			<div id="calendar"></div>			
		</div> 

  	</div>
  </div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script> 
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
	$("#modal_message").hide();
	$('#modalBtns').hide();
	$("#modalBody").empty();
});

show_calendar($('#property').attr('data-input'));

function show_calendar(project){
	$('#calendar').fullCalendar({
        header: {
            left: '',
            center: 'prev title next',
            right: ''
        },

        dayClick:  function(date, jsEvent, view) {
	    	var checkDay = new Date( moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY'));
    		if (checkDay.getDay() != 6 || checkDay.getDay() != 0) { // weekdays only
    			dd = moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY');
	    	
		        $('#modalTitle').html(dd);
		        $('#selected_dt').val(moment(date).format('YYYY-MM-DD'));
		        $.ajax({
			      type: 'GET',
			      url: "<?php echo base_url('admin/schedule_datetime'); ?>",
			      data: {
			      	dt: moment(date).format('YYYY-MM-DD')
			  		},
			      cache: false,
			      success: function(data){
			        calendar_ajax(data, project);
			        $('#calendar_details').modal();
			      }
			    });
		        return false;
    		}
    	},
        eventColor: '#c05e4a',
        eventTextColor: '#f0f8ff',
        timeFormat: '',
        eventSources: [
	         {
	             events: function(start, end, timezone, callback) {
	                 $.ajax({
					 type: "GET",
	                 url: "<?php echo base_url('admin/get_schedule'); ?>",
	                 dataType: 'json', 
	                 data: {
		                start: start.unix(),
		                end: end.unix(),
						project: project
	                 },
	                 success: function(msg) {
	                       var events = msg.events;
	                       callback(events);
	                   }
	                 });
	             }
	         },
	      ]

    });
}


function calendar_ajax(date_val,project){
	
	$ajaxData = $.ajax({ 
		url: "<?= base_url('default_user/schedule_date') ?>",
		method: "GET",
		data: {dt : date_val, project : project },
		dataType: "html",
		success:function(data){
			$('#modalBody').html(data);
		},
		beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}

	});
	return $ajaxData;
}


function check_availability(available,formData) {
	$('.alert').remove();
	var selectedtime = $(".custom-control-input:checked").val();
	$('#time').val(selectedtime);
	//Checker
	$.ajax({
		type: 'GET',
		url: "<?php echo base_url('default_user/onclickChange'); ?>",
		data: {
			dt: moment($('#selected_dt').val()).format('YYYY-MM-DD'),
			project: $('#property').attr('data-input') ,
			time : $(".custom-control-input:checked").val() ,
			project_owner : $('#project_id').val()
		},
		dataType:'json',
		success: function(data){
			$('#assign_to').val(data.assigned_to);
			console.log(data);
				 $('#for9').text(data.reserved1);
				 $('#for11').text(data.reserved2);
				 $('#for2').text(data.reserved3);
				 $('#9am').text(data.avial);
				 $('#11am').text(data.avial);
				 $('#2pm').text(data.avial);
				if(data.avail == 'true') {
					$('#modalBtns').show();
					$('.alert').remove();
					$('#modalBody').append('<div class="alert alert-success alert-dismissible fade show" role="alert" id="modal_message"> <span id="modal_text">Slot will be reserved, do you wish to continue? </span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
				} else {
					// not available
					//$(".custom-control span").html(data.avail);
					$('#modalBtns').hide();
					$('.alert').remove();
					$('#modalBody').append('<div class="alert alert-danger alert-dismissible fade show" role="alert" id="modal_message"> <span id="modal_text">*NOT AVAILABLE* <br> Selected date and time will not be saved. Please select and confirm your preferred schedule.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					// save first option date
				 	$ajaxData = $.ajax({
						url: "<?base_url('admin/add_schedule_logs') ?>",
						method: "POST",
						data: {data : formData},
						success:function(data){
							$('#modalBody').html(data);
						},
						beforeSend:function(){
							$('.hidden-loader').show();
						},
						complete:function(){
							$('.hidden-loader').hide();
						}
					}); 
			}
			return available;
			//END
		}
		});
	
 }

 function distance_checker(date , project , time){
	$.ajax({
		type: 'GET',
		url: "<?php echo base_url('default_user/onclickChange'); ?>",
		data: {
			dt: moment(date).format('YYYY-MM-DD'),
			project: project ,
			time : time 
		},
		dataType:'json',
		success: function(data){
			console.log(data);
		}
		});
 }
</script>
