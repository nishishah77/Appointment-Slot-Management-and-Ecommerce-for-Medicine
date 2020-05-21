<?php


class Medicine extends CI_Controller
{
	public function __construct(){
		parent::__construct();
    	$this->load->model('Medicine_Model');
    	$this->load->model('Get_Model');
    	$this->Admin_Model->checkSess();
	}

	public function Add(){
		$data['page_name_1']='Medicine';
		$data['page_name']='Add';
				$data['admin_name']=$this->session->admin_name;
						$data['adminimg']=$this->session->adminimg;


			$result = $this->Get_Model->getCountry();
			$data['categoryList']=$this->Get_Model->getMedicineCategory();
		$data['countryList'] = $result;
		$this->load->view("admin/Medicine-add",$data);
	}
	public function Edit(){	
		$data['page_name_1']='Medicine';
		$data['page_name']='Edit';
		$data['admin_name']=$this->session->admin_name;
								$data['adminimg']=$this->session->adminimg;


		$id=$_REQUEST['id'];
		
		$data['medicineList'] = $this->Medicine_Model->getDataById('medicine',$id);
		$data['categoryList'] = $this->Medicine_Model->getData('medicine_category');
		$data['medicineDetail'] = $this->Medicine_Model->getDataById('medicine_details',$id);
		
		$this->load->view("admin/Medicine-Edit",$data);
	}
	public function Profile(){
		$data['page_name_1']='Medicine';
		$data['page_name']='Profile';
		$data['admin_name']=$this->session->admin_name;
								$data['adminimg']=$this->session->adminimg;

		$id=$_REQUEST['id'];
		$data['medicineList'] = $this->Medicine_Model->getDataById('medicine',$id);
		$data['categoryList'] = $this->Medicine_Model->getData('medicine_category');
		$data['medicineDetail'] = $this->Medicine_Model->getDataById('medicine_details',$id);
				
		$this->load->view("admin/Medicine-Profile",$data);
	}
	public function View()
	{
		$data['page_name_1']='Medicine';
		$data['page_name']='View';
		$data['admin_name']=$this->session->admin_name;
								$data['adminimg']=$this->session->adminimg;

		$this->load->view("admin/Medicine-View",$data);
	}
function insert()
{
			extract($_POST);
		   
			$img=$_FILES['medicineimg']['name'];
			move_uploaded_file($_FILES['medicineimg']['tmp_name'],'medicineimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/medicineimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 15000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('doctorimg'))
                {
                	$data = array('upload_data' => $this->upload->data());

                     
                 
                }
$data=array(
		"medicine_name"=>$medicinename,
		"manufacturing_date"=>$manufacturingdate,
		"expiry_date"=>$expirydate,
		"medicine_category_id"=>$category,
		"manufacturer"=>$manufacturer,
		"prescription_required"=>$prescriptionrequired,
		"medicine_usage"=>$medicineusage,
		"dosage"=>$dosage,
		"description"=>$description,
		"medicineimg" => $img);

	     $this->Medicine_Model->insert($data);

		$last_id=$this->Get_Model->customQuery("select max(medicine_id) 'id' from medicine");
		foreach ($last_id as $id) {
			$medicine_id = $id['id'];
		}

	$sql="INSERT INTO `medicine_details`(`medicine_id`, `unit`, `price`) VALUES ($medicine_id,'$unit','$price')";
	$this->Get_Model->customQuery_insert($sql);
	

}
	public function Delete()
	{
		$id=$_POST['id'];
		$isd=1;
		$sql="select medicineimg from medicine where medicine_id=$id";
		$result=$this->Get_Model->customQuery($sql);
		foreach($result as $image)
		{
			$deleteimg = $image['medicineimg'];
		}
		unlink(FCPATH."medicineimg/".$deleteimg);
	$this->Medicine_Model->deleteData('medicine','is_delete',$isd,'medicine_id',$id);
    $this->Medicine_Model->deleteData('medicine_details','is_delete',$isd,'medicine_id',$id);
		//$this->Medicine_Model->deleteData('medicine','medicine_id',$id);
	}
function update()
{
			extract($_POST);
		   unlink(FCPATH."medicineimg/".$image);
			$img=$_FILES['medicineimg']['name'];
			move_uploaded_file($_FILES['medicineimg']['tmp_name'],'medicineimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/medicineimg/';
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
					
			        'medicine_name' => $medicinename,
			        'manufacturing_date' => $manufacturingdate,
			        'expiry_date' => $expirydate,
			        'medicine_category_id' => $category,
			        'manufacturer' => $manufacturer,
			        'medicine_usage' => $medicineusage,
			        'dosage' => $dosage,
			        'prescription_required' => $prescriptionrequired,
			        'description' => $description,
			        'medicineimg' => $img
			);
			$this->Medicine_Model->updateData('medicine',$data,'medicine_id',$medicine_id);


			$data = array(
				'unit' => $unit,
				'price' => $price
			);

			$this->Medicine_Model->updateData('medicine_details',$data,'medicine_id',$medicine_id);

		}


	
public function search()
	{
		extract($_REQUEST);
			
		
		$sql="select * from medicine m,medicine_details md,medicine_category mc where m.medicine_id = md.medicine_id and m.is_delete=0 and mc.medicine_category_id=m.medicine_category_id and (medicine_name like '%$search%' or medicine_category_name like '%$search%' or manufacturer like '%$search%' or unit like '%$search%' or price like '%$search%')";	
		
		

		$result=$this->Get_Model->searchMedicine($sql);
		$data['medicineList']=$result;
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