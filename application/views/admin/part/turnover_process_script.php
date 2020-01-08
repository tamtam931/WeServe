<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script> 
<script type="text/javascript">

function readURL(input, preview_id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#' + preview_id).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#temp_parking_remarks_div").hide();
function temp_parking_show() {
    $("#temp_parking_remarks_div").show();
}

$("#signature_footer").hide();
function signature_footer_show() {
    $("#signature_footer").show();
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
    console.log(data);
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
    var data = new FormData(form);
    var count = 0;

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
            zurl = window.location.protocol+'//'+window.location.hostname+'/weserve/uploads/'+data;
            $('#images_row'+count).append('<img src="'+zurl+'" style="max-height:100px;max-width:150px;">');
            $('.add_img_modal').modal('hide');
            console.log(count+zurl);
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



function save_concerns_ajax() {
    var form = $('#form_other_concern')[0];
    var formData = new FormData(form);
    console.log(formData.get('userfile'));
    $ajaxData = $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('handover/save_concern'); ?>",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success:function(data){
            console.log(formData);
             $('#checking_areas_table').append(data);
             $('#add_issue').modal('toggle');
             //alert('Other Concern has been successfully added.');
         },
         beforeSend:function(){
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

function populate_summary_punchlist(total_count) {
    for (i = 0; i < total_count; i++) {
      $("#obsrv" +i).text($("#observation"+i).val());
    }

}

</script>
<!-- SIGNATURE -->
<script type="text/javascript" src="<?= base_url('assets/jsSignature/jSignature.min.js'); ?>"></script> 
<script type="text/javascript" src="<?= base_url('assets/jsSignature/libs/modernizr.js');?>"></script>
    
 <script type="text/javascript">
$(document).ready(function() {

 // Initialize jSignature
 var $sigdiv = $("#signature").jSignature({'UndoButton':true});

 $('#click').click(function(){
  // Get response of type image
  var zdata = $sigdiv.jSignature('getData', 'image');
    console.log(zdata);
   // console.log($("#ticket_id").val());
  $('#output').val(zdata);

  $ajaxData = $.ajax({
        type: "POST",
        url: "<?= base_url('handover/save_signature_ajax'); ?>",
        data: {
            imagedata : zdata[1],
            ticket_id : $("#ticket_id").val()
        },
        cache: false,
        success:function(data){
            // Storing in textarea
            console.log(data);
            
         },
         beforeSend:function(){
             $('.hidden-loader').show();
         },
         complete:function(){
             $('.hidden-loader').hide();
         }

    });

  // Alter image source 
  $('#sign_prev').attr('src',"data:"+zdata);
  $('#sign_prev').show();
 });
});
</script>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/weserve.js') ?>"></script>