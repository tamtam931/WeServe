var ajaxHTML = function(url,element=null,data=null,method="GET"){

	var submitButton = $(element);

	var ajaxData = $.ajax({

		url: url,
		method: method,
		dataType: "html",
		data: data,
		beforeSend:function(){

			submitButton.text('loading...');
			submitButton.val('loading...');
			submitButton.prop('disabled',true);

		},
		success:function(data){

			submitButton.text('Browse');
			submitButton.val('Browse');

		},
		complete:function(data){

			setTimeout(function(){

				$('.dash_content').fadeOut(850);

			},500);
			
			submitButton.prop('disabled',false);

		},
		error:function(data){

			console.log(data);
			$('#app').html('<h2 class="text-danger">Error Attained while making transaction, Please refresh the page and try again</h2>');

		}

	});

	return ajaxData;

}

var ajaxSubmit = function(url,data=null,element=null,method="POST"){

	var submitButton = $(element);

	var ajaxData = $.ajax({

		url: url,
		method: method,
		data: data,
		dataType: "json",
		beforeSend:function(){

			submitButton.text('loading...');
			submitButton.val('loading...');
			submitButton.prop('disabled',true);

		},
		success:function(data){

			submitButton.text(data.button_val);
			submitButton.val(data.button_val);

		},
		complete:function(data){

			submitButton.prop('disabled',false);

		},
		error:function(data){

			console.log(data);
			$('#main_modal').modal('toggle');
			$('#app').html('<h2 class="text-danger">Error Attained while making transaction, Please refresh the page and try again</h2>');

		}

	});

	return ajaxData;


}

function init_table(table_element){

	$(table_element).DataTable({

		responsive: true

	});

}

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

function check_auth(ajaxData){

	
	var input_cookie = $('#auth_cookie');
	input_cookie.empty();

	if (ajaxData.success == 'true') {
		
		messageBox(ajaxData.success,'.messagebox',ajaxData.messages.messagebox);
		input_cookie.val('loading...');
		setTimeout(function(){

			input_cookie.val(ajaxData.jar);

		},350);

	} else if(ajaxData.success == 'error'){

		messageBox(ajaxData.success,'.messagebox',ajaxData.messages.messagebox);

	} else {

		$('.text-danger').remove();
		$.each(ajaxData.messages, function(key,value){

			var Newelement = $('#'+ key);
			Newelement.closest('div.form-group');
			Newelement.removeClass('border-danger');
			Newelement.addClass(value.length > 0 ? 'border-danger' : 'border-success');
			Newelement.find('.text-danger').remove();
			Newelement.after(value);

		});
		
	}

}