<?php

class country extends CI_Controller
{
		public function __construct(){
		parent::__construct();
    	$this->load->model('Country_Model');
    	$this->load->helper(array('form','url'));

	}

	 public function Add()
    {
    	//$data['active']='5';
		$data['page_name_1']='Country';
		$data['page_name']='Add';
		$data['admin_name']=$this->session->admin_name;
		$data['adminimg']=$this->session->adminimg;

    	$this->load->view("admin/Country-Add",$data);
    }
    public function View(){

		$data['page_name_1']='Country';
		$data['page_name']='View';
				$data['admin_name']=$this->session->admin_name;
						$data['adminimg']=$this->session->adminimg;


		$this->load->view("admin/Country-View",$data);
	}
	public function Edit(){	
		$data['page_name_1']='Country';
		$data['page_name']='Edit';
				$data['admin_name']=$this->session->admin_name;


						 $id=$_REQUEST['id'];

		//$data['hospitalList'] = $this->Hospital_Model->getDataById('hospital_information',$id);

		$data['countryList'] = $this->Country_Model->getDataById('country',$id);
				// $data['stateList'] = $this->Hospital_Model->getData('state');
				 //$data['cityList'] = $this->Hospital_Model->getData('city');
	   // $result =$this->Get_Model->getHospitalSpeciality();
	    		$data['adminimg']=$this->session->adminimg;

		//$data['HospitalSpecialityList'] = $result;

		$this->load->view("admin/Country-Edit",$data);
	}
	public function Delete()
{
	$id=$_POST['id'];
	$isd=1;
	$this->Country_Model->deleteData('country','is_delete',$isd,'country_id',$id);

	//$this->Hospital_Model->deleteData('hospital_information','hospital_id',$id);
}
    function insert(){
		extract($_POST);

		
		$data = array("country_name"=>$country_name);
		$this->Country_Model->insertData('country',$data);

		
		echo("<script> { alert('Country added successfully!!'); window.location.replace('http://localhost/hugsanddrugs/admin/country/Add'); }</script>");

		$this->load->view("admin/Country-Add",$data);
	}

	function update(){
		if(isset($_POST['next1'])){
			$country_name=$_POST['country_name'];
			
			$id=$_POST['country_id'];


			$data = array(
			        'country_name' => $country_name


			        
			        
			);

			$this->Country_Model->updateData('country',$data,'country_id',$id);
			}
	}
}