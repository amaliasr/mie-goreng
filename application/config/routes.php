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
$route['default_controller'] = 'home';
// $route['default_controller'] = 'maintenance';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// admin
$route['minminlog'] = "login/index/";
$route['minminlog/DoLogin'] = "login/dologin/";
$route['minminlog/logout'] = "login/logout/";
$route['minmin'] = "admin/index/home";
$route['minmin/home'] = "admin/index/home";
$route['minmin/content'] = "admin/index/content";
$route['minmin/menu'] = "admin/index/menu";
$route['minmin/profile'] = "admin/index/profile";
$route['minmin/payment'] = "admin/index/payment";
$route['minmin/hint'] = "admin/index/hint";
$route['minmin/item'] = "admin/index/item";
$route['minmin/input'] = "admin/index/input";

$route['minmin/tambah_konten'] = "admin/tambah_konten";
$route['minmin/tambah_menu'] = "admin/tambah_menu";
$route['minmin/tambah_expo'] = "admin/tambah_expo";
$route['minmin/tambah_akun_admin'] = "admin/tambah_akun_admin";
$route['minmin/tambah_developer'] = "admin/tambah_developer";
$route['minmin/tambah_sewa'] = "admin/tambah_sewa";
$route['minmin/tambah_promo'] = "admin/tambah_promo";
$route['minmin/tambah_konten_expo_img'] = "admin/tambah_konten_expo_img";
$route['minmin/tambah_konten_expo_txt'] = "admin/tambah_konten_expo_txt";
$route['minmin/tambah_sponsor'] = "admin/tambah_sponsor";
$route['minmin/tambah_konten_home'] = "admin/tambah_konten_home";
$route['minmin/tambah_konten_home_img'] = "admin/tambah_konten_home_img";
$route['minmin/tambah_ads'] = "admin/tambah_ads";
$route['minmin/tambah_show_date'] = "admin/tambah_show_date";
$route['minmin/tambah_artikel'] = "admin/tambah_artikel";
$route['minmin/tambah_artikel_kategori'] = "admin/tambah_artikel_kategori";
$route['minmin/tambah_artikel_tag'] = "admin/tambah_artikel_tag";
$route['minmin/tambah_marketing'] = "admin/tambah_marketing";
$route['minmin/tambah_lowongan'] = "admin/tambah_lowongan";
$route['minmin/tambah_payment'] = "admin/tambah_payment";
$route['minmin/tambah_hint'] = "admin/tambah_hint";
$route['minmin/tambah_game'] = "admin/tambah_game";
$route['minmin/export_all_pelamar'] = "admin/export_all_pelamar";
$route['minmin/tambah_item'] = "admin/tambah_item";
$route['minmin/tambah_input'] = "admin/tambah_input";

$route['minmin/(:any)/(:any)'] = "admin/$1/$2";
$route['minmin/produk/(:any)'] = "admin/produk/$1";
$route['minmin/produk/(:any)/(:any)'] = "admin/produk_detail/$1/$2";


$route['send/(:any)'] = "home/send/$1";
$route['review/(:any)'] = "home/review/$1";
$route['top_up/(:any)'] = "home/fill_detail/$1";
$route['(:any)'] = "home/detail/$1";

$route['api/mlaccount/fetch'] = "home/fetch_ml_account";
