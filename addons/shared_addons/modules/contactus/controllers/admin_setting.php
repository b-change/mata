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


class Admin_setting extends Admin_Controller
{
	protected $section = 'setting';

	//----------------------------------------------------------------------//

	private $validation_rules = array(
		'email'	=>	array(
			'field'	=>	'email',
			'label'	=>	'lang:contactus:label:email_destination',
			'rules'	=>	'required|valid_email',
			),
	);

	//----------------------------------------------------------------------//

	public $template_style = array(
			'email'	=> array(
				 	'name'      => 'email',
              		'id'        => 'email',
              		'maxlength' => '100',
              		'size'      => '100',
              		'style'		=> 'width: 200px; margin: 0px;'
              		)
	);

	//----------------------------------------------------------------------//

	public function __construct()
	{
		parent::__construct();

		//load language
		$this->load->language('contactus');
		$this->load->model('contactus_setting_m');

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
			// See if the model can create the record
			if ($this->contactus_setting_m->update_data($this->input->post()))
			{
				//set success message
				$this->session->set_flashdata('success', lang('contactus:save:success'));
			}
			else
			{
				//set error message
				$this->session->set_flashdata('error', lang('contactus:email:failed'));
			}
			redirect(current_url());
		}

		//grab email data
		$emails = $this->contactus_setting_m->get_all();

		$this->template
			->title($this->module_details['name'])
			->set('emails', $emails)
			->set('template_style', $this->template_style)
			->build('admin/setting');
	}

	//----------------------------------------------------------------------//

}