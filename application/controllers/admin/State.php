<?php

class State extends CI_Controller
{
		public function __construct(){
		parent::__construct();
    	$this->load->model('State_Model');
    	$this->load->model('Country_Model');
    	$this->load->model('Get_Model');
    	$this->load->helper(array('form','url'));

	}

	 public function Add()
    {
    	//$data['active']='5';
		$data['page_name_1']='State';
		$data['page_name']='Add';
		$result = $this->Get_Model->getCountry();
		$data['countryList'] = $result;
		$data['admin_name']=$this->session->admin_name;
		$data['adminimg']=$this->session->adminimg;

    	$this->load->view("admin/State-Add",$data);
    }
    public function View(){


		$data['page_name_1']='State';
		$data['page_name']='View';
				$data['admin_name']=$this->session->admin_name;
						$data['adminimg']=$this->session->adminimg;


		$this->load->view("admin/State-View",$data);
	}
	public function Edit(){	
		$data['page_name_1']='State';
		$data['page_name']='Edit';
				$data['admin_name']=$this->session->admin_name;


						 $id=$_REQUEST['id'];

		//$data['hospitalList'] = $this->Hospital_Model->getDataById('hospital_information',$id);

		$data['countryList'] = $this->Country_Model->getData('country');
	 $data['stateList'] = $this->State_Model->getDataById('state',$id);
				 //$data['cityList'] = $this->Hospital_Model->getData('city');
	   // $result =$this->Get_Model->getHospitalSpeciality();
	    		$data['adminimg']=$this->session->adminimg;

		//$data['HospitalSpecialityList'] = $result;

		$this->load->view("admin/State-Edit",$data);
	}
	public function Delete()
{
	$id=$_POST['id'];
	$isd=1;
	$this->State_Model->deleteData('state','is_delete',$isd,'state_id',$id);

	//$this->Hospital_Model->deleteData('hospital_information','hospital_id',$id);
}
    function insert(){
		extract($_POST);

		
		$data = array("state_name"=>$state_name,
					  "country_id"=>$country
					);
		$this->State_Model->insertData('state',$data);

		
		echo("<script> { alert('state added successfully!!'); window.location.replace('http://localhost/hugsanddrugs/admin/state/Add'); }</script>");

		$this->load->view("admin/state-Add",$data);
	}

	function update(){
			extract($_POST);	
			$data = array(
			        'state_name' => $state_name,
			        'country_id' => $country


			        
			        
			);

			$this->State_Model->updateData('state',$data,'state_id',$state_id);
			
		}
	
}