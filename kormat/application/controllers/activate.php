<?php
if (!defined('BASEPATH')) exit('No single script allowed');
class Activate extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library('session');
		//$this->load->helper('backbuttonhandle');
		//backButtonHandle();
		
	}
	
	function u()
	{		
		$delta=86400;//detik dalam 24 jam
		
		$token=$this->uri->segment(3);
		
		if($d=$this->member_model->get_token($token))
		{
			foreach($d as $a)
					{
						$tmstmp=$a->timestamp;
						$nim=$a->nim;
						
						if(time()-$tmstmp>$delta)
							{	
								$this->load->view('msg_kadal_token');
							}
						else
							{
								//update
								if(!$this->member_model->activate_user($nim))
								{
									$this->member_model->delete_pending_users($nim);
									$do=$this->member_model->get_user_by_nim($nim);	
									foreach($do as $d)
									{
										$user=$d->username;
										$pass=$d->password;
									}
									
									$data=array(
											'username'=>$user,
											'password'=>$pass,	
											'is_logged_in'=>true,	
									);
									$this->session->set_userdata($data);
									
									if($this->member_model->get_single_user($user,$pass))
									{
											
										redirect('site/members_area');
									}
								}
								else
								{	
									return false;
								}
								
							}
					}
		}
		
		else
		{
			$this->load->view("error_404");
		}
	}
	
}

?>