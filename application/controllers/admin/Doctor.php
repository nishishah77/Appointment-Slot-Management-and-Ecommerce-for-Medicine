<?php  

class Doctor extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    	$this->load->model('Doctor_Model');
    	$this->load->model('Get_Model');
    	$this->load->model('Patient_Model');
    	$this->load->model('Hospital_Model');
    	$this->Admin_Model->checkSess();
	}


	public function Add(){
		$data['page_name_1']='Doctor';
		$data['page_name']='Add';
		$data['admin_name']=$this->session->admin_name;
		$data['adminimg']=$this->session->adminimg;

		$result = $this->Get_Model->getCountry();
		$data['countryList'] = $result;
		$result =$this->Get_Model->getDoctorSpeciality();
		$data['DoctorSpecialityList'] = $result;
		
		$result =$this->Get_Model->getHospital();
		$data['hospitalList'] = $result;
		$this->load->view("admin/Doctor-Add",$data);
	}

	public function Edit(){
		$data['page_name_1']='Doctor';
		$data['page_name']='Edit';
				$data['admin_name']=$this->session->admin_name;

		$id=$_REQUEST['id'];
    	$data['doctorList'] = $this->Doctor_Model->getDataById('doctor_information',$id);
		$data['hospitalList'] = $this->Hospital_Model->getData('hospital_information');

    	$data['countryList'] = $this->Doctor_Model->getData('country');
				 $data['stateList'] = $this->Doctor_Model->getData('state');
				 $data['cityList'] = $this->Doctor_Model->getData('city');
    	$data['drvisitinghosinfo'] = $this->Doctor_Model->getDataById('doctor_visiting_hospital',$id);
    	$result =$this->Get_Model->getDoctorSpeciality();
		$data['DoctorSpecialityList'] = $result;
		$data['adminimg']=$this->session->adminimg;
		$sql = "select hospital_id from doctor_visiting_hospital dvh,doctor_information d where d.doctor_id=dvh.doctor_id and d.doctor_id=$id ";
		$data['hospital_id_of_doctor'] = $this->Get_Model->customQuery($sql);

		$this->load->view("admin/Doctor-Edit",$data);
	}
	public function View(){
		$data['page_name_1']='Doctor';
		$data['page_name']='View';
				$data['admin_name']=$this->session->admin_name;
						$data['adminimg']=$this->session->adminimg;


		$this->load->view("admin/Doctor-View",$data);

	}
	public function Profile(){
		$data['page_name_1']='Doctor';
		$data['page_name']='Profile';
				$data['admin_name']=$this->session->admin_name;

		$id=$_REQUEST['id'];
		$sql="select * from doctor_information d,speciality s where d.doctor_id=$id and d.specialty = s.speciality_id";
		$data['doctorList'] = $this->Get_Model->customQuery($sql);
		$data['countryList'] = $this->Doctor_Model->getData('country');
		$data['stateList'] = $this->Doctor_Model->getData('state');
		$data['cityList'] = $this->Doctor_Model->getData('city');
		$data['hospitalList'] = $this->Hospital_Model->getData('hospital_information');
		$data['drvisitinghosinfo'] = $this->Doctor_Model->getData('doctor_visiting_hospital',$id);
				$data['adminimg']=$this->session->adminimg;
	    $sql = "select h.hospital_id,hospital_name from doctor_visiting_hospital dvh,doctor_information d,hospital_information h where d.doctor_id=dvh.doctor_id and d.doctor_id=$id and h.hospital_id=dvh.hospital_id";
		$data['hospital_name_of_doctor'] = $this->Get_Model->customQuery($sql);

		$this->load->view("admin/Doctor-Profile",$data);
	}
	function insert(){
		extract($_POST);
		
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
                	$data = array('upload_data' => $this->upload->data());

                     
                 
                }
                $password = password_hash($password,PASSWORD_DEFAULT);
		$data = array("doctor_name"=>$doctorname,"qualification"=>$qualification,"specialty"=>$speciality,"date_of_birth"=>$birthdate,"gender"=>$gender,"address"=>$address,"pincode"=>$pincode,"country"=>$country,"state"=>$state,"city"=>$city,"contact_number"=>$contactnumber,"consultancy_fees"=>$consultancyfee,"rate"=>$rate,"experience"=>$experience,"password"=>$password,"doctorimg"=>$img,"email_id"=>$email);
		//$this->Doctor_Model->insert($data);
		$doctor_last_id = $this->Doctor_Model->insert($data);

		
		$sql="INSERT INTO `doctor_visiting_hospital` (`doctor_id`, `hospital_id`) VALUES ($doctor_last_id, $hospital)";
		print_r($sql);
		$this->Get_Model->customQuery_insert3($sql);

			echo("<script> { alert('Doctor added successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/admin/Doctor/Add'); }</script>");

		//$this->load->view("admin/Doctor-Add");
	}
function update(){
		$img="";
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
         
			
               $BirthDate = date("Y-m-d", strtotime($birthdate));

			$data = array(
			        'doctor_name' => $doctorname,
			        'qualification' => $qualification,
			        'specialty' => $specialty,
			        'contact_number' => $contactnumber,
			        'date_of_birth' => $BirthDate,
			        'address' => $address,
			        'gender' => $gender,
			        'consultancy_fees' => $consultancyfee,
			        'pincode' => $pincode,
			        'country' => $country,
			        'state' => $state,
			        'city' => $city,
			        'rate' => $rate,
			        'experience' => $experience,			 
			        'doctorimg' => $img
			        
			);

			$this->Doctor_Model->updateData('doctor_information',$data,'doctor_id',$doctor_id);

						$data = array(
			        'doctor_id' => $doctor_id,
			        'hospital_id' => $hospital
			        
			        
			);

			$this->Doctor_Model->updateData('doctor_visiting_hospital',$data,'doctor_id',$doctor_id);

			echo("<script> { window.location.replace('http://localhost/hugsanddrugs/admin/Doctor/edit?id=".$doctor_id."'); }</script>");
		
	}

	public function Delete()
{
	$id=$_POST['id'];
	$isd=1;
			$sql="select doctorimg from doctor_information where doctor_id=$id";
		$result=$this->Get_Model->customQuery($sql);
		foreach($result as $image)
		{
			$deleteimg = $image['doctorimg'];
		}
		unlink(FCPATH."doctorimg/".$deleteimg);

	$this->Patient_Model->deleteData('doctor_information','is_delete',$isd,'doctor_id',$id);
	$this->Patient_Model->deleteData('doctor_visiting_hospital','is_delete',$isd,'doctor_id',$id);


	
}

		public function search()
	{
			extract($_REQUEST);
			
		
		$sql="select * from doctor_information d,speciality s,doctor_visiting_hospital dh,hospital_information h,city c where d.specialty=s.speciality_id  and d.is_delete=0 and dh.doctor_id=d.doctor_id and h.hospital_id=dh.hospital_id and d.city = c.city_id and (doctor_name like '%$search%' or experience like '%$search%' or qualification like '%$search%' or hospital_name like '%$search%' or rate like '%$search%' or consultancy_fees like '%$search%' ) ";	
		
		

		$result=$this->Get_Model->searchDoctor($sql);
		$data['doctorList']=$result;
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