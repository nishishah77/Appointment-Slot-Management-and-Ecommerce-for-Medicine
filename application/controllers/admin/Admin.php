<?php

class Admin extends CI_Controller
{
		public function __construct()
		{
		parent::__construct();
    	$this->load->model("Communication_Model");
		}
	public function Profile()
	{
		$data['active']='5';
		$data['page_name_1']='Admin';
		$data['page_name']='Profile';
		$data['admin_name']=$this->session->admin_name;
		$data['admin_username']=$this->session->admin_username;
		$data['admin_email']=$this->session->admin_email;
		$data['admin_id']=$this->session->admin_id;
		$data['adminimg']=$this->session->adminimg;

		$this->load->view("admin/Admin-Profile",$data);
	}

    public function Add()
    {
    	$data['active']='5';
		$data['page_name_1']='Admin';
		$data['page_name']='Add';
		$data['admin_name']=$this->session->admin_name;
				$data['adminimg']=$this->session->adminimg;

    	$this->load->view("admin/Admin-Add",$data);
    }
	public function Insert()
	{
			extract($_POST);
			$img=$_FILES['adminimg']['name'];
			move_uploaded_file($_FILES['adminimg']['tmp_name'],'adminimg/'.$img); 

                $config['upload_path']          = '/hugsanddrugs/adminimg/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('adminimg'))
                {
                	$data = array('upload_data' => $this->upload->data());
                }


			$data = array('name' =>$name ,
						'username'=>$username,
						'password'=>password_hash($password,PASSWORD_DEFAULT),
						'email_Id '=>$email,
						'adminimg' => $img);
			
			$this->Admin_Model->insertData('admin',$data);
			$this->Communication_Model->admin_add_send_mail($email,$password,$username);

			echo("<script>{ alert('Admin Signup Success');
					window.location.replace('http://localhost:8080/hugsanddrugs/admin/Admin/Add');
					} </script>");
	
		
        
	}

	public function Delete()
	{
		$id=$_POST['id'];
		$password=$_POST['password'];
		if(password_verify($password,$this->session->admin_password))
		{
			echo "1";
			$this->Admin_Model->deleteData('admin','admin_id',$id);
			$this->session->unset_userdata('admin_username');
			$this->session->unset_userdata('admin_name');
			$this->session->unset_userdata('admin_mobno');
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('admin_password');
		}	
	}
	
}


?>