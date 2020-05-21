<?php
public function do_upload()
	{
	    $config['upload_path'] = base_url().'/uploads/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size'] = '100';
	    $config['max_width']  = '1024';
	    $config['max_height']  = '768';
	    
	    //if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('userfile')) {
	        echo 'error';
	    } else {

	        return array('upload_data' => $this->upload->data());
	    }

	}
?>