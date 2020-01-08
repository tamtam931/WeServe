<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER SCHEDULE</h3>

  	<div class="row">
  		<div class="col-md-12">
	    	<div id="turnover_schedule">
		    	<form action="<?= base_url('inbound/add_schedule_available'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="logged_user" name = "logged_user" value="<?= user('id'); ?>">
	        		<input type="hidden" class="form-control" id="assign_to" name = "assign_to" value="">
					<input type="hidden" class="form-control" id="project" name = "project" value="">
					<div class="row">
	        			<div class="col-md-4 mb-3 ui-widget">
				            <label for="property">Property <span style="color:red;">*</span></label>
				            <select class="combobox-select" id="property" name="property" onchange="show_calendar(this.value);" required>
				              	<option value=""> -- Please Choose --</option>
				              	<?php foreach($projects as $project):?>
				              	<option value='"<?= $project->project_code_sap ?>"'> <?= $project->project ?></option>
				              	<?php endforeach; ?>
				            </select>
				        </div>
				        <div class="col-md-4 mb-3 ui-widget">
				            <label for="unit_number">Unit Number <span style="color:red;">*</span></label>
				            <select class="combobox-select" id="unit_number" name="unit_number" required>
				              	<option value=""> -- Please Choose --</option>
				              	<?php foreach($units as $unit):?>
				              	<option value="<?= $unit->unit_number ?><?= $unit->unit_desc ?>"> <?= $unit->unit_number ?><?= $unit->unit_desc ?> </option>
				              	<?php endforeach; ?>
				            </select>
				        </div>
	        		</div>
			    	<div class="row">
			    		<div class="col-md-4 mb-3 ui-widget">
				            <label for="parking">Parking Number <span style="color:red;">*</span></label>
				            <select class="combobox-select" id="parking" name="parking" required>
				              	<option value=""> -- Please Choose --</option>
				              	<?php foreach($units as $unit):?>
				              	<option value="<?= $unit->parking_number ?>"> <?= $unit->parking_number ?> </option>
				              	<?php endforeach; ?>
				            </select>
				        </div>
				        <div class="col-md-4 mb-3 ui-widget">
				            <label for="customer_number">Customer Name <span style="color:red;">*</span></label>
				            <select class="combobox-select" id="customer_number" name="customer_number" required>
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


<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>	
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script> 
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#modal_message").hide();
	$('#modalBtns').hide();
	$("#modalBody").empty();

});

function show_calendar(project) {
	$('#calendar').fullCalendar({
	    header: {
	        left: '',
	        center: 'prev title next',
	        right: ''
	    },

	    dayClick:  function(date, jsEvent, view) {
	    	// parent.location.hash = moment(date).format('YYYY-MM-DD');

	    	 var checkDay = new Date( moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY'));
    		if (checkDay.getDay() != 0) { // weekdays to saturday only
    			dd = moment(date, 'DD.MM.YYYY').format('dddd, MMMM D, YYYY');
	    	
		        $('#modalTitle').html(dd);
		        $('#selected_dt').val(moment(date).format('YYYY-MM-DD'));
		        $.ajax({
			      type: 'GET',
			      url: "<?php echo base_url('inbound/schedule_datetime'); ?>",
			      data: {
			      	dt: moment(date).format('YYYY-MM-DD') , 
					projects: project
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
	    eventColor: '#257c3c',
	    eventTextColor: '#fff',
	    timeFormat: '',
	    eventSources: [
	         {
	             events: function(start, end, timezone, callback) {
	                 $.ajax({
	                 type: "GET",
	                 url: "<?php echo base_url('inbound/get_schedule_inbound'); ?>",
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

function calendar_ajax(date_val){
	$ajaxData = $.ajax({

		url: "<?= base_url('inbound/schedule_date') ?>",
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
	var selectedtime = $(".custom-control-input:checked").val();
	$('#time').val(selectedtime);
	$.ajax({
		type: 'GET',
		url: "<?php echo base_url('inbound/onclickChange'); ?>",
		data: {
			dt: moment($('#selected_dt').val()).format('YYYY-MM-DD'),
			project: $('#property').val(),
			time : $(".custom-control-input:checked").val() ,
			project_owner : $('#project').val()
		},
		dataType:'json',
		success: function(data){
			console.log(data);
			$('#project').val(data.project);
			$('#assign_to').val(data.assigned_to);
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
						url: "<?= base_url('admin/add_schedule_logs') ?>",
						method: "POST",
						data: {
						data : formData ,
						customer_number : $('#customer_number').val(),
						project: $('#property').val()
						},
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

<script type="text/javascript">
  $(function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );

        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },

      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";

        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });

        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },

          autocompletechange: "_removeIfInvalid"
        });
      },

      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;

        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();

            // Close if already visible
            if ( wasOpen ) {
              return;
            }

            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },

      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },

      _removeIfInvalid: function( event, ui ) {

        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }

        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });

        // Found a match, nothing to do
        if ( valid ) {
          return;
        }

        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },

      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  });

  $(function() {
    $( ".combobox-select" ).combobox();
     // $( "#toggle" ).click(function() {
      //$( ".combobox-select" ).toggle();
     // });
  });
  </script>

