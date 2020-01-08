<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['auth'] = 'Auth/logout';
$route['auth/login'] = 'Auth/login';
$route['admin/main/:num'] = 'Admin/main';
$route['admin/check_username'] = 'Admin/check_username';
$route['admin/ticket_details/:num'] = 'Admin/ticket_details';
$route['admin/turnover_schedule/:num'] = 'Admin/schedule';
$route['admin/buyer_details/:num'] = 'Admin/buyer_details';
$route['admin/get_value_edit_area/'] = 'Admin/get_value_edit_area';
$route['admin/get_value_edit_area_list/'] = 'Admin/get_value_edit_area_list';

$route['handover/acceptance_page/:any/:any'] = 'Handover/acceptance_page';

/*
	Turnover Dashboard updates
	Added: Ben Zarmaynine E. Obra
	Date: 12-19-19
	
*/

$route['admin/dashboard']['GET'] = 'Admin/dashboard';
$route['admin/dashboard/Companies/:any/Towers/:any/Units/:any']['GET'] = 'Admin/dashboard_show';

//end

/*
	Turnover Schedule updates
	Added: Ben Zarmaynine E. Obra
	Date: 01-06-20

*/

$route['TurnoverSchedule']['GET'] = 'TurnoverScheduleController/index';

//end

/*
	SAP API Routes
	Added: Ben Zarmaynine E. Obra
	Date: 11-26-19
*/

$route['sap/auth']['GET'] = 'sapAuthController/index';
$route['sap/auth/create']['GET'] = 'sapAuthController/create';
$route['sap/auth/create']['POST'] = 'sapAuthController/create';
$route['sap/auth']['POST'] = 'sapAuthController/store';
$route['sap/auth/:any']['GET'] = 'sapAuthController/show';
$route['sap/auth/:any/edit']['GET'] = 'sapAuthController/edit';
$route['sap/auth/:any/edit']['POST'] = 'sapAuthController/update';
$route['sap/auth/:any']['POST'] = 'sapAuthController/destroy';

$route['sap/project']['GET'] = 'sapProjectController/index';
$route['sap/project/create']['GET'] = 'sapProjectController/create';
$route['sap/project/create']['POST'] = 'sapProjectController/create';
$route['sap/project']['POST'] = 'sapProjectController/store';
$route['sap/project/:any']['GET'] = 'sapProjectController/show';
$route['sap/project/:any/edit']['GET'] = 'sapProjectController/edit';
$route['sap/project/:any/edit']['POST'] = 'sapProjectController/update';
$route['sap/project/:any']['POST'] = 'sapProjectController/destroy';

$route['sap/customer']['GET'] = 'sapCustomerController/index';
$route['sap/customer/create']['GET'] = 'sapCustomerController/create';
$route['sap/customer']['POST'] = 'sapCustomerController/store';
$route['sap/customer/:any']['GET'] = 'sapCustomerController/show';
$route['sap/customer/:any/edit']['GET'] = 'sapCustomerController/edit';
$route['sap/customer/:any/edit']['POST'] = 'sapCustomerController/update';
$route['sap/customer/:any']['POST'] = 'sapCustomerController/destroy';
$route['sap/customer/test/call']['GET'] = 'sapCustomerController/call';

$route['sap/unit']['GET'] = 'sapUnitController/index';
$route['sap/unit/create']['GET'] = 'sapUnitController/create';
$route['sap/unit']['POST'] = 'sapUnitController/store';
/*$route['sap/unit/company/:any']['GET'] = 'sapUnitController/indexCompany';
$route['sap/unit/company/:any/project/:any']['GET'] = 'sapUnitController/indexCompanyProject';*/ 

$route['sap'] = 'sapWeserveController/index';
$route['sap/:any'] = 'sapWeserveController/show';



//end
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
