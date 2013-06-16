<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * This is a Contact Us module for APN+ Network Organization Database
 *
 * @category   APN+ Network
 * @package    Contact us
 * @author     agus <www.gerekper.asia>
 * @copyright  2013-2014 Gerekper Inc
 * @license    -
 * @version    1.0.0
 * @link       -
 * @see        -
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class Contactus_m extends MY_Model {

	public function __construct()
	{		
		parent::__construct();
		$this->_table 	= 	'apnplus_orgdb_contact_us';	
	}
	
	//----------------------------------------------------------------------//
	
	public function create($input)
	{
		$to_insert = array(
			'name' => $input['name'],
			'company_name' 		=> $input['company_name'],
			'company_website' 	=> $input['company_website'],
			'telephone' 		=> $input['telephone'],
			'email' 			=> $input['email'],
			'country' 			=> $input['country'],
			'interested' 		=> $input['interested'],
			'preferred' 		=> $input['preferred'],
			'comment' 			=> $input['comment'],
			'date'				=> date('y-m-j h:i:s')
		);

		return $this->db->insert($this->_table, $to_insert);
	}

	//----------------------------------------------------------------------//

	public function get_all()
	{
		return $this->db
					->select('*')
					->get($this->_table)
					->result();
	}

	//----------------------------------------------------------------------//

	public function count_all()
	{
		return $this->db->count_all_results($this->_table);
	}

	//----------------------------------------------------------------------//

	public function get_data($id)
	{
		return $this->db
			->where($this->_table.'.id', $id)
			->get($this->_table)
			->result();
	}

	//----------------------------------------------------------------------//

	public function delete_data($id)
	{
		$this->db->delete($this->_table, array('id' => $id));
	}
	
	//----------------------------------------------------------------------//

}
/* End of file contactus_m.php */