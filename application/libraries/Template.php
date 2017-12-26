<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Template {
	private $CI ;
	private $var = array();
	private $theme = 'default';
	
	public function __construct(){
		$this->CI = get_instance();
        $this->CI->load->helper('language');
        $folder = $this->CI->config->item('xml_base');
		// get the themes positions from the template.xml file
		$template = simplexml_load_file($folder.'template.xml'); 
		foreach($template as $theme){	
			if($theme['name'] == $this->theme){
				foreach($theme->position as $pos){
					$key = (string)$pos;
					$this->var[$key] = "";
				}
			}
		}
		$this->var['titre'] = $this->CI->router->fetch_method();
		$this->var['charset'] = $this->CI->config->item('charset');
		$this->var['css'] = array();
		$this->var['js'] = array();
	}
	
	
	public function view($vue, $position='output', $data=NULL){ 
		foreach($this->var as $key=>$value){	
			if($key === $position){
				$this->var[$key] .= $this->CI->load->view($vue, $data, true);
				$this->CI->load->view('../themes/'. $this->theme, $this->var);
			}
		}
	}
	public function views($vue, $position, $data=NULL){ 
		//var_dump($this->var); 
		//exit;
		foreach($this->var as $key=>$value){	
			if($key === $position){
				$this->var[$key] .= $this->CI->load->view($vue, $data, true);
			}
		}
		return $this;
	}
	public function set_theme($theme){
		// and file_exists('../themes/'.$theme.'.php')
		if(is_string($theme) and !empty($theme)){
			$this->theme = $theme;
			foreach($this->var as $key=>$value){
				unset($this->var[$key]);
			}
			$this->var = array();
			$folder = $this->CI->config->item('xml_base');
			// get the themes positions from the template.xml file
			$template = simplexml_load_file($folder.'template.xml'); 
			foreach($template as $theme){	
				if($theme['name'] == $this->theme){
					foreach($theme->position as $pos){
						$key = (string)$pos;
						$this->var[$key] = "";
					}
				}
			}
			return true;
		}
		return false;
	}
	
	public function set_titre($titre){
		if(is_string($titre) and !empty($titre)){
			$this->var['titre'] =  $titre;
			return true;
		}else{
			return false;
		}
	}
	
	public function set_charset($charset){
		if(is_string($charset) and !empty($charset)){
			$this->var['charset'] = $charset;
			return true;
		}else{
			return false;
		}
	}
	
        public function set_metadescription($description){
		if(is_string($description) and !empty($description)){
			$this->var['description'] = $description;
			return true;
		}else{
			return false ;
		}
	}
	public function add_css($nom){
		if(is_string($nom) AND !empty($nom)){ 
			$this->var['css'][] = css_url($nom);
			return true;
		}
		return false;
	}
	
	
	public function add_js($nom){
		if(is_string($nom) AND !empty($nom)){
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}
}
