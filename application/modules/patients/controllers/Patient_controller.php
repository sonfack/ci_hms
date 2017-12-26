<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_controller extends MX_Controller {

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
		$this->load->model(array('health_personnels/health_personnel', 'health_personnels/personnel_speciality')); 
		$data['health_personnel'] = $this->health_personnel->get_record(
			array('health_personnel_id'=>$this->session->userdata('health_personnel_id'))
		); 
		$data['personnel_speciality'] = $this->personnel_speciality->get_record(
			array('personnel_speciality_id'=>$this->session->userdata('personnel_speciality'))
		);
		$patient_list = $this->patient->get_record(); 
		$data['patient_list'] = $patient_list; 
		$this->template->views('horizontal_menu', 'horizontal_menu', $data); 
		$this->template->view('patient_list');
	}
	
	public function add($patient_id=NULL){
	
		$this->template->add_js('patients/patient');
		$this->form_validation->set_rules('first_name', 'Fist name',  'required'); 
		$this->form_validation->set_rules('last_name', 'Last name',  'required'); 
		$this->form_validation->set_rules('sexe', 'Sexe',  'required'); 
		$this->form_validation->set_rules('email', 'Patient Email', 'valid_email'); 
		$this->form_validation->set_rules('phone', 'Patient phone', 'required'); 
		$this->form_validation->set_rules('address', 'Patient address', 'required');
		$this->form_validation->set_rules('birth', 'Patient birth day', 'required');
		$this->form_validation->set_rules('matricul', 'Patient matricul', 'required');
		
		$this->form_validation->set_rules('relative_name', 'Relative_name',  'required'); 
		$this->form_validation->set_rules('relative_phone', 'Relative phone', 'required'); 
		$this->form_validation->set_rules('relative_address', 'Relative address', 'required');
	
		$this->form_validation->set_rules('blood', 'Blood Group',  'required'); 
		$this->form_validation->set_rules('allergy', 'Patient allergy',  'required'); 
		$this->form_validation->set_rules('surgical_history', 'Surgical history',  'required'); 
		$this->form_validation->set_rules('gynecological_history', 'Gynecological history',  'required'); 
		$this->form_validation->set_rules('obstetrical_history', 'Obstetrical history',  'required'); 
		
		if($this->form_validation->run() == FALSE){	
			if(isset($patient_id) && !is_null($patient_id)){
				$data['patient'] = $this->patient->get_record(
					array('patient_id'=>$patient_id)
				); 
				$patient_relative = $this->patient_has_patient_relative->get_record(
					array('patient_id'=>$patient_id)
				);
				$patient_relative_id = $patient_relative[0]['patient_relative_id']; 
				$data['patient_relative'] = $this->patient_relative->get_record(
					array('patient_relative_id'=>$patient_relative_id)
				); 
				$patient_background = $this->medical_background_has_patient->get_record(
					array('patient_id'=>$patient_id)
				);
				//var_dump($patient_background); 
				
				foreach($patient_background as $background){
					
					$bg = $this->medical_background->get_record(
							array('medical_background_id'=>$background['medical_background_id'])
						);
					$backgd[] = $bg[0];
					
				}
				$blood_mg_id = $this->medical_background_has_patient->get_record(
					array('patient_id'=>$patient_id)
				);
				foreach($blood_mg_id as $mg_id){
					$blood_mg[] = $mg_id['medical_background_id'];
				}
				$data['blood_mg_id'] = $blood_mg;
				
				$blood_group = $this->medical_background->get_record(array('type_background_id'=>1));
				$data['blood_group'] = $blood_group;
				$background_type = $this->type_background->get_record(); 
				$data['background_type'] = $background_type;
				$data['medical_background'] = $backgd ; 				
				$marital = $this->marital_status->get_record();
				$data['marital_status'] = $marital;
				$this->template->views('horizontal_menu', 'horizontal_menu', $data); 
				$this->template->view('add_patient');
			}else{
				
		
				
				
				$marital = $this->marital_status->get_record();
				$background_type = $this->type_background->get_record(); 
				$blood_group = $this->medical_background->get_record(array('type_background_id'=>1));
				$data['marital_status'] = $marital;
				$data['blood_group'] = $blood_group;
				$data['background_type'] = $background_type;
				$this->template->views('horizontal_menu', 'horizontal_menu', $data); 
				$this->template->view('add_patient');
			}
		}else{
			if(isset($patient_id) && !is_null($patient_id)){
				$first_name = $this->input->post('first_name'); 
				$last_name = $this->input->post('last_name'); 
				$sexe = $this->input->post('sexe'); 
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address'); 
				$birth = $this->input->post('birth'); 
				$marital = $this->input->post('marital_status');
				$matricul = $this->input->post('matricul');
				$array_birth = explode('-',$birth); 
				$birth = $array_birth[2].'-'.$array_birth[1].'-'.$array_birth[0]; 
				
				$this->patient->update_record(
					array(
						'patient_first_name'=>$first_name,
						'patient_last_name'=>$last_name,
						'patient_sexe'=>$sexe,
						'patient_email'=>$email,
						'patient_phone'=>$phone,
						'patient_birth'=>$birth,
						'patient_address'=>trim($address),
						'marital_status_id'=>$marital,
						'patient_matricul'=>$matricul,
						'patient_status'=>1
					), 
					array(
						'patient_id'=>$patient_id
					)
				);
				$patient_relative = $this->patient_has_patient_relative->get_record( 
					array('patient_id'=>$patient_id)
				);
				
				$relative_name = $this->input->post('relative_name'); 
				$relative_phone = $this->input->post('relative_phone'); 
				$relative_address = $this->input->post('relative_address'); 
				$this->patient_relative->update_record(
					array(
						'patient_relative_name'=>$relative_name,
						'patient_relative_phone'=>$relative_phone,
						'patient_relative_address'=>trim($relative_address),
						'patient_relative_status'=>1
					),
					array(
						'patient_relative_id'=>$patient_relative[0]['patient_relative_id']
					)
				);
				
				
				$med_background['Blood group'] = $this->input->post('blood');
				$med_background['Allergy'] = $this->input->post('allergy');
				$med_background['Surgical history'] = $this->input->post('surgical_history');
				$med_background['Gynecological history'] = $this->input->post('gynecological_history');
				$med_background['Obstetrical history'] = $this->input->post('obstetrical_history');
				
				
				foreach($med_background as $key=>$value){
					if(strcmp($key, 'Blood group')== 0){
						$blood_mg_id = $this->medical_background_has_patient->get_record(
							array('patient_id'=>$patient_id)
						);
						foreach($blood_mg_id as $mg_id){
							$blood_mg[] = $mg_id['medical_background_id'];
						}
						
						$mg_id = min($blood_mg); 
						
						
						 $this->medical_background_has_patient->update_record(
							array(
								'medical_background_id'=>$this->input->post('blood'),
								'patient_id'=>$patient_id
							),
							array(
								'medical_background_id'=>$mg_id,
								'patient_id'=>$patient_id
								)
						);
						
					}else{
						$bg_type = $this->type_background->get_record(
							array('type_background_name'=>$key, 'type_background_status'=>1)
						);
						
						if(!empty($bg_type)){
							$this->medical_background->update_record(
								array(
									'medical_background'=>$value,
									'medical_background_description'=>' ',
									'medical_background_status'=>1
								),
								array(
									'type_background_id'=>$bg_type[0]['type_background_id']
								)
							);
							/*$mb_id = $this->db->insert_id();
							$this->medical_background_has_patient->add_record(
								array(
									'medical_background_id'=>$mb_id,
									'patient_id'=>$p_id
								)
							);*/
						}
						
					}
				}
				
				
				
				$this->index();
			}else{
				$first_name = $this->input->post('first_name'); 
				$last_name = $this->input->post('last_name'); 
				$sexe = $this->input->post('sexe'); 
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address'); 
				$birth = $this->input->post('birth'); 
				$marital = $this->input->post('marital_status');
				$matricul = $this->input->post('matricul');
				$array_birth = explode('-',$birth); 
				$birth = $array_birth[2].'-'.$array_birth[1].'-'.$array_birth[0]; 
				
				$relative_name = $this->input->post('relative_name'); 
				$relative_phone = $this->input->post('relative_phone'); 
				$relative_address = $this->input->post('relative_address'); 
				
			 	$med_background['Blood group'] = $this->input->post('blood');
				$med_background['Allergy'] = $this->input->post('allergy');
				$med_background['Surgical history'] = $this->input->post('surgical_history');
				$med_background['Gynecological history'] = $this->input->post('gynecological_history');
				$med_background['Obstetrical history'] = $this->input->post('obstetrical_history');
				
				$this->patient->add_record(
					array(
						'patient_first_name'=>$first_name,
						'patient_last_name'=>$last_name,
						'patient_sexe'=>$sexe,
						'patient_email'=>$email,
						'patient_phone'=>$phone,
						'patient_birth'=>$birth,
						'patient_address'=>trim($address),
						'marital_status_id'=>$marital,
						'patient_matricul'=>$matricul,
						'patient_status'=>1
					)
				); 
				$p_id = $this->db->insert_id(); 
			
				$this->patient_relative->add_record(
					array(
						'patient_relative_name'=>$relative_name,
						'patient_relative_phone'=>$relative_phone,
						'patient_relative_address'=>trim($relative_address),
						'patient_relative_status'=>1
					)
				);
				$p_relative_id = $this->db->insert_id(); 
				
				$this->patient_has_patient_relative->add_record(
					array(
						'patient_id'=>$p_id,
						'patient_relative_id'=>$p_relative_id
					)
				); 
				
				foreach($med_background as $key=>$value){
					if(strcmp($key, 'Blood group')== 0){
					
						$this->medical_background_has_patient->add_record(
							array(
								'medical_background_id'=>$this->input->post('blood'),
								'patient_id'=>$p_id
							)
						);
						
					}else{
						$bg_type = $this->type_background->get_record(
							array('type_background_name'=>$key, 'type_background_status'=>1)
						);
						
						if(!empty($bg_type)){
							$this->medical_background->add_record(
								array(
									'medical_background'=>$value,
									'medical_background_description'=>' ',
									'medical_background_status'=>1,
									'type_background_id'=>$bg_type[0]['type_background_id']
								)
							);
							$mb_id = $this->db->insert_id();
							$this->medical_background_has_patient->add_record(
								array(
									'medical_background_id'=>$mb_id,
									'patient_id'=>$p_id
								)
							);
						}
						
					}
				}
				$this->index(); 
			}
		}
	}
	
	/* get patient parameter
	 * Only doctors and nurses can access to 
	 * this function
	 */
	 public function consult($patient_id=NULL){
		$this->form_validation->set_rules('height', 'Patient height',  'required'); 
		$this->form_validation->set_rules('weight', 'Patient weight',  'required'); 
		$this->form_validation->set_rules('temperature', 'Patient temperature',  'required'); 
		//$this->form_validation->set_rules('rhesus', 'Patient Blood rhesus', 'required'); 
		$this->form_validation->set_rules('blood_pressure', 'Patient blood pressure', 'required'); 
		$this->form_validation->set_rules('heartbeat', 'Patient heartbeat', 'required');
		$this->form_validation->set_rules('reason', 'Patient reason of consultation', 'required');
		if($this->form_validation->run() == FALSE && $patient_id != NULL){
			$data['patient'] = $this->patient->get_record(array('patient_id'=>$patient_id)); 
			$this->template->views('horizontal_menu', 'horizontal_menu',$data); 
			$this->template->view('patient_parameter');
		}elseif($patient_id == NULL){
			//$data['consultation_list'] = $this->patient_parameter->get_record(); 
			$data['consultation_list'] = $this->patient_parameter->get_joind('patient', 'patient_id','patient_patient_id');
 			$this->template->views('horizontal_menu', 'horizontal_menu',$data); 
			$this->template->view('consultation_list');
		}else{
			$height = $this->input->post('height');
			$weight = $this->input->post('weight');
			$temperature = $this->input->post('temperature');
			$rhesus = $this->input->post('rhesus');
			$blood_pressure = $this->input->post('blood_pressure');
			$heartbeat = $this->input->post('heartbeat');
			$reason = $this->input->post('reason');
			$this->patient_parameter->add_record(
				array(
					'patient_parameter_height'=>$height,
					'patient_parameter_weight'=>$weight,
					'patient_parameter_temperature'=>$temperature,
					'patient_parameter_blood_pressure'=>$blood_pressure,
					'patient_parameter_heartbeat'=>$heartbeat,
					'patient_parameter_consultation'=>$reason,
					'patient_parameter_rhesus'=>$rhesus,
					'patient_patient_id'=>$patient_id,
					'patient_parameter_status'=>1,
					'health_personnel_health_personnel_id'=>$this->session->userdata("health_personnel_id")
				)
			);
			//$data['consultation_list'] = $this->patient_parameter->get_record(); 
			$data['consultation_list'] = $this->patient_parameter->get_joind('patient', 'patient_id','patient_patient_id');
			$this->template->views('horizontal_menu', 'horizontal_menu',$data); 
			$this->template->view('consultation_list');
		}
		
	 }
	
	public function modify($patient_id){
		
		
	}
	
	public function diagnostic($patient_id){
		$this->form_validation->set_rules('diagnostic', 'Patient diagnostic',  'required'); 
		
		if($this->form_validation->run() == FALSE){
			 $this->view_consultation($patient_id); 
		}else{
			$diagnostics = $this->input->post('diagnostic'); 
			var_dump($diagnostics);
			exit; 
		}
	}
	
	
	public function view_consultation($patient_id){
		if(!empty($patient_id) && is_numeric($patient_id)){
			$this->template->add_js('patients/patient'); 
			$this->template->add_css('patients/patient'); 
			$consultation = $this->patient_parameter->get_record(array('patient_parameter_id'=>$patient_id)); 
			$patient = $this->patient->get_record(array('patient_id'=>$patient_id)); 
			$data['patient'] = $patient; 
			$data['consultation'] = $consultation;
			$this->template->views('horizontal_menu', 'horizontal_menu',$data); 
			$this->template->view('view_consultation');
		}else{
			$this->consult(); 
		}
		
	}

}
