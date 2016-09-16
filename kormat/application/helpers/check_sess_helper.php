<?php 

function cek_ses()
	{	$ci=&get_instance();
		$ci->load->library('session');
		$ci->load->model('member_model');
		
		$ses=$ci->session->userdata('is_logged_in');
		$mimin=$ci->session->userdata('level');
		
		if($ses==FALSE and !$mimin)
		{	
			$data['get_task']=$ci->member_model->get_all_tasks_link();
			$ci->load->view('template/home',$data);
		}
		
		else if($ses=='is_logged_in' and $mimin=='mimin')
		{
			redirect('admin/index','refresh');
		}	
		
		else
		{
			redirect('site/members_area','refresh');
		}
	}

function cek_ses_lg()
{
		$ci=&get_instance();
		$ci->load->library('session');
		$ci->load->model('member_model');
		
		$ses=$ci->session->userdata('is_logged_in');
		$mimin=$ci->session->userdata('level');
		
		if($ses!='is_logged_in' or $ses==null)
		{	
			$ci->load->view('v_login');
		}
		
		else if($mimin=='mimin')
		{
			redirect('admin/index','refresh');
		}	
		
		else
		{
			redirect('site/members_area','refresh');
		}


}	
	
	
	function is_logged_in()
		{
		$ci=&get_instance();
		$ci->load->library('session');
		$ci->load->helper('backbutton');
		$is_logged_in=$ci->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in !=true)
		{
			redirect('login/lgin');
		}
		else
		{
			backButtonHandle();
		}
	}
?>