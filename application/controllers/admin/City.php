<?php

class City extends CI_Controller
{
		public function __construct(){
		parent::__construct();
    	$this->load->model('State_Model');
    	$this->load->model('Country_Model');
    	$this->load->model('City_Model');
    	$this->load->model('Get_Model');
    	$this->load->helper(array('form','url'));

	}

	 public function Add()
    {
    	//$data['active']='5';
		$data['page_name_1']='City';
		$data['page_name']='Add';
		
		$result = $this->Get_Model->customQuery("select * from state where is_delete=0 and is_active=1");
		$data['stateList']=$result;
		$data['admin_name']=$this->session->admin_name;
		$data['adminimg']=$this->session->adminimg;

    	$this->load->view("admin/City-Add",$data);
    }
    public function View(){


		$data['page_name_1']='City';
		$data['page_name']='View';
				$data['admin_name']=$this->session->admin_name;
						$data['adminimg']=$this->session->adminimg;


		$this->load->view("admin/City-View",$data);
	}
	public function Edit(){	
		$data['page_name_1']='City';
		$data['page_name']='Edit';
				$data['admin_name']=$this->session->admin_name;


						 $id=$_REQUEST['id'];

		//$data['hospitalList'] = $this->Hospital_Model->getDataById('hospital_information',$id);

		//$data['countryList'] = $this->Country_Model->getData('country');
	 $data['stateList'] = $this->State_Model->getData('state');
				 $data['cityList'] = $this->City_Model->getDataById('city',$id);
	   // $result =$this->Get_Model->getHospitalSpeciality();
	    		$data['adminimg']=$this->session->adminimg;

		//$data['HospitalSpecialityList'] = $result;

		$this->load->view("admin/City-Edit",$data);
	}
	public function Delete()
{
	$id=$_POST['id'];
	$isd=1;
	$this->City_Model->deleteData('city','is_delete',$isd,'city_id',$id);

	//$this->Hospital_Model->deleteData('hospital_information','hospital_id',$id);
}
    function insert(){
		extract($_POST);

		
		$data = array("city_name"=>$city_name,
					  "state_id"=>$state
					);
		$this->City_Model->insertData('city',$data);

		
		//echo("<script> { alert('city added successfully!!'); window.location.replace('http://localhost/hugsanddrugs/admin/city/Add'); }</script>");

		$this->load->view("admin/City-Add",$data);
	}

	function update(){
			extract($_POST);	
			$data = array(
			        'city_name' => $city_name,
			        'state_id' => $state


			        
			        
			);

			$this->City_Model->updateData('city',$data,'city_id',$city_id);
			
		}
	
}