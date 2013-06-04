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
 
class Orgdb_m extends MY_Model {

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
					->select('*')
					->join($this->_table_orgdb_country, $this->_table_orgdb_main.'.orgdb_country = '. $this->_table_orgdb_country.'.orgdb_country_iso_02', 'left')
					->join($this->_table_orgdb_language, $this->_table_orgdb_main.'.orgdb_id = '. $this->_table_orgdb_language.'.orgdb_lang_id', 'left' )
					->get($this->_table_orgdb_main)
					->result();
	}


	public function get_company($_orgdb_id)
	{
		$this->db
			 ->where($this->_table_orgdb_main.'.orgdb_id', $_orgdb_id);
		$_get_company = $this->get_all();
		
		return $this->sort_data($_get_company);
	}

	public function get_company_full($_orgdb_id)
	{
		$this->db
			 ->where($this->_table_orgdb_main.'.orgdb_id', $_orgdb_id);
		return $this->get_all();
	}

	//----------------------------------------------------------------------//
	
	private function sort_data($_orgdb = array())
	{
		$_sort_data = array();
		foreach ($_orgdb as $_orgdb_data)
		{
			$_sort_data = array(
						'orgdb_id' 			=>	$_orgdb_data->orgdb_id,
						'orgdb_company'		=>	$_orgdb_data->orgdb_company, 
						'orgdb_country'		=>	$_orgdb_data->orgdb_country, 
						'orgdb_address_01'	=>	$_orgdb_data->orgdb_address_01, 
						'orgdb_address_02'	=>	$_orgdb_data->orgdb_address_02,
						'orgdb_city'		=>	$_orgdb_data->orgdb_city,
						'orgdb_postal'		=>	$_orgdb_data->orgdb_postal,
						'orgdb_phone_01'	=>	$_orgdb_data->orgdb_phone_01,
						'orgdb_phone_02'	=>	$_orgdb_data->orgdb_phone_02,
						'orgdb_phone_ext'	=>	$_orgdb_data->orgdb_phone_ext,
						'orgdb_email_01'	=>	$_orgdb_data->orgdb_email_01,
						'orgdb_email_02'	=>	$_orgdb_data->orgdb_email_02,
						'orgdb_website'		=>	$_orgdb_data->orgdb_website,
						'orgdb_comments'	=>	$_orgdb_data->orgdb_comments,
						'orgdb_status'		=>	$_orgdb_data->orgdb_status,
						);
			
		}
		
		return $_sort_data;
	}
	

	//----------------------------------------------------------------------//
	
	public function get_languages()
	{
		return $this->db->select('*')
						->order_by($this->_table_orgdb_lang_map.'.orgdb_map_id', 'asc')
						->get($this->_table_orgdb_lang_map)
						->result();
	}
	
	//----------------------------------------------------------------------//
	
	public function update_status($_orgdb_id, $_orgdb_status)
	{
		return $this->db->update($this->_table_orgdb_main, array('orgdb_status' => $_orgdb_status), array('HEX(orgdb_id)' => $_orgdb_id));	
	}
	
	public function check_status($_orgdb_id, $_orgdb_status = TRUE)
	{
		$_sql = $this->db
			->select('orgdb_status')
			->where(array('HEX(orgdb_id)' => $_orgdb_id ,'orgdb_status' => $_orgdb_status))
			->get($this->_table_orgdb_main)
			->row();
		
		($_sql == $_orgdb_status) ? $_check_status = TRUE : $_check_status = FALSE;
		
		return $_check_status;
	}
	
	//----------------------------------------------------------------------//
	
	public function count_all()
	{
		return $this->db->count_all_results($this->_table_orgdb_main);
	}
	
	//----------------------------------------------------------------------//

	public function count_by($params = array())
	{
		$this->db->from($this->_table_orgdb_main);

		if ( ! empty($params['orgdb_status']))
		{
			$params['orgdb_status'] = $params['orgdb_status'] === 2 ? 0 : $params['orgdb_status'];
			$this->db->where($this->_table_orgdb_main.'.orgdb_status', $params['orgdb_status']);
		}

		if (!empty($params['orgdb_country']))
		{
			$this->db->where($this->_table_orgdb_main.'.orgdb_country', $params['orgdb_country']);
		}

		if (!empty($params['orgdb_company']))
		{
			$this->db
				->or_like($this->_table_orgdb_main.'.orgdb_company', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_address_01', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_address_02', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_city', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_postal', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_email_01', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_email_02', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_website', trim($params['orgdb_company']));
		}
		return $this->db->count_all_results();
	}

	//----------------------------------------------------------------------//
	
	public function get_many_by($params = array())
	{	
		if (!empty($params['orgdb_status']))
		{
			$params['orgdb_status'] = $params['orgdb_status'] === 2 ? 0 : $params['orgdb_status'];
			$this->db->where($this->_table_orgdb_main.'.orgdb_status', $params['orgdb_status']);
		}
		
		if (!empty($params['orgdb_country']))
		{
			$this->db->where($this->_table_orgdb_main.'.orgdb_country', $params['orgdb_country']);
		}
		
		if (!empty($params['orgdb_company']))
		{
			$this->db
				->or_like($this->_table_orgdb_main.'.orgdb_company', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_address_01', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_address_02', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_city', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_postal', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_email_01', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_email_02', trim($params['orgdb_company']))
				->or_like($this->_table_orgdb_main.'.orgdb_website', trim($params['orgdb_company']));
		}

		return $this->get_all();
	}

	//----------------------------------------------------------------------//

	public function update_languages($languages, $id)
	{
		//we need to reset all current language
		$this->reset_language($id);

		foreach($languages as $language) {
			$this->db->set($language, 1);
		}
		$this->db->where('orgdb_lang_id', $id);
		$this->db->update($this->_table_orgdb_language); 
	}

	//----------------------------------------------------------------------//

	public function reset_language($id)
	{
		//collect all fieldname
		$fields = $this->db->list_fields($this->_table_orgdb_language);
		
		//remove top 2 fieldname since it use for id
		unset($fields['0']);
		unset($fields['1']);

		foreach ($fields as $field)
		{
			$this->db->set($field, 0); 
		} 

		$this->db->where('orgdb_lang_id', $id);
		$this->db->update($this->_table_orgdb_language); 
	}

	//----------------------------------------------------------------------//
	
	public function update_data($params)
	{
		$data = array(
				'orgdb_company' 	=> $params['orgdb_company'],
				'orgdb_country' 	=> $params['orgdb_country'],
				'orgdb_address_01' 	=> $params['orgdb_address_01'],
				'orgdb_address_02' 	=> $params['orgdb_address_02'],
				'orgdb_city' 		=> $params['orgdb_city'],
				'orgdb_postal' 		=> $params['orgdb_postal'],
				'orgdb_phone_01' 	=> $params['orgdb_phone_01'],
				'orgdb_phone_02' 	=> $params['orgdb_phone_02'],
				'orgdb_phone_ext' 	=> $params['orgdb_phone_ext'],
				'orgdb_email_01' 	=> $params['orgdb_email_01'],
				'orgdb_email_02' 	=> $params['orgdb_email_02'],
				'orgdb_website' 	=> $params['orgdb_website'],
				'orgdb_comments' 	=> $params['orgdb_comments'],
				'orgdb_status' 		=> $params['orgdb_status'],
			);
		$this->db->where('orgdb_id', $params['orgdb_id']);
		$this->db->update($this->_table_orgdb_main, $data);
	}
	 
	//----------------------------------------------------------------------//

	public function delete_data($id)
	{
		$this->db->delete($this->_table_orgdb_main, array('orgdb_id' => $id));
		$this->db->delete($this->_table_orgdb_language, array('orgdb_lang_main_id' => $id));
	}
	
	//----------------------------------------------------------------------//

}
/* End of file orgdb_m.php */