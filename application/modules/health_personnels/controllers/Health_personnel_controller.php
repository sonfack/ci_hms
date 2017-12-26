<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_personnel_controller extends MX_Controller {

	private $theme_name = 'admin'; 
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array('Template','form_validation'));
		$this->load->helper(array('form','url','language'));
		$this->template->set_theme($this->theme_name);
	}

	public function index()
	{	$data['personnel_list'] = $this->health_personnel->get_record();
		$this->template->views('horizontal_menu', 'horizontal_menu', $data); 
		$this->template->view('health_personnel_list');
	}
	
	public function add_speciality(){
		
		$this->form_validation->set_rules('speciality', 'Speciality',  'required'); 
		//$this->form_validation->set_rules('sp_description', 'Description',  'required'); 
		
		if($this->form_validation->run() == FALSE){	
		
			$this->template->views('horizontal_menu', 'horizontal_menu'); 
			$this->template->view('add_speciality');
		}else{
			$speciality = $this->input->post('speciality'); 
			$sp_description = $this->input->post('sp_description'); 
			
			$this->personnel_speciality->add_record(
				array(
					'personnel_speciality'=>$speciality,
					'personnel_speciality_description'=>$sp_description,
					'personnel_speciality_status'=>1
				)
			); 
			
			$this->index(); 
		}
	}
	
	
	 public function add_personnel(){
		$this->form_validation->set_rules('personnel_matricul', 'Personnel matricul number',  'required'); 
		$this->form_validation->set_rules('personnel_name', 'Personnel name',  'required'); 
		$this->form_validation->set_rules('personnel_speciality', 'Personnel speciality',  'required'); 
		$this->form_validation->set_rules('personnel_phone', 'Personnel phone',  'required'); 
		$this->form_validation->set_rules('personnel_address', 'Personnel address',  'required'); 
		$this->form_validation->set_rules('personnel_email', 'Personnel email',  'required'); 
		if($this->form_validation->run() == FALSE){	
			$data['list_speciality'] = $this->personnel_speciality->get_record();
			
			$this->template->views('horizontal_menu', 'horizontal_menu', $data); 
			$this->template->view('add_personnel');
		}else{
			$name = $this->input->post('personnel_name'); 
			$phone = $this->input->post('personnel_phone'); 
			$peciality = $this->input->post('personnel_speciality'); 
			$address = $this->input->post('personnel_address'); 
			$matricul = $this->input->post('personnel_matricul'); 
			$email = $this->input->post('personnel_email'); 
			$this->health_personnel->add_record(
				array(
					'health_personnel_name'=>$name,
					'health_personnel_phone'=>$phone,
					'health_personnel_address'=>$address,
					'health_personnel_matricul'=>$matricul,
					'health_personnel_email'=>$email,
					'health_personnel_status'=>1
				)
			); 
			$personnel_id = $this->db->insert_id(); 
			$this->personnel_speciality_has_health_personnel->add_record(
				array(
					'personnel_speciality_id'=>$peciality,
					'health_personnel_id'=>$personnel_id
				)
			);
			$this->index(); 
		}
	 }
	
	/* modify patient information 
	 */
	public function modify(){
		
	
	}
	
	
	/* delete a patient from the system
	 */
	public function delete(){
		
		
	}
	
	public function test(){
			return 'serge';
	}
}
