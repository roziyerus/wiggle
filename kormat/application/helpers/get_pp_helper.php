<?php 

function get_photo_profile()
	{	$ci=&get_instance();
		$ci->load->library('session');
		$ci->load->model('member_model');
		$ci->load->model('upload_model');
	$user=$ci->session->userdata('username');
	$pass=$ci->session->userdata('password');
	$cek=$ci->member_model->get_single_user($user,$pass);
	foreach ( $cek as $d)
	{
		$nim=$d->nim;//ambil nim
	}
	
	//lanjut ambil gambar
	if($pt=$ci->upload_model->select_picture_by($nim))
	{
		foreach($pt as $p)
		{
			return $p->photos_name;		
		}
	
	}
	else
	{
		return null;
	}
	}


	
?>