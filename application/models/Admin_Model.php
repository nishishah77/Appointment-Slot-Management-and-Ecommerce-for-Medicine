<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	//get data
	public function checkSess(){
		if(isset($this->session->admin_username)){
			return true;
		}else{
			
			echo("<script>{ 
					window.location.replace('http://localhost:8080/hugsanddrugs/admin/login?msg=LoginFailed');
					} </script>");
		}
	}
	public function getData($table){
		$records=$this->db->get($table);
		return $records->result();	
	}

	public function getTotalDoctors()
	{
		$query = $this->db->query("SELECT * FROM doctor_information where is_delete = 0");
		return $query->num_rows();
	}
	public function getTotalPatients()
	{
		$query = $this->db->query("SELECT * FROM patient_information where is_delete = 0");
		return $query->num_rows();
	}
	public function getTotalHospitals()
	{
		$query = $this->db->query("SELECT * FROM hospital_information where is_delete = 0");
		return $query->num_rows();
	}

	public function login($user,$pass,$check){
		$records=$this->db->get('admin')->result_array();
			foreach ($records as $row) {

				$u=$row['username'];
				$p=$row['password'];
				$image=$row['adminimg'];
				$name=$row['name'];
				$admin_id=$row['admin_id'];
				$email_Id = $row['email_Id'];
					//print_r($row);
				// echo("<script>{ alert('".$admin_id."-".$p."');
				// 	} </script>");

				if($u==$user && password_verify($pass, $p))
				{
					$this->load->helper('cookie');
					set_cookie('admin_username',$u,14400);

					$this->session->sess_expiration = '14400';// expires in 4 hours
					$this->session->admin_username=$u;
					$this->session->admin_pass=$p;
					$this->session->adminimg=$image;
					$this->session->admin_name=$name;
					$this->session->admin_id=$admin_id;
					$this->session->admin_email=$email_Id;
					return true;
				}
				
			}
				
	}
	public function insertData($table,$data){
		$this->db->insert($table,$data);
	}

	//delete account
	public function deleteData($table,$col_name,$id){
		$this->db->delete($table,array($col_name=>$id));	
	}
}
?>