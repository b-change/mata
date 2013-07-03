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
 
 class Module_Cats extends Module {
 	
	 public $version = '1.0.0.2';
	 public $language_file = 'cats/cats';
	
	//----------------------------------------------------------------------//
	
	public function __construct()
	{
		parent::__construct();
		$this->apnplus_catsdb_palate_01	= 'apnplus_catsdb_palate_01';
		$this->apnplus_catsdb_palate_02 = 'apnplus_catsdb_palate_02';
		$this->apnplus_catsdb_palate_03	= 'apnplus_catsdb_palate_03';
		$this->apnplus_catsdb_palate_04	= 'apnplus_catsdb_palate_04';
		$this->apnplus_catsdb_palate_05 = 'apnplus_catsdb_palate_05';
		$this->apnplus_catsdb_palate_06	= 'apnplus_catsdb_palate_06';
		$this->apnplus_catsdb_palate_07	= 'apnplus_catsdb_palate_07';
		$this->apnplus_catsdb_palate_08 = 'apnplus_catsdb_palate_08';
		$this->apnplus_catsdb_palate_09	= 'apnplus_catsdb_palate_09';
		$this->apnplus_catsdb_palate_10	= 'apnplus_catsdb_palate_10';
		$this->apnplus_catsdb_palate_11 = 'apnplus_catsdb_palate_11';
		$this->apnplus_catsdb_palate_12	= 'apnplus_catsdb_palate_12';
		$this->apnplus_catsdb_palate_13	= 'apnplus_catsdb_palate_13';
		$this->apnplus_catsdb_palate_14 = 'apnplus_catsdb_palate_14';
		$this->apnplus_catsdb_palate_15	= 'apnplus_catsdb_palate_15';
		$this->apnplus_catsdb_palate_16	= 'apnplus_catsdb_palate_16';
		$this->apnplus_catsdb_palate_17 = 'apnplus_catsdb_palate_17';
		$this->apnplus_catsdb_palate_18	= 'apnplus_catsdb_palate_18';
		$this->apnplus_catsdb_palate_19	= 'apnplus_catsdb_palate_19';
		$this->apnplus_catsdb_palate_20 = 'apnplus_catsdb_palate_20';
		$this->apnplus_catsdb_palate_21	= 'apnplus_catsdb_palate_21';
		$this->apnplus_catsdb_palate_22	= 'apnplus_catsdb_palate_22';
		$this->apnplus_catsdb_palate_23 = 'apnplus_catsdb_palate_23';
		$this->apnplus_catsdb_palate_24	= 'apnplus_catsdb_palate_24';

		$this->lang->load($this->language_file);
	}
	
	//----------------------------------------------------------------------//
	
	public function info()
    {
        
        $info = array(
            'name' => array(
                'en' => 'APN+ CATS'
            ),
            'description' => array(
                'en' => 'APN+ Community Access to Treatment, Care and Support Study'
            ),
            'frontend'  =>  TRUE,
            'backend'   =>  TRUE,
            'skip_xss'  =>  TRUE,
            'author'    =>  'dev_null',
            'roles'     =>  'admin_cats'
		);
        
        return $info;
    }	
	
	//----------------------------------------------------------------------//

	public function admin_menu(&$menu)
    {
        $menu['lang:orgdb:menu:title']['lang:cats:section:cats']    = 'admin/cats';
    }

    //----------------------------------------------------------------------//
	
	public function install()
	{
		$_install0 = $this->uninstall();
		$_install1 = $this->catsdb_install_schema();

		return ($_install0 && $_install1 == TRUE) ? TRUE: FALSE ;
	}
	
	//----------------------------------------------------------------------//
	
	public function uninstall()
	{
		$_uninstall0 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_01);
		$_uninstall1 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_02);
		$_uninstall2 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_03);
		$_uninstall3 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_04);
		$_uninstall4 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_05);
		$_uninstall5 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_06);
		$_uninstall6 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_07);
		$_uninstall7 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_08);
		$_uninstall8 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_09);
		$_uninstall9 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_10);
		$_uninstall10 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_11);
		$_uninstall11 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_12);
		$_uninstall12 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_13);
		$_uninstall13 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_14);
		$_uninstall14 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_15);
		$_uninstall15 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_16);
		$_uninstall16 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_17);
		$_uninstall17 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_18);
		$_uninstall18 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_19);
		$_uninstall19 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_20);
		$_uninstall20 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_21);
		$_uninstall21 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_22);
		$_uninstall22 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_23);
		$_uninstall23 = $this->dbforge->drop_table($this->apnplus_catsdb_palate_24);
		return ($_uninstall0 && $_uninstall1 && $_uninstall2 && $_uninstall3 && $_uninstall4 && $_uninstall5 && $_uninstall6 && $_uninstall7 && $_uninstall8 && $_uninstall9 && $_uninstall10 && $_uninstall11  && $_uninstall12 && $_uninstall13 && $_uninstall14 && $_uninstall15 && $_uninstall16 && $_uninstall17 && $_uninstall18 && $_uninstall19 && $_uninstall20 && $_uninstall21 && $_uninstall22 && $_uninstall23 == TRUE) ? TRUE : FALSE;
	}
	
	//----------------------------------------------------------------------//
	
	public function upgrade($version)
	{
		$_upgrade01 = $this->db->update($this->db->dbprefix('modules'), array('version' => $version), array('slug' => 'cats'));
		//$_upgrade02 = $this->uninstall();
		//$_upgrade03 = $this->install();
		
		return ($_upgrade01  == TRUE) ? TRUE : FALSE;
	}
	
	//----------------------------------------------------------------------//
	
	public function help() //TODO: Update
	{
	}
	
	//----------------------------------------------------------------------//
	
	public function catsdb_install_schema()
	{
		$new_tables = array(
            'apnplus_catsdb_palate_01' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'ctcde'			=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'stcde'			=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),	
				'dccde'			=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),	
				'rsn'			=> array('type' => 'TINYINT', 'constraint' => 4, 'null' => false, 'default' => 0,),	
				'p1_a2'			=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),	
				'p1_a2ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),	
				'p1_a3'			=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'p1_a4'			=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'p1_a5'			=> array('type' => 'VARCHAR', 'constraint' => 50, 'null' => false, 'default' => '',),
				'p1_a6hh'		=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p1_a6mm'		=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p1_a6mt'		=> array('type' => 'FLOAT', 'null' => false,),
				'p1_a7'			=> array('type' => 'DATE', 'null' => false,),
				'p1_inc'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p1_icf'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_02' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p2_s1q1'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p2_s1q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q4ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p2_s1q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q5ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p2_s1q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q6ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p2_s1q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q8'		=> array('type' => 'INT', 'constraint' => 9, 'null' => false, 'default' => 0,),
				'p2_s1q91'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p2_s1q92'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p2_s1q93'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p2_s1q94'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p2_s1q10'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p2_s1q10no'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p2_s1q11'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_03' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p3_s1q12'		=> array('type' => 'INT', 'constraint' => 9, 'null' => false, 'default' => 0,),
				'p3_s1q13a'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13b'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13c'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13d'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13e'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13f'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13g'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13h'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13i'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13j'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13k'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p3_s1q13ot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				),
			'apnplus_catsdb_palate_04' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p4_s2q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q1y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q1m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q2a'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2b'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2c'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2d'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2e'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2f'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2g'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2h'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2i'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2j'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2k'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2l'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q2ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p4_s2q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q3ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p4_s2q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q4y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q4m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q4d'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q4co'		=> array('type' => 'INT', 'constraint' => 4, 'null' => true, 'default' => 0,),
				'p4_s2q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p4_s2q5y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p4_s2q5m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p4_s2q5d'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p4_s2q5co'		=> array('type' => 'INT', 'constraint' => 4, 'null' => true, 'default' => 0,),
				),
			'apnplus_catsdb_palate_05' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p5_s2q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p5_s2q6y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p5_s2q6m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p5_s2q6d'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p5_s2q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p5_s2q7ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p5_s2q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p5_s2q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p5_s2q9y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p5_s2q9m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p5_s2q9p'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p5_s2q10'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p5_s2q11'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_06' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p6_s3q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p6_s3q1t'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p6_s3q2a'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2b'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p6_s3q2c1'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2c2'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2c3'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2cn'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2d'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2e'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p6_s3q2ed'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p6_s3q2fm'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p6_s3q2fc'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p6_s3q2fl'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p6_s3q2fp'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p6_s3q2ff'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p6_s3q2ft'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p6_s3q2ga'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p6_s3q2gb'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p6_s3q2gc'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p6_s3q2gcs'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p6_s3q2gd'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p6_s3q2gdot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				),
			'apnplus_catsdb_palate_07' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p7_s3q3a'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3b'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p7_s3q3c1'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3c2'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3c3'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3cn'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3d'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3e'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p7_s3q3ed'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p7_s3q3fm'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p7_s3q3fc'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p7_s3q3fl'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p7_s3q3fp'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p7_s3q3ff'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p7_s3q3ft'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p7_s3q3ga'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p7_s3q3gb'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p7_s3q3gc'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p7_s3q3gcs'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p7_s3q3gd'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p7_s3q3gdot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				),
			'apnplus_catsdb_palate_08' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p8_s3q4a'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4b'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p8_s3q4c1'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4c2'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4c3'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4cn'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4d'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4e'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p8_s3q4ed'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p8_s3q4fm'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p8_s3q4fc'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p8_s3q4fl'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p8_s3q4fp'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p8_s3q4ff'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p8_s3q4ft'		=> array('type' => 'INT', 'constraint' => 9, 'null' => true, 'default' => 0,),
				'p8_s3q4ga'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p8_s3q4gb'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p8_s3q4gc'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p8_s3q4gcs'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p8_s3q4gd'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p8_s3q4gdot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				),
			'apnplus_catsdb_palate_09' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p9_s4q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q10'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q11'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p9_s4q12'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_10' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p10_s5q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p10_s5q10'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				),
			'apnplus_catsdb_palate_11' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p11_s6q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p11_s6q2a'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p11_s6q2b'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p11_s6q2c'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p11_s6q2d'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p11_s6q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p11_s6q3y1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q3m1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q3y2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q3m2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p11_s6q4y1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q4m1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q4y2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q4m2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p11_s6q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p11_s6q6y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p11_s6q6m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				),
			'apnplus_catsdb_palate_12' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p12_s6q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p12_s6q7y1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q7m1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q7y2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q7m2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q7y3'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q7m3'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p12_s6q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p12_s6q9y1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q9m1'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q9y2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q9m2'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q9y3'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q9m3'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q10'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q11'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p12_s6q12'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p12_s6q13'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				),
			'apnplus_catsdb_palate_13' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p13_s6q14'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q15'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q16'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q17'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q18'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q19'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q20'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q20n'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => true, 'default' => 0,),
				'p13_s6q21'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				'p13_s6q22'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => true, 'default' => 0,),
				),
			'apnplus_catsdb_palate_14' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p14_s7q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q2n'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p14_s7q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q7a'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q7b'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q7c'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q8t'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p14_s7q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q10'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p14_s7q11'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_15' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p15_s7q12'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p15_s7q12n'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p15_s7q13'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p15_s7q14'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p15_s7q15'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p15_s7q15m'	=> array('type' => 'INT', 'constraint' => 3, 'null' => false, 'default' => 0,),
				'p15_s7q16a'	=> array('type' => 'INT', 'constraint' => 9, 'null' => false, 'default' => 0,)
				),
			'apnplus_catsdb_palate_16' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p16_s8q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q3ot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p16_s8q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q5hcv'	=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'p16_s8q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p16_s8q7a'		=> array('type' => 'INT', 'constraint' => 9, 'null' => false, 'default' => 0,),
				'p16_s8q7f'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				),
			'apnplus_catsdb_palate_17' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p17_s9q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p17_s9q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p17_s9q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p17_s9q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p17_s9q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p17_s9q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p17_s9q6m'		=> array('type' => 'INT', 'constraint' => 3, 'null' => false, 'default' => 0,),
				'p17_s9q7a'		=> array('type' => 'INT', 'constraint' => 9, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_18' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p18_s10q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q10'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q11'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q12'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q13'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q14'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q15'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q16'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q17'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q18'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q19'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q20'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q21'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q22'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q23'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q24'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p18_s10q25'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_19' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p19_s11q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p19_s11q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p19_s11q3'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p19_s11q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p19_s11q5'		=> array('type' => 'INT', 'constraint' => 4, 'null' => false, 'default' => 0,),
				'p19_s11q6'		=> array('type' => 'INT', 'constraint' => 4, 'null' => false, 'default' => 0,),
				'p19_s11q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p19_s11q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_20' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p20_s12q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p20_s12q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p20_s12q2y'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q2m'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q2d'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q3y'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q3m'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q3d'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q4'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p20_s12q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p20_s12q5f'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p20_s12q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p20_s12q6ot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p20_s12q6h'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q6m'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q6t'	=> array('type' => 'FLOAT', 'null' => false,),
				'p20_s12q7a'	=> array('type' => 'INT', 'constraint' => 9, 'null' => false, 'default' => 0,),
				'p20_s12q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p20_s12q8t'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p20_s12q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p20_s12q9ot'	=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p20_s12q10'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),			
				),
			'apnplus_catsdb_palate_21' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p21_s12q11c'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p21_s12q11m'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12q11ot'	=> array('type' => 'VARCHAR', 'constraint' => 11, 'null' => false, 'default' => '',),
				'p21_s12qan'	=> array('type' => 'VARCHAR', 'constraint' => 11, 'null' => false, 'default' => '',),
				'p21_s12qamp'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qamh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qamm'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qamt'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qaap'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qaah'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qaam'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qaat'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qaep'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qaeh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qaem'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qaet'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qbn'	=> array('type' => 'VARCHAR', 'constraint' => 11, 'null' => false, 'default' => '',),
				'p21_s12qbmp'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qbmh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qbmm'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qbmt'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qbap'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qbah'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qbam'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qbat'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qbep'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qbeh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qbem'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qbet'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qcn'	=> array('type' => 'VARCHAR', 'constraint' => 11, 'null' => false, 'default' => '',),
				'p21_s12qcmp'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qcmh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qcmm'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qcmt'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qcap'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qcah'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qcam'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qcat'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qcep'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qceh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qcem'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qcet'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qdn'	=> array('type' => 'VARCHAR', 'constraint' => 11, 'null' => false, 'default' => '',),
				'p21_s12qdmp'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qdmh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qdmm'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qdmt'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qdap'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qdah'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qdam'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qdat'	=> array('type' => 'FLOAT', 'null' => false,),
				'p21_s12qdep'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p21_s12qdeh'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qdem'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p21_s12qdet'	=> array('type' => 'FLOAT', 'null' => false,),
				),
			'apnplus_catsdb_palate_22' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p22_s12q13'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q13y'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p22_s12q13m'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p22_s12q13d'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p22_s12q14'	=> array('type' => 'TINYINT', 'constraint' => 5, 'null' => false, 'default' => 0,),
				'p22_s12q14p'	=> array('type' => 'TINYINT', 'constraint' => 3, 'null' => false, 'default' => 0,),
				'p22_s12q15'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q16a'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q16b'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q16c'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q16d'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q16a'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p22_s12q16ot'	=> array('type' => 'VARCHAR', 'constraint' => 5, 'null' => false, 'default' => '',),
				),
			'apnplus_catsdb_palate_23' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p23_s13q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q6'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q7'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q8'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q9'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q10'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q11'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q12'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q13'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q14'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q15'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q16'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q17'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p23_s13q18'	=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				),
			'apnplus_catsdb_palate_24' => array(
				'catsdb_id' 	=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				'rid'			=> array('type' => 'INT', 'constraint' => 10, 'null' => false, 'default' => 0,),
				'p24_s14q1'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_s14q2'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_s14q3'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_s14q4'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_s14q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_itveth'	=> array('type' => 'VARCHAR', 'constraint' => 2, 'null' => false, 'default' => '',),
				'p24_itvetm'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p24_itvett'	=> array('type' => 'FLOAT', 'null' => false,),
				'p24_dcsgn'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_spnme'		=> array('type' => 'VARCHAR', 'constraint' => 30, 'null' => false, 'default' => '',),
				'p24_spsgn'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p24_sprvdte'	=> array('type' => 'DATE', 'null' => false,),
				),
         );

		return ($this->install_tables($new_tables) == TRUE) ? TRUE : FALSE;	
	}
	
	//----------------------------------------------------------------------//

 }
/* End of file details.php */