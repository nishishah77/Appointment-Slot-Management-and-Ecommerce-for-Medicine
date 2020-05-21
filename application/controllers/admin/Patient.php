<?php

class Patient extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    	$this->load->model('Patient_Model');
    	$this->load->model('Get_Model');
    	$this->load->model('Admin_Model');
    	$this->Admin_Model->checkSess();

    	$this->load->helper(array('form','url'));


	}
	
	

	public function Add()
	{
		$data['page_name_1']='Patient';
		$data['page_name']='Add';
		$data['admin_name']=$this->session->admin_name;
		$result = $this->Get_Model->getCountry();
		$data['countryList'] = $result;
		$result =$this->Get_Model->getDoctor();
		$data['docList'] = $result;
				$data['adminimg']=$this->session->adminimg;

		$this->load->view("admin/Patient-Add",$data);
	}

	

	public function Edit()
	{
		$data['page_name_1']='Patient';
		$data['page_name']='Edit';
		$data['admin_name']=$this->session->admin_name;
				 $id=$_REQUEST['id'];
				 $data['patientList'] = $this->Patient_Model->getDataById('patient_information',$id);
				 $data['countryList'] = $this->Patient_Model->getData('country');
				 $data['stateList'] = $this->Patient_Model->getData('state');
				 $data['cityList'] = $this->Patient_Model->getData('city');
				 $data['docList'] = $this->Patient_Model->getData('doctor_information');

				 $data['patientMedicalInfo'] = $this->Patient_Model->getDataById('patient_medical_information',$id);
				 
				 		$data['adminimg']=$this->session->adminimg;

		

			//	$data['patientList']=$result;
			
		//	}else{
		//		    		$result = $this->Get_Model->customQuery($query);
				    	//	$data['patientList']=$result;
		//	}
		$this->load->view("admin/Patient-Edit",$data);
		
	}
	public function Profile()
	{
		$data['page_name_1']='Patient';
		$data['page_name']='Profile';
		$data['admin_name']=$this->session->admin_name;
				 $id=$_REQUEST['id'];
				 $data['patientList'] = $this->Patient_Model->getDataById('patient_information',$id);
				 $data['countryList'] = $this->Patient_Model->getData('country');
				 $data['stateList'] = $this->Patient_Model->getData('state');
				 $data['cityList'] = $this->Patient_Model->getData('city');
				 $data['docList'] = $this->Patient_Model->getData('doctor_information');

				 $data['patientMedicalInfo'] = $this->Patient_Model->getDataById('patient_medical_information',$id);
				$data['adminimg']=$this->session->adminimg;


			//	$data['patientList']=$result;
			
		//	}else{
		//		    		$result = $this->Get_Model->customQuery($query);
				    	//	$data['patientList']=$result;
		//	}
		$this->load->view("admin/Patient-Profile",$data);
		
	}
	// public function Delete()
	// {
	// 	$id=$_POST['id'];
	// 			$data['adminimg']=$this->session->adminimg;

	// 	$this->Patient_Model->deleteData('patient_information','patient_information_id',$id);
	// }
	public function View()
	{
		$data['page_name_1']='Patient';
		$data['page_name']='View';

		$data['admin_name']=$this->session->admin_name;
		$data['adminimg']=$this->session->adminimg;

		$this->load->view("admin/Patient-View",$data);
	}
		
		
	function insert(){
		
		extract($_POST);
			$img=$_FILES['patientimg']['name'];
			move_uploaded_file($_FILES['patientimg']['tmp_name'],'patientimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/patientimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 15000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('patientimg'))
                {
                	$data = array('upload_data' => $this->upload->data());

                     
                 
                }

                $password = password_hash($password,PASSWORD_DEFAULT);

		//pateint_info
		$data = array("patient_first_name"=>$first_name,"patient_middle_name"=>$middle_name,"patient_last_name"=>$last_name,"mobile_number"=>$mobile,"email_id"=>$email,"password"=>$password,"date_of_birth"=>$dateofbirth,"gender"=>$gender,"address"=>$address,"pincode"=>$pincode,"country"=>$country,"state"=>$state,"city"=>$city,"marital_status"=>$marital_status,"patientimg"=>$img);
		$patient_last_id = $this->Patient_Model->insert($data);

		//pateint_madical_info
		$sql="insert into patient_medical_information(`patient_information_id`, `height`, `weight`, `bloodgroup`, `allergy`, `genetic_disease`)values('$patient_last_id','$height','$weight','$bloodgroup','$allergy','$genaticdis')";
		$this->Get_Model->customQuery_insert($sql);	

		//pateint_disease_info
		
       
       echo("<script> { alert('patient added successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/admin/Patient/Add'); }</script>");


		$this->load->view("admin/Patient-Add");

       
}

function update(){
		$img="";
		extract($_POST);
			unlink(FCPATH."patientimg/".$image);
			$img=$_FILES['patientimg']['name'];
			move_uploaded_file($_FILES['patientimg']['tmp_name'],'patientimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/patientimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 15000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('patientimg'))
                {
                	$data = array('upload_data' => $this->upload->data());

                     
                 
                }
         
  
			
			$data = array(
			        'patient_first_name' => $first_name,
			        'patient_middle_name' => $middle_name,
			        'patient_last_name' => $last_name,
			        'mobile_number' => $mobile,			        		   
			        'gender' => $gender,
			        'address' => $address,
			        'pincode' => $pincode,
			        'country' => $country,
			        'state' => $state,
			        'city' => $city,
			        'marital_status' => $marital_status,
			        'patientimg' => $img,
			        'email_id'=>$email,
			        'password'=>$password,
			        'date_of_birth'=>$dateofbirth,
			        'marital_status'=>$marital_status,

			        
			);

			$this->Patient_Model->updateData('patient_information',$data,'patient_information_id',$patient_id);

			$data = array(
			        'height' => $height,
			        'weight' => $weight,
			        'bloodgroup' => $bloodgroup,
			        'allergy' => $allergy,
			        'genetic_disease' => $genaticdis
			        
			);
			

			$this->Patient_Model->updateData('patient_medical_information',$data,'patient_information_id',$patient_id);



			echo("<script> { window.location.replace('http://localhost:8080/hugsanddrugs/admin/Patient/edit?id=".$patient_id."'); }</script>");
	}
	public function Delete()
{
	$id=$_POST['id'];
	$isd=1;
				$sql="select patientimg from patient_information where patient_information_id=$id";
		$result=$this->Get_Model->customQuery($sql);
		foreach($result as $image)
		{
			$deleteimg = $image['patientimg'];
		}
		unlink(FCPATH."patientimg/".$deleteimg);

	$this->Patient_Model->deleteData('patient_information','is_delete',$isd,'patient_information_id',$id);

	
}
public function search()
	{
		extract($_REQUEST);
		$sql="select * from patient_information p,city c where p.city = c.city_id and p.is_delete=0 and (patient_first_name like '%$search%' or patient_middle_name like '%$search%' or patient_last_name like '%$search%' or date_of_birth like '%$search%' or gender like '%$search%' or mobile_number like'%$search%' or address like '%$search%' or city like '%$search%' or email_id like '%$search%') ";	
		
		

		$result=$this->Get_Model->searchPatient($sql);
		$data['patientList']=$result;
			if(sizeof($result)>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');
			echo json_encode($data);

	}
}

?>