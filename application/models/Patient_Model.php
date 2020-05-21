<?php
	class Patient_Model extends CI_Model {

		function insert($params){
			$fields = array("patient_first_name","patient_middle_name","patient_last_name","mobile_number","email_id","password","retype_password","date_of_birth","gender","address","pincode","country","state","city","marital_status","patientimg");
			// insert into patient_information()
			$this->db->insert("patient_information",$params);
		
		
			  $insert_id = $this->db->insert_id();
			  return $insert_id;
			}


			public function getDataById($table,$id){
				$this->db->where('patient_information_id',$id);
				$result=$this->db->get($table);
				return $result->result();
			}

			//get data
	public function getData($table){
		$records=$this->db->get($table);
		return $records->result();	
	}
		//delete  data
	public function deleteData($table,$col,$data,$idcol,$id)
{

	$this->db->set($col,$data);
	$this->db->where($idcol,$id);
	$this->db->update($table);
}
	
			//update Data
	public function updateData($table,$data,$col_name_id,$id){
		//$this->db->set($col,$data);
		$this->db->where($col_name_id,$id);
		//$this->db->update($table);
		$this->db->update($table, $data);

	}



				
	}

?>