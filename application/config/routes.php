<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';

$route['restudentslist'] = 'Welcome/restudentsList';
// Filter Route
$route['sortbybestmatch'] = 'Welcome/sortRestudent';
$route['sortbynewest'] = 'Welcome/sortRestudent';
$route['sortbyratingavarage'] = 'Welcome/sortRestudent';
$route['sortbypopularity'] = 'Welcome/sortRestudent';
$route['sortbyaverageproductprice'] = 'Welcome/sortRestudent';
$route['sortbydeliverycostsh2l'] = 'Welcome/sortRestudent';
$route['sortbydeliverycostsl2h'] = 'Welcome/sortRestudent';

// Search Route
$route['search_restudent'] = 'Welcome/searchRestudents';

$route['test_report'] = 'Testing/unit_test_report';

$route['404_override'] = 'Welcome/errorRequest';
$route['translate_uri_dashes'] = FALSE;


