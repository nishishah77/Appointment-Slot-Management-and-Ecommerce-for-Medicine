
<?php
	class Doctor_Model extends CI_Model {

		function insert($params){
			$fields = array("doctor_name","qualification","speciality","date_of_birth","gender","address","pincode","country","state","city","contactnumber","consultancyfee","contact_number","rate","experience","password");
			// insert into patient_information()
			$this->db->insert("doctor_information" ,$params);
		
				$insert_id = $this->db->insert_id();
			 	return $insert_id;

		}
		public function getDataById($table,$id){
				$this->db->where('doctor_id',$id);
				$result=$this->db->get($table);
				return $result->result();
		}

			//get data
		public function getData($table){
			$records=$this->db->get($table);
			return $records->result();	
		}
		public function deleteData($table,$col_name,$id){
		$this->db->delete($table,array($col_name=>$id));	
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