<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This is a APN+ Network Organization Database module for PyroCMS
 *
 * @category   APN+ Network
 * @package    Organizational database <OrgDB>
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2013 Gerekper Inc
 * @license    -
 * @version    1.0.0
 * @link       -
 * @see        -
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

//menus
$lang['orgdb:menu:title']							= 	'APN+';
$lang['orgdb:menu:index']							=	'Main Database';
$lang['orgdb:menu:countries']						= 	'Country Database';

//section
$lang['orgdb:section:orgdb']						= 	'OrgDB';

//messages
$lang['robots:message:success']					=	'Robots.txt has been saved';
$lang['robots:message:error']					=	'An error had occurred while saving Robots.txt';

//page titles
$lang['orgdb:title:orgdb']							=	'APN+ Network Organizational Database';
$lang['orgdb:title:countries']						=	'APN+ Network Country Database';

//labels -- orgdb
$lang['orgdb:label:orgdb_id']						=	'ID';
$lang['orgdb:label:orgdb_company']					= 	'Company Name';
$lang['orgdb:label:orgdb_country']					=	'Country';
$lang['orgdb:label:orgdb_address']					=	'Address';
$lang['orgdb:label:orgdb_address_01']				=	'Address 01';
$lang['orgdb:label:orgdb_address_02']				=	'Address 02';
$lang['orgdb:label:orgdb_city']						=	'City';
$lang['orgdb:label:orgdb_postal']					=	'Postal';
$lang['orgdb:label:orgdb_phone_01']					=	'Phone No. 1';
$lang['orgdb:label:orgdb_phone_02']					=	'Phone No. 2';
$lang['orgdb:label:orgdb_phone_ext']				=	'Phone Extension';
$lang['orgdb:label:orgdb_email_01']					=	'Email 01';
$lang['orgdb:label:orgdb_email_02']					=	'Email 02';
$lang['orgdb:label:orgdb_languages']				=	'Languages';
$lang['orgdb:label:orgdb_contact']					=	'Contact No.';
$lang['orgdb:label:orgdb_website']					=	'Website';
$lang['orgdb:label:orgdb_action']					=	'Actions';
$lang['orgdb:label:orgdb_comments']					=	'Comments';
$lang['orgdb:label:orgdb_status']					=	'Status';
$lang['orgdb:label:col_nil']						=	'NIL';
$lang['orgdb:label:no_data']						=	'No Data';
$lang['orgdb:label:button:deactivate']				=	'Deactivate';
$lang['orgdb:label:button:activate']				=	'Activate';
$lang['orgdb:label:dropdown:deactivated']			=	'Deactivated';
$lang['orgdb:label:dropdown:activated']				=	'Activated';
$lang['orgdb:label:button:refresh']					= 	'Refresh';
$lang['orgdb:label:orgdb_active']					=	'Active';
$lang['orgdb:label:orgdb_keywords']					=	'Keywords';

//labels -- countries
$lang['orgdb:label:orgdb_country_id']				=	$lang['orgdb:label:orgdb_id'];
$lang['orgdb:label:orgdb_country_iso_02']			=	'ISO 02';
$lang['orgdb:label:orgdb_country_iso_03']			=	'ISO 03';
$lang['orgdb:label:orgdb_country_iso_00']			=	'ISO 00';
$lang['orgdb:label:orgdb_country_sname']			=	'Short Name';
$lang['orgdb:label:orgdb_country_lname']			=	'Long Name';
$lang['orgdb:label:orgdb_country_is_un']			=	'is UN';
$lang['orgdb:label:orgdb_country_code']				=	'Code';
$lang['orgdb:label:orgdb_country_tld']				=	'TLD';
$lang['orgdb:label:orgdb_country_status']			=	$lang['orgdb:label:orgdb_status'];
$lang['orgdb:label:orgdb_country_flag']				=	'Flag';
$lang['orgdb:label:edit_company']					=	'Edit Company';


//Pages
$lang['orgdb:messages:activate:success']			= 	'%s item(s) out of %s successfully activated.';
$lang['orgdb:messages:activate:error']				= 	'There are some items that failed to be activated successfully';
$lang['orgdb:messages:activate:mass:error']			=	'You need to select users first.';
$lang['orgdb:messages:activate:conditional']		=	'%s item(s) are already activated prior';

$lang['orgdb:messages:deactivate:success']			=	'%s item(s) out of %s successfully deactivated.';
$lang['orgdb:messages:deactivate:noid:error']		= 	'Please choose some ids to deactivate';
$lang['orgdb:messages:deactivate:error']			=	'There are some items that failed to be deactivate successfully';
$lang['orgdb:messages:deactivate:conditional']		=	'%s item(s) are already deactivated prior';

$lang['orgdb:messages:general:error']				= 	'There are some item(s) that failed to activate/deactivate successfully';



/* End of file orgdb_lang.php */