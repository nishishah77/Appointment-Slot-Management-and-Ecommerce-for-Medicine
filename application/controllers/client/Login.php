<?php

class Login extends CI_Controller
{
   public function __construct(){
		parent::__construct();
    
    	$this->load->model('client/Get_Model');
    	
    	
	}

	
	 public function login_session()
	{
		extract($_REQUEST);

        if(isset($_REQUEST['page']))
        {
        	$page = $_REQUEST['page'];
        }
		if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
		{
			$email = $_REQUEST["username"];
			$password = $_REQUEST["password"];

         $result =$this->Get_Model->getDoctorSpeciality();

		$data['DoctorSpecialityList'] = $result;

		$result =$this->Get_Model->getHospitalSpeciality();

		$data['HospitalSpecialityList'] = $result;
	
        $user=$this->Get_Model->check_user2($email,$password);


             

            if($user!="")
            {
         	 if(isset($user->patient_first_name))
            {

            	$email = $user->email_id;
            	$first_name=$user->patient_first_name;
            	$middle_name=$user->patient_middle_name;
            	$last_name=$user->patient_last_name;
            	$address = $user->address;
            	$mobile_number = $user->mobile_number;
            	$patient_information_id=$user->patient_information_id;
            
			$_SESSION['username']=$email;	
			$data['UserData']=$user;
			$_SESSION['first_name']=$first_name;
			$_SESSION['middle_name']=$middle_name;
			$_SESSION['last_name']=$last_name;
			$_SESSION['address']=$address;
			$_SESSION['mobile_number']=$mobile_number;
			$_SESSION['patient_information_id']=$patient_information_id;
			$_SESSION['city']=$user->city;
			$_SESSION['state']=$user->state;
			$_SESSION['country']=$user->country;
			$_SESSION['marital_status']=$user->marital_status;
			$_SESSION['pincode']=$user->pincode;
			$_SESSION['dateofbirth']=$user->date_of_birth;
			$_SESSION['patientimg']=$user->patientimg;
			$_SESSION['gender']=$user->gender;
			$_SESSION['password']=$user->password;

			//echo $_SESSION['patient_information_id'];
		}
		
		 //doctor session start
            if(isset($user->doctor_name))
            {

            	$email = $user->email_id;
            	$doctor_name=$user->doctor_name;            	

            	$experience=$user->experience;
            	
            	 $doctor_id=$user->doctor_id;
            
			$_SESSION['username']=$email;	
			$data['UserData']=$user;
			$_SESSION['first_name']=$doctor_name;
			$_SESSION['hospital_name']=$hospital_name;
			$_SESSION['doctor_speciality']=$doctor_speciality;
			$_SESSION['qualification']=$user->qualification;
			$_SESSION['experience']=$experience;
			
			$_SESSION['doctor_id']=$doctor_id;
			$_SESSION['speciality']=$user->specialty;
			$_SESSION['gender']=$user->gender;
			$_SESSION['dateofbirth']=$user->date_of_birth;
			$_SESSION['address']=$user->address;
			$_SESSION['pincode']=$user->pincode;
			$_SESSION['country']=$user->country;
			$_SESSION['state']=$user->state;
			$_SESSION['city']=$user->city;
			$_SESSION['contact_number']=$user->contact_number;
			$_SESSION['consultancy_fees']=$user->consultancy_fees;
			$_SESSION['doctorimg']=$user->doctorimg;
			$_SESSION['password']=$user->password;



			}
		
            if(isset($user->hospital_name))
            {

            	$email = $user->email_id;
            	$hospital_name=$user->hospital_name;
            	$speciality = $user->speciality_id;
            	$contact_number = $user->contact_number;
            	$hospital_id=$user->hospital_id;
            	$address=$user->address;
            	$timing = $user->timing;
            
			$_SESSION['username']=$email;	
			$data['UserData']=$user;
			$_SESSION['hospital_name']=$hospital_name;
			$_SESSION['address']=$address;
			$_SESSION['contact_number']=$contact_number;
			$_SESSION['hospital_id']=$hospital_id;
			$_SESSION['speciality']=$speciality;
			$_SESSION['open_time']=$timing;
			$_SESSION['country']=$user->country;
			$_SESSION['state']=$user->state;
			$_SESSION['city']=$user->city;
			$_SESSION['hospitalimg']=$user->hospitalimg;
			$_SESSION['password']=$user->password;

  			}
            
 
           $this->load->view("client/".$page,$data);

            
			}	
			else
			{
				echo "not login!";
           $this->load->view("client/".$page);
            
			}
           //echo("<script> window.location.reload(); }</script>");
		}
	if($page=="Profile")
       {
       	$redirect_page="Profile";
       }


       if($page=="index")
       {
       	$redirect_page="Home";
       }
		if($page == "shop" || isset($_REQUEST['category']))
		{
				$redirect_page="shop";
				$page="shop";
		}
		if(isset($_REQUEST['medicine']))
		{
			$medicine = $_REQUEST['medicine'];
		}

		if($page=="shop-detail")
		{
			$redirect_page="shop/shop_detail";
		}
		if($page=="about-us")
		{
				$redirect_page="About_us";
		}
		if($page=="contact-us")
		{
			$redirect_page="Contact_us";
		}
		if($page=="Doctor")
		{
			$redirect_page="Doctor";
		}
		if($page=="Hospital")
		{
			$redirect_page="Hospital";
		}
		if(isset($_REQUEST['medicine']))
		{
			$medicine = $_REQUEST['medicine'];
				   redirect("client/".$redirect_page."?page=".$page."&medicine=".$medicine."&fname=".$fname);


		}				
		redirect("client/".$redirect_page."?page=".$page);

	    





		//	redirect(base_url()."client/home");
			//header("Refresh:0");
			//header("Refresh:0; url=page2.php");
			
		
	}

	public function logout()
	{
		if(isset($_REQUEST['page']))
		{
			$page = $_REQUEST['page'];
		}
		if(isset($_REQUEST['medicine']))
		{
			$medicine = $_REQUEST['medicine'];
		}
		if(isset($_SESSION['patient_information_id']))
		{
			unset($_SESSION['username']);
			unset($_SESSION['first_name']);
			unset($_SESSION['last_name']);
			unset($_SESSION['address']);
			unset($_SESSION['mobile_number']);
			unset($_SESSION['patient_information_id']);
			unset($_SESSION['app_fname']);
			unset($_SESSION['app_lname']);
			unset($_SESSION['app_phone']);
			unset($_SESSION['app_email']);
			unset($_SESSION['app_appointment_date']);
			unset($_SESSION['app_gender']);
			unset($_SESSION['app_hospital']);
			unset($_SESSION['app_hospital_name']);
			unset($_SESSION['app_doctor_name']);
			unset($_SESSION['app_appointment_time']);
			unset($_SESSION['app_doctor']);


		}
		if(isset($_SESSION['doctor_id']))
		{
			unset($_SESSION['username']);				
			unset($_SESSION['first_name']);
			unset($_SESSION['hospital_name']);
			unset($_SESSION['doctor_speciality']);
			unset($_SESSION['qualification']);
			unset($_SESSION['experience']);
			unset($_SESSION['visiting_hours']);
			unset($_SESSION['doctor_id']);


		}
		if(isset($_SESSION['hospital_id']))
		{
			unset($_SESSION['username']);				
			unset($_SESSION['hospital_name']);
			unset($_SESSION['address']);
			unset($_SESSION['contact_number']);
			unset($_SESSION['hospital_id']);
			unset($_SESSION['speciality']);
			unset($_SESSION['open_time']);

		}
		
      if($page=="index" || $page=="Profile" || $page=="Changepassword" || $page=="myappointment")
       {
       	$redirect_page="Home";
       	$page="index";
       }
		if($page == "shop" || isset($_REQUEST['category']))
		{
				$redirect_page="shop";
				$page="shop";
		}

		if($page == "shopping_cart")
		{
				$redirect_page="shop";
				$page="shop";
				echo "true";
		}
		
		if(isset($_REQUEST['medicine']))
		{
			$medicine = $_REQUEST['medicine'];
		}

		if($page=="shop-detail")
		{
			$redirect_page="shop/shop_detail";
		}
		if($page=="about-us")
		{
				$redirect_page="About_us";
		}
		if($page=="contact-us")
		{
			$redirect_page="Contact_us";
		}
		if($page=="Doctor")
		{
			$redirect_page="Doctor";
		}
		if($page=="Hospital")
		{
			$redirect_page="Hospital";
		}	
		$this->load->view("client/".$page);
		redirect(base_url()."client/".$redirect_page."?page=".$page."&medicine=".$medicine);

	}

	public function register()
	{
		extract($_POST);
		//pateint_madical_info
		$password=password_hash($password, PASSWORD_DEFAULT);
		$sql="insert into patient_information(`patient_first_name`, `patient_last_name`, `email_id`, `mobile_number`, `date_of_birth`, `password`, `gender`, `address`)values('$first_name','$last_name','$email','$mobile','$dateofbirth','$password','$gender','$address')";
		$id=$this->Get_Model->customQuery_insert($sql);
		$sql="insert into patient_medical_information(`patient_information_id`)values($id)";
		$this->Get_Model->customQuery_insert($sql);
		

	}

	public function passwordReset()
	{
		extract($_POST);
   $this->Get_Model->send_mail3($email);				
		$_SESSION['email']=$email;
		 //   if($result!="")		   	
   //         {
   //       	if(isset($result->patient_first_name))
   //          {
   //          	$_SESSION['user']="patient";	
   //          }
   //      	if(isset($result->doctor_name))
   //          {
   //          	$_SESSION['user']="doctor";	
   //          }
   //      	if(isset($result->hospital_name))
   //          {
   //          	$_SESSION['user']="hospital";	
   //          }

			
			
			//echo $result->patient_first_name;
		// }
		// else
		// {
		// 	echo "Wrong Email!";
		// }

	}

	public function otpVerify()
	{
        extract($_POST);
        if(isset($_SESSION['reset_password']) && $_SESSION['reset_password']==$otp)
        {
        	echo "Verified";
        }
	}

	public function ResetPassword()
	{
		echo("<script>{ alert('here');	} </script>");
				
		$sql="";

		extract($_POST);

			$data = array(
			        'password' => $password
			        
			);

			$email = $_SESSION['email'];

			// if(isset($_SESSION['user']) &&  $_SESSION['user']=="patient")
			// {
			// 	echo $_SESSION['user'];
			// 	$table="patient_information";
			// 	$id = $_SESSION['email'];
			// 	$column = "email_id";

			// }
			// if(isset($_SESSION['user']) && $_SESSION['user']=="doctor")
			// {
			// 	$table="doctor_information";
			// 	$id = $_SESSION['email'];
			// 	$column = "email_id";
			// }
			// if(isset($_SESSION['user']) && $_SESSION['user']=="hospital")
			// {
			// 	$table="hospital_information";
			// 	$id = $_SESSION['email'];
			// 	$column = "email_id";
			// }

			$this->Get_Model->updateData2("patient_information",$data,"email_id",$email);
		$this->Get_Model->password_changed_send_mail($email,$password);

			

	}
}


?>