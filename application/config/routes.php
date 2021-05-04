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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['dashboard'] = 'dashboard/index';

/*
    Account Routes
*/
$route['login'] = 'account/login';
$route['logout'] = 'account/logout';
$route['register'] = 'account/register';
$route['karyawan'] = 'account/index';
$route['karyawan/(:num)'] = 'account/detail/$1';
$route['karyawan/delete/(:num)'] = 'account/delete/$1';
$route['karyawan/update/(:num)'] = 'account/update/$1';
$route['karyawan/enableAccount'] = 'account/enableAccount';
$route['karyawan/disableAccount'] = 'account/disableAccount';
$route['karyawan/tambah'] = 'account/tambah';

/*
    Kategori Routes
*/
$route['kategori'] = 'kategori/index';
$route['kategori/tambah'] = 'kategori/create';
$route['kategori/(:num)'] = 'kategori/detail/$1';
$route['kategori/delete/(:num)'] = 'kategori/delete/$1';
$route['kategori/update/(:num)'] = 'kategori/update/$1';

/*
    Item Routes
*/
$route['item'] = 'item/index';
$route['item/tambah'] = 'item/create';
$route['item/(:num)'] = 'item/detail/$1';
$route['item/delete/(:num)'] = 'item/delete/$1';
$route['item/update/(:num)'] = 'item/update/$1';

/*
    Order Routes
*/
$route['order'] = 'order/index';
$route['order/tambah'] = 'order/create';
$route['order/updatestatus'] = 'order/updatestatus';
$route['order/getorderstatus'] = 'order/getorderstatus';

$route['tracking'] = 'order/tracking';
