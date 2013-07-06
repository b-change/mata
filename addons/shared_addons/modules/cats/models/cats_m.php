<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a APN+ Network Organization Database module for PyroCMS
 *
 * @category   APN+ Network
 * @package    Organizational database <OrgDB>
 * @author     agus <www.gerekper.asia>
 * @copyright  2012-2013 Gerekper Inc
 * @license    -
 * @version    1.0.0
 * @link       -
 * @see        -
 * @since      File available since Release 1.0.0
 * @deprecated -
 */
 
class Cats_m extends MY_Model {

	public function __construct()
	{		
		parent::__construct();
		$this->_table_cats_01		= 	'apnplus_catsdb_palate_01';
		$this->_table_cats_02		= 	'apnplus_catsdb_palate_02';
		$this->_table_cats_03		= 	'apnplus_catsdb_palate_03';
		$this->_table_cats_04		= 	'apnplus_catsdb_palate_04';
		$this->_table_cats_05		= 	'apnplus_catsdb_palate_05';
		$this->_table_cats_06		= 	'apnplus_catsdb_palate_06';
		$this->_table_cats_07		= 	'apnplus_catsdb_palate_07';
		$this->_table_cats_08		= 	'apnplus_catsdb_palate_08';
		$this->_table_cats_09		= 	'apnplus_catsdb_palate_09';
		$this->_table_cats_10		= 	'apnplus_catsdb_palate_10';
		$this->_table_cats_11		= 	'apnplus_catsdb_palate_11';
		$this->_table_cats_12		= 	'apnplus_catsdb_palate_12';
		$this->_table_cats_13		= 	'apnplus_catsdb_palate_13';
		$this->_table_cats_14		= 	'apnplus_catsdb_palate_14';
		$this->_table_cats_15		= 	'apnplus_catsdb_palate_15';
		$this->_table_cats_16		= 	'apnplus_catsdb_palate_16';
		$this->_table_cats_17		= 	'apnplus_catsdb_palate_17';
		$this->_table_cats_18		= 	'apnplus_catsdb_palate_18';
		$this->_table_cats_19		= 	'apnplus_catsdb_palate_19';
		$this->_table_cats_20		= 	'apnplus_catsdb_palate_20';
		$this->_table_cats_21		= 	'apnplus_catsdb_palate_21';
		$this->_table_cats_22		= 	'apnplus_catsdb_palate_22';
		$this->_table_cats_23		= 	'apnplus_catsdb_palate_23';
		$this->_table_cats_24		= 	'apnplus_catsdb_palate_24';
	}
	
	//----------------------------------------------------------------------//

	public function count_by($params = array())
	{
		$this->db->from($this->_table_cats_01);

		if (!empty($params['ctcde']))
		{
			$this->db->where($this->_table_cats_01.'.ctcde', $params['ctcde']);
		}

		if (!empty($params['stcde']))
		{
			$this->db->where($this->_table_cats_01.'.stcde', $params['stcde']);
		}

		if (!empty($params['dccde']))
		{
			$this->db->where($this->_table_cats_01.'.dccde', $params['dccde']);
		}

		if (!empty($params['rsn']))
		{
			$this->db->where($this->_table_cats_01.'.rsn', $params['rsn']);
		}

		if (!empty($params['p1_a2']))
		{
			$this->db->where($this->_table_cats_01.'.p1_a2', $params['p1_a2']);
		}

		return $this->db->count_all_results();
	}

	//----------------------------------------------------------------------//
	
	public function get_many_by($params = array())
	{	
		if (!empty($params['ctcde']))
		{
			$this->db->where($this->_table_cats_01.'.ctcde', $params['ctcde']);
		}

		if (!empty($params['stcde']))
		{
			$this->db->where($this->_table_cats_01.'.stcde', $params['stcde']);
		}

		if (!empty($params['dccde']))
		{
			$this->db->where($this->_table_cats_01.'.dccde', $params['dccde']);
		}

		if (!empty($params['rsn']))
		{
			$this->db->where($this->_table_cats_01.'.rsn', $params['rsn']);
		}

		if (!empty($params['p1_a2']))
		{
			$this->db->where($this->_table_cats_01.'.p1_a2', $params['p1_a2']);
		}

		return $this->get_all();
	}

	//----------------------------------------------------------------------//

	public function get_detail($table, $id)
	{
		$datas = $this->db
		     		 ->select('*')
			 		 ->where($table.'.rid', $id)
			 		 ->get($table)
			 		 ->result();

		$data = $datas[0];
		// id didn't need to be shown, remove it
		unset($data->catsdb_id);
		unset($data->rid);
		return $data;
	}

	//----------------------------------------------------------------------//

	public function get_all()
	{
		$data = $this->db
				->select('*')
				->get($this->_table_cats_01)
				->result();

		return $data;
	}

	//----------------------------------------------------------------------//

	public function convert_fields()
	{
		$new_field = array
		(
			//apnplus_catsdb_palate_01
			'catsdb_id' 	=> 'id',
			'rid' 			=> 'respondent_id',
			'ctcde' 		=> 'country_code',
			'stcde' 		=> 'site_code',
			'dccde' 		=> 'data_collector_code',
			'rsn' 			=> 'respondent_serial_number',
			'p1_a2' 		=> 'place_of_enrollment',
			'p1_a2ot' 		=> 'place_of_enrollment_other',
			'p1_a3' 		=> 'name_of_site',
			'p1_a4' 		=> 'location',
			'p1_a5' 		=> 'interviewer_name',
			'p1_a6hh' 		=> 'interview_start_hour',
			'p1_a6mm' 		=> 'interview_start_minute',
			'p1_a6mt' 		=> 'interview_start_time',
			'p1_a7' 		=> 'date_of_interview',
			'p1_inc' 		=> 'inclusion_criteria_is_verified',
			'p1_icf' 		=> 'informed_content_obtain',

			//apnplus_catsdb_palate_02
			'p2_s1q1' 		=> 'age',
			'p2_s1q2' 		=> 'sex',
			'p2_s1q3' 		=> 'relationship_status',
			'p2_s1q4' 		=> 'education',
			'p2_s1q4ot' 	=> 'education_other',
			'p2_s1q5' 		=> 'present_job',
			'p2_s1q5ot' 	=> 'present_job_other',
			'p2_s1q6' 		=> 'ngo_member',
			'p2_s1q6ot' 	=> 'ngo_member_other',
			'p2_s1q7' 		=> 'income',
			'p2_s1q8' 		=> 'earn_every_month',
			'p2_s1q91' 		=> 'total_people',
			'p2_s1q92' 		=> 'total_children',
			'p2_s1q93' 		=> 'total_youth',
			'p2_s1q94' 		=> 'total_adult',
			'p2_s1q10' 		=> 'children_in_your_household',
			'p2_s1q10no' 	=> 'number_of_orphans',
			'p2_s1q11' 		=> 'describe_your_area',

			//apnplus_catsdb_palate_03
			'p3_s1q12' 		=> 'average_monthly_income',
			'p3_s1q13a' 	=> 'gay_category',
			'p3_s1q13b' 	=> 'lesbian_category',
			'p3_s1q13c' 	=> 'transgender_category',
			'p3_s1q13d' 	=> 'sex_worker_category',
			'p3_s1q13e' 	=> 'injecting_drug_user_category',
			'p3_s1q13f' 	=> 'refugee_category',
			'p3_s1q13g' 	=> 'internally_displaced_category',
			'p3_s1q13h' 	=> 'domestic_migrant_worker_category',
			'p3_s1q13i' 	=> 'international_migrant_worker_category',
			'p3_s1q13j' 	=> 'prisoner_category',
			'p3_s1q13k' 	=> 'other_category',
			'p3_s1q13ot' 	=> 'specify_category',

			//apnplus_catsdb_palate_04
			'p4_s2q1' 		=> 'diagnosed',
			'p4_s2q1y' 		=> 'year_diagnosed',
			'p4_s2q1m' 		=> 'month_diagnosed',
			'p4_s2q1y' 		=> 'year_diagnosed',
			'p4_s2q2a' 		=> 'going_overseas',
			'p4_s2q2b' 		=> 'pregnant',
			'p4_s2q2c' 		=> 'prepare_marriage',
			'p4_s2q2d' 		=> 'suspected',
			'p4_s2q2e' 		=> 'tested_positif',
			'p4_s2q2f' 		=> 'illness_or_death',
			'p4_s2q2g' 		=> 'wanted_to_know',
			'p4_s2q2h' 		=> 'risky_behaviour',
			'p4_s2q2i' 		=> 'told_by_doctor',
			'p4_s2q2j' 		=> 'work_requirement',
			'p4_s2q2k' 		=> 'blood_transfusion',
			'p4_s2q2l' 		=> 'other_reason',
			'p4_s2q2ot' 	=> 'specify_reason',
			'p4_s2q3' 		=> 'hiv_diagnosed',
			'p4_s2q3ot' 	=> 'specify_hiv_diagnosed',
			'p4_s2q4' 		=> 'first_cd4',
			'p4_s2q4y' 		=> 'first_cd4_year',
			'p4_s2q4m' 		=> 'first_cd4_month',
			'p4_s2q4d' 		=> 'first_cd4_day',
			'p4_s2q4co' 	=> 'first_cd4_count',
			'p4_s2q5' 		=> 'viral_load_test',
			'p4_s2q5y' 		=> 'viral_load_test_year',
			'p4_s2q5m' 		=> 'viral_load_test_month',
			'p4_s2q5d' 		=> 'viral_load_test_day',
			'p4_s2q5co' 	=> 'viral_load_test_count',

			//apnplus_catsdb_palate_05
			'p5_s2q6' 		=> 'meet_the_doctor',
			'p5_s2q6y' 		=> 'meet_the_doctor_year',
			'p5_s2q6m' 		=> 'meet_the_doctor_month',
			'p5_s2q6d' 		=> 'meet_the_doctor_day',
			'p5_s2q7' 		=> 'where_did_meet',
			'p5_s2q7ot' 	=> 'where_did_meet_specify',
			'p5_s2q8' 		=> 'frequently_visit_doctor',
			'p5_s2q9' 		=> 'ever_work',
			'p5_s2q9y' 		=> 'ever_work_year',
			'p5_s2q9m' 		=> 'ever_work_month',
			'p5_s2q9p' 		=> 'ever_work_position',
			'p5_s2q10' 		=> 'enrolled_health_insurance',
			'p5_s2q11' 		=> 'home_base_care',

			//apnplus_catsdb_palate_06
			'p6_s3q1' 		=> 'suffer_diseases',
			'p6_s3q1t' 		=> 'suffer_diseases_times',
			'p6_s3q2a' 		=> 'first_problem',
			'p6_s3q2b' 		=> 'any_medicane',
			'p6_s3q2c1' 	=> 'first_contact',
			'p6_s3q2c2' 	=> 'second_contact',
			'p6_s3q2c3' 	=> 'third_contact',
			'p6_s3q2cn' 	=> 'no_contact',
			'p6_s3q2d' 		=> 'diagnosis',
			'p6_s3q2e' 		=> 'required_hospitalization',
			'p6_s3q2ed' 	=> 'required_hospitalization_day',
			'p6_s3q2fm' 	=> 'medicines_expense',
			'p6_s3q2fc' 	=> 'consultant_expense',
			'p6_s3q2fl' 	=> 'laboratory_expense',
			'p6_s3q2fp' 	=> 'hospitalization_expense',
			'p6_s3q2ff' 	=> 'transport_expense',
			'p6_s3q2ft' 	=> 'total_expense',
			'p6_s3q2ga' 	=> 'my_pocket',
			'p6_s3q2gb' 	=> 'my_family',
			'p6_s3q2gc' 	=> 'subsidy',
			'p6_s3q2gcs' 	=> 'subsidy_specify',
			'p6_s3q2gd' 	=> 'other_method',
			'p6_s3q2gdot' 	=> 'other_method_specify',

			//apnplus_catsdb_palate_07
			'p7_s3q3' 		=> 'second_problem',
			'p7_s3q3b' 		=> 'any_medicane',
			'p7_s3q3c1' 	=> 'first_contact',
			'p7_s3q3c2' 	=> 'second_contact',
			'p7_s3q3c3' 	=> 'third_contact',
			'p7_s3q3cn' 	=> 'no_contact',
			'p7_s3q3d' 		=> 'diagnosis',
			'p7_s3q3e' 		=> 'required_hospitalization',
			'p7_s3q3ed' 	=> 'required_hospitalization_day',
			'p7_s3q3fm' 	=> 'medicines_expense',
			'p7_s3q3fc' 	=> 'consultant_expense',
			'p7_s3q3fl' 	=> 'laboratory_expense',
			'p7_s3q3fp' 	=> 'hospitalization_expense',
			'p7_s3q3ff' 	=> 'transport_expense',
			'p7_s3q3ft' 	=> 'total_expense',
			'p7_s3q3ga' 	=> 'my_pocket',
			'p7_s3q3gb' 	=> 'my_family',
			'p7_s3q3gc' 	=> 'subsidy',
			'p7_s3q3gcs' 	=> 'subsidy_specify',
			'p7_s3q3gd' 	=> 'other_method',
			'p7_s3q3gdot' 	=> 'other_method_specify',

			//apnplus_catsdb_palate_08
			'p8_s3q4' 		=> 'second_problem',
			'p8_s3q4b' 		=> 'any_medicane',
			'p8_s3q4c1' 	=> 'first_contact',
			'p8_s3q4c2' 	=> 'second_contact',
			'p8_s3q4c3' 	=> 'third_contact',
			'p8_s3q4cn' 	=> 'no_contact',
			'p8_s3q4d' 		=> 'diagnosis',
			'p8_s3q4e' 		=> 'required_hospitalization',
			'p8_s3q4ed' 	=> 'required_hospitalization_day',
			'p8_s3q4fm' 	=> 'medicines_expense',
			'p8_s3q4fc' 	=> 'consultant_expense',
			'p8_s3q4fl' 	=> 'laboratory_expense',
			'p8_s3q4fp' 	=> 'hospitalization_expense',
			'p8_s3q4ff' 	=> 'transport_expense',
			'p8_s3q4ft' 	=> 'total_expense',
			'p8_s3q4ga' 	=> 'my_pocket',
			'p8_s3q4gb' 	=> 'my_family',
			'p8_s3q4gc' 	=> 'subsidy',
			'p8_s3q4gcs' 	=> 'subsidy_specify',
			'p8_s3q4gd' 	=> 'other_method',
			'p8_s3q4gdot' 	=> 'other_method_specify',

			//apnplus_catsdb_palate_09
			'p9_s4q1' 		=> 'special_person_i_need',
			'p9_s4q2' 		=> 'special_person_i_share',
			'p9_s4q3' 		=> 'my_family',
			'p9_s4q4' 		=> 'emotial_help',
			'p9_s4q5' 		=> 'special_person_comfort',
			'p9_s4q6' 		=> 'my_friend',
			'p9_s4q7' 		=> 'count_on_my_friend',
			'p9_s4q8' 		=> 'talk_with_my_family',
			'p9_s4q9' 		=> 'friend_i_share',
			'p9_s4q10' 		=> 'special_person_i_feel',
			'p9_s4q11' 		=> 'my_family_is_willing_help',
			'p9_s4q12' 		=> 'my_problem',

			//apnplus_catsdb_palate_10
			'p10_s5q1' 		=> 'disclosed',
			'p10_s5q2' 		=> 'exclude',
			'p10_s5q3' 		=> 'verbally',
			'p10_s5q4' 		=> 'physically',
			'p10_s5q5' 		=> 'assulted',
			'p10_s5q6' 		=> 'forced',
			'p10_s5q7' 		=> 'dismissed',
			'p10_s5q8' 		=> 'denied',
			'p10_s5q9' 		=> 'hiv_status',
			'p10_s5q10' 	=> 'confidential',

			//apnplus_catsdb_palate_11
			'p11_s6q1' 		=> 'describe_your_healt',
			'p11_s6q2a' 	=> 'sleeping',
			'p11_s6q2b' 	=> 'walking',
			'p11_s6q2c' 	=> 'no_need_hard_labor',
			'p11_s6q2d' 	=> 'need_hard_labor',
			'p11_s6q3' 		=> 'illicit_drug',
			'p11_s6q3y1' 	=> 'illicit_drug_current_year',
			'p11_s6q3m1' 	=> 'illicit_drug_current_month',
			'p11_s6q3y2' 	=> 'illicit_drug_past_year',
			'p11_s6q3m2' 	=> 'illicit_drug_past_month',
			'p11_s6q4' 		=> 'injection',
			'p11_s6q4y1' 	=> 'injection_current_year',
			'p11_s6q4m1' 	=> 'injection_current_month',
			'p11_s6q4y2' 	=> 'injection_past_year',
			'p11_s6q4m2' 	=> 'injection_past_month',
			'p11_s6q5' 		=> 'clean_syringes',
			'p11_s6q6' 		=> 'enrolled_ost',
			'p11_s6q6y' 	=> 'enrolled_ost_year',
			'p11_s6q6m' 	=> 'enrolled_ost_month',

			//apnplus_catsdb_palate_12
			'p12_s6q7' 		=> 'drink_alcohol',
			'p12_s6q7y1' 	=> 'drink_alcohol_current_year',
			'p12_s6q7m1' 	=> 'drink_alcohol_current_month',
			'p12_s6q7y2' 	=> 'drink_alcohol_past_year',
			'p12_s6q7m2' 	=> 'drink_alcohol_past_month',
			'p12_s6q7y3' 	=> 'drink_alcohol_for_year',
			'p12_s6q7m3' 	=> 'drink_alcohol_for_month',
			'p12_s6q8' 		=> 'in_a_week',
			'p12_s6q9' 		=> 'smoke',
			'p12_s6q9y1' 	=> 'smoke_current_year',
			'p12_s6q9m1' 	=> 'smoke_current_month',
			'p12_s6q9y2' 	=> 'smoke_past_year',
			'p12_s6q9m2' 	=> 'smoke_past_month',
			'p12_s6q9y3' 	=> 'smoke_for_year',
			'p12_s6q9m3' 	=> 'smoke_for_month',
			'p12_s6q10' 	=> 'cigarettes',
			'p12_s6q11' 	=> 'increased_smoking',
			'p12_s6q12' 	=> 'quiting_smoking',
			'p12_s6q13' 	=> 'care_provider',

			//apnplus_catsdb_palate_13
			'p13_s6q14' 	=> 'spouse',
			'p13_s6q15' 	=> 'spouse_hiv_status',
			'p13_s6q16' 	=> 'taking_art',
			'p13_s6q17' 	=> 'had_sex',
			'p13_s6q18' 	=> 'use_condom',
			'p13_s6q19' 	=> 'disclose',
			'p13_s6q20' 	=> 'sex_with_other',
			'p13_s6q20n' 	=> 'sex_with_other_person',
			'p13_s6q21' 	=> 'frequently_use_condom',
			'p13_s6q22' 	=> 'get_condom',

			//apnplus_catsdb_palate_14
			'p14_s7q1' 		=> 'child',
			'p14_s7q2' 		=> 'child_hiv_positive',
			'p14_s7q2n' 	=> 'child_hiv_positive_number',
			'p14_s7q3' 		=> 'counseling',
			'p14_s7q4' 		=> 'desire_to_have_child',
			'p14_s7q5' 		=> 'advised',
			'p14_s7q6' 		=> 'sterilized',
			'p14_s7q7' 		=> 'coerced',
			'p14_s7q7a' 	=> 'coerced_pregnancy',
			'p14_s7q7b' 	=> 'coerced_birth',
			'p14_s7q7c' 	=> 'coerced_feeding',
			'p14_s7q8'	 	=> 'pregnancy',
			'p14_s7q8t'	 	=> 'pregnancy_number',
			'p14_s7q9'	 	=> 'pregnancy_intended',
			'p14_s7q10'	 	=> 'receive_art',
			'p14_s7q11'	 	=> 'outcome',

			//apnplus_catsdb_palate_15
			'p15_s7q12' 	=> 'contraception',
			'p15_s7q12n' 	=> 'contraception_name',
			'p15_s7q13' 	=> 'access_to_contraception',
			'p15_s7q14' 	=> 'get_contraception',
			'p15_s7q15' 	=> 'nearest_pmtct',
			'p15_s7q15m' 	=> 'nearest_pmtct_minunte',
			'p15_s7q16a' 	=> 'spent_to_visit',

			//apnplus_catsdb_palate_16
			'p16_s8q1' 		=> 'offer_information',
			'p16_s8q2' 		=> 'offer_hepatitis',
			'p16_s8q3' 		=> 'tested_hepatitis',
			'p16_s8q3ot' 	=> 'tested_hepatitis_specify',
			'p16_s8q4' 		=> 'confirmatory_blood',
			'p16_s8q5' 		=> 'confirmatory_blood_result',
			'p16_s8q5hcv'	=> 'confirmatory_blood_result_hcv',
			'p16_s8q6' 		=> 'receipt_medication',
			'p16_s8q7' 		=> 'hcv_medication',
			'p16_s8q7a' 	=> 'hcv_medication_amount',
			'p16_s8q7f' 	=> 'hcv_medication_specify',

			//apnplus_catsdb_palate_17
			'p17_s9q1' 		=> 'having_tb',
			'p17_s9q2' 		=> 'treatment_tb',
			'p17_s9q3' 		=> 'complete_treatment',
			'p17_s9q4' 		=> 'doctor_ask',
			'p17_s9q5' 		=> 'recent_contact',
			'p17_s9q6' 		=> 'nearest_tb_clinic',
			'p17_s9q7a'		=> 'spent_to_visit',

			//apnplus_catsdb_palate_18
			'p18_s10q1' 	=> 'undetectable',
			'p18_s10q2' 	=> 'resistenance',
			'p18_s10q3' 	=> 'load_blood_test',
			'p18_s10q4' 	=> 'condom_during_sex',
			'p18_s10q5' 	=> 'better_to_take',
			'p18_s10q6' 	=> 'getting_infected',
			'p18_s10q7' 	=> 'unpleasant',
			'p18_s10q8' 	=> 'sexual_partner',
			'p18_s10q9' 	=> 'experiencing_side_effect',
			'p18_s10q10' 	=> 'illicit_drug',
			'p18_s10q11' 	=> 'positive_pregnant',
			'p18_s10q12' 	=> 'hiv_vaccine',
			'p18_s10q13' 	=> 'different_time',
			'p18_s10q14' 	=> 'all_children',
			'p18_s10q15' 	=> 'stopped_as_soon',
			'p18_s10q16' 	=> 'missing_a_fewdoses',
			'p18_s10q17' 	=> 'feel_better',
			'p18_s10q18' 	=> 'body_immune',
			'p18_s10q19' 	=> 'opportunistic_infection',
			'p18_s10q20' 	=> 'physical_exercise',
			'p18_s10q21' 	=> 'be_cured',
			'p18_s10q22' 	=> 'arv_side_effect',
			'p18_s10q23' 	=> 'test_measures',
			'p18_s10q24' 	=> 'traditional_herbs',
			'p18_s10q25' 	=> 'life_long',

			//apnplus_catsdb_palate_19
			'p19_s11q1' 	=> 'phone',
			'p19_s11q2' 	=> 'text_message',
			'p19_s11q3' 	=> 'change_your_phone',
			'p19_s11q4' 	=> 'email_account',
			'p19_s11q5' 	=> 'check_email',
			'p19_s11q6' 	=> 'internet',
			'p19_s11q7' 	=> 'hiv_information',
			'p19_s11q8' 	=> 'satisfied',

			//apnplus_catsdb_palate_20
			'p20_s12q1' 	=> 'taking_medicine',
			'p20_s12q2' 	=> 'eligible',
			'p20_s12q2y' 	=> 'eligible_year',
			'p20_s12q2m' 	=> 'eligible_month',
			'p20_s12q2d' 	=> 'eligible_day',
			'p20_s12q3y' 	=> 'art_year',
			'p20_s12q3m' 	=> 'art_month',
			'p20_s12q3d' 	=> 'art_day',
			'p20_s12q4' 	=> 'hospital_name',
			'p20_s12q5' 	=> 'same_center',
			'p20_s12q5f' 	=> 'same_center_specify',
			'p20_s12q6' 	=> 'current_art',
			'p20_s12q6ot' 	=> 'current_art_specify',
			'p20_s12q6h' 	=> 'current_art_hour',
			'p20_s12q6m' 	=> 'current_art_minute',
			'p20_s12q6t' 	=> 'current_art_time',
			'p20_s12q7a' 	=> 'visit_cost',
			'p20_s12q8' 	=> 'medication_regime',
			'p20_s12q9' 	=> 'medication_regime_reason',
			'p20_s12q9ot' 	=> 'medication_regime_reason_other',
			'p20_s12q10' 	=> 'art_in_a_day',

			//apnplus_catsdb_palate_21
			'p21_s12q11c' 	=> 'art_medicine_name',
			'p21_s12q11m' 	=> 'art_medicine_name_choice',
			'p21_s12q11ot' 	=> 'art_medicine_name_choice_specify',
			'p21_s12qan' 	=> 'yesterday_art_medicine_name',
			'p21_s12qamp' 	=> 'yesterday_morning_pil',
			'p21_s12qamh' 	=> 'yesterday_morning_hour',
			'p21_s12qamm' 	=> 'yesterday_morning_minute',
			'p21_s12qamt' 	=> 'yesterday_morning_time',
			'p21_s12qaap' 	=> 'yesterday_afternoon_pil',
			'p21_s12qaah' 	=> 'yesterday_afternoon_hour',
			'p21_s12qaam' 	=> 'yesterday_afternoon_minute',
			'p21_s12qaat' 	=> 'yesterday_afternoon_time',
			'p21_s12qaep' 	=> 'yesterday_evening_pil',
			'p21_s12qaeh' 	=> 'yesterday_evening_hour',
			'p21_s12qaem' 	=> 'yesterday_evening_minute',
			'p21_s12qaet' 	=> 'yesterday_evening_time',
			'p21_s12qbn' 	=> 'two_days_art_medicine_name',
			'p21_s12qbmp' 	=> 'two_days_morning_pil',
			'p21_s12qbmh' 	=> 'two_days_morning_hour',
			'p21_s12qbmm' 	=> 'two_days_morning_minute',
			'p21_s12qbmt' 	=> 'two_days_morning_time',
			'p21_s12qbap' 	=> 'two_days_afternoon_pil',
			'p21_s12qbah' 	=> 'two_days_afternoon_hour',
			'p21_s12qbam' 	=> 'two_days_afternoon_minute',
			'p21_s12qbat' 	=> 'two_days_afternoon_time',
			'p21_s12qbep' 	=> 'two_days_evening_pil',
			'p21_s12qbeh' 	=> 'two_days_evening_hour',
			'p21_s12qbem' 	=> 'two_days_evening_minute',
			'p21_s12qbet' 	=> 'two_days_evening_time',
			'p21_s12qcn' 	=> 'three_days_art_medicine_name',
			'p21_s12qcmp' 	=> 'three_days_morning_pil',
			'p21_s12qcmh' 	=> 'three_days_morning_hour',
			'p21_s12qcmm' 	=> 'three_days_morning_minute',
			'p21_s12qcmt' 	=> 'three_days_morning_time',
			'p21_s12qcap' 	=> 'three_days_afternoon_pil',
			'p21_s12qcah' 	=> 'three_days_afternoon_hour',
			'p21_s12qcam' 	=> 'three_days_afternoon_minute',
			'p21_s12qcat' 	=> 'three_days_afternoon_time',
			'p21_s12qcep' 	=> 'three_days_evening_pil',
			'p21_s12qceh' 	=> 'three_days_evening_hour',
			'p21_s12qcem' 	=> 'three_days_evening_minute',
			'p21_s12qcet' 	=> 'three_days_evening_time',
			'p21_s12qdn' 	=> 'four_days_art_medicine_name',
			'p21_s12qdmp' 	=> 'four_days_morning_pil',
			'p21_s12qdmh' 	=> 'four_days_morning_hour',
			'p21_s12qdmm' 	=> 'four_days_morning_minute',
			'p21_s12qdmt' 	=> 'four_days_morning_time',
			'p21_s12qdap' 	=> 'four_days_afternoon_pil',
			'p21_s12qdah' 	=> 'four_days_afternoon_hour',
			'p21_s12qdam' 	=> 'four_days_afternoon_minute',
			'p21_s12qdat' 	=> 'four_days_afternoon_time',
			'p21_s12qdep' 	=> 'four_days_evening_pil',
			'p21_s12qdeh' 	=> 'four_days_evening_hour',
			'p21_s12qdem' 	=> 'four_days_evening_minute',
			'p21_s12qdet' 	=> 'four_days_evening_time',

			//apnplus_catsdb_palate_22
			'p22_s12q13' 	=> 'missed_a_dose',
			'p22_s12q13y' 	=> 'missed_a_dose_year',
			'p22_s12q13m' 	=> 'missed_a_dose_month',
			'p22_s12q13d' 	=> 'missed_a_dose_day',
			'p22_s12q14' 	=> 'proportion_arv_medicine',
			'p22_s12q14p' 	=> 'proportion_arv_medicine_prosen',
			'p22_s12q15' 	=> 'missed_a_appointment',
			'p22_s12q16a' 	=> 'other_thing',
			'p22_s12q16b' 	=> 'out_of_town',
			'p22_s12q16c' 	=> 'bad_weather',
			'p22_s12q16d' 	=> 'being_arrested',
			'p22_s12q16ot' 	=> 'other',

			//apnplus_catsdb_palate_23
			'p23_s13q1' 	=> 'nausea_and_vomiting',
			'p23_s13q2' 	=> 'rash',
			'p23_s13q3' 	=> 'pains',
			'p23_s13q4' 	=> 'diarrhoea',
			'p23_s13q5' 	=> 'fatigue',
			'p23_s13q6' 	=> 'bloating',
			'p23_s13q7' 	=> 'hair_loss',
			'p23_s13q8' 	=> 'headache',
			'p23_s13q9' 	=> 'sleeping_difficulties',
			'p23_s13q10' 	=> 'mood_changes',
			'p23_s13q11' 	=> 'diabetes',
			'p23_s13q12' 	=> 'heart_diseases',
			'p23_s13q13' 	=> 'body_fat',
			'p23_s13q14' 	=> 'numbness',
			'p23_s13q15' 	=> 'your_kidney',
			'p23_s13q16' 	=> 'your_liver',
			'p23_s13q17' 	=> 'your_bone',
			'p23_s13q18' 	=> 'experienced_jaundice',

			//apnplus_catsdb_palate_24
			'p24_s14q1' 	=> 'possible_side',
			'p24_s14q2' 	=> 'my_healt',
			'p24_s14q3' 	=> 'difficult_to_ask',
			'p24_s14q4' 	=> 'comfortable',
			'p24_s14q5' 	=> 'insulted',
			'p24_itveth' 	=> 'interview_hour',
			'p24_itvetm' 	=> 'interview_minute',
			'p24_itvett' 	=> 'interview_time',
			'p24_dcsgn' 	=> 'data_collector_signature',
			'p24_spnme' 	=> 'supervisor_name',
			'p24_spsgn' 	=> 'signature',
			'p24_sprvtde' 	=> 'review_date',
			);

		return $new_field;
	}
}