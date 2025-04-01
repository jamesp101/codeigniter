<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['user_controller'] = 'User';
$route['login'] = 'Authentication';
$route['auth/login_submit'] = 'authentication/login_submit';
$route['auth/logout'] = 'authentication/logout';
$route['captcha'] = 'CaptchaController';


// department
$route['admin/department'] = 'admin/DepartmentController/index';
$route['admin/department/create'] = 'admin/DepartmentController/create';
$route['admin/department/delete/(:num)'] = 'admin/DepartmentController/delete/$1';
$route['admin/department/edit/(:num)'] = 'admin/DepartmentController/edit/$1';

$route['admin/office'] = 'admin/OfficeController/index';
$route['admin/office/create'] = 'admin/OfficeController/create';
$route['admin/office/delete/(:num)'] = 'admin/OfficeController/delete/$1';
$route['admin/office/edit/(:num)'] = 'admin/OfficeController/edit/$1';


$route['admin/user/create'] = 'admin/UserController/create';
$route['admin/user/delete/(:num)'] = 'admin/UserController/delete/$1';
$route['admin/user/edit/(:num)'] = 'admin/UserController/edit/$1';
$route['admin/user/(:any)'] = 'admin/UserController/index/$1';

$route['admin/logs/user'] = 'admin/LogsController/index';
$route['admin/logs/user_view_details/(:any)/(:any)'] = 'admin/LogsController/user_logs_view_details/$1/$2';
$route['admin/logs/emanual'] = 'admin/LogsController/emanual_logs';
$route['admin/logs/emanual_view_details/(:any)'] = 'admin/LogsController/emanual_logs_view_details/$1';
$route['admin/logs/nea'] = 'admin/LogsController/nea_logs';
$route['admin/logs/nea_view_details/(:any)'] = 'admin/LogsController/nea_logs_view_details/$1';
$route['admin/logs/audit_calendar'] = 'admin/LogsController/audit_calendar_logs';
$route['admin/logs/audit_calendar_event_type'] = 'admin/LogsController/audit_calendar_event_type_logs';
$route['admin/logs/calendar_events_view_details/(:any)'] = 'admin/LogsController/audit_calendar_logs_view_details/$1';
$route['admin/logs/calendar_events_type_view_details/(:any)'] = 'admin/LogsController/audit_calendar_event_logs_view_details/$1';

$route['admin/events_type'] = 'admin/EventTypesController/index';
$route['admin/events_type/update'] = 'admin/EventTypesController/update_event_type';
$route['admin/events_type/delete'] = 'admin/EventTypesController/delete_event_type';
$route['admin/events_type/create'] = 'admin/EventTypesController/save_event_type';

$route['admin/profile/(:any)?'] = 'admin/UserController/profile/$1';
$route['admin/profile'] = 'admin/UserController/profile';

$route['admin'] = 'admin/admin/index';


$route['user/update_first_name/(:any)'] = 'admin/UserController/update_first_name/$1';
$route['user/update_last_name/(:any)'] = 'admin/UserController/update_last_name/$1';
$route['user/update_username/(:any)'] = 'admin/UserController/update_username/$1';
$route['user/update_password/(:any)'] = 'admin/UserController/update_password/$1';
$route['user/update_email/(:any)'] = 'admin/UserController/update_email/$1';
$route['user/update_profile_picture'] = 'admin/UserController/update_profile_picture';
$route['user/update_esignature'] = 'admin/UserController/update_esignature';


$route['send-email'] = 'common/EmailController/send_verification_email';
$route['verify/(:any)'] = 'common/verify/index/$1';
$route['office/get_offices_by_department/(:any)'] = 'admin/OfficeController/get_offices_by_department/$1';


// requesters
$route['requester/auditee_afsform'] = 'requester/auditee_afsform/index';
$route['requester/auditee_afsform/submit'] = 'requester/auditee_afsform/create';


$route['emanuals/list'] = 'common/emanuals/index';
$route['emanuals/view/(:num)'] = 'common/emanuals/view_manual/$1';
$route['emanuals/create'] = 'common/emanuals/upload_emanual';
$route['emanuals/delete/(:num)'] = 'common/emanuals/delete_emanual/$1';



// requester routes
$route['dcrform'] = 'common/dcrform/index';
$route['requester/dcrform/submit'] = 'common/dcrform/submit';
$route['dcrform/view_pdf/(:any)'] = 'common/dcrform/view_pdf/$1';
$route['dcrform/edit_view_form'] = 'common/dcrform/edit_view_form';
$route['dcrform/update'] = 'common/DocumentController/update';



// department head routes
$route['depthead/dcrform/update'] = 'common/dcrform/update_dcr_form';


// document controller routes
$route['dcrform/list'] = 'common/dcrform/list';
$route['docucontroller/dcrform/update/(:any)'] = 'common/dcrform/update_dcrform_docucontroller/$1';
$route['docucontroller/dcrform/generate_pdf/(:any)'] = 'common/dcrform/generate_pdf/$1';


//qaie_director
$route['qaiedirector/dcrform/update/(:any)'] = 'common/dcrform/update_dcrform_qaie_director/$1';


// $route['profile/(:any)?'] = 'admin/UserController/profile/$1';
$route['profile'] = 'admin/UserController/profile';


// documentations
$route['documentations'] = 'common/documentations/index';
$route['documentations/view/(:num)'] = 'common/documentations/view_documentation/$1';
$route['documentations/create'] = 'common/documentations/upload_documentation';
$route['documentations/delete/(:num)'] = 'common/documentations/delete_documentation/$1';
$route['documentations/create_folder'] = 'common/documentations/create_folder';
$route['documentations/create_subfolder'] = 'common/documentations/create_subfolder';
$route['documentations/folder/(:num)'] = 'common/documentations/view_folder_files/$1';
$route['documentations/update_access/(:num)'] = 'common/documentations/update_access/$1';
$route['documentations/delete_folder/(:num)'] = 'common/documentations/delete_folder/$1';
/// HTMX
$route['documentations/get_users_access/(:num)'] = 'common/documentations/get_users_access/$1';
$route['documentations/add_user_access/(:num)/(:num)']['POST'] = 'common/documentations/add_user_access/$1/$2';
$route['documentations/remove_user_access/(:num)/(:num)']['POST'] = 'common/documentations/remove_user_access/$1/$2';
$route['documentations/archive/(:num)']['POST'] = 'common/documentations/archive_document/$1';
$route['documentations/unarchive/(:num)']['POST'] = 'common/documentations/unarchive_document/$1';

// events
$route['events/add_event']['POST'] = 'common/EventController/add_event';
$route['events/update_event']['POST'] = 'common/EventController/update_event';

// News, Events & Announcements
$route['news_and_events'] = 'common/HomeNeaController/index';
$route['news_and_events/create'] = 'common/HomeNeaController/create';
$route['news_and_events/edit/(:num)'] = 'common/HomeNeaController/edit/$1';
$route['news_and_events/delete/(:num)'] = 'common/HomeNeaController/delete/$1';
$route['news_and_events/(:num)'] = 'common/NeaContentController/index/$1';

// api
$route['api/users']['GET'] = 'api/users/index';
$route['api/users/(:num)']['GET'] = 'api/users/view/$1';
$route['api/users']['POST'] = 'api/users/create';
$route['api/users/(:num)']['PUT'] = 'api/users/update/$1';
$route['api/users/(:num)']['DELETE'] = 'api/users/delete/$1';

// departments
$route['api/departments']['GET'] = 'api/departments/index';
$route['api/departments/(:num)']['GET'] = 'api/departments/view/$1';
$route['api/departments']['POST'] = 'api/departments/create';
$route['api/departments/(:num)']['PUT'] = 'api/departments/update/$1';
$route['api/departments/(:num)']['DELETE'] = 'api/departments/delete/$1';

// offices
$route['api/offices']['GET'] = 'api/offices/index';
$route['api/offices/(:num)']['GET'] = 'api/offices/view/$1';
$route['api/offices']['POST'] = 'api/offices/create';
$route['api/offices/(:num)']['PUT'] = 'api/offices/update/$1';
$route['api/offices/(:num)']['DELETE'] = 'api/offices/delete/$1';
