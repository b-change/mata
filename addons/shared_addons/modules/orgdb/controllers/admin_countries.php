<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a APN+ Network Organization Database module for PyroCMS
 *
 * @category   	APN+ Network
 * @package    	Organizational database <OrgDB> Countries
 * @author     	devnull <www.gerekper.asia>
 * @copyright  	2012-2013 Gerekper Inc
 * @license    	-
 * @version    	1.0.1
 * @name 		countries.php
 * @link       	-
 * @see        	-
 * @since      	File available since Release 1.0.0
 * @deprecated 	-
 */
 
class Admin_countries extends Admin_Controller
{
	protected $section = 'countries';
	
	//----------------------------------------------------------------------//
	
	private $validation_rules = array(
		'orgdb_country_iso_02'	=>	array(
			'field'	=>	'orgdb_country_iso_02',
			'label'	=>	'orgdb:label:orgdb_country_iso_02',
			'rules'	=>	'required|max_length[2]',
			),
		'orgdb_country_iso_03'	=>	array(
			'field'	=>	'orgdb_country_iso_03',
			'label'	=>	'orgdb:label:orgdb_country_iso_03',
			'rules'	=>	'require|max_length[3]',
			),
	);
	
	public $template_style = array(
			'orgdb_country_iso_02'	=> array(
				 	'name'        	=> 'orgdb_country_iso_02',
              		'id'          	=> 'orgdb_country_iso_02',
              		'maxlength'   	=> '10',
              		'size'        	=> '10',
              		), 
            'orgdb_country_iso_03'	=> 	array(
			 		'name'			=>	'orgdb_country_iso_03',
			 		'id'			=>	'orgdb_country_iso_03',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'10'
			 		),
            'orgdb_country_iso_00'	=> 	array(
			 		'name'			=>	'orgdb_country_iso_00',
			 		'id'			=>	'orgdb_country_iso_00',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'10'
			 		),
			'orgdb_country_sname'	=> 	array(
			 		'name'			=>	'orgdb_country_sname',
			 		'id'			=>	'orgdb_country_sname',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'50'
			 		),
			'orgdb_country_lname'	=> 	array(
			 		'name'			=>	'orgdb_country_lname',
			 		'id'			=>	'orgdb_country_lname',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'50'
			 		),
			'orgdb_country_is_un'	=> 	array(
			 		'name'			=>	'orgdb_country_is_un',
			 		'id'			=>	'orgdb_country_is_un',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'50'
			 		),
			'orgdb_country_code'	=> 	array(
			 		'name'			=>	'orgdb_country_code',
			 		'id'			=>	'orgdb_country_code',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'10'
			 		),
			'orgdb_country_tld'		=> 	array(
			 		'name'			=>	'orgdb_country_tld',
			 		'id'			=>	'orgdb_country_tld',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'10'
			 		),
			'orgdb_country_status'	=> 	array(
			 		'name'			=>	'orgdb_country_status',
			 		'id'			=>	'orgdb_country_status',
			 		'maxlength'		=>	'100',
			 		'size'			=>	'50'
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
		$base_where = array('orgdb_country_status' => 0);
		$base_where['orgdb_country_status'] = $this->input->post('f_module') ? (int)$this->input->post('f_active') : $base_where['orgdb_country_status'];
		$base_where = $this->input->post('f_keywords') ? $base_where + array('orgdb_country_name' => $this->input->post('f_keywords')) : $base_where;
		$base_where = $this->input->post('f_country') ? $base_where + array('orgdb_country' => $this->input->post('f_country')) : $base_where;

		// Create pagination links
		$total_rows = $this->orgdb_country_m->count_by($base_where);
		$pagination = create_pagination('admin/orgdb/countries/index', $total_rows,null,5);

		// Using this data, get the relevant results
		$orgdb_countries = $this->orgdb_country_m
			->limit($pagination['limit'], $pagination['offset'])
			->get_many_by($base_where);

		//do we need to unset the layout because the request is ajax?
		$this->input->is_ajax_request() and $this->template->set_layout(false);

		$this->template
			->title($this->module_details['name'])
			->set('pagination', $pagination)
			->set('orgdb_countries', $orgdb_countries)
			->set_partial('filters', 'admin/partials/filters')
			->append_js('admin/filter.js')
			->append_js('module::general.js')
			->append_css('module::style.css')
			->append_js('module::jquery.tablesort.js')
			->append_js('module::jquery.tablesort.plugins.js');

		$this->input->is_ajax_request() ? $this->template->build('admin/tables/table_countries') : $this->template->build('admin/countries');
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
				if ($this->orgdb_country_m->check_status($id, TRUE) == FALSE){
					if ($this->orgdb_country_m->update_status($id, TRUE)) {
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
			$this->orgdb_country_m->update_status($id, TRUE);
			$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:activate:success'), $activate, $to_activate));
		}
		else
		{
			$this->session->set_flashdata('error', lang('orgdb:messages:activate:error'));
		}
		redirect('admin/orgdb/countries');
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
				if ($this->orgdb_country_m->check_status($id, TRUE) == TRUE){
					if ($this->orgdb_country_m->update_status($id, FALSE)) {
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
			$this->orgdb_country_m->update_status($id, FALSE);
			$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:deactivate:success'), $deactivate, $to_deactivate));
		}
		else
		{
			$this->session->set_flashdata('error', lang('orgdb:messages:deactivate:error'));
		}
		redirect('admin/orgdb/countries');
	}

	//----------------------------------------------------------------------//
	
	public function edit($id = 0)
	{
		$orgdb_country = $this->orgdb_country_m->get_detail_country($id);

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->validation_rules);		
		
		if ($this->form_validation->run())
		{
			//get status value
			$status = $this->input->post('orgdb_country_status',TRUE)==null ? 0 : 1;
			$is_un = $this->input->post('orgdb_country_is_un',TRUE)==null ? 0 : 1;
			$params = $this->input->post();
			$params['orgdb_country_status'] = $status;
			$params['orgdb_country_is_un'] = $is_un;

			//we need to recollect all data that send from view to make sure no error will be found
			$this->orgdb_country_m->update_data($params); 

			//message
			$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:edit:success')));

			//redirect
			($this->input->post('btnAction') == 'save_exit') ? redirect('admin/orgdb/countries') : redirect('admin/orgdb/countries/edit/'.$id);
		}
		
		$this->template
			->title($this->module_details['name'], sprintf(lang('user:edit_title'), 'jamesbod'))
			->set('orgdb_country', $orgdb_country)
			->set('template_style', $this->template_style)
			->build('admin/form_countries');
	}

	//----------------------------------------------------------------------//
	
	public function delete($id = 0)
	{
		$orgdb = $this->orgdb_country_m->delete_data($id);
		$this->session->set_flashdata('success', sprintf(lang('orgdb:messages:delete:success')));
		redirect('admin/orgdb/countries');
	}

	//----------------------------------------------------------------------//

}
/* End of file countries.php */