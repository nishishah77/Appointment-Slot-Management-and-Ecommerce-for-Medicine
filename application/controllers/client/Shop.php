<?php

class shop extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("client/Get_Model");
	}
	public function index()
	{
		
			$data["active"]=4;
			$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;// $data['RandomMedicineList']=$this->Get_Model->getRandomMedicine();
		$category=0;
        
        $data['CategoryList']=$this->Get_Model->getCategory();
		$data['MedicineList']="";
        if(isset($_REQUEST['category']))
        {
        	$category = $_REQUEST['category'];
        	
        }
        else
        {
        $data['MedicineList']=$this->Get_Model->getMedicine();
		

        }
        
			$data['MedicineByCategoryList']=$this->Get_Model->getMedicineByCategory($category);
			
			$this->load->view("client/shop",$data);
	   
	}
	public function shop_detail()
	{
		$data["active"]=4;
				$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		if(isset($_REQUEST['medicine']))
		{
			$medicine=$_REQUEST['medicine'];
		}


		$data['MedicineList']=$this->Get_Model->getMedicinebyId($medicine);

		$this->load->view("client/shop-detail",$data);

	}
	public function shopping_cart()
	{
		$data["active"]=4;
				$result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;


		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
		if(isset($_REQUEST['medicine']))
		{
			$medicine=$_REQUEST['medicine'];
		}
		//code for cart
		if(isset($_COOKIE['cartcookie']))
		{
			$data1="";
			$cookie =array_filter(explode(',', $_COOKIE['cartcookie']));
			print_r($cookie);
			$data1 = array();
			$totalAmount = 0;
			for ($i=0; $i < sizeof($cookie); $i++) {
				if($cookie[$i]!= "undefined"){
				$cookieData = explode('-', $cookie[$i]);
				$result1 =$this->Get_Model->customQuery1("select medicine_id,medicine_name,medicineimg from medicine where medicine_id = ".$cookieData[0]);

					 

				$totalAmount += $cookieData[2];
				$d= array("id"=>$result1[0]['medicine_id'],"name"=>$result1[0]['medicine_name'],"price"=>$cookieData[2],"qty"=>$cookieData[1],"img"=>$result1[0]['medicineimg'],);
				array_push($data1, $d);
				# code...
			}
			
			
		}
			$data['cartdata'] = $data1;
			$data['totalAmount']=$totalAmount;


		}
		else
		{
						
			
			$data['cartdata'] = "";	
			$data['totalAmount']="";

		}




		//$data['MedicineList']=$this->Get_Model->getMedicinebyId($medicine);

		$this->load->view("client/shopping-cart",$data);

	}
	 
public function search()
	{
		extract($_POST);
			
			//echo $search;
		
		$sql="select * from medicine m,medicine_details md,medicine_category mc where m.medicine_id = md.medicine_id and m.is_delete=0 and mc.medicine_category_id=m.medicine_category_id and (medicine_name like '%$search%' or medicine_category_name like '%$search%' or manufacturer like '%$search%' or unit like '%$search%' or price like '%$search%')";	
		
		

		$data['medicineList']=$this->Get_Model->searchMedicine($sql);

		
			if(sizeof($data['medicineList'])>0){
				$data['success'] = "1"; 
			}else{
				$data['success'] = "0";
			}

			header('Content-Type: application/json');

			echo json_encode($data);

	}
	public function deleteone(){
		extract($_GET);
		$newcookie = array();
		echo $medicine."<br>";
		//die();
		$cookie_array= explode(',', $_COOKIE['cartcookie']);

		$newcookie = array();
		
		for($i=0;$i<sizeof($cookie_array); $i++){

			$product = explode('-', $cookie_array[$i]);
			if($product[0] == $medicine){
				echo "matched";

			}else{

				$newcookie[]=$cookie_array[$i];
			}
		}

		echo $newcookiedata = implode(",",$newcookie);
		setcookie('cartcookie',$newcookiedata);
		echo "after".$_COOKIE['cartcookie'];
		
		redirect(base_url().'client/shop/shopping_cart');
	}

	


}


?>