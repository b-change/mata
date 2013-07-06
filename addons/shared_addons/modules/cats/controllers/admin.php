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
	protected $section = 'cats';

	//----------------------------------------------------------------------//

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cats_m');
		$this->load->language('cats');
	}

	//----------------------------------------------------------------------//

	public function index() 
	{
		$base_where = array();
		$base_where = $this->input->post('f_country') ? $base_where + array('ctcde' => $this->input->post('f_country')) : $base_where;
		$base_where = $this->input->post('f_site') ? $base_where + array('stcde' => $this->input->post('f_site')) : $base_where;
		$base_where = $this->input->post('f_data_collector') ? $base_where + array('dccde' => $this->input->post('f_data_collector')) : $base_where;
		$base_where = $this->input->post('f_respondent_serial_number') ? $base_where + array('rsn' => $this->input->post('f_respondent_serial_number')) : $base_where;
		$base_where = $this->input->post('f_place_of_enrollment') ? $base_where + array('p1_a2' => $this->input->post('f_place_of_enrollment')) : $base_where;
		
		$pagination = create_pagination('admin/cats/index', $this->cats_m->count_by($base_where));
		$this->db
			 ->limit($pagination['limit'], $pagination['offset']);
		$cats = $this->cats_m->get_many_by($base_where);
		
		if ($this->input->is_ajax_request())
		{
			$this->template->set_layout(false);
		}

		$country_name = array(1=>'Bangladesh', 2=>'Laos', 3=>'Nepal', 4=>'Pakistan', 5=>'Phillipines', 6=>'Vietnam', 7=>'Indonesia');
		$place_name = array(1=>'Community', 2=>'Health services centre', 3=>'Hospital', 4=>'Self‐help group', 5=>'Others');
		
		$this->template
			->title($this->module_details['name'])
			->set('pagination', $pagination)
			->set(compact('cats','country_name', 'place_name'))
			->set_partial('filters', 'admin/partials/filters')
			->append_js('admin/filter.js')
			->append_js('module::general.js')
			->append_css('module::style.css')
			->append_js('module::jquery.tablesort.js')
			->append_js('module::jquery.tablesort.plugins.js');

		$this->input->is_ajax_request() ? $this->template->build('admin/tables/table_cats') : $this->template->build('admin/index');
	}

	public function view($id) 
	{
		$palate_01 = $this->cats_m->get_detail('apnplus_catsdb_palate_01',$id);
		$palate_02 = $this->cats_m->get_detail('apnplus_catsdb_palate_02',$id);
		$palate_03 = $this->cats_m->get_detail('apnplus_catsdb_palate_03',$id);
		$new_fields = $this->cats_m->convert_fields();
		$this->template
			->title($this->module_details['name'])
			->set(compact('palate_01','palate_02','palate_03','new_fields','id'))
			->build('admin/view');
	}
}