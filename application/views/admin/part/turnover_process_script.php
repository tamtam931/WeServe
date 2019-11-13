<script type="text/javascript">
// $("#capture").change(function() {
//   readURL(this);
// });


// $(".image_btn").hide();
// function show_upload_btn(count, value) {
//     if (!value) {
//         $("#image_btn"+ count).hide();
//     } else {
//     	$("#image_btn"+ count).show();
//     }
// }


function readURL(input, preview_id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#' + preview_id).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function turnover_modal(selected){
	if(selected == 'unit_owner') {
		$('#turnover_confirmation_text').html('You are going to confirm the attendance of Unit Owner during turnover, do you wish to continue?');
		$('#turnover_confirmation_buttons').html('<button type="button" onclick="id_capture_upload_modal();" data-dismiss="modal" class="btn btn-primary">Yes</button><button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>');
	} else if(selected == 'authorized_rep') {
		$('#turnover_confirmation_text').html('You are going to confirm the attendance of Authorized Representative during turnover, do you wish to continue?');
		$('#turnover_confirmation_buttons').html('<button type="button" onclick="special_power_confirm_modal();" class="btn btn-primary">Yes</button><button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>');
	}
	$('#turnover_confirmation').modal('show');
}

function special_power_upload_modal() {
	$('#special_confirmation').modal('hide');
	$('#special_power_upload').modal('show');	
}

function special_power_confirm_modal() {
	$('#turnover_confirmation').modal('hide');
	$('#special_confirmation').modal('show');
}

function id_capture_upload_modal() {
	$('#special_confirmation').modal('hide');
	$('#turnover_id_capture').modal('show');
		
}

function save_image_ajax(){
	var form = $('#form_upload_image')[0];
    var data = new FormData(form);
	$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('admin/upload_image'); ?>",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log("SUCCESS Uploading.. ", data);
            $('.modal').modal('hide');
            location.reload();
        },
        error: function (e) {
        	alert('Error uploading an Image..');

        },beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}
    });
}

function save_image_special_power_ajax() {

	var form = $('#form_upload_image_special_power')[0];
    var data = new FormData(form);
	$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('admin/upload_image'); ?>",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log("SUCCESS Uploading.. ", data);
            $('#special_confirmation').modal('hide');
	        $('#turnover_id_capture').modal('show');

        },
        error: function (e) {
        	alert('Error uploading an Image..');

        },beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}
    });
}

function save_img_checklist_ajax(num){
	var strform = '#form_upload_checklist_img' + num;
	var form = $(strform)[0];
	console.log(form);
    var data = new FormData(form);

	$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('admin/upload_image'); ?>",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log("SUCCESS Uploading.. ", data);
            $('.add_img_modal').modal('hide');
        },
        error: function (e) {
        	alert('Error uploading an Image..');

        },beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}
    });
}

function checking_areas_ajax(type_id){
	$ajaxData = $.ajax({
		url: "<?= base_url('admin/checking_areas_part') ?>",
		method: "GET",
		data: {id : type_id},
		dataType: "html",
		success:function(data){
			$('#unit_type_details').html(data);
			
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


function save_image_ajax_with_add(){
	var form = $('#form_upload_image')[0];
    var data = new FormData(form);
	$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('admin/upload_image'); ?>",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log("SUCCESS Uploading.. ", data);
            $('#trn_capture').val("");
            $('#trnovr_preview').remove();
	        $('#turnover_id_capture').modal('show');
        },
        error: function (e) {
        	alert('Error uploading an Image..');

        },beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}
    });
}


function save_image_special_power_with_add_ajax() {

	var form = $('#form_upload_image_special_power')[0];
    var data = new FormData(form);
	$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('admin/upload_image'); ?>",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log("SUCCESS Uploading.. ", data);
            $('#spcl_capture').val("");
            $('#special_preview_img').remove();
	        $('#special_power_upload').modal('show');

        },
        error: function (e) {
        	alert('Error uploading an Image..');

        },beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}
    });
}

function save_image_checklist_with_add_ajax(num) {

	var strform = '#form_upload_checklist_img' + num;
	var form = $(strform)[0];
    var data = new FormData(form);

	$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('admin/upload_image'); ?>",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            console.log("SUCCESS Uploading.. ", data);
            $('#capture'+num).val("");
            $('#preview_img'+num).remove();
	        $('#add_image' + num).modal('show');
        },
        error: function (e) {
        	alert('Error uploading an Image..');

        },beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}
    });
}


</script>