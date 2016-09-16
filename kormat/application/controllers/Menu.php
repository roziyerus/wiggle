<?php if(!defined('BASEPATH')) exit ('No script allowed');
class Menu extends CI_Controller{
function __construct()
{

	parent:: __construct();
	$this->load->helper('backbutton');
	$this->load->library('session');
	$this->load->helper('get_pp');
	$this->load->helper('html');
	$this->load->helper(array('form', 'url'));
	$this->load->helper('check_sess');
	$this->load->model('upload_model');
	is_logged_in();	
}

	function search()
	{	
	
	//echo "ini adalah menu search";
		$this->load->library('template');
		$this->template->display('welcome_message');
	//$this->template->display('v_content_result');
	}

	function show_makul()
	{	is_logged_in();
		$this->load->model('upload_model');
		$id=$this->input->post('id_makul');//mengambil id makul dari file v_menu_makul
		

		if($this->upload_model->select_files_by_mk($id))
		{	
			$dt['id']=$id;
			
			$dt['result']=$this->upload_model->select_files_by_mk($id);
			$this->load->library('template');
			$this->template->display('konten/v_content_makul_result',$dt);
		}
		else
		{
		redirect(base_url().'site/members_area');
		}
	}
	

}
?>