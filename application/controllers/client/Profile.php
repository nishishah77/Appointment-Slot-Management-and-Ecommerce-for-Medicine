<?php

class Profile extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    	
    	$this->load->model('client/Get_Model');
    	$this->Get_Model->checkSess();
	}
	public function index()
	{
		$data["active"]=1;
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;
		$result = $this->Get_Model->getCountry();
		$data['countryList'] = $result;
		$result = $this->Get_Model->State();
		$data['stateList'] = $result;
		$result = $this->Get_Model->City();
		$data['cityList'] = $result;

		if(isset($_SESSION['doctor_id']))
		{
		$result = $this->Get_Model->getDoctorById($_SESSION['doctor_id']);
		$data['doctorList'] = $result;
		}
		if(isset($_SESSION['patient_information_id']))
		{

		$result = $this->Get_Model->getPatientById($_SESSION['patient_information_id']);
		$data['patientList'] = $result;		
		$result = $this->Get_Model->getPatientMedicalById($_SESSION['patient_information_id']);
		$data['patientMedicalList'] = $result;		

		}
		if(isset($_SESSION['hospital_id']))
		{		
		$result = $this->Get_Model->getHospitalById($_SESSION['hospital_id']);		
		$data['hospitalList'] = $result;
		}


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;

		$this->load->view("client/Profile",$data);
	}

	public function Changepassword()
	{
		$data["active"]=1;
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		$this->load->view("client/Changepassword.php",$data);
	}
	public function myappointment()
	{
		$data["active"]=1;
		$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
				$date = date('Y-m-d', time());

		$data['AppointmentList']=$this->Get_Model->getAppointments($date);
		if(isset($_SESSION['patient_information_id']))
		{
		$data['PatientAppointmentList']=$this->Get_Model->getPatientAppointments($_SESSION['patient_information_id']);
		}
		$this->load->view("client/myappointment",$data);
	}

	function UpdateRate(){

		extract($_POST);
		$rate= $this->Get_Model->final_rate($doctor_id);
		$final_rate = ($rate+$rating)/2;
		
		$sql="update doctor_information set rate=$final_rate where doctor_id = $doctor_id";
		$this->Get_Model->updateData($sql);

	}
	function deleteappointment(){

		extract($_POST);

		$sql="update appointment set is_delete=1 where appointment_id = $id";
		$this->Get_Model->updateData($sql);
	
	}
	public function Add()
	{
		//$data['page_name_1']='Patient';
		//$data['page_name']='Add';
		//$data['admin_name']=$this->session->admin_name;
		//print_r($data['countryList']);
		//$result =$this->Get_Model->getDoctor();
		//$data['docList'] = $result;
				$data['adminimg']=$this->session->adminimg;

		$this->load->view("client/Profile",$data);
	}
	function modify(){
		if(isset($_SESSION['patient_information_id']))
		{
		
		$img="";
	$fname=$mname=$lname=$gender=$address=$pincode=$city=$state=$country=$marital_status=$dob=$patientimg=$newDate=$height=$weight=$allergy=$genaticdis=$bloodgrp=$dateofbirth="";

		extract($_POST);
		if(isset($_GET['modify']) && $_GET['modify']=="profile_personal")
		{
			
			$fname=$mname=$lname=$gender=$address=$pincode=$city=$state=$country=$marital_status=$dateofbirth=$img="";
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
         
  
			   
                $newDate = date("Y-m-d", strtotime($dateofbirth));

			$data = array(
			        'patient_first_name' => $fname,
			        'patient_middle_name' => $mname,
			        'patient_last_name' => $lname,
 			       'gender' => $gender,
			        'address' => $address,
			        'pincode' => $pincode,
			        'country' => $country,
			        'state' => $state,
			        'city' => $city,
			        'marital_status' => $marital_status,
			        'patientimg' => $img,
			        'date_of_birth'=>$newDate
			);

			$this->Get_Model->updateData2('patient_information',$data,'patient_information_id',$patient_information_id);
		
		}
		if(isset($_GET['modify']) && $_GET['modify']=="profile_medical")
		{	
			$height=$weight=$bloodgrp=$allergy=$genaticdis="";
			

			extract($_POST);

			$data = array(
			        'height' => $height,
			        'weight' => $weight,
			        'bloodgroup' => $bloodgrp,
			        'allergy' => $allergy,
			        'genetic_disease' => $genaticdis
			        
			);
			
		
			$this->Get_Model->updateData2('patient_medical_information',$data,'patient_information_id',$patient_information_id);
		}
      echo("<script> { alert('Your Details Are Modified Successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile'); }</script>");


		
     	}

     	if(isset($_SESSION['doctor_id']))
     	{
     	$img="";
     	$name=$address=$pincode=$city=$state=$country=$dateofbirth=$contactno=$speciality=$qualification=$experience=$consultancy_fees=$doctorimg=$dateofbirth=$gender="";
			extract($_POST);
	        unlink(FCPATH."doctorimg/".$image);
			$img=$_FILES['doctorimg']['name'];
			move_uploaded_file($_FILES['doctorimg']['tmp_name'],'doctorimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/doctorimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 15000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('doctorimg'))
                {
                	$data = array('uplod_data' => $this->upload->data());
               }
         
			
               $newDate = date("Y-m-d", strtotime($dateofbirth));

			$data = array(
			        'doctor_name' => $name,
			        'qualification' => $qualification,
			        'specialty' => $speciality,
			        'contact_number' => $contactno,
			        'date_of_birth' => $newDate,
			        'address' => $address,
			        'gender' => $gender,
			        'consultancy_fees' => $consultancy_fees,
			        'pincode' => $pincode,
			        'country' => $country,
			        'state' => $state,
			        'city' => $city,			        
			        'experience' => $experience,			 
			        'doctorimg' => $img
			        
			);

			$this->Get_Model->updateData2('doctor_information',$data,'doctor_id',$doctor_id);

			    echo("<script> { alert('Your Details Are Modified Successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile'); }</script>");


     	}

     	if(isset($_SESSION['hospital_id']))
     	{
     		$img="";
     		$name=$address=$contactno=$city=$state=$country=$speciality=$hospitalimg="";
     	extract($_POST);
		unlink(FCPATH."hospitalimg/".$image);
			$img=$_FILES['hospitalimg']['name'];
			move_uploaded_file($_FILES['hospitalimg']['tmp_name'],'hospitalimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/hospitalimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 15000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('doctorimg'))
                {
                	$data = array('upload_data' => $this->upload->data());

                     
                 
                }


			$data = array(
			        'hospital_name' => $name,
			        'address' => $address,
			        'contact_number' => $contactno,
			        'speciality_id'=>$speciality,
			        'country' => $country,
			        'state' => $state,
			        'city' => $city,
			        'hospitalimg' => $img
			        

			        
			);
			$this->Get_Model->updateData2('hospital_information',$data,'hospital_id',$hospital_id);

			echo("<script> { alert('Your Details Are Modified Successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile'); }</script>");


     	}

		
}

function do_upload()
        {
        	   // $base=base_url();
                $config['upload_path']          = '/hugsanddrugs/patientimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('imgfile'))
                {
                	$data = array('upload_data' => $this->upload->data());

                     
                 
                }
        }
		public function uploadPrescription()
		{
			extract($_POST);
			$prescriptionFile = $_FILES['prescription']['name'].time();
			move_uploaded_file($_FILES['prescription']['tmp_name'],'prescription/'.$prescriptionFile); 

                $config['upload_path']          = '/hugsanddrugs/prescription/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 15000;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('prescription'))
                {
                	$data = array('upload_data' => $this->upload->data());
                }
         
  
			   
                

			$data = array(
			        'prescription' => $prescriptionFile
			       
			);

			$this->Get_Model->updateData2('appointment',$data,'appointment_id',$id);



		}       
  //       public function update_profile()
  //       {
  //       	extract($_POST);

  //      	$originalDate = $date_of_birth;
		// $newDate = date("Y-m-d", strtotime($originalDate));

  //       	$sql = "update patient_information set patient_first_name='".$first_name."',patient_middle_name='".$middle_name."',patient_last_name='".$last_name."',date_of_birth='".$newDate."',country=$country,state=$state,city=$city,gender='".$gender."',address='".$address."',pincode=$pincode,marital_status='".$marital_status."',patientimg='".$image."' where patient_information_id=".$_SESSION['patient_information_id'];

  //       	$this->Get_Model->update_profile($sql);
  //       }

       public function new_password(){

       		extract($_POST);

			$password=$_SESSION['password'];

			

			$result = password_verify($old_pass,$password);

			
			if($result==1){
				echo $result;
				$new = password_hash($new_pass, PASSWORD_DEFAULT);


			$data = array(
			        'password' => $new,
			        
			);

			if(isset($_SESSION['patient_information_id']))
			{
				$table="patient_information";
				$id = $_SESSION['patient_information_id'];
				$column = "patient_information_id";

			}
			if(isset($_SESSION['doctor_id']))
			{
				$table="doctor_information";
				$id = $_SESSION['doctor_id'];
				$column = "doctor_id";
			}
			if(isset($_SESSION['hospital_id']))
			{
				$table="hospital_information";
				$id = $_SESSION['hospital_id'];
				$column = "hospital_id";
			}

			$this->Get_Model->updateData2($table,$data,$column,$id);
			$this->Get_Model->password_changed_send_mail($email,$new_pass);
			echo("<script> { alert('Your Details Are Modified Successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile'); }</script>");
				}

			
		}
	


}

?>