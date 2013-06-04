<?php defined('BASEPATH') or exit('No direct script access allowed');
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
 
 class Module_Orgdb extends Module {
 	
	 public $version = '1.0.2.17';
	
	//----------------------------------------------------------------------//
	
	public function __construct()
	{
		parent::__construct();
		$this->orgdb_main 		= 'apnplus_orgdb_main';
		$this->orgdb_lang 		= 'apnplus_orgdb_language';
		$this->orgdb_lang_map	= 'apnplus_orgdb_lang_map';
		$this->orgdb_country 	= 'apnplus_orgdb_country';
	}
	
	//----------------------------------------------------------------------//
	
	public function info()
    {
        
        $info = array(
            'name' => array(
                'en' => 'APN+ OrgDB'
            ),
            'description' => array(
                'en' => 'APN+ Organizational Database'
            ),
            'frontend'  =>  TRUE,
            'backend'   =>  TRUE,
            'skip_xss'  =>  TRUE,
            'author'    =>  'dev_null',
            'menu'      =>  'content',
            'roles'     =>  'admin_orgdb',   
		);
        
        //Sections 
        $info['sections']['orgdb'] = array(
            'name'  => 	'orgdb:menu:index',
            'uri'   =>  'admin/orgdb'
            );
		$info['sections']['countries'] = array(
            'name'  =>  'orgdb:menu:countries',
            'uri'   =>  'admin/orgdb/countries'
            );
        
        return $info;
    }

	//----------------------------------------------------------------------//
	
	public function install()
	{
		$_install0 = $this->uninstall();
		$_install1 = $this->orgdb_install_schema();
		//$_install2 = $this->orgdb_create_triggers();
		$_install3 = $this->orgdb_insert_main_data();
		$_install4 = $this->orgdb_insert_country_data();
		$_install5 = $this->orgdb_insert_lang_map_data();
		
		return ($_install0 && $_install1 && $_install3 && $_install4 && $_install5 == TRUE) ? TRUE : FALSE;
	}
	
	//----------------------------------------------------------------------//
	
	public function uninstall()
	{
		$_uninstall0 = $this->dbforge->drop_table($this->orgdb_main);
		$_uninstall1 = $this->dbforge->drop_table($this->orgdb_lang);
		$_uninstall2 = $this->dbforge->drop_table($this->orgdb_country);
		$_uninstall3 = $this->dbforge->drop_table($this->orgdb_lang_map);
		return ($_uninstall0 && $_uninstall1 && $_uninstall2 && $_uninstall3 == TRUE) ? TRUE : FALSE;
	}
	
	//----------------------------------------------------------------------//
	
	public function upgrade($version)
	{
		$_upgrade01 = $this->db->update($this->db->dbprefix('modules'), array('version' => $version), array('slug' => 'orgdb'));
		$_upgrade02 = $this->uninstall();
		$_upgrade03 = $this->install();
		
		return ($_upgrade01 && $_upgrade02 && $_upgrade03 == TRUE) ? TRUE : FALSE;
	}
	
	public function __upgrade($version) // depreciated
	{
		$_upgrade1 = $this->db->query("UPDATE `". $this->db->dbprefix('modules') ."` SET `version` = '". $version ."' WHERE `slug` = 'orgdb' ");
	   	$_upgrade2 = $this->uninstall();
		$_upgrade3 = $this->install();
	   
	   return ($_upgrade1 && $_upgrade2 && $_upgrade3 == TRUE) ? TRUE : FALSE;
	}
	
	//----------------------------------------------------------------------//
	
	public function help() //TODO: Update
	{
		$help = "<h3>APN+ Network Organization Database v". $this->version ."</h3>";
		$help .= "APN+ Network Organization Database is a front-back-end module for PyroCMS and it supports the latest version 2.2.x.<br />"; 
		$help .= "It helps members to start a discussion internally and collaborate provided the group must be give permissions.<br /><br />";
		$help .= "<strong>Features:</strong><br />";
		$help .= "1. create / edit / delete topic<br />";
		$help .= "2. Add / delete comment<br />";
		$help .= "3. View topics<br /><br />";
		$help .= "<strong>Installation:</strong><br />";
		$help .= "1. Download the archive and upload via CP<br />";
		$help .= "2. Install the module<br /><br />";
		$help .= "Reach us for issues / feedback at <a href=\"mailto:hello@netpines.com\"><strong>NetPines Support</strong></a> or tweet us <a href=\"http://twitter.com/netpines\" target=\"_blank\"><strong>@netpines</strong></a><br /><br />";
		$help .= "Note: This is not forum based. A simple discussion panel which is nothing but a single thread in forum.<br />";
		
		return $help;
	}

	//----------------------------------------------------------------------//
	
	public function orgdb_install_schema()
	{
		$new_tables = array(
            'apnplus_orgdb_main' => array(
				'orgdb_id' 			=> array('type' => 'SMALLINT', 'constraint' => 2, 'auto_increment' => true, 'primary' => true, 'unique' => true, 'null' => false,),
				'orgdb_company' 	=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => false, 'default' => '',),
				'orgdb_country' 	=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'orgdb_address_01' 	=> array('type' => 'VARCHAR', 'constraint' => 200, 'default' => '',),
				'orgdb_address_02' 	=> array('type' => 'VARCHAR', 'constraint' => 200, 'default' => '',),
				'orgdb_city' 		=> array('type' => 'VARCHAR', 'constraint' => 50, 'null' => false, 'default' => '',),
				'orgdb_postal' 		=> array('type' => 'VARCHAR', 'constraint' => 25, 'default' => '',), 
				'orgdb_phone_01'	=> array('type' => 'VARCHAR', 'constraint' => 50, 'default' => '',),
				'orgdb_phone_02' 	=> array('type' => 'VARCHAR', 'constraint' => 50, 'default' => '',),
				'orgdb_phone_ext' 	=> array('type' => 'VARCHAR', 'constraint' => 10, 'default' => '',),
				'orgdb_email_01' 	=> array('type' => 'VARCHAR', 'constraint' => 254, 'default' => '',),
				'orgdb_email_02' 	=> array('type' => 'VARCHAR', 'constraint' => 254, 'default' => '',),
				'orgdb_website' 	=> array('type' => 'VARCHAR', 'constraint' => 512, 'default' => '',),
				'orgdb_comments' 	=> array('type' => 'VARCHAR', 'constraint' => 254, 'default' => '',),
				'orgdb_status' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false,),
				),
			'apnplus_orgdb_language' => array(
				'orgdb_lang_id' 		=> array('type' => 'SMALLINT', 'constraint' => 2, 'auto_increment' => true, 'primary' => true, 'unique' => true, 'null' => false,),
				'orgdb_lang_main_id'	=> array('type' => 'SMALLINT', 'constraint' => 2, 'unique' => true, 'null' => false,),
				'orgdb_lang_english' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_bangla'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_khmer' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_tetum' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_japanese' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_burmese' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_pidgen' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_motu' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_vietnamese' => array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_dzhongka' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_mandarin' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_thai' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_laos' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_russian' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_nepali' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_urdu' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_sinhala' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_malaysia' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_cantonese' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_tamil' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_lang_indonesia' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_orgdb_lang_map' => array(
				'orgdb_map_id'			=> array('type' => 'SMALLINT', 'constraint' => 2, 'auto_increment' => true, 'primary' => true, 'unique' => true, 'null' => false,),
				'orgdb_map_lang'		=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'orgdb_map_db'			=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				),
			'apnplus_orgdb_country' => array(
				'orgdb_country_id'		=> array('type' => 'SMALLINT', 'constraint' => 2, 'auto_increment' => true, 'primary' => true, 'unique' => true, 'null' => false,),
				'orgdb_country_iso_02'  => array('type' => 'CHAR', 'constraint' => 2, 'unique' => true, 'null' => false,),
				'orgdb_country_iso_03'  => array('type' => 'CHAR', 'constraint' => 3, 'unique' => true, 'null' => false,),
				'orgdb_country_iso_00'  => array('type' => 'CHAR', 'constraint' => 3, 'unique' => true, 'null' => false,),
				'orgdb_country_sname' 	=> array('type' => 'VARCHAR', 'constraint' => 80, 'null' => false, 'default' => '',),
				'orgdb_country_lname' 	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'orgdb_country_is_un'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'orgdb_country_code' 	=> array('type' => 'VARCHAR', 'constraint' => 10, 'null' => false, 'default' => '',),
				'orgdb_country_tld' 	=> array('type' => 'VARCHAR', 'constraint' => 5, 'default' => '',),
				'orgdb_country_status'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false,),
				)
         );
		return ($this->install_tables($new_tables) == TRUE) ? TRUE : FALSE;	
	}
	
	//----------------------------------------------------------------------//
	
	public function orgdb_insert_main_data()
	{
		$_main = array(
			'01' => array(
				'orgdb_company' 	=> 	'Asia Pacific Network of People Living with HIV/AIDS (APN+)', 
				'orgdb_country' 	=> 	'TH',
				'orgdb_address_01' 	=> 	"51 / 2nd Floor, Ruam Rudee III Bldg",
				'orgdb_address_02' 	=> 	"Ploenchit Road, Lumpini, Pathumwan",
				'orgdb_city' 		=> 	'Bangkok',
				'orgdb_postal' 		=> 	'10330',
				'orgdb_phone_01' 	=> 	"+662-2557-477",
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"info@apnplus.org",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.apnplus.org",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'02' => array(
				'orgdb_company' 	=> 	'Network of PLHIV (NOP+)', 
				'orgdb_country' 	=> 	'BD',
				'orgdb_address_01' 	=> 	"8/1(3rd floor) Block –A",
				'orgdb_address_02' 	=> 	"Mohammedpur",
				'orgdb_city' 		=> 	'Dhaka',
				'orgdb_postal' 		=> 	'1207',
				'orgdb_phone_01' 	=> 	"+880-1716-253-502",
				'orgdb_phone_02' 	=> 	"+880-1819-004-753",
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"nnbplus@gmail.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	TRUE, 'orgdb_lang_khmer'			=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'03' => array(
				'orgdb_company' 	=> 	'Cambodia People Living with HIV/AIDS Network (CPN+)', 
				'orgdb_country' 	=> 	'KH',
				'orgdb_address_01' 	=> 	"# 84 , Street 606 Sangkat Boeung Kak II ",
				'orgdb_address_02' 	=> 	"Khan Toul Kork, Phnom Penh",
				'orgdb_city' 		=> 	'Phnom Penh',
				'orgdb_postal' 		=> 	'637',
				'orgdb_phone_01' 	=> 	"+855-23-880-072",
				'orgdb_phone_02' 	=> 	"+855-12-889-285",
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"info@cpnplus.org",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.cpnplus.org",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	TRUE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'04' => array(
				'orgdb_company' 	=> 	'Estrela+ -- East Timor', 
				'orgdb_country' 	=> 	'TL',
				'orgdb_address_01' 	=> 	'',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'Dili',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	"+670-773-31330",
				'orgdb_phone_02' 	=> 	'+670-776-63159',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"estrelaplus.easttimor@gmail.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	TRUE, 'orgdb_lang_japanese'		=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'05' => array(
				'orgdb_company' 	=> 	'GUAHAN - Guam HIV/AIDS Network', 
				'orgdb_country' 	=> 	'GU',
				'orgdb_address_01' 	=> 	'',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'06' => array(
				'orgdb_company' 	=> 	'Jaringan Orang Terinfeksi HIV (JOTHI) - Indonesia', 
				'orgdb_country' 	=> 	'ID',
				'orgdb_address_01' 	=> 	'Tebet Timur III E No. 3',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'Jakarta',
				'orgdb_postal' 		=> 	'12820',
				'orgdb_phone_01' 	=> 	'+62-21-830-5911',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"secretariat@jothi.or.id",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'07' => array(
				'orgdb_company' 	=> 	'Japanese Network of People Living with HIV/AIDS (JaNP+)', 
				'orgdb_country' 	=> 	'JP',
				'orgdb_address_01' 	=> 	'#402 Houtoku Building',
				'orgdb_address_02' 	=> 	'1-7 Naito-cho Shinjuku-ku',
				'orgdb_city' 		=> 	'Tokyo',
				'orgdb_postal' 		=> 	'160 0014',
				'orgdb_phone_01' 	=> 	'+81-3-5367-8558',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"jhatori@janpplus.org",
				'orgdb_email_02' 	=> 	"junppei@gmail.com",
				'orgdb_website' 	=> 	"www.jannplus.org",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	TRUE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'08' => array(
				'orgdb_company' 	=> 	'myPlus (Malaysia Positive Network)  - Malaysia  c/o KLASS (Kuala Lumpur AIDS Support Services Society)', 
				'orgdb_country' 	=> 	'MY',
				'orgdb_address_01' 	=> 	"No. 16-4, 4th Floor, Jalan 13/48A",
				'orgdb_address_02' 	=> 	'Sentul Boulevard, Off Jalan Sentul',
				'orgdb_city' 		=> 	'Kuala Lumpur',
				'orgdb_postal' 		=> 	'51000',
				'orgdb_phone_01' 	=> 	'+603 4050 2872',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"myplus.org.my@gmail.com",
				'orgdb_email_02' 	=> 	"andnreu2004@yahoo.com",
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	TRUE, 'orgdb_lang_cantonese'=>	TRUE, 'orgdb_lang_tamil' 		=> 	TRUE,
				),
			'09' => array(
				'orgdb_company' 	=> 	'Myanmar Positive Group (MPG)', 
				'orgdb_country' 	=> 	'MM',
				'orgdb_address_01' 	=> 	'No 12/F Mile-Pyithu Street',
				'orgdb_address_02' 	=> 	'Mayan Gone Township',
				'orgdb_city' 		=> 	'Yangon',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'+951-666532',
				'orgdb_phone_02' 	=> 	'+951-666904',
				'orgdb_phone_ext' 	=> 	'214',
				'orgdb_email_01' 	=> 	"myanmarpositivegroup@gmail.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"info@mpgnationetwork.org",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	TRUE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'10' => array(
				'orgdb_company' 	=> 	'Body Positive -- New Zealand', 
				'orgdb_country' 	=> 	'NZ',
				'orgdb_address_01' 	=> 	'Newton',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'Auckland',
				'orgdb_postal' 		=> 	'1145',
				'orgdb_phone_01' 	=> 	'+64-9-309-3989',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"office@bodypositive.org.nz",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.bodypositive.org.nz",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'11' => array(
				'orgdb_company' 	=> 	'IGAT Hope -- Papua New Guinea', 
				'orgdb_country' 	=> 	'PG',
				'orgdb_address_01' 	=> 	'P.O Box 200',
				'orgdb_address_02' 	=> 	'Waigani NCD',
				'orgdb_city' 		=> 	'Port Moresby',
				'orgdb_postal' 		=> 	'111',
				'orgdb_phone_01' 	=> 	'+674-325-2890',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"secretariat@ihi.org.pg",
				'orgdb_email_02' 	=> 	"amcpherson@ihi.org.pg",
				'orgdb_website' 	=> 	"www.bodypositive.org.nz",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	TRUE, 'orgdb_lang_motu'		=>	TRUE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'12' => array(
				'orgdb_company' 	=> 	'National Focal Point -- Samoa', 
				'orgdb_country' 	=> 	'AS',
				'orgdb_address_01' 	=> 	'',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=> 	"mpeati@yahoo.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),	
			'13' => array(
				'orgdb_company' 	=> 	'KANOS -- South Korea', 
				'orgdb_country' 	=> 	'KR',
				'orgdb_address_01' 	=> 	'',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'+852-2-6052-4949',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  '',
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'14' => array(
				'orgdb_company' 	=> 	'Thailand Network Of People Living with HIV/AIDS Foundation (TNP+)', 
				'orgdb_country' 	=> 	'TH',
				'orgdb_address_01' 	=> 	'494 Soi Nakhorn Thai 11',
				'orgdb_address_02' 	=> 	'Ladproa 101, Klongjun, Bangkapi',
				'orgdb_city' 		=> 	'Bangkok',
				'orgdb_postal' 		=> 	'10240',
				'orgdb_phone_01' 	=> 	'+66-2-377-5065',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "tnpth@thaiplus.net",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.thaiplus.net",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	FALSE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	TRUE, 'orgdb_lang_laos'		=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'15' => array(
				'orgdb_company' 	=> 	'Vietnam National Network of People Living with HIV/AIDS (VNP+)', 
				'orgdb_country' 	=> 	'VN',
				'orgdb_address_01' 	=> 	'Suite 1216, 12th floor, Building K4',
				'orgdb_address_02' 	=> 	'Viet Hung New Urban Area, Long Bien district',
				'orgdb_city' 		=> 	'Hanoi',
				'orgdb_postal' 		=> 	'844',
				'orgdb_phone_01' 	=> 	'+84-4-3873-7933',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "vnpplus2008@gmail.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.vnpplus.com",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	TRUE, 'orgdb_lang_dzhongka'		=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'16' => array(
				'orgdb_company' 	=> 	'National Association of People Living with HIV/AIDS (NAPWA)', 
				'orgdb_country' 	=> 	'AU',
				'orgdb_address_01' 	=> 	'P.O Box 917',
				'orgdb_address_02' 	=> 	'Newtown',
				'orgdb_city' 		=> 	'Sydney',
				'orgdb_postal' 		=> 	'2042',
				'orgdb_phone_01' 	=> 	'+612-8568-0300',
				'orgdb_phone_02' 	=> 	'1800-259-666',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  '',
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.napwa.org.au",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'17' => array(
				'orgdb_company' 	=> 	'Lhak-Sam Organization ', 
				'orgdb_country' 	=> 	'BT',
				'orgdb_address_01' 	=> 	'Changangkha, Thimphu',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'Thimphu',
				'orgdb_postal' 		=> 	'1358',
				'orgdb_phone_01' 	=> 	'+975-233-7068',
				'orgdb_phone_02' 	=> 	'+975-178-54195',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "lhaksambnp@gmail.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	TRUE, 'orgdb_lang_mandarin'		=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'18' => array(
				'orgdb_company' 	=> 	'AIDS Care (Guangxi Headquarter)', 
				'orgdb_country' 	=> 	'CN',
				'orgdb_address_01' 	=> 	'1501 Building D, Jia De Xin Shui Jing Cheng',
				'orgdb_address_02' 	=> 	'61# Jinhu Road, Qingxiu District',
				'orgdb_city' 		=> 	'Nanning City, Guangxin Province',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'+867-715-307-88',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "aidscarecn@gmail.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.aidscarechina.org",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	TRUE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'19' => array(
				'orgdb_company' 	=> 	'Fiji Network of People Living with HIV/AIDS (FJN+)', 
				'orgdb_country' 	=> 	'FJ',
				'orgdb_address_01' 	=> 	'Old Government Phamacy Building',
				'orgdb_address_02' 	=> 	'15139 Suva',
				'orgdb_city' 		=> 	'Fiji',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'+679-3310-958',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "emosiratini@yahoo.co.uk",
				'orgdb_email_02' 	=> 	"mumtopharez@yahoo.com",
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'20' => array(
				'orgdb_company' 	=> 	'Indian Network of People Living with HIV/AIDS (INP+) National Secretariat', 
				'orgdb_country' 	=> 	'IN',
				'orgdb_address_01' 	=> 	'Flat No 10, 3rd Floor, Kash Towers,',
				'orgdb_address_02' 	=> 	"New No: 121, Old No: 94,South West Boag Road, T.Nagar",
				'orgdb_city' 		=> 	'Chennai',
				'orgdb_postal' 		=> 	'600017',
				'orgdb_phone_01' 	=> 	'+91-44-4264-1580',
				'orgdb_phone_02' 	=> 	'+91-44-2431-4617',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "inp@inpplus.net",
				'orgdb_email_02' 	=> 	"inpplus2012@gmail.com",
				'orgdb_website' 	=> 	"www.inpplus.net",
				'orgdb_comments' 	=> 	'+91-44-2431-4618 / 20 / 22',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'21' => array(
				'orgdb_company' 	=> 	'Iranian Positive Life', 
				'orgdb_country' 	=> 	'IR',
				'orgdb_address_01' 	=> 	'87 Jami St Hafez Street',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'',
				'orgdb_postal' 		=> 	'11388-13614',
				'orgdb_phone_01' 	=> 	'+98-21-6674-8214',
				'orgdb_phone_02' 	=> 	'+98-91-2130-3902',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "amirrezamoradi@yahoo.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'22' => array(
				'orgdb_company' 	=> 	'Association of People Living with HIV/AIDS', 
				'orgdb_country' 	=> 	'LA',
				'orgdb_address_01' 	=> 	'Learning House for Development Building, Office No.17 ',
				'orgdb_address_02' 	=> 	'Nasay village, Saysettha district',
				'orgdb_city' 		=> 	'Vientiane',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	"(+856-21) 454 445",
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "coordinationlnpplus@gmail.com",
				'orgdb_email_02' 	=> 	"splnpplus@gmail.com",
				'orgdb_website' 	=> 	"www.lnpplus.com",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	TRUE, 'orgdb_lang_laos'		=>	TRUE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'23' => array(
				'orgdb_company' 	=> 	'Mongolia National Focal Point', 
				'orgdb_country' 	=> 	'MN',
				'orgdb_address_01' 	=> 	'Sukhbaatar duureg, 3rd khoroo',
				'orgdb_address_02' 	=> 	'Narnii zam, Sarora centre',
				'orgdb_city' 		=> 	'Ulaanbaatar',
				'orgdb_postal' 		=> 	'307',
				'orgdb_phone_01' 	=> 	'+976-70111240 ',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "pugee74@yahoo.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	TRUE, 'orgdb_lang_laos'		=>	FALSE, 'orgdb_lang_russian'		=>	TRUE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'24' => array(
				'orgdb_company' 	=> 	'National Association of PLHA in Nepal (NAP+N)', 
				'orgdb_country' 	=> 	'NP',
				'orgdb_address_01' 	=> 	'EPC: 4112',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'Kathmandu',
				'orgdb_postal' 		=> 	'8975',
				'orgdb_phone_01' 	=> 	'+977-1-437-3910',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "napn@wlink.com.np",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.napn.org.np",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	TRUE, 'orgdb_lang_urdu'			=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'25' => array(
				'orgdb_company' 	=> 	'The Association of PLHIV', 
				'orgdb_country' 	=> 	'PK',
				'orgdb_address_01' 	=> 	'Office 2, 2nd Floor Mussarat Arcade',
				'orgdb_address_02' 	=> 	'Sector G-11, Markaz',
				'orgdb_city' 		=> 	'Islamabad',
				'orgdb_postal' 		=> 	'4400',
				'orgdb_phone_01' 	=> 	'+92-51-222-0904',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "info@theassociation.org.pk",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.theassociation.org.pk",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	TRUE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'26' => array(
				'orgdb_company' 	=> 	'Pinoy Plus', 
				'orgdb_country' 	=> 	'PH',
				'orgdb_address_01' 	=> 	'1805 P.Guevarra Street',
				'orgdb_address_02' 	=> 	'Sta Cruz',
				'orgdb_city' 		=> 	'Manila',
				'orgdb_postal' 		=> 	'1014',
				'orgdb_phone_01' 	=> 	'+63-2743-7293',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "pinoyplus@yahoo.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'27' => array(
				'orgdb_company' 	=> 	'Action for AIDS', 
				'orgdb_country' 	=> 	'SG',
				'orgdb_address_01' 	=> 	'35 Kelantan Lane #02-01',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'Singapore',
				'orgdb_postal' 		=> 	'208652',
				'orgdb_phone_01' 	=> 	'+65-6254-0212',
				'orgdb_phone_02' 	=> 	'+65-6297-0336',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "info@afa.org.sg",
				'orgdb_email_02' 	=> 	"clubgenesis.sg@gmail.com",
				'orgdb_website' 	=> 	"www.afa.org.sg",
				'orgdb_comments' 	=> 	"donovan.lo@afa.org.sg",
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'28' => array(
				'orgdb_company' 	=> 	'Lanka+ -- Sri Lanka', 
				'orgdb_country' 	=> 	'LK',
				'orgdb_address_01' 	=> 	'No. 05(189) Wijitha',
				'orgdb_address_02' 	=> 	'Sri Wayshakya Mawatha, Obeysekeraoura, Rajagiriya',
				'orgdb_city' 		=> 	'Colombo',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'+94-11-490-1692',
				'orgdb_phone_02' 	=> 	'+94-11-288-5014',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "lankaplus@yahoo.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	"www.lankaplus.org",
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	TRUE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				),
			'29' => array(
				'orgdb_company' 	=> 	'National Focal Point -- Vanuatu', 
				'orgdb_country' 	=> 	'VU',
				'orgdb_address_01' 	=> 	'',
				'orgdb_address_02' 	=> 	'',
				'orgdb_city' 		=> 	'',
				'orgdb_postal' 		=> 	'',
				'orgdb_phone_01' 	=> 	'',
				'orgdb_phone_02' 	=> 	'',
				'orgdb_phone_ext' 	=> 	'',
				'orgdb_email_01' 	=>  "irenemalachi@yahoo.com",
				'orgdb_email_02' 	=> 	'',
				'orgdb_website' 	=> 	'',
				'orgdb_comments' 	=> 	'',
				'orgdb_status'		=> 	TRUE,
				'orgdb_lang_english'	=> 	TRUE, 'orgdb_lang_bangla'	=> 	FALSE, 'orgdb_lang_khmer'		=> 	FALSE, 'orgdb_lang_tetum'		=> 	FALSE, 'orgdb_lang_japanese'	=>	FALSE, 'orgdb_lang_burmese'	=>	FALSE, 
				'orgdb_lang_pidgen'		=>	FALSE, 'orgdb_lang_motu'	=>	FALSE, 'orgdb_lang_vietnamese'	=> 	FALSE, 'orgdb_lang_dzhongka'	=>	FALSE, 'orgdb_lang_mandarin'	=> 	FALSE, 
				'orgdb_lang_thai'		=>	FALSE, 'orgdb_lang_laos'	=>	FALSE, 'orgdb_lang_russian'		=>	FALSE, 'orgdb_lang_nepali'		=>	FALSE, 'orgdb_lang_urdu'		=>	FALSE, 'orgdb_lang_sinhala'	=> 	FALSE,
				'orgdb_lang_malaysia'	=> 	FALSE, 'orgdb_lang_cantonese'=>	FALSE, 'orgdb_lang_tamil' 		=> 	FALSE,
				)
			);
		
		foreach ($_main as $_main_data) {
			
			$_orgdb_lang_data = array(
								'orgdb_lang_english' 	=> 	$_main_data['orgdb_lang_english'],
								'orgdb_lang_bangla' 	=>	$_main_data['orgdb_lang_bangla'],
								'orgdb_lang_khmer' 		=> 	$_main_data['orgdb_lang_khmer'],
								'orgdb_lang_tetum'		=>	$_main_data['orgdb_lang_tetum'],
								'orgdb_lang_japanese'	=>	$_main_data['orgdb_lang_japanese'],
								'orgdb_lang_burmese'	=>	$_main_data['orgdb_lang_burmese'],
								'orgdb_lang_pidgen'		=>	$_main_data['orgdb_lang_pidgen'],
								'orgdb_lang_motu'		=>	$_main_data['orgdb_lang_motu'],
								'orgdb_lang_vietnamese'	=>	$_main_data['orgdb_lang_vietnamese'],
								'orgdb_lang_dzhongka'	=>	$_main_data['orgdb_lang_dzhongka'],
								'orgdb_lang_mandarin'	=>	$_main_data['orgdb_lang_mandarin'],
								'orgdb_lang_thai'		=>	$_main_data['orgdb_lang_thai'],
								'orgdb_lang_laos'		=>	$_main_data['orgdb_lang_laos'],
								'orgdb_lang_russian'	=>	$_main_data['orgdb_lang_russian'],
								'orgdb_lang_nepali'		=>	$_main_data['orgdb_lang_nepali'],
								'orgdb_lang_urdu'		=>	$_main_data['orgdb_lang_urdu'],
								'orgdb_lang_sinhala'	=>	$_main_data['orgdb_lang_sinhala'], 
								'orgdb_lang_malaysia'	=>	$_main_data['orgdb_lang_malaysia'],
								'orgdb_lang_cantonese'	=>	$_main_data['orgdb_lang_cantonese'],
								'orgdb_lang_tamil'		=>	$_main_data['orgdb_lang_tamil']
							);
			$_orgdb_part_data = array(
								'orgdb_company' 		=> 	$_main_data['orgdb_company'],
								'orgdb_country'			=>	$_main_data['orgdb_country'],
								'orgdb_address_01'		=>	$_main_data['orgdb_address_01'],
								'orgdb_address_02'		=>	$_main_data['orgdb_address_02'],
								'orgdb_city'			=>	$_main_data['orgdb_city'],
								'orgdb_postal'			=>	$_main_data['orgdb_postal'],
								'orgdb_phone_01'		=>	$_main_data['orgdb_phone_01'],
								'orgdb_phone_02'		=>	$_main_data['orgdb_phone_02'],
								'orgdb_phone_ext'		=>	$_main_data['orgdb_phone_ext'],
								'orgdb_email_01'		=>	$_main_data['orgdb_email_01'],
								'orgdb_email_02'		=>	$_main_data['orgdb_email_02'],
								'orgdb_website'			=>	$_main_data['orgdb_website'],
								'orgdb_comments'		=>	$_main_data['orgdb_comments'],
								'orgdb_status'			=>	$_main_data['orgdb_status']
								);
			
			
			$this->orgdb_insert_main_data_init($_orgdb_part_data);
			$this->orgdb_insert_lang_data_init($this->orgdb_get_uuid($_main_data['orgdb_company'], $_main_data['orgdb_country']), $_orgdb_lang_data);	
		}
		return TRUE;
	}

	public function orgdb_insert_main_data_init($_orgdb_part_data){
		return $this->db->insert($this->orgdb_main,
					array(
						//'orgdb_id'			=> '',
						'orgdb_company' 	=> 	$_orgdb_part_data['orgdb_company'],
						'orgdb_country'		=> 	$_orgdb_part_data['orgdb_country'], 
						'orgdb_address_01'	=> 	$_orgdb_part_data['orgdb_address_01'],
						'orgdb_address_02'	=> 	$_orgdb_part_data['orgdb_address_02'],
						'orgdb_city'		=> 	$_orgdb_part_data['orgdb_city'],
						'orgdb_postal'		=> 	$_orgdb_part_data['orgdb_postal'],
						'orgdb_phone_01'	=> 	$_orgdb_part_data['orgdb_phone_01'], 
						'orgdb_phone_02'	=> 	$_orgdb_part_data['orgdb_phone_02'], 
						'orgdb_phone_ext'	=> 	$_orgdb_part_data['orgdb_phone_ext'], 
						'orgdb_email_01'	=> 	$_orgdb_part_data['orgdb_email_01'],
						'orgdb_email_02'	=> 	$_orgdb_part_data['orgdb_email_02'], 
						'orgdb_website'		=> 	$_orgdb_part_data['orgdb_website'],
						'orgdb_comments'	=> 	$_orgdb_part_data['orgdb_comments'],
						'orgdb_status'		=>	$_orgdb_part_data['orgdb_status'], 
						)	
					);
	}
	
	public function __dep_orgdb_insert_main_data_init($_orgdb_company, $_orgdb_country, $_orgdb_address_01, $_orgdb_address_02, $_orgdb_city, 
												$_orgdb_postal, $_orgdb_phone_01, $_orgdb_phone_02, $_orgdb_phone_ext, $_orgdb_email_01, 
												$_orgdb_email_02, $_orgdb_website, $_orgdb_comments, $_orgdb_status)
	{
		return $this->db->insert($this->orgdb_main,
					array(
						'orgdb_id'			=> '',
						'orgdb_company' 	=> 	$_orgdb_company,
						'orgdb_country'		=> 	$_orgdb_country, 
						'orgdb_address_01'	=> 	$_orgdb_address_01,
						'orgdb_address_02'	=> 	$_orgdb_address_02,
						'orgdb_city'		=> 	$_orgdb_city,
						'orgdb_postal'		=> 	$_orgdb_postal,
						'orgdb_phone_01'	=> 	$_orgdb_phone_01, 
						'orgdb_phone_02'	=> 	$_orgdb_phone_02, 
						'orgdb_phone_ext'	=> 	$_orgdb_phone_ext, 
						'orgdb_email_01'	=> 	$_orgdb_email_01,
						'orgdb_email_02'	=> 	$_orgdb_email_02, 
						'orgdb_website'		=> 	$_orgdb_website,
						'orgdb_comments'	=> 	$_orgdb_comments,
						'orgdb_status'		=>	$_orgdb_status, 
						)	
					);
	}
	
	//----------------------------------------------------------------------//
	
	private function orgdb_get_uuid($_orgdb_company, $_orgdb_country)
	{
		$_data = $this->db
				->select('orgdb_id')
				->where(array('orgdb_company' => $_orgdb_company, 'orgdb_country' => $_orgdb_country))
				->get($this->db->dbprefix($this->orgdb_main))
				->row();
			
		return $_data->orgdb_id;
	}
	
	//----------------------------------------------------------------------//
	
	public function orgdb_insert_country_data()
	{
		$_country = array(
			//A
			'afghanistan' 						=> array('orgdb_country_iso_02' => 'AF', 'orgdb_country_iso_03'	=> 'AFG', 'orgdb_country_iso_00' => '004', 'orgdb_country_sname' => 'Afghanistan', 						'orgdb_country_lname' => 'Islamic Republic of Afghanistan', 				'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '93', 		'orgdb_country_tld'	=> '.af', 'orgdb_country_status' => TRUE), 
			'alan_islands' 						=> array('orgdb_country_iso_02' => 'AX', 'orgdb_country_iso_03'	=> 'ALA', 'orgdb_country_iso_00' => '248', 'orgdb_country_sname' => 'Alan Islands', 					'orgdb_country_lname' => 'Alan Islands', 									'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '358', 		'orgdb_country_tld'	=> '.ax', 'orgdb_country_status' => TRUE), 
			'albania'	 						=> array('orgdb_country_iso_02' => 'AL', 'orgdb_country_iso_03'	=> 'ALB', 'orgdb_country_iso_00' => '008', 'orgdb_country_sname' => 'Albania', 							'orgdb_country_lname' => 'Republic of Albania', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '355', 		'orgdb_country_tld'	=> '.al', 'orgdb_country_status' => TRUE), 
			'algeria' 							=> array('orgdb_country_iso_02' => 'DZ', 'orgdb_country_iso_03'	=> 'DZA', 'orgdb_country_iso_00' => '012', 'orgdb_country_sname' => 'Algeria', 							'orgdb_country_lname' => "People's Democratic Republic of Algeria", 		'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '213', 		'orgdb_country_tld'	=> '.dz', 'orgdb_country_status' => TRUE), 
			'american_samoa' 					=> array('orgdb_country_iso_02' => 'AS', 'orgdb_country_iso_03'	=> 'ASM', 'orgdb_country_iso_00' => '016', 'orgdb_country_sname' => 'American Samoa', 					'orgdb_country_lname' => 'American Samoa', 									'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '1+684', 	'orgdb_country_tld'	=> '.as', 'orgdb_country_status' => TRUE), 
			'andorra' 							=> array('orgdb_country_iso_02' => 'AD', 'orgdb_country_iso_03'	=> 'AND', 'orgdb_country_iso_00' => '020', 'orgdb_country_sname' => 'Andorra', 							'orgdb_country_lname' => 'Principality of Andorra', 						'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '376', 		'orgdb_country_tld'	=> '.ad', 'orgdb_country_status' => TRUE), 
			'angola' 							=> array('orgdb_country_iso_02' => 'AO', 'orgdb_country_iso_03'	=> 'AGO', 'orgdb_country_iso_00' => '024', 'orgdb_country_sname' => 'Angola', 							'orgdb_country_lname' => 'Republic of Angola', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '244', 		'orgdb_country_tld'	=> '.ao', 'orgdb_country_status' => TRUE), 
			'anguilla' 							=> array('orgdb_country_iso_02' => 'AI', 'orgdb_country_iso_03'	=> 'AIA', 'orgdb_country_iso_00' => '660', 'orgdb_country_sname' => 'Anguilla', 						'orgdb_country_lname' => 'Anguilla', 										'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '1+264', 	'orgdb_country_tld'	=> '.ai', 'orgdb_country_status' => TRUE), 
			'antarctica' 						=> array('orgdb_country_iso_02' => 'AQ', 'orgdb_country_iso_03'	=> 'ATA', 'orgdb_country_iso_00' => '010', 'orgdb_country_sname' => 'Antarctica', 						'orgdb_country_lname' => 'Antarctica', 										'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '672', 		'orgdb_country_tld'	=> '.aq', 'orgdb_country_status' => TRUE), 
			'antigua_and_barbuda'				=> array('orgdb_country_iso_02' => 'AG', 'orgdb_country_iso_03'	=> 'ATG', 'orgdb_country_iso_00' => '028', 'orgdb_country_sname' => 'Antigua and Barbuda', 				'orgdb_country_lname' => 'Antigua and Barbuda', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '1+268', 	'orgdb_country_tld'	=> '.ag', 'orgdb_country_status' => TRUE), 
			'argentina'							=> array('orgdb_country_iso_02' => 'AR', 'orgdb_country_iso_03'	=> 'ARG', 'orgdb_country_iso_00' => '032', 'orgdb_country_sname' => 'Argentina', 						'orgdb_country_lname' => 'Argentine Republic', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '54', 		'orgdb_country_tld'	=> '.ar', 'orgdb_country_status' => TRUE), 
			'armenia'							=> array('orgdb_country_iso_02' => 'AM', 'orgdb_country_iso_03'	=> 'ARM', 'orgdb_country_iso_00' => '051', 'orgdb_country_sname' => 'Armenia', 							'orgdb_country_lname' => 'Republic of Armenia', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '374', 		'orgdb_country_tld'	=> '.am', 'orgdb_country_status' => TRUE), 
			'aruba'								=> array('orgdb_country_iso_02' => 'AW', 'orgdb_country_iso_03'	=> 'ABW', 'orgdb_country_iso_00' => '533', 'orgdb_country_sname' => 'Aruba', 							'orgdb_country_lname' => 'Aruba', 											'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '297', 		'orgdb_country_tld'	=> '.aw', 'orgdb_country_status' => TRUE), 
			'australia'							=> array('orgdb_country_iso_02' => 'AU', 'orgdb_country_iso_03'	=> 'AUS', 'orgdb_country_iso_00' => '036', 'orgdb_country_sname' => 'Australia', 						'orgdb_country_lname' => 'Commonwealth of Australia', 						'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '61', 		'orgdb_country_tld'	=> '.au', 'orgdb_country_status' => TRUE), 
			'austria'							=> array('orgdb_country_iso_02' => 'AT', 'orgdb_country_iso_03'	=> 'AUT', 'orgdb_country_iso_00' => '040', 'orgdb_country_sname' => 'Austria', 							'orgdb_country_lname' => 'Republic of Austria', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '43', 		'orgdb_country_tld'	=> '.at', 'orgdb_country_status' => TRUE), 
			'azerbaijan'						=> array('orgdb_country_iso_02' => 'AZ', 'orgdb_country_iso_03'	=> 'AZE', 'orgdb_country_iso_00' => '031', 'orgdb_country_sname' => 'Azerbaijan', 						'orgdb_country_lname' => 'Republic of Azerbaijan', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '994', 		'orgdb_country_tld'	=> '.az', 'orgdb_country_status' => TRUE), 

			//B
			'bahamas'							=> array('orgdb_country_iso_02' => 'BS', 'orgdb_country_iso_03'	=> 'BHS', 'orgdb_country_iso_00' => '044', 'orgdb_country_sname' => 'Bahamas', 							'orgdb_country_lname' => 'Commonwealth of The Bahamas', 					'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '1+242', 	'orgdb_country_tld'	=> '.bs', 'orgdb_country_status' => TRUE), 
			'bahrain'							=> array('orgdb_country_iso_02' => 'BH', 'orgdb_country_iso_03'	=> 'BHR', 'orgdb_country_iso_00' => '048', 'orgdb_country_sname' => 'Bahrain', 							'orgdb_country_lname' => 'Kingdom of Bahrain', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '973', 		'orgdb_country_tld'	=> '.bh', 'orgdb_country_status' => TRUE), 															
			'bangladesh' 						=> array('orgdb_country_iso_02' => 'BD', 'orgdb_country_iso_03'	=> 'BGD', 'orgdb_country_iso_00' => '050', 'orgdb_country_sname' => 'Bangladesh', 						'orgdb_country_lname' => "People's Republic of Bangladesh", 				'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '880', 		'orgdb_country_tld'	=> '.bd', 'orgdb_country_status' => TRUE), 
			'barbados' 							=> array('orgdb_country_iso_02' => 'BB', 'orgdb_country_iso_03'	=> 'BRB', 'orgdb_country_iso_00' => '052', 'orgdb_country_sname' => 'Barbados', 						'orgdb_country_lname' => 'Barbados', 										'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '1+246', 	'orgdb_country_tld'	=> '.bb', 'orgdb_country_status' => TRUE), 
			'belarus' 							=> array('orgdb_country_iso_02' => 'BY', 'orgdb_country_iso_03'	=> 'BLR', 'orgdb_country_iso_00' => '112', 'orgdb_country_sname' => 'Belarus', 							'orgdb_country_lname' => 'Republic of Belarus', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '375', 		'orgdb_country_tld'	=> '.by', 'orgdb_country_status' => TRUE), 
			'belgium' 							=> array('orgdb_country_iso_02' => 'BE', 'orgdb_country_iso_03'	=> 'BEL', 'orgdb_country_iso_00' => '056', 'orgdb_country_sname' => 'Belgium', 							'orgdb_country_lname' => 'Kingdom of Belgium', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '32', 		'orgdb_country_tld'	=> '.be', 'orgdb_country_status' => TRUE), 
			'belize' 							=> array('orgdb_country_iso_02' => 'BZ', 'orgdb_country_iso_03'	=> 'BLZ', 'orgdb_country_iso_00' => '084', 'orgdb_country_sname' => 'Belize', 							'orgdb_country_lname' => 'Belize', 											'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '501', 		'orgdb_country_tld'	=> '.bz', 'orgdb_country_status' => TRUE), 
			'benin' 							=> array('orgdb_country_iso_02' => 'BJ', 'orgdb_country_iso_03'	=> 'BEN', 'orgdb_country_iso_00' => '204', 'orgdb_country_sname' => 'Benin', 							'orgdb_country_lname' => 'Republic of Benin', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '229', 		'orgdb_country_tld'	=> '.bj', 'orgdb_country_status' => TRUE), 
			'bermuda' 							=> array('orgdb_country_iso_02' => 'BM', 'orgdb_country_iso_03'	=> 'BMU', 'orgdb_country_iso_00' => '060', 'orgdb_country_sname' => 'Bermuda', 							'orgdb_country_lname' => 'Bermuda Islands', 								'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '1+441', 	'orgdb_country_tld'	=> '.bm', 'orgdb_country_status' => TRUE), 
			'bhutan' 							=> array('orgdb_country_iso_02' => 'BT', 'orgdb_country_iso_03'	=> 'BTN', 'orgdb_country_iso_00' => '064', 'orgdb_country_sname' => 'Bhutan', 							'orgdb_country_lname' => 'Kingdom of Bhutan', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '975', 		'orgdb_country_tld'	=> '.bt', 'orgdb_country_status' => TRUE),
			'bolivia' 							=> array('orgdb_country_iso_02' => 'BO', 'orgdb_country_iso_03'	=> 'BOL', 'orgdb_country_iso_00' => '068', 'orgdb_country_sname' => 'Bolivia', 							'orgdb_country_lname' => 'Plurinational State of Bolivia', 					'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '591', 		'orgdb_country_tld'	=> '.bo', 'orgdb_country_status' => TRUE),
			'bonaire' 							=> array('orgdb_country_iso_02' => 'BQ', 'orgdb_country_iso_03'	=> 'BES', 'orgdb_country_iso_00' => '535', 'orgdb_country_sname' => 'Bonaire', 							'orgdb_country_lname' => 'Bonaire, Sint Eustatius and Saba', 				'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '599', 		'orgdb_country_tld'	=> '.bq', 'orgdb_country_status' => TRUE),
			'bosnia_and_herzegovina'			=> array('orgdb_country_iso_02' => 'BA', 'orgdb_country_iso_03'	=> 'BIH', 'orgdb_country_iso_00' => '070', 'orgdb_country_sname' => 'Bosnia and Herzegovina',			'orgdb_country_lname' => 'Bosnia and Herzegovina', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '387', 		'orgdb_country_tld'	=> '.ba', 'orgdb_country_status' => TRUE),
			'botswana'							=> array('orgdb_country_iso_02' => 'BW', 'orgdb_country_iso_03'	=> 'BWA', 'orgdb_country_iso_00' => '072', 'orgdb_country_sname' => 'Botswana',							'orgdb_country_lname' => 'Republic of Botswana', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '267', 		'orgdb_country_tld'	=> '.bw', 'orgdb_country_status' => TRUE),
			'bouvet_island'						=> array('orgdb_country_iso_02' => 'BV', 'orgdb_country_iso_03'	=> 'BVT', 'orgdb_country_iso_00' => '074', 'orgdb_country_sname' => 'Bouvet Island',					'orgdb_country_lname' => 'Bouvet Island', 									'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '', 		'orgdb_country_tld'	=> '.bv', 'orgdb_country_status' => TRUE),
			'brazil'							=> array('orgdb_country_iso_02' => 'BR', 'orgdb_country_iso_03'	=> 'BRA', 'orgdb_country_iso_00' => '076', 'orgdb_country_sname' => 'Brazil',							'orgdb_country_lname' => 'Federative Republic of Brazil', 					'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '55', 		'orgdb_country_tld'	=> '.br', 'orgdb_country_status' => TRUE),
			'british_indian_ocean_territory'	=> array('orgdb_country_iso_02' => 'IO', 'orgdb_country_iso_03'	=> 'IOT', 'orgdb_country_iso_00' => '086', 'orgdb_country_sname' => 'British Indian Ocean Territory',	'orgdb_country_lname' => 'British Indian Ocean Territory', 					'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '246', 		'orgdb_country_tld'	=> '.io', 'orgdb_country_status' => TRUE),
			'brunei'							=> array('orgdb_country_iso_02' => 'BN', 'orgdb_country_iso_03'	=> 'BRN', 'orgdb_country_iso_00' => '096', 'orgdb_country_sname' => 'Brunei',							'orgdb_country_lname' => 'Brunei Darussalam', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '673', 		'orgdb_country_tld'	=> '.bn', 'orgdb_country_status' => TRUE),
			'bulgaria'							=> array('orgdb_country_iso_02' => 'BG', 'orgdb_country_iso_03'	=> 'BGR', 'orgdb_country_iso_00' => '100', 'orgdb_country_sname' => 'Bulgaria',							'orgdb_country_lname' => 'Republic of Bulgaria', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '359', 		'orgdb_country_tld'	=> '.bg', 'orgdb_country_status' => TRUE),
			'burkina_faso'						=> array('orgdb_country_iso_02' => 'BF', 'orgdb_country_iso_03'	=> 'BFA', 'orgdb_country_iso_00' => '854', 'orgdb_country_sname' => 'Burkina Faso',						'orgdb_country_lname' => 'Burkina Faso', 									'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '226', 		'orgdb_country_tld'	=> '.bf', 'orgdb_country_status' => TRUE),
			'burundi'							=> array('orgdb_country_iso_02' => 'BI', 'orgdb_country_iso_03'	=> 'BDI', 'orgdb_country_iso_00' => '108', 'orgdb_country_sname' => 'Burundi',							'orgdb_country_lname' => 'Republic of Burundi', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '257', 		'orgdb_country_tld'	=> '.bi', 'orgdb_country_status' => TRUE),


			//C
			'cambodia'							=> array('orgdb_country_iso_02'	=> 'KH', 'orgdb_country_iso_03' => 'KHM', 'orgdb_country_iso_00' => '116', 'orgdb_country_sname' => 'Cambodia', 						'orgdb_country_lname' => 'Kingdom of Cambodia', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '855', 		'orgdb_country_tld'	=> '.kh', 'orgdb_country_status' => TRUE),
			'cameroon'							=> array('orgdb_country_iso_02' => 'CM', 'orgdb_country_iso_03'	=> 'CMR', 'orgdb_country_iso_00' => '120', 'orgdb_country_sname' => 'Cameroon',							'orgdb_country_lname' => 'Republic of Cameroon', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '237', 		'orgdb_country_tld'	=> '.cm', 'orgdb_country_status' => TRUE),
			'canada'							=> array('orgdb_country_iso_02' => 'CA', 'orgdb_country_iso_03'	=> 'CAN', 'orgdb_country_iso_00' => '124', 'orgdb_country_sname' => 'Canada',							'orgdb_country_lname' => 'Canada', 											'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '1', 		'orgdb_country_tld'	=> '.ca', 'orgdb_country_status' => TRUE),
			'cape_verde'						=> array('orgdb_country_iso_02' => 'CV', 'orgdb_country_iso_03'	=> 'CPV', 'orgdb_country_iso_00' => '132', 'orgdb_country_sname' => 'Cape Verde',						'orgdb_country_lname' => 'Republic of Cape Verde', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '238', 		'orgdb_country_tld'	=> '.cv', 'orgdb_country_status' => TRUE),
			'cayman_islands'					=> array('orgdb_country_iso_02' => 'KY', 'orgdb_country_iso_03'	=> 'CYM', 'orgdb_country_iso_00' => '136', 'orgdb_country_sname' => 'Cayman Islands',					'orgdb_country_lname' => 'The Cayman Islands', 								'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '1+345', 	'orgdb_country_tld'	=> '.ky', 'orgdb_country_status' => TRUE),
			'central_african_republic'			=> array('orgdb_country_iso_02' => 'CF', 'orgdb_country_iso_03'	=> 'CAF', 'orgdb_country_iso_00' => '140', 'orgdb_country_sname' => 'Central African Republic',			'orgdb_country_lname' => 'Central African Republic', 						'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '236', 		'orgdb_country_tld'	=> '.cf', 'orgdb_country_status' => TRUE),
			'chad'								=> array('orgdb_country_iso_02' => 'TD', 'orgdb_country_iso_03'	=> 'TCD', 'orgdb_country_iso_00' => '148', 'orgdb_country_sname' => 'Chad',								'orgdb_country_lname' => 'Republic of Chad', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '235', 		'orgdb_country_tld'	=> '.td', 'orgdb_country_status' => TRUE),
			'chile'								=> array('orgdb_country_iso_02' => 'CL', 'orgdb_country_iso_03'	=> 'CHL', 'orgdb_country_iso_00' => '152', 'orgdb_country_sname' => 'Chile',							'orgdb_country_lname' => 'Republic of Chile', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '56', 		'orgdb_country_tld'	=> '.cl', 'orgdb_country_status' => TRUE),
			'china' 							=> array('orgdb_country_iso_02'	=> 'CN', 'orgdb_country_iso_03'	=> 'CHN', 'orgdb_country_iso_00' => '156', 'orgdb_country_sname' => 'China', 							'orgdb_country_lname' => "People's Republic of China", 						'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '86', 		'orgdb_country_tld'	=> '.cn', 'orgdb_country_status' => TRUE), 
			'christmas_island' 					=> array('orgdb_country_iso_02'	=> 'CX', 'orgdb_country_iso_03'	=> 'CXR', 'orgdb_country_iso_00' => '162', 'orgdb_country_sname' => 'Christmas Island', 				'orgdb_country_lname' => 'Christmas Island', 								'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '61', 		'orgdb_country_tld'	=> '.cx', 'orgdb_country_status' => TRUE), 
			'cocos_(keeling)_islands' 			=> array('orgdb_country_iso_02'	=> 'CC', 'orgdb_country_iso_03'	=> 'CCK', 'orgdb_country_iso_00' => '166', 'orgdb_country_sname' => 'Cocos (Keeling) Islands', 			'orgdb_country_lname' => 'Cocos (Keeling) Islands', 						'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '61', 		'orgdb_country_tld'	=> '.cc', 'orgdb_country_status' => TRUE), 
			'colombia' 							=> array('orgdb_country_iso_02'	=> 'CO', 'orgdb_country_iso_03'	=> 'COL', 'orgdb_country_iso_00' => '170', 'orgdb_country_sname' => 'Colombia', 						'orgdb_country_lname' => 'Republic of Colombia', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '57', 		'orgdb_country_tld'	=> '.co', 'orgdb_country_status' => TRUE), 
			'comoros' 							=> array('orgdb_country_iso_02'	=> 'KM', 'orgdb_country_iso_03'	=> 'COM', 'orgdb_country_iso_00' => '174', 'orgdb_country_sname' => 'Comoros', 							'orgdb_country_lname' => 'Union of the Comoros', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '269', 		'orgdb_country_tld'	=> '.km', 'orgdb_country_status' => TRUE), 
			'congo' 							=> array('orgdb_country_iso_02'	=> 'CG', 'orgdb_country_iso_03'	=> 'COG', 'orgdb_country_iso_00' => '178', 'orgdb_country_sname' => 'Congo', 							'orgdb_country_lname' => 'Republic of the Congo', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '242', 		'orgdb_country_tld'	=> '.cg', 'orgdb_country_status' => TRUE), 
			'cook_islands' 						=> array('orgdb_country_iso_02'	=> 'CK', 'orgdb_country_iso_03'	=> 'COK', 'orgdb_country_iso_00' => '184', 'orgdb_country_sname' => 'Cook Islands', 					'orgdb_country_lname' => 'Cook Islands', 									'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '682', 		'orgdb_country_tld'	=> '.ck', 'orgdb_country_status' => TRUE), 
			'costa_rica' 						=> array('orgdb_country_iso_02'	=> 'CR', 'orgdb_country_iso_03'	=> 'CRI', 'orgdb_country_iso_00' => '188', 'orgdb_country_sname' => 'Costa Rica', 						'orgdb_country_lname' => 'Republic of Costa Rica', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '188', 		'orgdb_country_tld'	=> '.cr', 'orgdb_country_status' => TRUE), 
			"cote_d'ivoire_(ivory_coast)"		=> array('orgdb_country_iso_02'	=> 'CI', 'orgdb_country_iso_03'	=> 'CIV', 'orgdb_country_iso_00' => '384', 'orgdb_country_sname' => "Cote d'ivoire (Ivory Coast)", 		'orgdb_country_lname' => "Republic of C&ocirc;te DIvoire (Ivory Coast)",	'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '225', 		'orgdb_country_tld'	=> '.ci', 'orgdb_country_status' => TRUE), 
			'croatia' 							=> array('orgdb_country_iso_02'	=> 'HR', 'orgdb_country_iso_03'	=> 'HRV', 'orgdb_country_iso_00' => '191', 'orgdb_country_sname' => 'Croatia', 							'orgdb_country_lname' => 'Republic of Croatia', 							'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '385', 		'orgdb_country_tld'	=> '.hr', 'orgdb_country_status' => TRUE), 
			'cuba' 								=> array('orgdb_country_iso_02'	=> 'CU', 'orgdb_country_iso_03'	=> 'CUB', 'orgdb_country_iso_00' => '192', 'orgdb_country_sname' => 'Cuba', 							'orgdb_country_lname' => 'Republic of Cuba', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '53', 		'orgdb_country_tld'	=> '.cu', 'orgdb_country_status' => TRUE), 
			'curacao' 							=> array('orgdb_country_iso_02'	=> 'CW', 'orgdb_country_iso_03'	=> 'CUW', 'orgdb_country_iso_00' => '531', 'orgdb_country_sname' => 'Curacao', 							'orgdb_country_lname' => 'Cura&ccedil;ao', 									'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '599', 		'orgdb_country_tld'	=> '.cw', 'orgdb_country_status' => TRUE), 
			'cyprus' 							=> array('orgdb_country_iso_02'	=> 'CY', 'orgdb_country_iso_03'	=> 'CYP', 'orgdb_country_iso_00' => '196', 'orgdb_country_sname' => 'Cyprus', 							'orgdb_country_lname' => 'Republic of Cyprus', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '357', 		'orgdb_country_tld'	=> '.cy', 'orgdb_country_status' => TRUE), 
			'czech_republic' 					=> array('orgdb_country_iso_02'	=> 'CZ', 'orgdb_country_iso_03'	=> 'CZE', 'orgdb_country_iso_00' => '203', 'orgdb_country_sname' => 'Czech Republic', 					'orgdb_country_lname' => 'Czech Republic', 									'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '420', 		'orgdb_country_tld'	=> '.cz', 'orgdb_country_status' => TRUE), 

			//F
			'fiji' 								=> array('orgdb_country_iso_02' => 'FJ', 'orgdb_country_iso_03'	=> 'FJI', 'orgdb_country_iso_00' => '242', 'orgdb_country_sname' => 'Fiji', 							'orgdb_country_lname' => 'Republic of Fiji', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '679', 		'orgdb_country_tld'	=> '.fj', 'orgdb_country_status' => TRUE),

			//G
			'guam' 								=> array('orgdb_country_iso_02' => 'GU', 'orgdb_country_iso_03'	=> 'GUM', 'orgdb_country_iso_00' => '316', 'orgdb_country_sname' => 'Guam', 							'orgdb_country_lname' => 'Guam', 											'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '1+671', 	'orgdb_country_tld'	=> '.gu', 'orgdb_country_status' => TRUE), 

			//I
			'india' 							=> array('orgdb_country_iso_02' => 'IN', 'orgdb_country_iso_03'	=> 'IND', 'orgdb_country_iso_00' => '356', 'orgdb_country_sname' => 'India', 							'orgdb_country_lname' => "Republic of India", 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '91', 		'orgdb_country_tld'	=> '.in', 'orgdb_country_status' => TRUE), 
			'indonesia' 						=> array('orgdb_country_iso_02' => 'ID', 'orgdb_country_iso_03'	=> 'IDN', 'orgdb_country_iso_00' => '360', 'orgdb_country_sname' => 'Indonesia', 						'orgdb_country_lname' => 'Republic of Indonesia',							'orgdb_country_is_un' => FALSE, 'orgdb_country_code' => '62', 		'orgdb_country_tld'	=> '.id', 'orgdb_country_status' => TRUE),
			'iran' 								=> array('orgdb_country_iso_02' => 'IR', 'orgdb_country_iso_03'	=> 'IRN', 'orgdb_country_iso_00' => '364', 'orgdb_country_sname' => 'Iran', 							'orgdb_country_lname' => 'Islamic Republic of Iran', 						'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '98', 		'orgdb_country_tld'	=> '.ir', 'orgdb_country_status' => TRUE), 

			//J
			'japan' 							=> array('orgdb_country_iso_02' => 'JP', 'orgdb_country_iso_03'	=> 'JPN', 'orgdb_country_iso_00' => '392', 'orgdb_country_sname' => 'Japan', 							'orgdb_country_lname' => 'Japan', 											'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '81', 		'orgdb_country_tld'	=> '.jp', 'orgdb_country_status' => TRUE),

			//K
			'korea' 							=> array('orgdb_country_iso_02' => 'KR', 'orgdb_country_iso_03'	=> 'KOR', 'orgdb_country_iso_00' => '410', 'orgdb_country_sname' => 'South Korea', 						'orgdb_country_lname' => 'Republic of Korea', 								'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '82', 		'orgdb_country_tld'	=> '.kr', 'orgdb_country_status' => TRUE), 

			//L
			'laos' 								=> array('orgdb_country_iso_02' => 'LA', 'orgdb_country_iso_03'	=> 'LAO', 'orgdb_country_iso_00' => '418', 'orgdb_country_sname' => 'Laos', 							'orgdb_country_lname' => "Lao People's Democratic Republic", 				'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '856', 		'orgdb_country_tld'	=> '.la', 'orgdb_country_status' => TRUE),

			//M
			'malaysia' 							=> array('orgdb_country_iso_02' => 'MY', 'orgdb_country_iso_03'	=> 'MYS', 'orgdb_country_iso_00' => '458', 'orgdb_country_sname' => 'Malaysia', 						'orgdb_country_lname' => 'Malaysia', 										'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '60', 		'orgdb_country_tld'	=> '.my', 'orgdb_country_status' => TRUE),
			'mongolia' 							=> array('orgdb_country_iso_02' => 'MN', 'orgdb_country_iso_03'	=> 'MNG', 'orgdb_country_iso_00' => '496', 'orgdb_country_sname' => 'Mongolia', 						'orgdb_country_lname' => 'Mongolia', 										'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '976', 		'orgdb_country_tld'	=> '.mn', 'orgdb_country_status' => TRUE), 
			'myanmar' 							=> array('orgdb_country_iso_02' => 'MM', 'orgdb_country_iso_03'	=> 'MMR', 'orgdb_country_iso_00' => '104', 'orgdb_country_sname' => 'Myanmar (Burma)', 					'orgdb_country_lname' => 'Republic of the Union of Myanmar', 				'orgdb_country_is_un' => TRUE, 	'orgdb_country_code' => '95', 		'orgdb_country_tld'	=> '.mm', 'orgdb_country_status' => TRUE),

			//N
			'nepal' 							=> array('orgdb_country_iso_02' => 'NP', 'orgdb_country_iso_03'	=> 'NPL', 'orgdb_country_iso_00' => '524', 'orgdb_country_sname' => 'Nepal', 							'orgdb_country_lname'	=> 'Federal Democratic Republic of Nepal', 			'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '977', 		'orgdb_country_tld'	=> '.np', 'orgdb_country_status' => TRUE), 
			'new_zealand' 						=> array('orgdb_country_iso_02' => 'NZ', 'orgdb_country_iso_03'	=> 'NZL', 'orgdb_country_iso_00' => '554', 'orgdb_country_sname' => 'New Zealand', 						'orgdb_country_lname'	=> 'New Zeland', 									'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '64', 		'orgdb_country_tld'	=> '.nz', 'orgdb_country_status' => TRUE),

			//P
			'pakistan'							=> array('orgdb_country_iso_02' => 'PK', 'orgdb_country_iso_03'	=> 'PAK', 'orgdb_country_iso_00' => '586', 'orgdb_country_sname' => 'Pakistan', 						'orgdb_country_lname'	=> 'Islamic Republic of Pakistan', 					'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '92', 		'orgdb_country_tld'	=> '.pk', 'orgdb_country_status' => TRUE), 		
			'papua_new_guinea' 					=> array('orgdb_country_iso_02' => 'PG', 'orgdb_country_iso_03'	=> 'PNG', 'orgdb_country_iso_00' => '598', 'orgdb_country_sname' => 'Papua New Guinea', 				'orgdb_country_lname'	=> 'Independent State of Papua New Guinea', 		'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '675', 		'orgdb_country_tld'	=> '.pg', 'orgdb_country_status' => TRUE), 
			'philippines' 						=> array('orgdb_country_iso_02'	=> 'PH', 'orgdb_country_iso_03'	=> 'PHL', 'orgdb_country_iso_00' => '608', 'orgdb_country_sname' => 'Philippines', 						'orgdb_country_lname'	=> 'Republic of Philippines', 						'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '63', 		'orgdb_country_tld'	=> '.ph', 'orgdb_country_status' => TRUE), 

			//S
			'singapore' 						=> array('orgdb_country_iso_02' => 'SG', 'orgdb_country_iso_03'	=> 'SGP', 'orgdb_country_iso_00' => '702', 'orgdb_country_sname' => 'Singapore', 						'orgdb_country_lname'	=> 'Republic of Singapore',							'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '65', 		'orgdb_country_tld'	=> '.sg', 'orgdb_country_status' => TRUE), 
			'sri_lanka' 						=> array('orgdb_country_iso_02' => 'LK', 'orgdb_country_iso_03'	=> 'LKA', 'orgdb_country_iso_00' => '144', 'orgdb_country_sname' => 'Sri Lanka', 						'orgdb_country_lname'	=> 'Democratic Socialist Republic of Sri Lanka', 	'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '94', 		'orgdb_country_tld'	=> '.lk', 'orgdb_country_status' => TRUE), 

			//T
			'thailand' 							=> array('orgdb_country_iso_02' => 'TH', 'orgdb_country_iso_03'	=> 'THA', 'orgdb_country_iso_00' => '764', 'orgdb_country_sname' => 'Thailand', 						'orgdb_country_lname'	=> 'Kingdom of Thailand', 							'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '764',		'orgdb_country_tld'	=> '.th', 'orgdb_country_status' => TRUE), 	
			'timor-leste' 						=> array('orgdb_country_iso_02' => 'TL', 'orgdb_country_iso_03'	=> 'TLS', 'orgdb_country_iso_00' => '626', 'orgdb_country_sname' => 'Timor-Leste (East Timor)', 		'orgdb_country_lname'	=> 'Democratic Republic of Timor-Leste', 			'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '670', 		'orgdb_country_tld'	=> '.tl', 'orgdb_country_status' => TRUE), 
			
			//V
			'vanuatu' 							=> array('orgdb_country_iso_02' => 'VU', 'orgdb_country_iso_03'	=> 'VUT', 'orgdb_country_iso_00' => '548', 'orgdb_country_sname' => 'Vanuatu', 							'orgdb_country_lname'	=> 'Republic of Vanuatu', 							'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '678', 		'orgdb_country_tld'	=> '.vu', 'orgdb_country_status' => TRUE), 
			'vietnam' 							=> array('orgdb_country_iso_02' => 'VN', 'orgdb_country_iso_03'	=> 'VNM', 'orgdb_country_iso_00' => '704', 'orgdb_country_sname' => 'Vietnam', 							'orgdb_country_lname'	=> 'Socialist Republic of Vietnam', 				'orgdb_country_is_un' => TRUE, 'orgdb_country_code'	=> '84', 		'orgdb_country_tld'	=> '.vn', 'orgdb_country_status' => TRUE), 
		);
			
		return ($this->orgdb_insert_country_data_init($_country) == TRUE) ? TRUE : FALSE; 
	}

	public function orgdb_insert_country_data_init($_country)
	{
		reset($_country);
		
		while (list($key, $_country_data) = each($_country)) {
   			$this->db->insert($this->orgdb_country, 
			array(
				'orgdb_country_iso_02'	=>	$_country_data['orgdb_country_iso_02'],
				'orgdb_country_iso_03'	=>	$_country_data['orgdb_country_iso_03'],
				'orgdb_country_iso_00'	=>	$_country_data['orgdb_country_iso_00'],
				'orgdb_country_sname'	=>	$_country_data['orgdb_country_sname'],
				'orgdb_country_lname'	=>	$_country_data['orgdb_country_lname'],
				'orgdb_country_is_un'	=>	$_country_data['orgdb_country_is_un'],
				'orgdb_country_code'	=>	$_country_data['orgdb_country_code'],
				'orgdb_country_tld'		=>	$_country_data['orgdb_country_tld'], 
				'orgdb_country_status'	=>	$_country_data['orgdb_country_status'],
				)
			);
		}
		return TRUE;
	}
	
	public function __dep_orgdb_insert_country_data_init($_orgdb_country_iso_02, $_orgdb_country_iso_03, $_orgdb_country_iso_00, $_orgdb_country_sname, 
													$_orgdb_country_lname, $_orgdb_country_is_un, $_orgdb_country_code, $_orgdb_country_tld, 
													$_orgdb_country_status)
	{
		return $this->db->insert($this->orgdb_country,
					array(
						'orgdb_country_iso_02'	=> $_orgdb_country_iso_02, 
						'orgdb_country_iso_03'	=> $_orgdb_country_iso_03,
						'orgdb_country_iso_00'	=> $_orgdb_country_iso_03,
						'orgdb_country_sname'	=> $_orgdb_country_sname,
						'orgdb_country_lname'	=> $_orgdb_country_lname,
						'orgdb_country_is_un'	=> $_orgdb_country_is_un, 
						'orgdb_country_code'	=> $_orgdb_country_code, 
						'orgdb_country_tld'		=> $_orgdb_country_tld, 
						'orgdb_country_status'	=> $_orgdb_country_status,
						)	
					);
	}
	
	//----------------------------------------------------------------------//
	
	public function orgdb_insert_lang_data(){}//PLACEHOLDER ONLY:
	
	public function orgdb_insert_lang_data_init($_orgdb_lang_id, $_orgdb_lang_data){
			 $this->db->insert($this->orgdb_lang, 
				array(
					//'orgdb_lang_id'			=>	$_orgdb_lang_id,
					'orgdb_lang_main_id'	=>	$_orgdb_lang_id,
					'orgdb_lang_english'	=> 	$_orgdb_lang_data['orgdb_lang_english'], 
					'orgdb_lang_bangla'		=>	$_orgdb_lang_data['orgdb_lang_bangla'],
					'orgdb_lang_khmer'		=> 	$_orgdb_lang_data['orgdb_lang_khmer'], 
					'orgdb_lang_tetum'		=> 	$_orgdb_lang_data['orgdb_lang_tetum'], 
					'orgdb_lang_japanese'	=> 	$_orgdb_lang_data['orgdb_lang_japanese'], 
					'orgdb_lang_burmese'	=> 	$_orgdb_lang_data['orgdb_lang_burmese'], 
					'orgdb_lang_pidgen' 	=>	$_orgdb_lang_data['orgdb_lang_pidgen'], 
					'orgdb_lang_motu'		=> 	$_orgdb_lang_data['orgdb_lang_motu'], 
					'orgdb_lang_vietnamese'	=> 	$_orgdb_lang_data['orgdb_lang_vietnamese'],
					'orgdb_lang_dzhongka' 	=>	$_orgdb_lang_data['orgdb_lang_dzhongka'], 
					'orgdb_lang_mandarin' 	=>	$_orgdb_lang_data['orgdb_lang_mandarin'], 
					'orgdb_lang_thai'		=>	$_orgdb_lang_data['orgdb_lang_thai'], 
					'orgdb_lang_laos'		=>	$_orgdb_lang_data['orgdb_lang_laos'], 
					'orgdb_lang_russian'	=>	$_orgdb_lang_data['orgdb_lang_russian'], 
					'orgdb_lang_nepali'		=>	$_orgdb_lang_data['orgdb_lang_nepali'], 
					'orgdb_lang_urdu'		=>	$_orgdb_lang_data['orgdb_lang_urdu'], 
					'orgdb_lang_sinhala'	=>	$_orgdb_lang_data['orgdb_lang_sinhala'],
					'orgdb_lang_malaysia'	=>	$_orgdb_lang_data['orgdb_lang_malaysia'], 
					'orgdb_lang_tamil'		=>	$_orgdb_lang_data['orgdb_lang_tamil'],
					)
				);	
		return TRUE;
	}
	
	public function __dep_orgdb_insert_lang_data_init($_orgdb_lang_id, $_orgdb_lang_english, $_orgdb_lang_bangla, $_orgdb_lang_khmer, $_orgdb_lang_tetum, 
												$_orgdb_lang_japanese, $_orgdb_lang_burmese, $_orgdb_lang_pidgen, $_orgdb_lang_motu, $_orgdb_lang_vietnamese,
												$_orgdb_lang_dzhongka, $_orgdb_lang_mandarin, $_orgdb_lang_thai, $_orgdb_lang_laos, $_orgdb_lang_russian, 
												$_orgdb_lang_nepali, $_orgdb_lang_urdu, $_orgdb_lang_sinhala, $_orgdb_lang_malaysia, $_orgdb_lang_cantonese,
												$_orgdb_lang_tamil)
	{
		return $this->db->insert($this->orgdb_lang, 
				array(
					'orgdb_lang_id' 		=> 	$_orgdb_lang_id,
					'orgdb_lang_english'	=> 	$_orgdb_lang_english, 
					'orgdb_lang_bangla'		=>	$_orgdb_lang_bangla,
					'orgdb_lang_khmer'		=> 	$_orgdb_lang_khmer, 
					'orgdb_lang_tetum'		=> 	$_orgdb_lang_tetum, 
					'orgdb_lang_japanese'	=> 	$_orgdb_lang_japanese, 
					'orgdb_lang_burmese'	=> 	$_orgdb_lang_burmese, 
					'orgdb_lang_pidgen' 	=>	$_orgdb_lang_pidgen, 
					'orgdb_lang_motu'		=> 	$_orgdb_lang_motu, 
					'orgdb_lang_vietnamese'	=> 	$_orgdb_lang_vietnamese,
					'orgdb_lang_dzhongka' 	=>	$_orgdb_lang_dzhongka, 
					'orgdb_lang_mandarin' 	=>	$_orgdb_lang_mandarin, 
					'orgdb_lang_thai'		=>	$_orgdb_lang_thai, 
					'orgdb_lang_laos'		=>	$_orgdb_lang_laos, 
					'orgdb_lang_russian'	=>	$_orgdb_lang_russian, 
					'orgdb_lang_nepali'		=>	$_orgdb_lang_nepali, 
					'orgdb_lang_urdu'		=>	$_orgdb_lang_urdu, 
					'orgdb_lang_sinhala'	=>	$_orgdb_lang_sinhala,
					'orgdb_lang_malaysia'	=>	$_orgdb_lang_malaysia, 
					'orgdb_lang_tamil'		=>	$_orgdb_lang_tamil,
					)
				);
	}
	
	//----------------------------------------------------------------------//
	
	public function orgdb_insert_lang_map_data()
	{
		$_map = array(
					'bangla'		=>	array('orgdb_map_lang'	=>	'Bangla', 			'orgdb_map_db'	=> 	'orgdb_lang_bangla',),
					'burmese'		=>	array('orgdb_map_lang'	=>	'Burmese',			'orgdb_map_db'	=>	'orgdb_lang_burmese',),
					'cantonese'		=>	array('orgdb_map_lang'	=>	'Cantonese',		'orgdb_map_db'	=>	'orgdb_lang_cantonese',),
					'dzhongka'		=>	array('orgdb_map_lang'	=>	'Dzhongka',			'orgdb_map_db'	=>	'orgdb_lang_dzhongka',),
					'english'		=> 	array('orgdb_map_lang' 	=> 	'English', 			'orgdb_map_db'	=> 	'orgdb_lang_english',),
					'indonese'		=>	array('orgdb_map_lang'	=>	'Bahasa Indonesia',	'orgdb_map_db'	=>	'orgdb_lang_indonesia',),
					'japanese'		=>	array('orgdb_map_lang'	=>	'Japanese',			'orgdb_map_db'	=>	'orgdb_lang_japanese',),
					'khmer'			=>	array('orgdb_map_lang'	=>	'Khmer', 			'orgdb_map_db'	=>	'orgdb_lang_khmer',),
					'laos'			=>	array('orgdb_map_lang'	=>	'Laos', 			'orgdb_map_db'	=>	'orgdb_lang_laos',),
					'malaysia'		=>	array('orgdb_map_lang'	=>	'Bahasa Malaysia',	'orgdb_map_db'	=>	'orgdb_lang_malaysia',),
					'mandarin'		=>	array('orgdb_map_lang'	=>	'Mandarin',			'orgdb_map_db'	=>	'orgdb_lang_mandarin',),
					'motu'			=>	array('orgdb_map_lang'	=>	'Motu', 			'orgdb_map_db'	=>	'orgdb_lang_motu',),
					'nepali'		=>	array('orgdb_map_lang'	=>	'Nepali', 			'orgdb_map_db'	=>	'orgdb_lang_nepali',),
					'pidgen'		=>	array('orgdb_map_lang'	=>	'Pidgen',			'orgdb_map_db'	=>	'orgdb_lang_pidgen',),
					'russian'		=>	array('orgdb_map_lang'	=>	'Russian',			'orgdb_map_db'	=>	'orgdb_lang_russian',),
					'sinhala'		=>	array('orgdb_map_lang'	=>	'Sinhala',			'orgdb_map_db'	=>	'orgdb_lang_sinhala',),
					'tamil'			=>	array('orgdb_map_lang'	=>	'Tamil',			'orgdb_map_db' 	=>	'orgdb_lang_tamil',),
					'tetum'			=>	array('orgdb_map_lang'	=>	'Tetum',			'orgdb_map_db' 	=>	'orgdb_lang_tetum',),
					'thai'			=>	array('orgdb_map_lang'	=>	'Thai', 			'orgdb_map_db'	=>	'orgdb_lang_thai',),	
					'urdu'			=>	array('orgdb_map_lang'	=>	'Urdu', 			'orgdb_map_db'	=>	'orgdb_lang_urdu',),		
					'vietnamese'	=>	array('orgdb_map_lang'	=>	'Vietnamese', 		'orgdb_map_db'	=>	'orgdb_lang_vietnamese',),	
			);
			
		foreach ($_map as $_map_data){
			$this->orgdb_insert_lang_map_data_init($_map_data['orgdb_map_lang'], $_map_data['orgdb_map_db']);
			} 	
		return TRUE;
	}
	
	public function orgdb_insert_lang_map_data_init($_orgdb_map_lang, $_orgdb_map_db) 
	{
		return $this->db->insert($this->orgdb_lang_map, 
				array(
					'orgdb_map_lang'	=> 	$_orgdb_map_lang,
					'orgdb_map_db'		=>	$_orgdb_map_db,
				)
			);	
	}
	
	//----------------------------------------------------------------------//
	
	private function orgdb_create_triggers()
	{
		$_trigger01 = $this->orgdb_create_before_trigger_main_init();
		return ($_trigger01 == TRUE) ? TRUE : FALSE;
	}
	
	private function orgdb_create_before_trigger_main_init()
	{
		$_query = "CREATE TRIGGER before_insert_default_apnplus_orgdb_main
						BEFORE INSERT ON default_apnplus_orgdb_main
						FOR EACH ROW
						BEGIN
							SET NEW.orgdb_id = UNHEX(REPLACE(UUID(),'-',''));
							SET @last_orgdb_id = NEW.orgdb_id;
						END
					";
		
		return ($this->db->query($_query) == TRUE) ? TRUE : FALSE;
	}
	
	private function __dep_orgdb_create_before_trigger_language_init() //depreciated
	{
		$_query = "CREATE TRIGGER before_insert_default_apnplus_orgdb_language
					BEFORE INSERT ON default_apnplus_orgdb_language
					FOR EACH ROW
					BEGIN
						SET NEW.orgdb_lang_id = @last_orgdb_id;
					END
					";
					
		return ($this->db->query($_query) == TRUE) ? TRUE : FALSE;
	}
	
	private function __dep_orgdb_create_after_trigger() //depreciated
	{
		$_query = "CREATE TRIGGER after_insert_default_apnplus_orgdb_main
						AFTER INSERT ON default_apnplus_orgdb_main
						FOR EACH ROW
						BEGIN
							IF ASCII(NEW.orgdb_id) = 0 THEN
								SET NEW.orgdb_id = UNHEX(REPLACE(UUID(),'-',''));
							END IF;
							SET @last_orgdb_id = NEW.orgdb_id;
						END
					";
		return ($this->db->query($_query) == TRUE) ? TRUE : FALSE;
	}
	
	//----------------------------------------------------------------------//
 }
/* End of file details.php */