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
 
class Contactus extends Public_Controller
{
	private $validation_rules = array(
		'name'	=>	array(
			'field'	=>	'name',
			'label'	=>	'lang:contactus:label:name',
			'rules'	=>	'required',
			),
		'email'	=>	array(
			'field'	=>	'email',
			'label'	=>	'lang:contactus:label:email',
			'rules'	=>	'required|valid_email',
			),
		'telephone'	=>	array(
			'field'	=>	'telephone',
			'label'	=>	'lang:contactus:label:telephone',
			'rules'	=>	'required',
			),
		'comment'	=>	array(
			'field'	=>	'comment',
			'label'	=>	'lang:contactus:label:comment',
			'rules'	=>	'required',
			),
	);

	public $template_style = array(
			'name'	=> array(
				 	'name'      => 'name',
              		'id'        => 'name',
              		'maxlength' => '100',
              		'size'      => '100',
              		'style'		=> 'width: 200px; margin: 0px;'
              		), 
            'company_name'	=> 	array(
			 		'name'		=> 'company_name',
			 		'id'		=> 'company_name',
			 		'maxlength'	=> '100',
			 		'size'		=> '50',
			 		'style'		=> 'width: 200px; margin: 0px;'
			 		),
			'company_website' => 	array(
			 		'name'		=>	'company_website',
			 		'id'		=>	'company_website',
			 		'maxlength'	=>	'100',
			 		'size'		=>	'50',
			 		'style'		=> 'width: 200px; margin: 0px;'
			 		),
			'email'	=> 	array(
			 		'name'		=>	'email',
			 		'id'		=>	'email',
			 		'maxlength'	=>	'100',
			 		'size'		=>	'50',
			 		'style'		=> 'width: 200px; margin: 0px;'
			 		),
			'telephone'	=> 	array(
			 		'name'		=>	'telephone',
			 		'id'		=>	'telephone',
			 		'maxlength'	=>	'100',
			 		'size'		=>	'50',
			 		'style'		=> 'width: 200px; margin: 0px;'
			 		),
			'comment'	=> 	array(
					'name'		=>	'comment',
			 		'style'		=> 'width: 50%; margin: 0px;'
			 		)
	);

	public function __construct()
	{
		parent::__construct();

		//load language
		$this->load->language('contactus');

		//we need country data existing on orgdb
		$this->load->model('orgdb_country_m');
		$this->load->model('contactus_m');
		$this->load->model('contactus_setting_m');

		//load class for validation
		$this->load->library('form_validation');
		
		//prepare data for country dropdown
		$this->template->_country 			= $this->orgdb_country_m->get_country();
		$this->template->_country_select 	= array_for_select($this->template->_country, 'orgdb_country_sname', 'orgdb_country_sname');

		//prepare data for interested dropdown
		$this->template->_interested		= array(
												lang('contactus:choice:partner'), 
												lang('contactus:choice:donation'), 
												lang('contactus:choice:general'), 
												lang('contactus:choice:job'),
												lang('contactus:choice:support'),
												lang('contactus:choice:other')
											);
		$this->template->_interested_select = array_for_select($this->template->_interested);

		//prepare data for preferred dropdown
		$this->template->_preferred			= array(
												lang('contactus:choice:email'), 
												lang('contactus:choice:phone')
											);
		$this->template->_preferred_select 	= array_for_select($this->template->_preferred);

		//add style for onw module
		$this->template
				->append_css('module::contactus.css')
				->append_js('module::contactus.js');
	}
	
	//----------------------------------------------------------------------//
	
	public function index()
	{
		//set the validation rules from the array above
		$this->form_validation->set_rules($this->validation_rules);

		//check if the form validation passed
		if ($this->form_validation->run())
		{
			//get email destionation
			$emails = $this->contactus_setting_m->get_all();

			//prepare to send email
			$data = $this->input->post();
			$data['slug']         	= 'contact_us';
			$data['to']				= $emails[0]->email;
			$data['from']			= $data['email'];
			$data['subject']		= $data['interested'];
			$data['sender_agent'] = $this->agent->browser() . ' ' . $this->agent->version();
			$data['sender_ip']    = $this->input->ip_address();
			$data['sender_os']    = $this->agent->platform();

			//try to send the email
			$result = Events::trigger('email', $data, 'array');

			//check email sent
			if ( ! $result)
			{
				$message = $this->attribute('error',  lang('contactus:email:failed'));
				redirect(current_url());
			}

			// See if the model can create the record
			if ($this->contactus_m->create($this->input->post()))
			{
				//set success message
				$this->session->set_flashdata('success', lang('contactus:email:sent'));
			}
			else
			{
				//set error message
				$this->session->set_flashdata('error', lang('contactus:email:failed'));
			}
			redirect( ($redirect ? $redirect : current_url()) );
		}

		//send back value to the form
		$contactus = new stdClass;
		foreach ($this->validation_rules as $rule)
		{
			$contactus->{$rule['field']} = $this->input->post($rule['field']);
		}

		//build the view using contactus/views/index.php
		$this->template
			->title($this->module_details['name'], lang('contactus:title:contact'))
			->set('template_style', $this->template_style)
			->set('contactus', $contactus)
			->build('form');
	}
	
	//----------------------------------------------------------------------//
}