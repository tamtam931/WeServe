
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER SCHEDULE</h3>
 <?php $ticket_id = $this->uri->segment(3); ?>
 <?php if($ticket_id) :?>
	<?php $detail = $this->Admin_model->get_ticket_by_id($this->uri->segment(3)); ?>
  <?php endif;  ?>
  	<div class="row">
  		<div class="col-md-12">
	    	<div id="turnover_schedule">
		    	<form action="<?= base_url('admin/add_schedule'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="logged_user" name = "logged_user" value="<?= user('id'); ?>">
	        		<div class="row">
	        			<div class="col-md-4 mb-3">
				            <label for="property">Property</label>
				            <input type="text" class="form-control" id="property" name = "property" value="<?= $detail->project ?>" readonly>
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
				               <div class="modal-footer">
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

    $('#calendar').fullCalendar({
        header: {
            left: '',
            center: 'prev title next',
            right: ''
        },

        dayClick:  function(date, jsEvent, view) {
        	// parent.location.hash = moment(date).format('YYYY-MM-DD');
        	dd = moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY');
            $('#modalTitle').html(dd);
            // $('#schd').html(moment(date).format('YYYY-MM-DD'));
            $('#selected_dt').val(moment(date).format('YYYY-MM-DD'));

            $.ajax({
		      type: 'GET',
		      url: "<?php echo base_url('admin/schedule_datetime'); ?>",
		      data: {dt: moment(date).format('YYYY-MM-DD')},
		      cache: false,
		      success: function(data){
		      	console.log(data);
		        calendar_ajax(data);
		        $('#calendar_details').modal();

		      }
		    });

            return false;
        },
        eventColor: '#c05e4a',
        eventTextColor: '#f0f8ff',
        timeFormat: '',
        eventSources: [
	         {
	             events: function(start, end, timezone, callback) {
	                 $.ajax({
	                 url: "<?php echo base_url('admin/get_schedule'); ?>",
	                 dataType: 'json', 
	                 data: {
		                start: start.unix(),
		                end: end.unix()
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
});

function calendar_ajax(date_val){
	$ajaxData = $.ajax({

		url: "<?= base_url('default_user/schedule_date') ?>",
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
</script>
