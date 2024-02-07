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
$route['default_controller'] = 'Home';
$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = TRUE;

// --- auth
$route['logout'] = "AdminAuth/logout";
// kicked out whenever user trying to access auth controller
$route['adminpage'] = "My404";
$route['AdminPage'] = "My404";
$route['adminauth'] = "My404";
$route['AdminAuth'] = "My404";
// route url masking
$route['gotoadminpage'] = "AdminAuth";

// --- adminpage
$route['admin-page'] = "AdminPage";
// user management
$route['admin-page/user-management'] = "AdminPage/users";

// insert here......

// any url behind adminpage
$route['admin-page/(:any)'] = "AdminPage/$1";
$route['admin-page/(:any)/(:any)'] = "AdminPage/$1/$2";
$route['admin-page/(:any)/(:any)/(:any)'] = "AdminPage/$1/$2/$3";
$route['admin-page/(:any)/(:any)/(:any)/(:any)'] = "AdminPage/$1/$2/$3/$4";

// error page
$route['error-404'] = "My404";

// client side
$route['event-programs'] = "Home/events";
$route['event-programs/(:any)'] = "Home/events/$1";
$route['event-calendar'] = "Home/event_calendar";

