<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

// index default //
$route['default_controller'] = "controller_home";
$route['404_override'] = '';

// $route['^home'] = "controller_home/home";
$route['^loginfacebook'] = "controller_home/loginfacebook";
$route['^loginfacebook/postulation'] = "controller_home/loginfacebook/postulation";
$route['^logout'] = "controller_home/logout";
$route['^postulation'] = "controller_home/postulation";
$route['^username'] = "controller_home/username";
$route['^facebooklike'] = "controller_home/facebooklike";

$route['^timeline'] = "controller_user/timeline";
$route['^profile'] = "controller_user/profile";
$route['^profile/(:num)'] = "controller_user/profile/$1";
$route['^discover'] = "controller_user/discover";
$route['^post/(:num)'] = "controller_user/post/$1";
$route['^configuration'] = "controller_user/configuration";
$route['^notifications'] = "controller_user/notifications";

$route['^feed/username'] = "controller_feed/username";
$route['^feed/comments/(:num)/(:any)'] = 'controller_feed/comments/$1/$2';
$route['^feed/pts/(:num)/(:any)'] = 'controller_feed/pts/$1/$2';
$route['^feed/post/(:num)/(:any)'] = 'controller_feed/post/$1/$2';
$route['^feed/follow/(:num)/(:any)'] = 'controller_feed/follow/$1/$2';
$route['^feed/following/(:num)/(:any)'] = 'controller_feed/following/$1/$2';
$route['^feed/followers/(:num)/(:any)'] = 'controller_feed/followers/$1/$2';


$route['^crop'] = 'controller_home/crop';
$route['^test'] = 'controller_home/test';
$route['^emailpoints'] = 'controller_home/emailpoints';





/* End of file routes.php */
/* Location: ./application/config/routes.php */