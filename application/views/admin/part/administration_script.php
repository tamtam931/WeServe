<script type="text/javascript">
window.onload = function() {
	// $("#accounts_management").hide();
	$("#extension_number_div").hide();
	$("#change_password").hide();
	$("#unit_type_management").hide();
	$("#turnover_management").hide();
	$("#list_values").hide();

	$('#users_table').DataTable();
   	$('#unit_type_table').DataTable();
    $('#unit_type_details_table').DataTable();
    $('#turnover_management_table').DataTable();

	var username1;
	var username2;
	var username3;
	var username_textbox = document.getElementById('username');

    document.getElementById('firstname').onfocusout = function() {
        var letter1 = this.value.match(/^([A-Za-z])/);
        if(letter1 !== null) {
            letter1 = letter1[0].toLowerCase();
            username1 = letter1.substring(0, 1);
            username_textbox.value += username1;
        }
    }

    document.getElementById('middlename').onfocusout = function() {
        var letter2 = this.value.match(/^([A-Za-z])/);
        if(letter2 !== null) {
            letter2 = letter2[0].toLowerCase();
            username2 = letter2.substring(0, 1);
            username_textbox.value += username2;
        }
    }

     document.getElementById('lastname').onfocusout = function() {
        var letter3 = this.value.match(/^([A-Za-z])/);
        if(letter3 !== null) {
            username_textbox.value += document.getElementById('lastname').value.toLowerCase();
            // check on DB
			
			$.ajax({

				url: "<?= base_url('admin/check_username'); ?>",
				method: "GET",
				data: {
					firstname: document.getElementById("firstname").value,
					middlename: document.getElementById("middlename").value,
					lastname: document.getElementById("lastname").value,
					checker: username_textbox.value
				},
				success:function(data){

					username_textbox.value = data
				}

			}); 

        }
    }


    $(document).ready(function () {
        $("#btn_accts").click(function(){
	    	$("#btn_accts").addClass("active");
			$("#btn_pwrd").removeClass("active");
			$("#btn_unit").removeClass("active");
			$("#btn_turnover").removeClass("active");
			$("#btn_list").removeClass("active");

			$("#change_password").hide();
			$("#accounts_management").fadeIn();
			$("#unit_type_management").hide();
			$("#turnover_management").hide();
			$("#list_values").hide();
		});

		$("#btn_pwrd").click(function(){
			$("#btn_pwrd").addClass("active");
			$("#btn_accts").removeClass("active");
			$("#btn_unit").removeClass("active");
			$("#btn_turnover").removeClass("active");
			$("#btn_list").removeClass("active");

			$("#list_values").hide();
			$("#change_password").fadeIn();
			$("#accounts_management").hide();
			$("#unit_type_management").hide();
			$("#turnover_management").hide();

		});

		$("#btn_unit").click(function(){
			$("#btn_unit").addClass("active");
			$("#btn_pwrd").removeClass("active");
			$("#btn_accts").removeClass("active");
			$("#btn_turnover").removeClass("active");
			$("#btn_list").removeClass("active");
			
			$("#list_values").hide();
			$("#unit_type_management").fadeIn();
			$("#change_password").hide();
			$("#accounts_management").hide();
			$("#turnover_management").hide();

		});

		$("#btn_turnover").click(function(){
			$("#btn_turnover").addClass("active");
			$("#btn_pwrd").removeClass("active");
			$("#btn_accts").removeClass("active");
			$("#btn_unit").removeClass("active");
			$("#btn_list").removeClass("active");
			
			$("#list_values").hide();
			$("#turnover_management").fadeIn();
			$("#unit_type_management").hide();
			$("#change_password").hide();
			$("#accounts_management").hide();
			

		});

		$("#btn_list").click(function(){
			$("#btn_turnover").removeClass("active");
			$("#btn_pwrd").removeClass("active");
			$("#btn_accts").removeClass("active");
			$("#btn_unit").removeClass("active");
			$("#btn_list").addClass("active");
			
			$("#list_values").fadeIn();
			$("#turnover_management").hide();
			$("#unit_type_management").hide();
			$("#change_password").hide();
			$("#accounts_management").hide();
			

		});

		if(window.location.hash){
			//console.log(window.location.hash);
			var hash = window.location.hash;
			$( hash).trigger( "click" );
			if(hash == '#btn_unit') {
				var segments = window.location.href.split('/');
				
				// trigger the display of areas table also
				checking_areas_ajax(segments[6],segments[7]);
			}

			if(hash == '#btn_turnover') {
				var segments = window.location.href.split('/');
				
				// trigger the display of areas table also
				project_distance(segments[6]);
			}
			
		}

		$(".btn_unit_area").click(function(){
			checking_areas_ajax($(this).data("id"), $(this).data("project"));
		});

		$(".btn_proj").click(function(){
			project_distance($(this).data("id"));
		});


    });


$("#position").change(function() {
   // console.log($("#position :selected").text());
   var selected_text = $("#position :selected").text();
	if(selected_text == 'Outbound Associate' || selected_text == 'Outbound Head') {
		$("#extension_number_div").show();
	} else {
		$("#extension_number_div").hide();
	}
});

 function checking_areas_ajax(type_id, project_id){
 	$('#unit_type_details').empty();

	$ajaxData = $.ajax({
		url: "<?= base_url('admin/checking_areas_part') ?>",
		method: "GET",
		data: {id : type_id, project: project_id},
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

 function project_distance(project_id){
	$ajaxData = $.ajax({
		url: "<?= base_url('admin/get_project_distance') ?>",
		method: "GET",
		data: {id : project_id},
		dataType: "html",
		success:function(data){
			$('#project_details').html(data);
			
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


}



</script>