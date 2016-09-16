<?php if(!defined('BASEPATH')) exit ('N direct script access');

class Member_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!this->access->is_login())
		{
			redirect('login/login_validate');
		}
	}
	
	function is_login()
	{
		return $this->access->is_login();
	}
	
class MY_Contrller extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
}