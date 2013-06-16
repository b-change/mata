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
		$this->_table_orgdb_country 	= 	'apnplus_orgdb_country';	
	}
	
	//----------------------------------------------------------------------//
	
	public function get_country()
	{
		return $this->db->select('orgdb_country_sname')
						->order_by($this->_table_orgdb_country.'.orgdb_country_sname', 'asc')
						->get($this->_table_orgdb_country)
						->result();					
	}
	
	//----------------------------------------------------------------------//

}
/* End of file orgdb_m.php */