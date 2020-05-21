 <?php


class Hospital extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    	$this->load->model('Hospital_Model');
    	$this->load->model('Get_Model');
    	$this->Admin_Model->checkSess();
	}


	public function Add(){
		$data['page_name_1']='Hospital';
		$data['page_name']='Add';
				$data['admin_name']=$this->session->admin_name;
		$result =$this->Get_Model->getHospitalSpeciality();
		$data['HospitalSpecialityList'] = $result;
		$data['adminimg']=$this->session->adminimg;

		$result = $this->Get_Model->getCountry();
		$data['countryList'] = $result;
		$this->load->view("admin/Hospital-Add",$data);
	}
	// public function Delete(){
	// 	 $id=$_REQUEST['id'];
	// 	$this->Hospital_Model->deleteData('hospital_information','hospital_id',$id);
	// 			$data['adminimg']=$this->session->adminimg;

	// 	echo('<script>{alert("record deleted successfully !!");
	// 		window.location.replace("http://localhost:8080/hugsanddrugs/admin/Hospital/View");}</script>');
	// 	//$this->load->view("admin/Hospital-remove");
	// }
	
	public function Edit(){	
		$data['page_name_1']='Hospital';
		$data['page_name']='Edit';
				$data['admin_name']=$this->session->admin_name;


						 $id=$_REQUEST['id'];

		$data['hospitalList'] = $this->Hospital_Model->getDataById('hospital_information',$id);

		$data['countryList'] = $this->Hospital_Model->getData('country');
				 $data['stateList'] = $this->Hospital_Model->getData('state');
				 $data['cityList'] = $this->Hospital_Model->getData('city');
	    $result =$this->Get_Model->getHospitalSpeciality();
	    		$data['adminimg']=$this->session->adminimg;

		$data['HospitalSpecialityList'] = $result;

		$this->load->view("admin/Hospital-Edit",$data);
	}
	public function View(){

		$data['page_name_1']='Hospital';
		$data['page_name']='View';
				$data['admin_name']=$this->session->admin_name;
						$data['adminimg']=$this->session->adminimg;


		$this->load->view("admin/Hospital-view",$data);
	}
	public function Profile(){
		$data['page_name_1']='Hospital';
		$data['page_name']='Profile';
				$data['admin_name']=$this->session->admin_name;

				 $id=$_REQUEST['id'];
				 $sql="select * from hospital_information h,state s,city c where h.hospital_id=$id and h.city=c.city_id and h.state=s.state_id";
				 $data['hospitalList'] = $this->Get_Model->customQuery($sql);
				 $data['countryList'] = $this->Hospital_Model->getData('country');
				 $data['stateList'] = $this->Hospital_Model->getData('state');
				 $data['cityList'] = $this->Hospital_Model->getData('city');
				 		$data['adminimg']=$this->session->adminimg;

		$this->load->view("admin/Hospital-Profile",$data);
	}
	function insert(){
		extract($_POST);
		
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

                $password = password_hash($password,PASSWORD_DEFAULT);
		$data = array("hospital_name"=>$hospitalname,"address"=>$address,"contact_number"=>$contactnumber,"country"=>$country,"state"=>$state,"city"=>$city,"hospitalimg"=>$img,"email_id"=>$email,"password"=>$password,"speciality_id"=>$speciality,"open_time"=>$open_time);

		$this->Hospital_Model->insert($data);

		
		$this->load->view("admin/Hospital-add",$data);

		 echo("<script> { alert('patient added successfully!!'); window.location.replace('http://localhost:8080/hugsanddrugs/admin/Hospital/Add'); }</script>");

	}
	function update(){
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
			        'hospital_name' => $hospitalname,
			        'address' => $address,
			        'contact_number' => $contactnumber,
			        'speciality_id'=>$speciality,
			        'country' => $country,
			        'state' => $state,
			        'city' => $city,
			        'hospitalimg' => $img,
			        'email_id'=>$email,
			        'open_time'=>$open_time
			        
			);
			$this->Hospital_Model->updateData('hospital_information',$data,'hospital_id',$hospital_id);

			
         //echo("<script> { window.location.replace('http://localhost:8080/hugsanddrugs/admin/Hospital/edit?id=".$id."'); }</script>");


		}
	

	public function Delete()
{
	$id=$_POST['id'];
	$isd=1;
			$sql="select hospitalimg from hospital_information where hospital_id=$id";
		$result=$this->Get_Model->customQuery($sql);
		foreach($result as $image)
		{
			$deleteimg = $image['hospitalimg'];
		}
		unlink(FCPATH."hospitalimg/".$deleteimg);

	$this->Hospital_Model->deleteData('hospital_information','is_delete',$isd,'hospital_id',$id);
	$this->Hospital_Model->deleteData('doctor_visiting_hospital','is_delete',$isd,'hospital_id',$id);

	//$this->Hospital_Model->deleteData('hospital_information','hospital_id',$id);
}
public function search()
	{
		extract($_REQUEST);
			
		
		$sql="select * from speciality s,hospital_information h,city c,state st where h.speciality_id=s.speciality_id and c.city_id=h.city and st.state_id=h.state  and (hospital_name like '%$search%' or address like '%$search%' or city_name like '%$search%' or state_name like '%$search%' or contact_number like '%$search%') ";	
		

		$result=$this->Get_Model->searchDoctor($sql);
		$data['hospitalList']=$result;
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