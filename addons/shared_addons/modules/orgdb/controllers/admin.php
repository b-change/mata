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
 
class Admin extends Admin_Controller
{
	protected $section = 'orgdb';
	
	//----------------------------------------------------------------------//
	
	private $validation_rules = array(
		'orgdb_company'	=>	array(
			'field'	=>	'orgdb_company',
			'label'	=>	'orgdb:label:orgdb_company',
			'rules'	=>	'required|max_length[100]',
			),
		'orgdb_address_01'	=>	array(
			'field'	=>	'orgdb_address_01',
			'label'	=>	'orgdb:label:orgdb_address_01',
			'rules'	=>	'require|max_length[100]',
			),
	);
	
	public $template_style = array(
			'orgdb_company'	=> array(
				 	'name'        => 'orgdb_company',
              		'id'          => 'orgdb_company',
              		'maxlength'   => '100',
              		'size'        => '100',
              		), 
             'orgdb_address_01'	=> 	array(
			 		'name'		=>	'orgdb_address_01',
			 		'id'		=>	'orgdb_address_01',
			 		'maxlength'	=>	'100',
			 		'size'		=>	'50'
			 		),
			 'orgdb_address_02'	=> 	array(
			 		'name'		=>	'orgdb_address_02',
			 		'id'		=>	'orgdb_address_02',
			 		'maxlength'	=>	'100',
			 		'size'		=>	'50'
			 		),

	);
	
	//----------------------------------------------------------------------//

	public function __construct()
	{
		parent::__construct();
		$this->load->model('orgdb_m');
		$this->load->model('orgdb_country_m');
		$this->load->language('orgdb');
		
		$this->template->_country 			= $this->orgdb_country_m->get_country();
		$this->template->_country_select 	= array_for_select($this->template->_country, 'orgdb_country_iso_02', 'orgdb_country_sname');
		
		$this->_table_orgdb_main		= 	'apnplus_orgdb_main';
		$this->_table_orgdb_country 	= 	'apnplus_orgdb_country';
		$this->_table_orgdb_language	= 	'apnplus_orgdb_language';
	}
	
	//----------------------------------------------------------------------//
	
	public function index() 
	{
		$base_where = array('orgdb_status' => 0);
		$base_where['orgdb_status'] = $this->input->post('f_module') ? (int)$this->input->post('f_active') : $base_where['orgdb_status'];
		$base_where = $this->input->post('f_keywords') ? $base_where + array('orgdb_company' => $this->input->post('f_keywords')) : $base_where;
		$base_where = $this->input->post('f_country') ? $base_where + array('orgdb_country' => $this->input->post('f_country')) : $base_where;
		
		$pagination = create_pagination('admin/orgdb/index', $this->orgdb_m->count_by($base_where));
		$this->db->order_by($this->_table_orgdb_main.'.orgdb_id', 'asc')
			->limit($pagination['limit'], $pagination['offset']);
		
		$orgdb = $this->orgdb_m->get_many_by($base_where);
		
		if ($this->input->is_ajax_request())
		{
			$this->template->set_layout(false);
		}
		
		$this->template
			->title($this->module_details['name'])
			->set('pagination', $pagination)
			->set('orgdb', $orgdb)
			->set_partial('filters', 'admin/partials/filters')
			->append_js('admin/filter.js');

		$this->input->is_ajax_request() ? $this->template->build('admin/tables/table_orgdb') : $this->template->build('admin/index');
	}
	
	//----------------------------------------------------------------------//
	
	public function action()
	{
		switch ($this->input->post('btnAction'))
		{
			case 'activate':
				$this->activate();
			break;
			case 'deactivate':
				$this->deactivate();
				break;
			case 'delete':
				$this->delete();
				break;
			default:
				redirect('admin/orgdb');
				break;
		}
	}

	//----------------------------------------------------------------------//
	
	public function activate($id = 0)
	{
		$ids = ($id > 0) ? array($id) : $this->input->post('action_to');
		$activate = 0;
		$to_activate = 0;
		$_error = FALSE;

		if (!empty($ids)) //if not array empty
		{
			$activated_ids = array();
			foreach ($ids as $id)
			{
				if ($this->orgdb_m->check_status($id, TRUE) == FALSE){
					if ($this->orgdb_m->update_status($id, TRUE)) {
						$activated_ids[] = $id;
						$activate++;
					}
				}
				else $_error = TRUE;
				$to_activate++;
			}
			
			if (($to_activate > 0) && ($_error == FALSE))
			{
				$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:activate:success'), $activate, $to_activate));
			}
			if (($to_activate > 0) && ($_error == TRUE))
			{
				$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:activate:success'), $activate, $to_activate));
				$this->session->set_flashdata('notice', sprintf(lang('orgdb:messages:activate:conditional'), $to_activate - $activate));
			}
		}
		elseif (empty($ids) && isset($id)) // if array is empty but has 1 id
		{
			$activate++; $to_activate++;
			$this->orgdb_m->update_status($id, TRUE);
			$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:activate:success'), $activate, $to_activate));
		}
		else
		{
			$this->session->set_flashdata('error', lang('orgdb:messages:activate:error'));
		}
		redirect('admin/orgdb');
	}
	
	public function deactivate($id = 0)
	{
		$ids = ($id > 0) ? array($id) : $this->input->post('action_to');
		$deactivate = 0;
		$to_deactivate = 0;
		$_error = FALSE;

		if (!empty($ids)) //if not array empty
		{
			$deactivated_ids = array();
			foreach ($ids as $id)
			{
				if ($this->orgdb_m->check_status($id, TRUE) == TRUE){
					if ($this->orgdb_m->update_status($id, FALSE)) {
						$deactivated_ids[] = $id;
						$deactivate++;
					}
				}
				else $_error = TRUE;
				$to_deactivate++;
			}
			if (($to_deactivate > 0) && ($_error == FALSE))
			{
				$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:deactivate:success'), $deactivate, $to_deactivate));
			}
			if (($to_deactivate > 0) && ($_error == TRUE))
			{
				$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:deactivate:success'), $deactivate, $to_deactivate));
				$this->session->set_flashdata('notice', sprintf(lang('orgdb:messages:deactivate:conditional'), $to_deactivate - $deactivate));
			}
		}
		elseif (empty($ids) && isset($id)) // if array is empty but has 1 id
		{
			$deactivate++;
			$to_deactivate++;
			$this->orgdb_m->update_status($id, FALSE);
			$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:deactivate:success'), $deactivate, $to_deactivate));
		}
		else
		{
			$this->session->set_flashdata('error', lang('orgdb:messages:deactivate:error'));
		}
		redirect('admin/orgdb');
	}

	//----------------------------------------------------------------------//
	
	//----------------------------------------------------------------------//
	
	public function edit($id = 0)
	{
		$orgdb_id = $this->uri->segment(4);
	
		$orgdb = $this->orgdb_m->get_company($orgdb_id);
		
				
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->validation_rules);		
		
		if ($this->form_validation->run() === true)
		{
			// update here
		
			redirect('admin/orgdb');
		}
		
		$this->template
			->title($this->module_details['name'], sprintf(lang('user:edit_title'), 'jamesbod'))
			->set('orgdb', $orgdb)
			->set('template_style', $this->template_style)
			->build('admin/form');
	}
	
	//----------------------------------------------------------------------//

}
/* End of file admin.php */