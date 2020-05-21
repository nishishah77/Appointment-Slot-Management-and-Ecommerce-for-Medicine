<?php 
	class Get_Model extends CI_Model{
			public function checkSess(){
		if(isset($this->session->username)){
			return true;
		}else{
			
			echo("<script>{ 
					window.location.replace('http://localhost:8080/hugsanddrugs/client/Home?page=index&msg=LoginFailed');
					} </script>");
		}
	}

		public function getDoctorById($id)
		{
			     $this->db->select('*');
			    $this->db->from('doctor_information'); 
			    $this->db->where('doctor_id',$id);			  
			    $this->db->where('is_delete',0);			  
			    $query=$this->db->get();
			    return $query->result();	

			    

		}
		public function getPatientById($id)
		{
				$this->db->select('*');
			    $this->db->from('patient_information'); 
			    $this->db->where('patient_information_id',$id);	
			    $this->db->where('is_delete',0);			  
			    $query=$this->db->get();
			    return $query->result();	



		}
		public function getHospitalById($id)
		{
				$this->db->select('*');
			    $this->db->from('hospital_information'); 
			    $this->db->where('hospital_id',$id);
			    $this->db->where('is_delete',0);				  
			    $query=$this->db->get();
			    return $query->result();	

			
		}
		public function getPatientMedicalById($id)
		{
				$this->db->select('*');
			    $this->db->from('patient_medical_information'); 
			    $this->db->where('patient_information_id',$id);
			    $this->db->where('is_delete',0);				  
			    $query=$this->db->get();
			    return $query->result();	

			
		}


		function insert($param){
				$this->db->insert("appointment",$param);
				
		
			}
	function getCity(){

		}

		function getState($id){
			$this->db->where('country_id', $id);
			$this->db->where('is_delete',0);	
			return $this->db->get("state")->result_array();
		}


		function getCountry(){
			return $this->db->get("country")->result();		
		}
		function State(){
			return $this->db->get("state")->result();		
		}
		function City(){
			return $this->db->get("city")->result();		
		}

		function getDoctorSpeciality()
		{
			$this->db->where('is_delete',0);	
			return $this->db->get("speciality")->result_array();
		}

		function getHospitalSpeciality()
		{
			$this->db->where('is_delete',0);	
			return $this->db->get("speciality")->result_array();
		}
		function getHospitals()
		{ 
			$this->db->where('is_delete',0);	
			return $this->db->get("hospital_information")->result_array();
		}
	   function getDoctors()
		{
			$this->db->where('is_delete',0);	
			return $this->db->get("doctor_information")->result_array();
		}

		function customQuery1($sql){
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		function customQuery_insert($sql){

			$query = $this->db->query($sql);
			$insert_id = $this->db->insert_id();
			  return $insert_id;

		}
		function customQuery($sql){
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		function updateData($sql){
			$query = $this->db->query($sql);
		//	return $query->result_array();
		}
		
	public function updateData2($table,$data,$col_name_id,$id){
		//$this->db->set($col,$data);
		$this->db->where($col_name_id,$id);
		//$this->db->update($table);
		$this->db->update($table, $data);

	}

		public function getDoctorBySpeciality($doctor_speciality,$search){
			if($doctor_speciality!=0)
			{
				if($search==0)
				{
			    $this->db->select('*');
			    $this->db->from('doctor_information d'); 
			    $this->db->join('speciality s', 'd.specialty=s.speciality_id');
			    $this->db->join('doctor_visiting_hospital dh', 'dh.doctor_id=d.doctor_id');			    
			    $this->db->join('hospital_information h', 'h.hospital_id=dh.hospital_id');
			    $this->db->where('d.is_delete',0);	
			    $this->db->where('d.specialty',$doctor_speciality);
			    }
				else
				{
			     $this->db->select('*');
			    $this->db->from('doctor_information d'); 
			    $this->db->join('speciality s', 'd.specialty=s.speciality_id');
			    $this->db->join('doctor_visiting_hospital dh', 'dh.doctor_id=d.doctor_id');			    
			    $this->db->join('hospital_information h', 'h.hospital_id=dh.hospital_id');
			    $this->db->where('d.is_delete',0);	
			    $this->db->where('d.specialty',$doctor_speciality);
			    $sql="select * from doctor_information d,speciality s,doctor_visiting_hospital dh,hospital_information h where d.specialty=s.speciality_id and dh.doctor_id=d.doctor_id and h.hospital_id=dh.hospital_id and d.specialty=".$doctor_speciality." and d.is_delete=0";
			    $this->db->query($sql);
				}
				$query = $this->db->get(); 	
			    $data= $query->result_array();	
				
			}
			else
			{
			   if($search==0)
				{

			    $this->db->select('*');
			    $this->db->from('doctor_information d'); 
			    $this->db->join('speciality s', 'd.specialty=s.speciality_id');
			    $this->db->join('doctor_visiting_hospital dh', 'dh.doctor_id=d.doctor_id');		

			    $this->db->join('hospital_information h', 'h.hospital_id=dh.hospital_id');
			    $this->db->where('d.is_delete',0);	
			}else
			{
			    $this->db->select('*');
			    $this->db->from('doctor_information d'); 
			    $this->db->join('speciality s', 'd.specialty=s.speciality_id');
			    $this->db->join('doctor_visiting_hospital dh', 'dh.doctor_id=d.doctor_id');			    
			    $this->db->join('hospital_information h', 'h.hospital_id=dh.hospital_id');
			    $this->db->where(d.'is_delete',0);	

			}
			$query=$this->db->get();
			$data= $query->result_array();	

			}	

			return $data;	

		}

		public function getHospitalBySpeciality($hospital_speciality){
			if($hospital_speciality!=0)
			{
			    $this->db->select('*');
			    $this->db->from('hospital_information h'); 
			    $this->db->join('speciality s', 'h.speciality_id=s.speciality_id');
			    $this->db->join('city c', 'c.city_id=h.city');
			    $this->db->join('state st', 'h.state=st.state_id');
			    $this->db->where('h.speciality_id',$hospital_speciality);
			    $this->db->where('h.is_delete',0);	
			    $query = $this->db->get(); 	
			    $data= $query->result_array();	
     		}
			else
			{
			    $this->db->select('*');
			    $this->db->from('hospital_information h'); 
			    $this->db->join('city c', 'c.city_id=h.city');
			    $this->db->join('state st', 'h.state=st.state_id');			    
			    $this->db->join('speciality s', 'h.speciality_id=s.speciality_id');
			    $this->db->where('h.is_delete',0);	
			$query=$this->db->get();
			$data= $query->result_array();	

			}	

			return $data;	

		}
            
         public function getMoreHospital($id)
         {
         	    $this->db->select('*');
			    $this->db->from('hospital_information h,doctor_visiting_hospital dh'); 
			    $this->db->join('city c', 'c.city_id=h.city');
			    $this->db->join('state st', 'h.state=st.state_id');			    
			    $this->db->join('speciality s', 'h.speciality_id=s.speciality_id');	    
			    $this->db->where('h.hospital_id',$id);
			    $this->db->where('h.is_delete',0);	
			$query=$this->db->get();
			$data= $query->result_array();	
			return $data;	

         }   

         public function getDoctorByHospital($id)
         {
			    $this->db->select('*');
			    $this->db->from('doctor_information d'); 
			    $this->db->join('speciality s', 'd.specialty=s.speciality_id');
			    $this->db->join('doctor_visiting_hospital dh', 'dh.doctor_id=d.doctor_id');			    
			    $this->db->join('hospital_information h', 'h.hospital_id=dh.hospital_id');
			    $this->db->where('dh.hospital_id',$id);
			    $this->db->where('d.is_delete',0);	
			    $query = $this->db->get(); 	
			    $data= $query->result_array();	
			    return $data;
         	    
         }

         public function getMedicine()
         {
			    $this->db->select('*');
			    $this->db->from('medicine m'); 
			    $this->db->join('medicine_category mc', 'm.medicine_category_id=mc.medicine_category_id');
			    $this->db->join('medicine_details md','md.medicine_id=m.medicine_id');
			    $this->db->where('m.is_delete',0);	
			    $query = $this->db->get(); 	
			    $data= $query->result_array();	
			    return $data;
	
         }

         public function getCategory()
         {
         	    return $this->db->get("medicine_category")->result_array(); 	
			    			   
         }

       //            public function getRandomMedicine()
       //   {
       //   	   $id1=rand(1,6);
       //   	   $id2=rand(1,6);
       //   	   $id3=rand(1,6);
			    // $this->db->select('*');
			    // $this->db->from('medicine m'); 
			    // $this->db->join('medicine_category mc', 'm.medicine_category_id=mc.medicine_category_id');
			    // $this->db->join('medicine_details md','md.medicine_id=m.medicine_id');
			    // $where = "medicine_id="+ $id1 +"OR medicine_id="+ $id2 +" OR medicine_id="+$id3;
			    // $this->db->where($where);
			    // $query = $this->db->get(); 	
			    // $data= $query->result_array();	
			    // return $data;
	
       //   }

       public function getMedicinebyId($medicine)
       {
       		    $this->db->select('*');
			    $this->db->from('medicine m'); 
			    $this->db->join('medicine_category mc', 'm.medicine_category_id=mc.medicine_category_id');
			    $this->db->join('medicine_details md','md.medicine_id=m.medicine_id');
			    $this->db->where('m.medicine_id',$medicine);
			    $this->db->where('m.is_delete',0);	
			    $query = $this->db->get(); 	
			    $data= $query->result_array();	
			    return $data;

       }


       public function check_user2($email,$password){
       	
       	$records=$this->db->get('patient_information');
		$records=$records->result();

		foreach ($records as $row) {
			if($row->email_id==$email && password_verify($password,$row->password))
			return $row;
			}	
	    $records=$this->db->get('doctor_information');
		$records=$records->result();

		foreach ($records as $row) {
			if($row->email_id==$email && password_verify($password,$row->password))
			return $row;
			}	
		 $records=$this->db->get('hospital_information');
		$records=$records->result();

		foreach ($records as $row) {
			if($row->email_id==$email && password_verify($password,$row->password))
			return $row;
			}	

		}	
       

       public function check_user($email,$password)
       {

       	 //$this->db->select('*');
       	 //$this->db->from('patient_information');
       	 //$this->db->where('email_id',$email);
       	 //$this->db->where('password',$password);
       	 $result=$this->db->get('patient_information');
       	 
       	 foreach ($result as $row) {

   	 	//if($row['email_id']==$email && password_verify($password, $row['password'])){
 		       	 	   
       	 	return 'aa';
   	 		//return $row->result_array();
     	 	}
       	 


       	/* $result=$this->db->get();
       	 if(count($result->result_array())!=0)
       	 {
       	 	return $result->result_array();
       	 } */       	
/*
       	 $this->db->select('*');
	    $this->db->from('doctor_information d'); 
	    // $this->db->join('speciality s', 'd.specialty=s.speciality_id');
	    // $this->db->join('doctor_visiting_hospital dh', 'dh.doctor_id=d.doctor_id');
	    // $this->db->join('hospital_information h', 'h.hospital_id=dh.hospital_id');
       	 $this->db->where('d.email_id',$email);
       	 $this->db->where('d.password',$password);
       	 $result=$this->db->get();
       	 if(count($result->result_array())!=0)
       	 {
       	 	return $result->result_array();
       	 }       	

       	 $this->db->select('*');
	    $this->db->from('hospital_information h'); 
	    //$this->db->join('city c', 'c.city_id=h.city');
	    //$this->db->join('state st', 'h.state=st.state_id');			    
	    //$this->db->join('speciality s', 'h.speciality_id=s.speciality_id');	    
       	 $this->db->where('h.email_id',$email);
       	 $this->db->where('h.password',$password);
       	 $result=$this->db->get();
       	 if(count($result->result_array())!=0)
       	 {
       	 	return $result->result_array();
       	 }       	
       	 	return "";
  */     }

       public function getMedicineByCategory($id)
       {
       	        $this->db->select('*');
			    $this->db->from('medicine m'); 
			    $this->db->join('medicine_category mc', 'm.medicine_category_id=mc.medicine_category_id');
			       $this->db->join('medicine_details md','md.medicine_id=m.medicine_id');
			    $this->db->where('mc.medicine_category_id',$id);
			    $this->db->where('m.is_delete',0);	
			    $query = $this->db->get(); 	
			    $data= $query->result_array();	
			    return $data;

 
       }


       public function send_msg($mobile,$msg){
		//post
		$id='SMS';
		//$mobile='8306588313';
		$url="www.way2sms.com/api/v1/sendCampaign";
		$message = urlencode($msg);// urlencode your message
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
		curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=E064DXDD4PJW022I4W76ZADWCNQB4KDZ&secret=ZILQXD9RE30NYDH9&usetype=stage&phone=$mobile&senderid=$id&message=$message");// post data
		// query parameter values must be given without squarebrackets.
		 // Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		//echo $result;
	}
		public function send_mail1($email,$hospital_name,$doctor_name,$datepicker,$appointment_time,$app_fname,$app_lname)
	{
	
		$config['protocol']='smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port']=465;
		$config['smtp_timeout']='30';
		$config['smtp_user']='medicom187@gmail.com';
		$config['smtp_pass']='medi_com123';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");
		
		$this->email->from("medicom187@gmail.com","HugsAndDrugs");

		$this->email->to($email);

		$this->email->subject("Appointment Booking Confirmation");

		$formattedMsg = "<center><h1 style='color:White;background:DodgerBlue'>HugsAndDrugs</h1></center><br>
			<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>Hello,".$app_fname." ".$app_lname."! Your appointment is booked. ".$doctor_name." from ".$hospital_name." is expecting you on ".$datepicker." at ".$appointment_time.".</p>
		<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>Thank You For Booking an Appointment!</p>
		<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>
        For any query you can contact us on medicom187@gmail.com
		</p>
		";		


		$this->email->message($formattedMsg);

		//$this->email->attach(FCPATH . 'Pictures/photo.jpg' );

		if($this->email->send())
		{
			//echo "Email has been sent! Thank you!";
		}
		else
		{
			echo $this->email->print_debugger();
		}
	}
	public function send_mail2($first_name,$email,$transaction_id,$product_info,$amount)
	{
	
		$config['protocol']='smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port']=465;
		$config['smtp_timeout']='30';
		$config['smtp_user']='medicom187@gmail.com';
		$config['smtp_pass']='medi_com123';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");
		
		$this->email->from("medicom187@gmail.com","HugsAndDrugs");

		$this->email->to($email);

		$this->email->subject("Order Confirmation");

		$formattedMsg = "<center><h1 style='color:White;background:DodgerBlue'>HugsAndDrugs</h1></center><br>
			<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>Hello,".$first_name."! Your order is placed for ".$product_info." of Rupees ".$amount." and payment is done. your transaction id is ".$transaction_id.".</p>
		<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>
        For any query you can contact us on medicom187@gmail.com
		</p>
		";		


		$this->email->message($formattedMsg);

		//$this->email->attach(FCPATH . 'Pictures/photo.jpg' );

		if($this->email->send())
		{
			// echo "Email has been sent! Thank you!";
		}
		else
		{
			echo $this->email->print_debugger();
		}


	}


		public function Feedback_email($email)
	{
	
		$config['protocol']='smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port']=465;
		$config['smtp_timeout']='30';
		$config['smtp_user']='medicom187@gmail.com';
		$config['smtp_pass']='medi_com123';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");
		
		$this->email->from("medicom187@gmail.com","HugsAndDrugs");

		$this->email->to($email);

		$this->email->subject("Thank You");

		$formattedMsg = "<center><h1 style='color:White;background:DodgerBlue'>HugsAndDrugs</h1></center><br>
			<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>Thank You For Giving Feedback!
			</p>
		<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>
        For any query you can contact us on medicom187@gmail.com
		</p>
		";		


		$this->email->message($formattedMsg);

		//$this->email->attach(FCPATH . 'Pictures/photo.jpg' );

		if($this->email->send())
		{
			//echo "Email has been sent! Thank you!";
		}
		else
		{
			echo $this->email->print_debugger();
		}
	}
public function password_changed_send_mail($email,$password)
	{
	
		$config['protocol']='smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port']=465;
		$config['smtp_timeout']='30';
		$config['smtp_user']='medicom187@gmail.com';
		$config['smtp_pass']='medi_com123';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");
		
		$this->email->from("medicom187@gmail.com","HUGSANDDRUGS");

		$this->email->to($email);

		$this->email->subject("Password Is Changed Successfully!");

		$formattedMsg = "<center><div style='color:White;background:#6b0322'><h1>HugsAndDrugs</h1><br>
			<p style='font-size:large;font-weight:bold;'>Hello,Your Password Is Changed!Your New Password is ".$password." </p>
		<p style='font-size:large;font-weight:bold;'>
        For any query you can contact us on medicom187@gmail.com
		</p></div></center>
		";		


		$this->email->message($formattedMsg);

		

		$this->email->send();
		
	}

	public function send_mail3($email)
	{
	
		$config['protocol']='smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port']=465;
		$config['smtp_timeout']='30';
		$config['smtp_user']='medicom187@gmail.com';
		$config['smtp_pass']='medi_com123';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");
		
		$this->email->from("medicom187@gmail.com","HugsAndDrugs");

		$this->email->to($email);

		$this->email->subject("OTP Confirmation");
		$password=rand(1000,9999);
		
		
		

	$_SESSION['reset_password']=$password;
		$formattedMsg = "<center><h1 style='color:White;background:DodgerBlue'>HugsAndDrugs</h1></center><br>
			<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>Hello,Your OTP is '".$password."'' .</p>
		<p style='color:White;background:DodgerBlue;font-size:large;font-weight:bold;'>
        For any query you can contact us on medicom187@gmail.com
		</p>
		";		


		$this->email->message($formattedMsg);

		//$this->email->attach(FCPATH . 'Pictures/photo.jpg' );

		if($this->email->send())
		{
			// echo "Email has been sent! Thank you!";
		}
		else
		{
			echo $this->email->print_debugger();
		}
	}
	public function check_email($email)
	{
		$records=$this->db->get('patient_information');
		$records=$records->result();

		foreach ($records as $row) {
			if($row->email_id==$email)
			return $row;
			}	
	    $records=$this->db->get('doctor_information');
		$records=$records->result();

		foreach ($records as $row) {
			if($row->email_id==$email)
			return $row;
			}	
		 $records=$this->db->get('hospital_information');
		$records=$records->result();

		foreach ($records as $row) {
			if($row->email_id==$email)
			return $row;
			}
	}
	public function getAppointments($appointmentDate)
	{

		$this->db->select("*");
		$this->db->from("appointment a");
		$this->db->join("hospital_information h","h.hospital_id=a.hospital_id");
		$this->db->join("doctor_information d","d.doctor_id=a.doctor_id");
		$this->db->join("patient_information p","p.patient_information_id=a.patient_information_id");
		$this->db->where("appointment_date",$appointmentDate);
		$this->db->where("a.is_delete",0);

		if(isset($_SESSION['doctor_id']))
		{
			
			$this->db->where("d.doctor_id",$_SESSION['doctor_id']);
		}
		if(isset($_SESSION['hospital_id']))
		{
			$this->db->where("h.hospital_id",$_SESSION['hospital_id']);
		}

		$result=$this->db->get();
        
        return $result->result_array();

	}
		public function getPatientAppointments($id)
	{
		$date = date("Y-m-d");
		$this->db->select("a.*,d.doctor_name,h.hospital_name");
		$this->db->from("appointment a");
		$this->db->join("hospital_information h","h.hospital_id=a.hospital_id");
		$this->db->join("doctor_information d","d.doctor_id=a.doctor_id");
		$this->db->join("patient_information p","p.patient_information_id=a.patient_information_id");
		$this->db->where("p.patient_information_id",$id);
		$this->db->where("a.is_delete",0);
		$this->db->where("a.is_active",1);
		if(isset($_SESSION['doctor_id']))
		{
			$this->db->where("d.doctor_id",$_SESSION['doctor_id']);
		}
		if(isset($_SESSION['hospital_id']))
		{
			$this->db->where("h.hospital_id",$_SESSION['hospital_id']);
		}

		$result=$this->db->get();
        
        return $result->result_array();

	}



	public function check_patient_login($email,$password)
	{
		 $this->db->select('*');
       	 $this->db->from('patient_information');
       	 $this->db->where('email_id',$email);
       	 $this->db->where('password',$password);
       	 $result=$this->db->get();
       	 if(count($result->result_array())!=0)
       	 {
       	 	return $result->result_array();
       	 }       	

	}

	public function getAppointmentslot($sql)
	{
		

		$result=$this->db->query($sql);
        
        return $result->result_array();



	}

	public function searchDoctor($sql)
	{
	   $result=$this->db->query($sql);
        
        return $result->result_array();

	}

	public function searchMedicine($sql)
	{
	   $result=$this->db->query($sql);
        
        return $result->result_array();
		
	}
	function update_profile($sql)
			{
			
			$query = $this->db->query($sql);
			

			}


		   	//count table records
		public function getTotalDoctors()
	{
		$query = $this->db->query("SELECT * FROM doctor_information where is_delete = 0");
		return $query->num_rows();
	}
	public function getTotalPatients()
	{
		$query = $this->db->query("SELECT * FROM patient_information where is_delete = 0");
		return $query->num_rows();
	}
	public function getTotalHospitals()
	{
		$query = $this->db->query("SELECT * FROM hospital_information where is_delete = 0");
		return $query->num_rows();
}

	public function final_rate($doctor_id)
	{
		$sql="select rate from doctor_information where doctor_id=$doctor_id";

		$query = $this->db->query($sql);
		$data = $query->result_array();

		foreach ($data as  $row) {
			$rating = $row['rate'];
		}

		return $rating;

	}

	}



?>