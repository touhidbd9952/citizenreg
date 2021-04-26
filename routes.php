<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'main';
$route['citizen_registration'] = 'main/citizen_registration';
$route['citizen_registration_view/(:any)'] = 'main/citizen_registration_view/$1';
$route['citizen_registration_edit/(:any)'] = 'main/citizen_registration_edit/$1';
$route['citizen_registration_edit2'] = 'main/citizen_registration_edit2';
$route['citizen_registration_submit/(:any)'] = 'main/citizen_registration_submit/$1';
$route['mail_success_message'] = 'main/mail_success_message';
$route['mail_error_message'] = 'main/mail_error_message';
$route['mail_help'] = 'main/mail_help';

$route['login'] = 'admincontroller';
//$route['adminlogin'] = 'admincontroller/adminlogin';

$route['404_override'] = 'main/error_404';
$route['translate_uri_dashes'] = FALSE;

