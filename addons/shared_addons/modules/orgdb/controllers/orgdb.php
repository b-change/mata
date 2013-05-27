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
 
class Orgdb extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('orgdb_m');
		$this->load->language('orgdb');
	}
	
	//----------------------------------------------------------------------//
	
	public function index()
	{
		$this->data['orgdb_main_data'] = $this->orgdb_m->get_all();
		$this->data['_orgdb_lang_all']  = '';
		$this->data['_orgdb_lang_test'] = array();
		$this->data['_count'] = '';
		
		$this->template
				->title($this->module_details['name'], lang('orgdb:title:orgdb'))
				->build('index', $this->data);
	}
	
	//----------------------------------------------------------------------//
	
	
	//----------------------------------------------------------------------//
	
	//----------------------------------------------------------------------//
	//----------------------------------------------------------------------//
}
	