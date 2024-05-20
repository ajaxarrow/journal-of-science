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
$route['default_controller'] = 'pages/view';
$route['articles'] = 'pages/view/articles';
$route['archives'] = 'archives/index';
$route['article/(:num)'] = 'article/view/$1';
$route['archived/(:num)'] = 'archives/index/$1';
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/users'] = 'user/index';
$route['admin/user/new'] = 'user/new_user';
$route['admin/user/add'] = 'user/add_user';
$route['admin/user/(:num)'] = 'user/view_user/$1';
$route['admin/user/edit/(:num)'] = 'user/edit_user/$1';
$route['admin/user/update/(:num)'] = 'user/update_user/$1';
$route['admin/user/delete/(:num)'] = 'user/delete_user/$1';
$route['admin/article/(:num)/authors'] = 'articleauthor/index/$1';
$route['admin/article/(:num)/assign-authors'] = 'articleauthor/new/$1';
$route['admin/article/(:num)/add-assign-authors'] = 'articleauthor/add/$1';
$route['admin/article/(:num)/author/edit/(:num)'] = 'articleauthor/edit/$1/$2';
$route['admin/article/(:num)/author/update/(:num)'] = 'articleauthor/update/$1/$2';
$route['admin/article/(:num)/author/delete/(:num)'] = 'articleauthor/delete/$1/$2';
$route['admin/articles'] = 'article/index';
$route['admin/article/new'] = 'article/new_article';
$route['admin/article/add'] = 'article/add_article';
$route['admin/article/(:num)'] = 'article/view_article/$1';
$route['admin/article/edit/(:num)'] = 'article/edit_article/$1';
$route['admin/article/update/(:num)'] = 'article/update_article/$1';
$route['admin/article/delete/(:num)'] = 'article/delete_article/$1';
$route['admin/article/download/(:any)'] = 'article/download/$1';
$route['admin/authors'] = 'author/index';
$route['admin/author/new'] = 'author/new_author';
$route['admin/author/add'] = 'author/add_author';
$route['admin/author/(:num)'] = 'author/view_author/$1';
$route['admin/author/edit/(:num)'] = 'author/edit_author/$1';
$route['admin/author/update/(:num)'] = 'author/update_author/$1';
$route['admin/author/delete/(:num)'] = 'author/delete_author/$1';
$route['admin/submissions'] = 'submission/index';
$route['admin/volumes'] = 'volume/index';
$route['admin/volume/new'] = 'volume/new_volume';
$route['admin/volume/add'] = 'volume/add_volume';
$route['admin/volume/(:num)'] = 'volume/view_volume/$1';
$route['admin/volume/edit/(:num)'] = 'volume/edit_volume/$1';
$route['admin/volume/update/(:num)'] = 'volume/update_volume/$1';
$route['admin/volume/delete/(:num)'] = 'volume/delete_volume/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
