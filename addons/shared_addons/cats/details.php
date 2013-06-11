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
            'menu'      =>  'content',
            'roles'     =>  'admin_cats',   
		);
        
        //Sections 
        $info['sections']['cats'] = array(
            'name'  => 	'catsdb:menu:index',
            'uri'   =>  'admin/catsdb'
            );
        
        return $info;
    }	
	
	//----------------------------------------------------------------------//
	
	public function install()
	{
		return ($this->catsdb_install_schema() == TRUE) ? TRUE: FALSE ;
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
				'dtcde'			=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),	
				'rsn'			=> array('type' => 'TINYINT', 'constraint' => 4, 'null' => false, 'default' => 0,),	
				'p1_a2'			=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),	
				'p1_a2ot'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),	
				'p1_a3'			=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'p1_a4'			=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'default' => '',),
				'p1_a5'			=> array('type' => 'VARCHAR', 'constraint' => 50, 'null' => false, 'default' => '',),
				'p1_a6'			=> array('type' => 'TIME', 'null' => false,),
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
				'p2_s1q10no'	=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
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
				'p4_s2q4co'		=> array('type' => 'TINYINT', 'constraint' => 4, 'null' => false, 'default' => 0,),
				'p4_s2q5'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p4_s2q5y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q5m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q5d'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p4_s2q5co'		=> array('type' => 'TINYINT', 'constraint' => 4, 'null' => false, 'default' => 0,),
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
				'p5_s2q9y'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p5_s2q9m'		=> array('type' => 'TINYINT', 'constraint' => 2, 'null' => false, 'default' => 0,),
				'p5_s2q9p'		=> array('type' => 'VARCHAR', 'constraint' => 200, 'null' => false, 'default' => '',),
				'p5_s2q10'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
				'p5_s2q11'		=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0,),
			),


			'apnplus_catsdb_palate_06' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_07' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_08' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_09' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_10' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_11' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_12' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_13' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_14' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_15' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_16' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_17' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_18' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_19' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_20' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_21' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_22' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_23' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
			'apnplus_catsdb_palate_24' => array(
				'catsdb_id' 		=> array('type' => 'BINARY', 'constraint' => 16, 'primary' => true, 'unique' => true, 'null' => false,),
				),
         );

		return ($this->install_tables($new_tables) == TRUE) ? TRUE : FALSE;	
	}
	
	//----------------------------------------------------------------------//
	
	
	//----------------------------------------------------------------------//
	
	
	//----------------------------------------------------------------------//
	
	

 }
/* End of file details.php */