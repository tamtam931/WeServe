/**

	Custom Script for WeServe
	Author: Ben Zarmaynine E. Obra / Viel Parale
	Added: 11-12-19
	test
**/

$(document).ready(function(){
	
    $('body').on('click','.add_schedule',function(e){
    	e.preventDefault();

		form = $(this).closest("form");
		form_action = $(form).attr("action");
		form_method = $(form).attr('method');

		if (form.length == 1) {

			data = form.serialize();

			var ajaxData = $.ajax({

				url: form_action,
				method: form_method,
				data: data,
				success:function(data){

	        	    $("html, body").animate({
			            scrollTop: 0
			        }, 600);

				},
				beforeSend:function(){

					$("input[type=submit]").val("loading");
					$("input[type=submit]").prop('disabled', true);
				}

			});

			ajaxData.done(function(data){
				res = JSON.parse(data);


				if (res.success == 'true') {

					switch(res.key){

						case 'addSchedule':
				        setTimeout(function(){

				        	$("input[type=submit]").val(res.button_value);
				        	$("input[type=submit]").prop('disabled', false);
				        	$('#calendar_details').modal('toggle');
				        	messageBox(res.success,'.messagebox', res.messages.messagebox);
				        },500);
				        $('#load_page').trigger('click');
				        break;						

					}

				} else if(res.success == 'error'){

		        	$("input[type=submit]").val(res.button_value);
		        	$("input[type=submit]").prop('disabled', false);
		        	$('#calendar_details').modal('toggle');

					messageBox(res.success,'.messagebox', res.messages);
				} else {


			        setTimeout(function(){

			        	$("input[type=submit]").val(res.button_value);
			        	$("input[type=submit]").prop('disabled', false);
			        	$('#calendar_details').modal('toggle');
			        	
			        },500);
					
					$('.text-danger').remove();
					$.each(res.messages, function(key,value){

						var borderClass = (value.length > 0 ? 'border-danger' : 'border-success');
						var Newelement = $('#'+ key);

						Newelement.closest('div.form-group')
						Newelement.removeClass('border-danger');
						Newelement.addClass(borderClass);
						Newelement.find('.text-danger').remove();

						Newelement.after(value);

					});					
				}

			});

			ajaxData.fail(function(data){

				alert('Error attained!, Please contact IT - BSD now for concern');
			});

		}  else {

			alert('no form');
		}  	

    });

    $('body').on('click','#load_page',function(e){
    	e.preventDefault();

		var user_parent = $(this).parent("a");
		var url = $(user_parent).attr("href");

		var ajaxData = $.ajax({

			url: url,
			method: "GET",
			dataType: "html",
			success:function(data){

				var $response = $(data);
				console.log($response);
				container = $response.filter('.main-container').html();
				$(".main-container").html(container);
				fullCalendar_init('#calendar');				
			}

		});   	

    });
	
});

function messageBox(key,target,message){

	if (key == 'error') {

		setTimeout(function(){
			$(target).addClass('alert alert-danger').html(message).fadeIn(1000); 
		}, 500);
		setTimeout(function(){
			$(target).fadeOut(1000);
		}, 3000);

	} else {

		var closeButton = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		message_button = closeButton+message;
		setTimeout(function(){

			$(target).addClass('alert alert-info').html(message_button).fadeIn(1000);

		},500);

	}
}
/**
	End
**/