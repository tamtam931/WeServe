<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER SCHEDULE</h3>

  	<div class="row">
  		<div class="col-md-12">
	    	<div id="turnover_schedule">
		    	<form action="<?= base_url('ScheduleController/add_schedule_available'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="logged_user" name = "logged_user" value="<?= user('id'); ?>">
	        		<input type="hidden" class="form-control" id="project" name = "project" value="">
					<input type="hidden" class="form-control" id="assign_to" name = "assign_to" value="">
					<input type="hidden" class="form-control" id="time" name = "time" value="">
					<div class="row">
	        			<div class="col-md-4 mb-3">
				            <label for="property">Property <span style="color:red;">*</span></label>
				            <select class="project_tower_id custom-select d-block w-100" id="property" name="property" data-uri="<?= base_url('TurnoverSchedule') ?>" required>
				              	<option value=""> -- Please Choose --</option>
				              	<?php foreach($projects as $project):?>
				              		<option value="<?= $project->company_code.' '.$project->project_code_sap ?>"> <?= $project->project ?></option>
				              	<?php endforeach; ?>
				            </select>
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="unit_select">Unit Number <span style="color:red;">*</span></label>
				            <input name="unit_number" id="unit_number" class="form-control" placeholder="Select Units" data-uri="">
				        </div>
	        		</div>
			    	<div class="row">
			    		<div class="col-md-4 mb-3">
				            <label for="parking_select">Parking Number <span style="color:red;">*</span></label>
							<input name="parking_number" id="parking_number" class="form-control" placeholder="Select Parkings">
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="customer_number">Customer Name <span style="color:red;">*</span></label>
				            <select class="custom-select d-block w-100" id="customer_number" name="customer_number" required>
				              	<option value=""> -- Please Choose --</option>
				              	<?php foreach($customers as $customer):?>
				              	<option value="<?= $customer->customer_number ?>"> <?= $customer->customer_name ?> - <?= $customer->customer_number ?></option>
				              	<?php endforeach; ?>
				            </select>
				        </div>
			    	</div>
			       
			    
			    	<span><b>DISCLAIMER: </b> You may select your preference date and time from Monday to Saturday. In the event that your preferred schedule is not available, we will still capture this information. Should this become available, you will be notified. In the meantime, please select on the available schedule.</span>

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
							        <button type="submit" class="btn btn-dark">Yes</button>
							        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">No</button>
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
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script> 
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/weserve.js') ?>"></script>
<script>
$(document).ready(function() {
$("#modal_message").hide();
$('#modalBtns').hide();
$("#modalBody").empty();
});

function show_calendar(project) {
	$('#calendar').fullCalendar('rerenderEvents');
	$('#calendar').fullCalendar({	
	    header: {
	        left: '',
	        center: 'prev title next',
	        right: '',
	        weekends: false
	    },
		//For Disabling the current month on full
		viewRender: function(currentView){
        var minDate = moment();
        // Past
        if (minDate >= currentView.start && minDate <= currentView.end) {
            $(".fc-prev-button").prop('disabled', true); 
            $(".fc-prev-button").addClass('fc-state-disabled'); 
        }
        else {
            $(".fc-prev-button").removeClass('fc-state-disabled'); 
            $(".fc-prev-button").prop('disabled', false); 
			}
		},
	    dayClick:  function(date, jsEvent, view) {
	    	// parent.location.hash = moment(date).format('YYYY-MM-DD');
	    	var checkDay = new Date(moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY'));
			var selected_date = moment(date, 'DD.MM.YYYY').format('DD.MM.YYYY');
			var date_today = moment().format('DD.MM.YYYY');
			if (selected_date >= date_today) {
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
    		}else{
				
			}
	    },
	    eventColor: '#257c3c',
	    eventTextColor: '#fff',
	    timeFormat: '',
	    eventSources: [
	         {
	             events: function(start, end, timezone, callback) {
	                 $.ajax({
	                 type: "GET",
	                 url: "<?php echo base_url('admin/get_schedule_hand'); ?>",
	                 dataType: 'json', 
	                 data: {
		                start: start.unix(),
		                end: end.unix(),
		                project: project
	                 },
	                 success: function(msg) {
						  //$('#calendar').fullCalendar( 'refetchEvents' );
	                       var events = msg.events;
	                       callback(events);
	                   }
	                 });
	             }
	         },
	      ]

	    });
	
}

function calendar_ajax(date_val){
	$ajaxData = $.ajax({

		url: "<?= base_url('admin/schedule_date') ?>",
		method: "GET",
		data: {dt : date_val},
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
	var selectedtime = $('.input-group input').val();
	$('#time').val(selectedtime);
	$.ajax({
		type: 'GET',
		url: "<?php echo base_url('ScheduleController/onclickChangeAdmin'); ?>",
		data: {
			dt: moment($('#selected_dt').val()).format('YYYY-MM-DD'),
			project: $('#property').val() ,
			time : $('.input-group input').val(),
			project_owner : $('#project').val()
		},
		dataType:'json',
		success: function(data){
			$('#assign_to').val(data.assigned_to);
			$('#project').val(data.project);
			console.log(data);
			if(data.avail == 'true') {
				$('#modalBtns').show();
				$('.alert').remove();
				$('#modalBody').append('<div class="alert alert-success alert-dismissible fade show" role="alert" id="modal_message"> <span id="modal_text">Slot will be reserved, do you wish to continue? </span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
			}else if(data.setup == 'true'){
				$('#modalBtns').hide();
				$('#modalBody').append('<div class="alert alert-danger alert-dismissible fade show" role="alert" id="modal_message"> <span id="modal_text">No maintenance table for this project.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}else{
				$('#modalBtns').hide();
				$('#modalBody').append('<div class="alert alert-danger alert-dismissible fade show" role="alert" id="modal_message"> <span id="modal_text">*NOT AVAILABLE* \n Selected date and time will not be saved. Please select and confirm your preferred schedule.</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				$ajaxData = $.ajax({
					url: "<?= base_url('ScheduleController/add_schedule_logs') ?>",
						method: "POST",
						data: {
						data : formData ,
						schedule_time : $('.input-group input').val(),
						customer_number : $('#customer_number').val(),
						assign_to : $('#assign_to').val() , 
						project: $('#property').val()
					},
					dataType:'json',
					success:function(data){
						//$('#modalBody').html(data);
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
		}
	});
}
</script>
