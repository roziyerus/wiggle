<?php if(!defined('BASEPATH')) exit ('No direct script allowed');

class Access
{
	public $user; //variabel user tipe mdifier public
	
	function __construct()
	{
		
		$this->CI=& get_instance();
		$auth=$this->CI->config->item('auth');
		$this->CI->load->helper('cookie');
		$this->CI->load->model('member_area');

		$this->member_area=& $this->CI->member_area;
	}

	//function untuk login
	function login($username,$password)
	{
		$result=$this->member_area->get_login_info($username);
		if($result)
		{//jika username ditemukan maka 
			//$password=md5($password);
			if($password==$result->password){
			//session akan mulai dijalankan
				$this->CI->session->set_userdata(
				'id',$result->id);
				return true;
			}
		}
		return false;
	}
	
		//function untuk mengecek apakah sudah login/belum	
	function is_login()
	{
			return (($this->CI->session->user_data('id'))?true:false);
	} 
		
		//function untuk logout dengan session/menghapus data yang disimpan di session
		
	function logout()
	{
			$this->CI->session->unset_userdata('id');
	}
	
} //akhir class
?>