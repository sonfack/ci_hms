<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model{
	
	protected $_table; // le nom de la table est le meme que celui de la classe sans la partie _model
	protected $_id;    // le nom de id de la table est celui de la table suivi de _id
	protected $_etat;  // l etat 1 correspond a l etat actif et 0 (zero) etat inactif
	protected $_lang;  // la langue par defaut est le francais
	protected $_rules = array(); // les regle que doivent respecter les donnees pour etre valide 
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('inflector');
        
        if(!$this->_table){
			$this->_table = strtolower(get_class($this));
			
		}
		if(!$this->_id){
			
			$this->_id = $this->_table.'_id';
		}
		if(!$this->_etat){
			$this->_etat = $this->_table.'_status';
		} 
		if($this->config->item($this->_table)){
			$this->_rules = $this->config->item($this->_table) ; 
		}
		
    }
    
    
    /*
     * data_validate($data, $rules=NULL) permet de valider les donnee avant des les stocker dans la BD
     * $data est la donnée a valider 
     * $rules est l ensemble de regle stocké dans le fichier de configuration de regle
     * 
     */
	public function data_validate($data, $rules=NULL){
		 if(
			!empty($data) && 
			is_array($data) &&
			is_string($rules)
		   ){
				foreach($data as $key=>$value){
					$_POST[$key] = $value;
				}
				$this->form_validation->set_rules($this->config->item($rules));
				return $this->form_validation->run();
			}else{
				return false ;         
			}
	} 
	
	
	/*
	 * function post_validate(@param1, @param2)
	 * @param1 is an array of all the post values to checkdate
	 * @param2 is the name of the rule as it is in the data_rule configuration file 
	 * @return true if validation OK 
	 * @return false if validation not OK 
	 * 
	 */
	public function post_validate($post, $rules=NULL){
		$CI =& get_instance();
		if(is_array($post) && !empty($post) ){
			$i = 0;
			while(list($key, $value)= each($post)){
				if($CI->input->post($value) === FALSE){
					return FALSE;
				}
                                $i = $i +1;
			}
			if($i == count($post)){
				
				if(is_null($rules) || !isset($rules)){
                                       
					$rule = $this->_rules ;
                                  
				}else{
					$rule = $rules;
				}
                               
				$CI->form_validation->set_rules($rule);
				if($CI->form_validation->run() === FALSE){
                                
                                   return FALSE ;
                                }else{
                                
                                  return TRUE;
                                }
			}else{
				return FALSE;
			}
			
		}else{
			return FALSE;
		}
	}
	
	
    /*
     * count() permet de compter le nombre total d entrée d une table 
     * dans une base de donnée
     */
     
    public function count($condition=null) {
		if($condition != null){
			$query = $this->db->get_where($this->_table, $condition);
			return $query->num_rows();
		}
    }
    
    
    /*
     * get_record() permet de lire dans une table les valeurs avec etat == 1
     * get_record($limite) permet de lire un nombre limite d elements de status == 1
     * @limite est le nombre d element a recuperer
     * get_record($condition) 
     * @condition est un tableau de condition
     * get_record($condition, $limite) 
     * @limite est la limite du nombre d element a recuperer
     */
    
    public function get_record() {

		// aucun parametre passe a la fontion 
        if(func_num_args() == 0){
            $query = $this->db->get_where($this->_table, array($this->_etat => 1));
        }else{
         
			// Si on a un parametre numerique alors ce parametre est la limite 
			if(func_num_args() == 1 && is_numeric(func_get_arg(0))){
			$query = $this->db->get_where($this->_table, array($this->_etat => 1),func_get_arg(0));
			
			}
		
			// si on a un tableau en parametre ( ce tableau est la condition)  
			if(func_num_args() == 1 && is_array(func_get_arg(0))){
				$query =  $this->db->get_where($this->_table, func_get_arg(0));
			
			}
        
			// si on a un tableau et un entier en parametre ( le tableau est la condition et l entier la limite)
			/* if(func_num_args() == 2 && is_array(func_get_arg(0)) && is_numeric(func_num_args(1))){
				$query = $this->db->get_where($this->_table, func_num_args(0),func_num_args(1) );
			
			}*/
        
			//////////////////////////////////////////////////////////////////////////////////////////////////////
			//si on a deux tabeaux alors le premier est la condition et le second la liste de colonnes a recuperer
			if(func_num_args() == 2 && is_array(func_get_arg(0)) && is_array(func_get_arg(1))){
				$this->db->select(func_get_arg(1));
				$this->db->where(func_get_arg(0));
				$query = $this->db->get($this->_table);
			}
		
			//si on a deux tabeaux et un entier alors le premier est la condition et le second la liste de colonnes a recuperer
			// et l entier la limite (le nombre ) d' element a recuperer
			if(func_num_args() == 3 && is_array(func_get_arg(0)) && is_array(func_get_arg(1)) && is_numeric(func_get_arg(2))){
			
				$this->db->select(func_get_arg(1));
				$this->db->where(func_get_arg(0));
				$query = $this->db->get($this->_table, func_get_arg(2));
			}
			///////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		return $query->result_array();
    }
	
	
	
	
	//recupere tous ceux qui ne sont pas dans le tableau $cond
	public function get_off_record($cond){  
        if(count($cond) >= 2){
			$i = 0;
			foreach($cond as $val){
				$this->db->where(array($val[0] => $val[1]));
			}
        }
     
		$query = $this->db->get($this->_table);
		return $query->result_array();
    }
	
	
	public function get_or_record($cond, $like=FALSE){
		if(count($cond) >=2){
			$i = 0;
			foreach($cond as $key=>$val){
				if($like){
					if($i == 0){
					$this->db->like(array($key => $val));
					$i = $i +1;
				}else{
					$this->db->or_like(array($key => $val));
				}
				}else{
					if($i == 0){
					$this->db->where(array($key => $val));
					$i = $i +1;
				}else{
					$this->db->or_where(array($key => $val));
				}
				}
			}
		}
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	
	
	/*
	 * get_sort_record permet d avoir les resultat trie en fonction d'une colonne donnee de la table
	 * si @param est un tableau : array(col1=>direc1, col2=>direc2, ...)
	 * si @param est une chaine : une colonne trie dans l ordre croissant
	 * si pas de @param alors get_sort_record == get_record() ( sans parametre )
	 * @col represente la colonne sur la quelle le tri sera base 
	 * @direc est : DESC, ASC 
	 */
	public function get_sort_record($col_direc){
		if(is_array($col_direc)){
			foreach($col_direc as $col => $direc){
				$this->db->order_by($col, $direc);
			}
			$query = $this->db->get($this->_table);
		}elseif(is_string($col_direc)){
			$this->db->order_by($col_direc,'ASC');
			$query = $this->db->get($this->_table);
		}else{
			$this->get_record();
		}	
		return $query->result_array();
	}
	
	/*
	 * 
	 * 
	 * 
	 */
	 public function search(){
		 if(func_num_args() == 1){
			$requet = func_get_arg(0);
			$query = $this->db->query($requet);
			return $query->result_array() ;
		}	 
	}
	
	
    /**
	*Fonction de recherche generique dans une table
	*search($arg)
	* $arg est un tableau contenant les chaines de caractere a chercher
	* et sa valeur le chaine generique  
	* $arg ===> array('nom_argument'=>'chaine de recherche');
	**/
	public function search_requet($arg, $champ=NULL){
		
		if(isset($champ) && !is_null($champ)){
                        $requet = "select  ";
			if($champ && is_array($champ)){
				$taille = count($champ);
				$i = 0;
				while($i< $taille-1){
					$requet = $requet."  ".$champ[$i].' , ';
					$i++;
				}
				$requet = $requet.$champ[$taille-1]." from ".$this->_table ;
			
                        }elseif(is_string($champ)){
				$requet = "select ".$champ." from ".$this->_table;
			}else{
				 $requet = "select * from  ".$this->_table;
			}
                }else{
                     $requet = "select *  form ".$this->_table;
                 
                }
                if(isset($arg) && !empty($arg) && is_array($arg)){
		   $i = 0;
		   foreach($arg as $key =>$value){
		        $pos = strpos($key,'id_');
			if($i == 0){
                            if($pos === 0){
                               $requet = $requet." where  ".$key."= ". $value;
                            }elseif($pos === FALSE){
			       $requet = $requet." where ".$key." like '%".$value."%' ";
                            }
			}else{
			    if( $pos === 0){
                               $requet = $requet." and ".$key."= ". $value;
                            }elseif($pos === FALSE){
			       $requet = $requet." or ".$key." like '%".$value."%' ";
                            }
                                        
			}
			$i = $i +1;
	          }
		  $query = $this->db->query($requet);
		  
                 return $query->result_array() ;
                   
                 
	       }else{
		   $query = $this->db->get($this->_table);
		    
                   return $query->result_array();
	      }
                
	}
         
	
	/*
	 * seach a given argument base on the match of a string on a specific colonne
	 * @param : $arg is an array --  array(
	 * 										array('colonne','match_value','howto_math'), 
	 * 										array('colonne2','match_value2','howto_math2'), 
	 * 										array('colonne3','match_value3','howto_math3')
	 * 									 )
	 * howto_match { 'before', 'after', 'both'}
         * arg_and is an array('colone'=> 'value') just like condition
	 */
	public function search_match_or($arg, $arg_and=NULL){
		if(!empty($arg)) {
			$i = 0;
			$argument = $arg[$i];
			$requet = "select * from ".$this->_table;
			if($argument[2] == 'before'){
				$requet = $requet." where ".$argument[0]." like '%".$argument[1]."' ";
			}elseif($argument[2] == 'after'){
				$requet = $requet." where ".$argument[0]." like '".$argument[1]."%' ";
			}elseif($argument[2] == 'both'){
				$requet = $requet." where ".$argument[0]." like '%".$argument[1]."%' ";
			}
			$i = $i + 1;
			if(is_null($arg_and)){
				while($i < count($arg)){
					$argument = $arg[$i];
					if($argument[2] == 'before'){
						$requet = $requet."  or  ".$argument[0]." like '%".$argument[1]."' ";
					}elseif($argument[2] == 'after'){
						$requet = $requet."  or  ".$argument[0]." like '".$argument[1]."%' ";
					}elseif($argument[2] == 'both'){
						$requet = $requet."  or  ".$argument[0]." like '%".$argument[1]."%' ";
					}
					$i=$i+1;
				}
			}else{
				if(isset($arg_and) && !is_null($arg_and) && is_array($arg_and)){
					$requet = $requet." and"; 
					$j = 0;
                    foreach($arg_and as $key=>$value){
                        $requet = $requet." ".$value."= '".$key." '";
						$j++;
						if(count($arg_and)> $j){
							$requet = $requet." or";
						}
                    }
                }
			}
		}
		$query = $this->db->query($requet);
		return $query->result_array() ;
	}
	
	
	/*
		Permet de faire la jointure entre  deux tables ( la table de la classe et celle passée en parametre $join
		$row1 et $row2 sont des colonne de correspondance) 
	*/
	public function get_joind($join, $row1, $row2, $condition = NULL){
		if(empty($condition)){
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->join($join, $row1.'='.$row2);
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->where($condition); 
			$this->db->join($join, $row1.'='.$row2);
			$query = $this->db->get();
			return $query->result_array();
		}
		
	}
    
	public function add_record($data){
                $table = $this->_table; 
		if($this->db->insert($table, $data)){
	           return TRUE;
		}else{
		   return FALSE;
		}
    }
    
    public function get_max($row){
        if($this->db->select_max($row)){
			$query = $this->db->get($this->_table);
            return $query->result_array();
        }  else {
            return FALSE;
        }
    }
    
    public function exist_record($param) {
       $query = $this->db->get_where($this->_table, $param);
        if($query->num_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function update_record($data, $condition) {
       $this->db->where($condition);
       $this->db->update($this->_table,$data);
       return true;
    }
    
    /*
     * Fontion permet de supprimer une entree  dans la base de donnee
     * $condition est la contion que doit remplir la ligne a supprimer
     */
    public function delet_row($condition) {
		$data = array($this->_etat => 0);
        $this->db->where($condition);
        $this->db->update($this->_table, $data);
        return true;
    }
    /*
     * Fontion permet de supprimer une entree  dans la base de donnee
     * $condition est la contion que doit remplir la ligne a supprimer
     */
    public function delete_row($condition) {
        $this->db->where($condition);
        $this->db->delete($this->_table);
        return true;
    }
   
   
	public function get_distinct_record($distinct_colonne, $order_colonne, $type_order ){
		$requet = "SELECT DISTINCT ".$distinct_colonne." FROM ".$this->_table." ORDER BY ".$order_colonne." ".$type_order;
		$query = $this->db->query($requet);
		return $query->result_array();
	}
    
}
