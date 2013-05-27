<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a APN+ Network Organization Database module for PyroCMS
 *
 * @category   	APN+ Network
 * @package    	Organizational database <OrgDB>
 * @author     	devnull <www.gerekper.asia>
 * @copyright  	2012-2013 Gerekper Inc
 * @license    	-
 * @version    	1.0.1
 * @link       	-
 * @name		routes.php
 * @see        	-
 * @since      	File available since Release 1.0.0
 * @deprecated 	-
 */
 
$route['orgdb/admin/(/:any)?']					= 	'admin$1';
$route['orgdb/admin/countries(/:any)?']			=	'admin_countries$1';


//$route['roboto/admin/config(/:any)?']		= 	'admin_config$1';
//$route['roboto/admin/main(/:any)?']			=	'admin_main$1';
//$route['roboto/admin/library(/:any)?']		=	'admin_library$1';
//$route['roboto/admin/audit(/:any)?']		=	'admin_audit$1';
//$route['roboto/admin/trap(/:any)?']			=	'admin_trap$1';
//$route['roboto/admin/initialize(/:any)?']	=	'admin_init$1';
//$route['orgdb/activate(/:any)?(/:any)?'] 	=	'admin/activate/$1/$2';

/* End of file routes.php */