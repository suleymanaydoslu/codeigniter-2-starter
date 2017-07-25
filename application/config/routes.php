<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* ADMIN PANEL */

$route['panel'] = 'admin/HomeController';

$route['panel/users'] = "admin/UsersController/all";
$route['panel/user/add'] = "admin/UsersController/add";
$route['panel/user/delete/(:num)'] = "admin/UsersController/delete/$1";
$route['panel/user/show/(:num)'] = "admin/UsersController/show/$1";
$route['panel/user/edit/(:num)'] = "admin/UsersController/edit/$1";

$route['panel/pages'] = "admin/PagesController/all";
$route['panel/page/add'] = "admin/PagesController/add";
$route['panel/page/delete/(:num)'] = "admin/PagesController/delete/$1";
$route['panel/page/edit/(:num)'] = "admin/PagesController/edit/$1";

$route['panel/settings'] = "admin/SettingsController/all";
$route['panel/setting/edit/(:num)'] = "admin/SettingsController/edit/$1";

$route['panel/messages'] = "admin/ContactsController/home";
$route['panel/message/show/(:num)'] = "admin/ContactsController/show/$1";
$route['panel/message/delete/(:num)'] = "admin/ContactsController/delete/$1";

//$route['profilim'] = "UserController/profile";

/* EVERYBODY */

$route['giris'] = "HomeController/login";
$route['kaydol'] = "HomeController/signup";
$route['panel/login'] = "HomeController/adminLogin";
$route['logout'] = "HomeController/logout";
$route['panel/logout'] = "HomeController/logout";
$route['post-contact'] = "HomeController/postContact";
$route['changeLang/(:any)'] = "PagesController/switchLanguage/$1";
$route['(:any)'] = "PagesController/getPageData";
$route['default_controller'] = "HomeController";
$route['404_override'] = '';
