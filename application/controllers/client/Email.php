<?php

class Email extends CI_Controller
{
	
	public function send_mail($value='')
	{
	
		$config['protocol']='smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port']=465;
		$config['smtp_timeout']='30';
		$config['smtp_user']='nishikshah27@gmail.com';
		$config['smtp_pass']='lazygirl123';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");
		
		$this->email->from("nishikshah27@gmail.com","Nishi Shah");

		$this->email->to("nishikshah27@gmail.com");

		$this->email->subject("Test Email");

		$this->email->message("Hello!Nishi");

		//$this->email->attach(FCPATH . 'Pictures/photo.jpg' );

		if($this->email->send())
		{
			echo "Email has been sent! Tahnk you!";
		}
		else
		{
			echo $this->email->print_debugger();
		}
	}
}
?>