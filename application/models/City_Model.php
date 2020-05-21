<?php
	class City_Model extends CI_Model {

		public function insertData($table,$data){
		$this->db->insert($table,$data);
	}

		public function deleteData($table,$col,$data,$idcol,$id)
{

	$this->db->set($col,$data);
	$this->db->where($idcol,$id);
	$this->db->update($table);
}
			public function getDataById($table,$id){
				$this->db->where('city_id',$id);
				$result=$this->db->get($table);
				return $result->result();
			}
			public function updateData($table,$data,$col_name_id,$id){
		//$this->db->set($col,$data);
		$this->db->where($col_name_id,$id);
		//$this->db->update($table);
		$this->db->update($table, $data);

	}

	
	}

?>