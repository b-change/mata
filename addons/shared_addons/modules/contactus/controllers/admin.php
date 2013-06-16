<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
 

 class Admin extends Admin_Controller
{
	protected $section = 'contactus';

	//----------------------------------------------------------------------//

	public function __construct()
	{
		parent::__construct();

		//load language
		$this->load->language('contactus');

		//load table
		$this->load->model('contactus_m');

		$this->_table =	'apnplus_orgdb_contact_us';

		//add style for onw module
		$this->template
				->append_css('module::contactus.css')
				->append_js('module::contactus.js');
	}

	//----------------------------------------------------------------------//

	public function index() 
	{
		$pagination = create_pagination('admin/contactus/index', $this->contactus_m->count_by(true));
		$this->db
			->order_by($this->_table.'.date', 'desc')
			->limit($pagination['limit'], $pagination['offset']);

		$contacts = $this->contactus_m->get_all();

		if ($this->input->is_ajax_request())
		{
			$this->template->set_layout(false);
		}

		$this->template
			->title($this->module_details['name'])
			->set('pagination', $pagination)
			->set('contacts', $contacts)
			->build('admin/index');
	}

	//----------------------------------------------------------------------//

	public function action()
	{
		switch ($this->input->post('btnAction'))
		{
			case 'delete':
				$this->delete();
				break;
			default:
				redirect('admin/contactus');
				break;
		}
	}

	public function delete($id = 0)
	{
		$ids = ($id > 0) ? array($id) : $this->input->post('action_to');

		if (!empty($ids)) //if not array empty
		{
			foreach ($ids as $id)
			{
				$contactus = $this->contactus_m->delete_data($id);
			}
			$this->session->set_flashdata('success', lang('contactus:alldelete:success'));
		}
		else
		{
			$contactus = $this->contactus_m->delete_data($id);
			$this->session->set_flashdata('success', lang('contactus:delete:success'));
		}
		redirect('admin/contactus');
	}

	public function preview($id)
	{
		$contacts = $this->contactus_m->get_data($id);
		$this->template
			->title($this->module_details['name'])
			->set('contacts', $contacts)
			->build('admin/preview');
	}

	public function settings()
	{
		$this->template
			->title($this->module_details['name'])
			->build('admin/setting');
	}
}