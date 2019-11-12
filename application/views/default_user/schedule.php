<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER SCHEDULE</h3>

  	<div class="row">
  		<div class="col-md-12">
	    	<div id="turnover_schedule">
		    	<form action="<?= base_url('admin/'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="user_id" name = "user_id" value="<?= user('id'); ?>">
	        
			    	<div class="col-md-4 mb-3">
			            <label for="firstname">Property <span style="color:red;">*</span></label>
			            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="" required>
			        </div>
			        <div class="col-md-4 mb-3">
			            <label for="middlename">Unit Number <span style="color:red;">*</span></label>
			            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="" value="" required="">
			        </div>
			        <div class="col-md-4 mb-3">
			            <label for="lastname">Parking Number <span style="color:red;">*</span></label>
			            <input type="text" class="form-control" id="parking_number" name="parking_number" placeholder="" value="" required>
			        </div>
			    
			    	<span><b>DISCLAIMER: </b> You may select your preference date and time from Monday to Saturday. In the event that your preferred schedule is not available, we will still capture this information. Should this become available, you will be notified. In the meantime, please select on the available schedule.</span>
				</form>
			</div>
		</div>

		<div class="col-md-12">
			<div id="calendar"></div>

			 <div id="calendar_details" class="modal fade">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h4 id="modalTitle" class="modal-title"></h4>
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                </div>
		                <div id="modalBody" class="modal-body">
							<div class="d-block my-3">
					          <div class="custom-control custom-radio">
					            <input id="9am" name="schedule_time" type="radio" class="custom-control-input" disabled required>
					            <label class="custom-control-label" for="9am"> 9AM</label>
					            <span style="color:red;font-weight: 600;"> - RESERVED</span><br>
					          </div>
					          <div class="custom-control custom-radio">
					            <input id="11am" name="schedule_time" type="radio" class="custom-control-input" checked required>
					            <label class="custom-control-label" for="11am"> 11AM</label>
					          </div>
					          <div class="custom-control custom-radio">
					            <input id="2pm" name="schedule_time" type="radio" class="custom-control-input" required>
					            <label class="custom-control-label" for="2pm"> 2PM</label>
					          </div>
					        </div>
		                </div>
		               <div class="modal-footer">
					        <button type="submit" class="btn btn-dark">Save</button>
					        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
					     </div>
		            </div>
		        </div>
		    </div>

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
                	var dd = moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY')
                    $('#modalTitle').html(dd);
                    $('#calendar_details').modal();
                    return false;
                },
                events:
                [
                   {
                      "title":"2PM Available",
                      "allday":"false",
                      // "description":"<p>Nothing to see!</p>",
                      "start":'2019-10-16'
                   },
                   {
                      "title":"11AM Available",
                      "allday":"false",
                      // "description":"<p>Nothing to see!</p>",
                     "start":'2019-10-21'
                   },
                   {
                      "title":"2PM Available",
                      "allday":"false",
                      // "description":"<p>Nothing to see!</p>",
                     "start":'2019-10-21'
                   }
                   {
                      "title":"11AM Available",
                      "allday":"false",
                      // "description":"<p>Nothing to see!</p>",
                     "start":'2019-10-22'
                   }
                   {
                      "title":"2PM Available",
                      "allday":"false",
                      // "description":"<p>Nothing to see!</p>",
                     "start":'2019-10-22'
                   }
                  
                ]
            });
        });
    </script>
