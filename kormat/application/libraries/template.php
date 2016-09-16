<?php if(!defined('BASEPATH')) exit ('No script allowed');
class Template
{
	protected $_ci;
	
	function __construct()
	{
	$this->_ci=&get_instance();
	}
	
	function display($template, $data=null)
	{
		$data['_content']=$this->_ci->load->view($template,$data,true);
		//$data['_header']=$this->_ci->load->view('template/header',$data,true);
		//$data['_left_menu']=$this->_ci->load->view('template/left_menu',$data,true);
		//$data['_menu_bar']=$this->_ci->load->view('v_content_menu',$data,true);
		$this->_ci->load->view('template/template1.php',$data);
	}
	
	function admin_display($template, $data=null)
	{
		$data['menu']=$this->_ci->load->view($template,$data,true);
		$this->_ci->load->view('admin/mimin.php',$data);
	}
	
}

?>