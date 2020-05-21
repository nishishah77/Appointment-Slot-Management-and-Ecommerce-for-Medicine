<?php
	class Hospital_Model extends CI_Model {

		function insert($params){
			$fields = array("hospital_name","address","country","state","city");
			// insert into patient_information()
			$this->db->insert("hospital_information",$params);
			
		}
		public function getDataById($table,$id){
				$this->db->where('hospital_id',$id);
				$result=$this->db->get($table);
				return $result->result();
			}

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