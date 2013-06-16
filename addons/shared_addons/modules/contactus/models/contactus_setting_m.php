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

class Contactus_setting_m extends MY_Model {

	public function __construct()
	{		
		parent::__construct();
		$this->_table 	= 	'apnplus_orgdb_contact_us_setting';	
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

	public function update_data($params)
	{
		$data = array(
				'email' 	=> $params['email']
			);
		return $this->db->update($this->_table, $data);
	}
	
	//----------------------------------------------------------------------//

}
/* End of file contactus_setting_m.php */