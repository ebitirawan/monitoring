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
$route['default_controller'] = 'dashboard';
$route['404_override'] = 'NotFound';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth';
$route['login_proses'] = 'auth/proses';
$route['logout'] = 'auth/logout';

// Setting
$route['setting'] = 'setting';
$route['setting/update/(:any)'] = 'setting/update/$1';

$route['user'] = 'user';
$route['user/add'] = 'user/add';
$route['user/update'] = 'user/update';
$route['user/(:any)'] = 'user/show/$1';
$route['user/reset/(:any)'] = 'user/reset/$1';
$route['user/delete/(:any)'] = 'user/delete/$1';

// Siswa
$route['siswa'] = 'siswa';
$route['siswa/add'] = 'siswa/add';
$route['siswa/(:any)'] = 'siswa/show/$1';
$route['siswa-update'] = 'siswa/update';
$route['siswa/delete'] = 'siswa/delete';

// Laporan
$route['lapor'] = 'lapor';
$route['lapor-insert'] = 'lapor/insert';

$route['data-pelanggaran'] = 'data_pelanggaran';
$route['data-pelanggaran/(:any)'] = 'data_pelanggaran/get_by_id/$1';
$route['data-pelanggaran-update'] = 'data_pelanggaran/update';
