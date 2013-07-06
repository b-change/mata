<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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
| There are two reserved routes:
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

$route['default_controller']                = 'pages';
$route['404_override']                      = 'pages';

$route['admin/help/([a-zA-Z0-9_-]+)']       = 'admin/help/$1';
$route['admin/([a-zA-Z0-9_-]+)/(:any)']	    = '$1/admin/$2';
$route['admin/(login|logout)']			    = 'admin/$1';
$route['admin/([a-zA-Z0-9_-]+)']            = '$1/admin/index';

$route['api/ajax/(:any)']          			= 'api/ajax/$1';
$route['api/([a-zA-Z0-9_-]+)/(:any)']	    = '$1/api/$2';
$route['api/([a-zA-Z0-9_-]+)']              = '$1/api/index';

$route['register']                          = 'users/register';
$route['user/([\w]+)']	                    = 'users/view/$1';
$route['my-profile']	                    = 'users/index';
$route['edit-profile']	                    = 'users/edit';

$route['sitemap.xml']                       = 'sitemap/xml';

/* FireSale - Category Customisation */
$route['category/(order|style)/([a-z0-9]+)'] = 'firesale/front_category/$1/$2';

/* FireSale - Category */
$route['category(/[a-z0-9-_/]+)?(/[0-9]+)?'] = 'firesale/front_category/index$1$2';

/* FireSale - Product */
$route['product/([a-z0-9-_]+)'] = 'firesale/front_product/index/$1';

/* FireSale - Cart */
$route['cart(/:any)?'] = 'firesale/front_cart$1';

/* FireSale - Single Order */
$route['users/orders/([0-9]+)'] = 'firesale/front_orders/view_order/$1';

/* FireSale - User Orders */
$route['users/orders'] = 'firesale/front_orders/index';

/* FireSale - User Addresses */
$route['users/addresses(/:any)?'] = 'firesale/front_address$1';

/* FireSale - Currency Switcher */
$route['currency/([0-9]+)?'] = 'firesale/front_currency/change/$1';

/* FireSale - New Products */
$route['new(/:any)?(/[0-9]+)?'] = 'firesale/front_new/index$1$2';

/* End of file routes.php */

/* Custom Routes from PyroRoutes */

/* FireSale - Category Customisation */
$route['category/(order|style)/([a-z0-9]+)'] = 'firesale/front_category/$1/$2';

/* FireSale - Category */
$route['category(/[a-z0-9-_/]+)?(/[0-9]+)?'] = 'firesale/front_category/index$1$2';

/* FireSale - Product */
$route['product/([a-z0-9-_]+)'] = 'firesale/front_product/index/$1';

/* FireSale - Cart */
$route['cart(/:any)?'] = 'firesale/front_cart$1';

/* FireSale - Single Order */
$route['users/orders/([0-9]+)'] = 'firesale/front_orders/view_order/$1';

/* FireSale - User Orders */
$route['users/orders'] = 'firesale/front_orders/index';

/* FireSale - User Addresses */
$route['users/addresses(/:any)?'] = 'firesale/front_address$1';

/* FireSale - Currency Switcher */
$route['currency/([0-9]+)?'] = 'firesale/front_currency/change/$1';

/* FireSale - New Products */
$route['new(/:any)?(/[0-9]+)?'] = 'firesale/front_new/index$1$2';

/* End of file routes.php */