<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* ADMIN PANEL */

$route['panel'] = 'admin/home';

$route['panel/users'] = "admin/users/all";
$route['panel/user/add'] = "admin/users/add";
$route['panel/user/delete/(:num)'] = "admin/users/delete/$1";
$route['panel/user/show/(:num)'] = "admin/users/show/$1";
$route['panel/user/edit/(:num)'] = "admin/users/edit/$1";

$route['panel/pages'] = "admin/pages/all";
$route['panel/page/add'] = "admin/pages/add";
$route['panel/page/delete/(:num)'] = "admin/pages/delete/$1";
$route['panel/page/edit/(:num)'] = "admin/pages/edit/$1";

$route['panel/settings'] = "admin/settings/all";
$route['panel/setting/edit/(:num)'] = "admin/settings/edit/$1";

$route['panel/messages'] = "admin/contacts/home";
$route['panel/message/show/(:num)'] = "admin/contacts/show/$1";
$route['panel/message/delete/(:num)'] = "admin/contacts/delete/$1";

/* ONLY USERS */

//$route['profilim'] = "user/profile";

/* EVERYBODY */

$route['giris'] = "home/login";
$route['kaydol'] = "home/signup";
$route['panel/login'] = "home/adminLogin";
$route['logout'] = "home/logout";
$route['panel/logout'] = "home/logout";
$route['post-contact'] = "home/postContact";
$route['changeLang/(:any)'] = "pages/switchLanguage/$1";
$route['(:any)'] = "pages/getPageData";
$route['default_controller'] = "home";
$route['404_override'] = '';
