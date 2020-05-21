<?php 
	class Get_Model extends CI_Model{
		
		function getCity(){

		}

		function getState($id){
			$this->db->where('country_id', $id);
			return $this->db->get("state")->result_array();
		}

		function getCountry(){
			return $this->db->get("country")->result();		
		}
		function getDoctor()
		{
			return $this->db->get("doctor_information")->result();
		}
		function getHospital()
		{
			return $this->db->get("hospital_information")->result();
		}
		function getDoctorSpeciality()
		{
			return $this->db->get("speciality")->result();
		}

		function getHospitalSpeciality()
		{
			return $this->db->get("speciality")->result();
		}
		public function searchDoctor($sql)
	{
	   $result=$this->db->query($sql);
        
        return $result->result_array();

	}

	public function searchMedicine($sql)
	{
	   $result=$this->db->query($sql);
        
        return $result->result_array();
		
	}
	public function searchPatient($sql){
		 $result=$this->db->query($sql);
        
        return $result->result_array();
	}
	public function getDoctorSpeciality1(){
		 $this->db->get("speciality");
		 return $this->db->get("doctor_speciality")->result();


	}

		
		
		

		function customQuery($sql){
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		function customQuery_insert($sql){
			$query = $this->db->query($sql);
			//return $query->result_array();
			//$query1 = $this->db->query($sql1);

		}
		function customQuery_insert1($sql){
			//	$query = $this->db->query($sql);
			//return $query->result_array();
			$query = $this->db->query($sql);

		}
		function customQuery_insert2($sql){
			//	$query = $this->db->query($sql);
			//return $query->result_array();
			$query = $this->db->query($sql);

		}
		function customQuery_insert3($sql){
			//	$query = $this->db->query($sql);
			//return $query->result_array();
			$query = $this->db->query($sql);

		}
function getMedicineCategory()
		{
			return $this->db->get("medicine_category")->result_array();
		}

	}

?>