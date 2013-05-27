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
 
class Orgdb_country_m extends MY_Model {

	public function __construct()
	{		
		parent::__construct();
		$this->_table_orgdb_main		= 	'apnplus_orgdb_main';
		$this->_table_orgdb_country 	= 	'apnplus_orgdb_country';
		$this->_table_orgdb_language	= 	'apnplus_orgdb_language';
		$this->_table_orgdb_lang_map	= 	'apnplus_orgdb_lang_map';
		
	}
	
	//----------------------------------------------------------------------//
	
	public function get_all()
	{
		return $this->db
					->select('orgdb_country_id, orgdb_country_iso_02, orgdb_country_iso_03, orgdb_country_sname, orgdb_country_lname,
							orgdb_country_tld, orgdb_country_status')
					->get($this->_table_orgdb_country)
					->result();
	}
	
	//----------------------------------------------------------------------//
	
	public function update_status($_orgdb_country_id, $_orgdb_country_status)
	{
		return $this->db->update($this->_table_orgdb_country, array('orgdb_country_status' => $_orgdb_country_status), array('orgdb_country_id' => $_orgdb_country_id));	
	}
	
	public function check_status($_orgdb_country_id, $_orgdb_country_status = TRUE) 
	{
		$_sql = $this->db
			->select('orgdb_country_status')
			->where(array('orgdb_country_id' => $_orgdb_country_id ,'orgdb_country_status' => $_orgdb_country_status))
			->get($this->_table_orgdb_country)
			->row();
		
		($_sql == $_orgdb_country_status) ? $_check_status = TRUE : $_check_status = FALSE;
		
		return $_check_status;
	}
	
	//----------------------------------------------------------------------//
	
	public function count_all()
	{
		return $this->db->count_all_results($this->_table_orgdb_country);
	}
	
	//----------------------------------------------------------------------//
	
	public function get_country()
	{
		return $this->db->select('orgdb_country_sname, orgdb_country_iso_02')
						->order_by($this->_table_orgdb_country.'.orgdb_country_iso_02', 'asc')
						->get($this->_table_orgdb_country)
						->result();					
	}
	
	//----------------------------------------------------------------------//
	
	public function count_by($params = array())
	{
		$this->db->from($this->_table_orgdb_country);

		if (!empty($params['orgdb_country_status']))
		{
			$params['orgdb_country_status'] = $params['orgdb_country_status'] === 2 ? 0 : $params['orgdb_country_status'];
			$this->db->where($this->_table_orgdb_country.'.orgdb_country_status', $params['orgdb_country_status']);
		}

		return $this->db->count_all_results();
	}

	//----------------------------------------------------------------------//
	
	public function get_many_by($params = array())
	{	
		if (!empty($params['orgdb_country_status']))
		{
			$params['orgdb_country_status'] = $params['orgdb_country_status'] === 2 ? 0 : $params['orgdb_country_status'];
			$this->db->where($this->_table_orgdb_country.'.orgdb_country_status', $params['orgdb_country_status']);
		}
		
		if (!empty($params['orgdb_country']))
		{
			$this->db->where($this->_table_orgdb_country.'.orgdb_country_iso_02', $params['orgdb_country']);
		}
		
		if(!empty($params['orgdb_country_name']))
		{
			$this->db
				->or_like($this->_table_orgdb_country.'.orgdb_country_sname', trim($params['orgdb_country_name']))
				->or_like($this->_table_orgdb_country.'.orgdB_country_lname', trim($params['orgdb_country_name']));
		}
		
		return $this->get_all();
	}
	
	//----------------------------------------------------------------------//

}
/* End of file orgdb_m.php */