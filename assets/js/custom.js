/*
	Custom Script for WeServe Sap Configuration
	Author: Ben Zarmaynine E. Obra
	Added: November 27, 2019
	
	--Pure AJAX result, small changes on each functions will make cascading outputs.
	--"$(#app)" is the main landing elements of all html response result.
	--"$(#main_modal)" general modal for CRUD html response result.
	--CRUD functions response are all array validations for element customizations.
	--Use Override method when updating functions (js file versioning is a must).

*/

$(document).ready(function(){


	/*
		Modal - CRUD functions
	*/
	$('body').on('click','.add_auth,.edit_auth,.check_auth,.del_auth,.add_company,.add_project,.add_unitType,.edit_company,.edit_project,.edit_unitType,.add_customer,.add_floor,.edit_floor,.add_unit,.edit_unit',function(e){
		e.preventDefault();

		var data;

		const user_parent = $(this).parent("a");
		const url = user_parent.attr("href");
		const get_data = user_parent.attr('data-uri');

		if (get_data) {

			data = {

				params : get_data
			}
			
		}		

		const form = $(this).closest("form");
		const action = $(form).attr("action");

		const classTitle = $(this).attr('class').split(" ");			
		const btnClass = '.'+classTitle;

		if (form.length == 1) {

			formData = form.serialize();

			if(classTitle[0] == 'check_auth'){
				
				var getAuth = ajaxSubmit(url,formData,btnClass);

				getAuth.done(function(data){

					check_auth(data);

				});

			} else {

				var transact_ajax = ajaxSubmit(action,formData,btnClass);

				transact_ajax.done(function(data){

					if (data.success == 'true') {

						switch(data.key){

							case 'addSapAuth':
							case 'editSapAuth':
							case 'delSapAuth':						
							case 'addSapProject':
							case 'editSapProject':
							case 'addCustomer':
							case 'addUnit':
							case 'editUnit':
								$('#main_modal').modal('toggle');
								$('.refresh_companies,.refresh_projects,.refresh_unitTypes,.load_auth,.refresh_customers,.refresh_units').trigger('click');
								messageBox(data.success,'.messagebox', data.messages.messagebox);
							break;

						}

					} else if(data.success == 'error'){

						$('#main_modal').modal('toggle');
						messageBox(data.success,'.messagebox',data.messages.messagebox);

					} else {

						$('.text-danger').remove();
						$.each(data.messages, function(key,value){

							var Newelement = $('#'+ key);
							Newelement.closest('div.form-group');
							Newelement.removeClass('border-danger');
							Newelement.addClass(value.length > 0 ? 'border-danger' : 'border-success');
							Newelement.find('.text-danger').remove();
							Newelement.after(value);

						});

					}

				});

				transact_ajax.fail(function(data){

					console.log(data);
					alert('Transaction of WeServe failed, please contact IT-BSD now for this concern');

				});
				
			}



		} else {


			var sapAjax = ajaxHTML(url,'',data);

			sapAjax.done(function(data){

				$('.modal-body').html(data);
				$('#main_modal').modal('toggle');

			});

		}
					

	});	
	/*
		End
	*/

	/*
		Loading/refresh pages
	*/
	$('body').on('click','.load_auth,.load_projects,.load_user,.load_companies,.back_dashlist,.refresh_companies,.load_projects,.refresh_projects,.load_unitTypes,.refresh_unitTypes,.load_customers,.refresh_customers,.load_floors,.refresh_floors,.load_units,.refresh_units',function(e){
		e.preventDefault();

		const user_parent = $(this).parent("a");

		var get_data
		var data;
		var url;

		if (user_parent.length == 1) {

			url = user_parent.attr("href");
			get_data = user_parent.attr('data-uri');

		} else {

			url = $(this).attr('href');
			get_data = $(this).attr('data-uri');

		}	
		
		const classTitle = $(this).attr('class').split(" ");			
		const btnClass = '.'+classTitle;		

		if (get_data) {

			data = {

				params : get_data
			}

		}

		const loadAjax = ajaxHTML(url,btnClass,data);		

		loadAjax.done(function(data){

			$('#app').html(data);
			init_table('.auth_table,.company_table,.project_table,.unitType_table,.customer_table,.unit_table');

		});

		loadAjax.fail(function(data){

			console.log(data);
			alert('Failed to load request page!');
		});


	});	

	/*
		End
	*/

	/*
		Turnover Dashboard custom script
		Author: Ben Zarmaynine E. Obra
		Added: 12-18-18

	*/
	init_table('#status_details_table');

   $('body').on('click','.search_unit,.get_quotation',function(e){
   		e.preventDefault();

   		const form = $(this).closest('form');
   		var url;
   		var method;

		const classTitle = $(this).attr('class').split(" ");			
		const btnClass = '.'+classTitle;

   		if (form.length == 1) {

	   		url = form.attr('action');
	   		method = form.attr('method');

   			data = form.serialize();

   			const getProject = ajaxHTML(url,btnClass,data,method);

   			getProject.done(function(data){

   				$('#app').html(data);
   				/*
					Get Counts of each element for Turnover Dashboard
					
   				*/
   				var total_unit = $('.get_quotation').length;
   				$('.total_unit').text(total_unit);

   			});


   		} else {

   			url = $(this).attr('href');
   			
   			quotationAjax = ajaxHTML(url,btnClass);

   			quotationAjax.done(function(data){

   				console.log(data);

   			});

   		}

   });

	//end

	/*
		ajax change event
	*/

	$('body').on('change','.project_tower_id',function(){

		const uri = ($(this).attr('data-uri') ? $(this).attr('data-uri') : $(this).attr('href'));

		const classTitle = $(this).attr('class').split(" ");
		const btnClass = '.'+classTitle[0];
		
		const data = {

			params : $(this).val()
		};
		
		const changeAjax = ajaxSubmit(uri,data,'',"GET");

		changeAjax.done(function(data){

			if (data.success == 'true') {

				switch(data.key){

					case 'autoCompleteTO':
						autocompleter((data.units ? data.list['unit_number'] : ['No Data Found']),'#unit_number');
						autocompleter((data.units ? data.list['parking_number'] : ['No Data Found']),'#parking_number');

						show_calendar(data.project_tower);
					default:
					break;
				}

				

			}

		});
		

	});

	//end

});

/*
	End
*/