<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	private $theme_name = 'user'; 
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array('Template','form_validation'));
		$this->load->helper(array('form','url','language'));
		
		$this->template->set_theme($this->theme_name);
	}
	
	public function index()
	{
		$this->template->view('welcome');
	}
	
	public function menu(){
		$this->load->model(array('health_personnels/health_personnel', 'health_personnels/personnel_speciality')); 
		$data['health_personnel'] = $this->health_personnel->get_record(
			array('health_personnel_id'=>$this->session->userdata('health_personnel_id'))
		); 
		$data['personnel_speciality'] = $this->personnel_speciality->get_record(
			array('personnel_speciality_id'=>$this->session->userdata('personnel_speciality'))
		);
		
		$this->template->view('menu','output',$data); 
	}
	
}
