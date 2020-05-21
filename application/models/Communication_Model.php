<?php

class Communication_Model extends CI_Model
{
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
	
public function admin_add_send_mail($email,$password,$username)
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

		$this->email->subject("Welcome");

		$formattedMsg = "<center><div style='color:White;background:#6b0322'><h1>HugsAndDrugs</h1><br>
			<p style='font-size:large;font-weight:bold;'>Hello,Welcome to HugsAndDrugs Family!Your username is ".$username." and Password is ".$password.". </p>
		<p style='font-size:large;font-weight:bold;'>
        For any query you can contact us on medicom187@gmail.com
		</p></div></center>
		";		


		$this->email->message($formattedMsg);

		

		$this->email->send();

}
	public function send_sms()
	{

	}
}


?>