<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library('session');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->helper('backbutton');
		$this->load->helper('check_sess');
		backButtonHandle();
		is_logged_in();
	}
	
	
	function index()
	{	
		is_logged_in();
		$this->template->admin_display('admin/menu/menu');
	}
	
	
	//setting change admin
	function set_admin()
	{	is_logged_in();
		$username=$this->session->userdata('username');	
		$password=$this->session->userdata('password');
		
		$h=$this->member_model->select_mimin_by($username,$password);
		foreach($h as $m)
		{
			$data['id']=$m->id;
			$data['username']=$m->username;
			$data['password']=$m->password;
		}
		$this->template->admin_display('admin/akun/e_akun',$data);
	}
	
	function save_set_admin()
	{	is_logged_in();
		$id['id']=$this->uri->segment(3);
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$data=array
					(
						'username'=>$username,
						'password'=>$password
					);	
		
		if(!$this->member_model->update_akun_mimin($data,$id))
			{	
				$this->session->set_userdata($data);
				redirect('admin/set_admin');
			}
			
		else
			{
				echo "gagal";
			}	
	}
	
	
	
	//angkatan
	function angkatan()
	{	is_logged_in();
		$data['data']=$this->member_model->select_angkatan();
		$this->template->admin_display('admin/angkatan/angkatan',$data);
	}
	
	function add_angkatan()
	{	is_logged_in();
		$this->form_validation->set_rules('nm_angkatan','Angkatan','callback_nm_makul');
		$this->form_validation->set_rules('kd_angkatan','Kode Angkatan','callback_kd_makul');
		
		if($this->form_validation->run()==false)
		{
			$this->angkatan();
		}
		else
		{
			$nm_angkatan=$this->input->post('nm_angkatan');
			$kd_angkatan=$this->input->post('kd_angkatan');
			$semester=$this->input->post('semester');
			$data=array(
						'kd_angkatan'=>$kd_angkatan,
						'nm_angkatan'=>$nm_angkatan,
						);
			if(!$this->member_model->insert_angkatan($data))
			{
				redirect('admin/angkatan');
			}
			
			return false;
		}
	}
	
				public function nm_angkatan($nm)
				{
					if($nm==null|'')
						{
							$this->form_validation->set_message('nm_angkatan','Angkatan kuliah tidak boleh kosong');
							return false;
						}
					else
						{
							return true;
						}
				}
				
				public function kd_angkatan($kd)
				{
					if($kd==null|'')
						{
							$this->form_validation->set_message('kd_angkatan',"Kode Angkatan kuliah tidak boleh kosong");
							return false;
						}
					else
						{
							return true;
						}
				}
	
	
	
	function edit_angkatan()
	{	is_logged_in();
		$id=$this->uri->segment(3);
		$hasil=$this->member_model->select_angkatan_by($id);
		foreach ($hasil as $h)
		{
			$data['kd_angkatan']=$h->kd_angkatan;
			$data['nm_angkatan']=$h->nm_angkatan;
		}
		$this->template->admin_display('admin/angkatan/e_angkatan',$data);
		
		
	}
	
	function save_angkatan()
	{	is_logged_in();
		$id['kd_angkatan']=$this->uri->segment(3);
		$kd_angkatan=$this->input->post('kd_angkatan');
		$nm_angkatan=$this->input->post('nm_angkatan');
		
		$data=array
				(
					'kd_angkatan'=>$kd_angkatan,
					'nm_angkatan'=>$nm_angkatan
				);
		
		if(!$this->member_model->update_angkatan_by($data,$id))
		{
			redirect('admin','refresh');
		}
		else
		{
			$this->edit_angkatan();
		}
	}
	
	function delete_angkatan()
	{	is_logged_in();
		$id=$this->uri->segment(3);
		
		if($this->member_model->delete_angkatan_by_id($id))
		{
			redirect('admin/index','refresh');
		}
		
		else
		{
			redirect('admin/angkatan');
		}
	}
	
	
	//mata kuliah
	
	function makul()
	{	is_logged_in();	
		$data['data']=$this->member_model->select_all_makul();
		$this->template->admin_display('admin/makul/mk',$data);
	}
	
	function makul_by_sem()
	{	is_logged_in();
		$sem=$_POST['sem'];
		echo "nilai ".$sem;
		die();
		$data['data']=$this->member->model->select_makul_by_sem($sem);
		$this->template->admin_display('admin/makul/mk',$data);
	}
	
	
	
	function add_makul()
	{	is_logged_in();
		$this->form_validation->set_rules('nm_makul','Nama Makul','callback_nm_makul');
		$this->form_validation->set_rules('kd_makul','Kode Makul','callback_kd_makul');
		
		if($this->form_validation->run()==false)
		{
			$this->makul();
		}
		else
		{
			$nm_makul=$this->input->post('nm_makul');
			$kd_makul=$this->input->post('kd_makul');
			$semester=$this->input->post('semester');
			$data=array(
						'id_makul'=>$kd_makul,
						'nm_makul'=>$nm_makul,
						'semester'=>$semester
						);
			if(!$this->member_model->insert_makul($data))
			{
				redirect('admin/makul');
			}
			
			return false;
		}
	}
	
				public function nm_makul($nm)
				{
					if($nm==null|'')
						{
							$this->form_validation->set_message('nm_makul','Nama mata kuliah tidak boleh kosong');
							return false;
						}
					else
						{
							return true;
						}
				}
				
				public function kd_makul($kd)
				{
					if($kd==null|'')
						{
							$this->form_validation->set_message('kd_makul',"Kode mata kuliah tidak boleh kosong");
							return false;
						}
					else
						{
							return true;
						}
				}
	
	
	
	function edit_makul()
	{	is_logged_in();
		$id=$this->uri->segment(3);
		$hasil=$this->member_model->select_makul_by($id);
		foreach ($hasil as $h)
		{
			$data['id_makul']=$h->id_makul;
			$data['nm_makul']=$h->nm_makul;
			$data['semester']=$h->semester;
		}
		$this->template->admin_display('admin/makul/e_mk',$data);
	}
	
	function save_makul()
	{	is_logged_in();
			$nm_makul=$this->input->post('nm_makul');
			$_kd_makul['id_makul']=$this->uri->segment(3);
			$kd_makul=$this->input->post('id_makul');
			$semester=$this->input->post('semester');
			
			$data=array(
						'id_makul'=>$kd_makul,
						'nm_makul'=>$nm_makul,
						'semester'=>$semester
						);
			if(!$this->member_model->update_makul($data,$_kd_makul))
			{
				redirect('admin/makul');
			}
			
			return false;
	}
	
	function delete_makul()
	{	is_logged_in();
		$id=$this->uri->segment(3);
		if(!$this->member_model->delete_makul_by($id))
		{
			redirect('admin/makul');
		}
		return false;
		
	}
	
	//email dosen
	
	function email_dosen()
	{	is_logged_in();
		$data['data']=$this->member_model->select_all_email_dosen();
		$this->template->admin_display('admin/email_dosen/email_dosen',$data);
	}
	
	
	function add_email_dosen()
	{	is_logged_in();
		$this->form_validation->set_rules('nm_dosen','Nama Dosen','callback_nm_dosen');
		$this->form_validation->set_rules('email_dosen','Email Dosen','callback_mail_dosen');
		
		if($this->form_validation->run()==false)
		{
			$this->makul();
		}
		else
		{
			$nm_dosen=$this->input->post('nm_dosen');
			$email_dosen=$this->input->post('email_dosen');
	
			$data=array(
						'id'=>'',
						'nm_dosen'=>$nm_dosen,
						'email_dosen'=>$email_dosen
						);
			if(!$this->member_model->insert_email_dosen($data))
			{
				redirect('admin/email_dosen');
			}
			
			return false;
		}
	}
	
				public function nm_dosen($nm)
				{
					if($nm==null|'')
						{
							$this->form_validation->set_message('nm_dosen','Nama Dosen tidak boleh kosong');
							return false;
						}
					else
						{
							return true;
						}
				}
				
				public function mail_dosen($kd)
				{
					if($kd==null|'')
						{
							$this->form_validation->set_message('email_dosen',"Email Dosen tidak boleh kosong");
							return false;
						}
					else
						{
							return true;
						}
				}
	
	
	function save_email_dosen()
	{		is_logged_in();
			$id=$this->uri->segment(3);
			$nm_dosen=$this->input->post('nm_dosen');
			$email_dosen=$this->input->post('email_dosen');
	
			$data=array(
						'id'=>'',
						'nm_dosen'=>$nm_dosen,
						'email_dosen'=>$email_dosen
						);
			if(!$this->member_model->insert_email_dosen($data,$id))
			{
				redirect('admin/email_dosen');
			}
			
			return false;
	}
	
	
	function edit_email_dosen()
	{	is_logged_in();
		$id=$this->uri->segment(3);
		$hasil=$this->member_model->select_email_dosen_by($id);
		foreach ($hasil as $h)
		{
			$data['id']=$h->id;
			$data['nm_dosen']=$h->nm_dosen;
			$data['email_dosen']=$h->email_dosen;
		}
		$this->template->admin_display('admin/email_dosen/e_email_dosen',$data);
	}
	
	function save_edit_email_dosen()
	{
		$id['id']=$this->uri->segment(3);
		$nm_dosen=$this->input->post('nm_dosen');
		$email_dosen=$this->input->post('email_dosen');

		$data=array(
						'nm_dosen'=>$nm_dosen,
						'email_dosen'=>$email_dosen
						);
		if(!$this->member_model->update_email_dosen($data,$id))
		{
				redirect('admin/email_dosen');
		}
			
		return false;
	
	}
	
	
	
	function delete_email_dosen()
	{	is_logged_in();
		$id=$this->uri->segment(3);
		if(!$this->member_model->delete_email_dosen_by($id))
		{
			redirect('admin/email_dosen');
		}
		return false;
		
	}	
	
	
	//setting
	function setting()
	{	is_logged_in();
		$data['data']=$this->member_model->select_setting_makul();
		$this->template->admin_display('admin/setting/setting',$data);
	}
	
	function save_setting()
	{	is_logged_in();
		$makul_sem=$this->input->post('makul_sem');
		$data['set_makul']=$makul_sem;
		if(!$this->member_model->update_setting_makul($data))
		{
			echo "<h4>Perubahan pengaturan berhasil disimpan</h4>";
		}
		else
		{
			echo "Mengalami gangguan";
		}
		
	}
	
	//user
	function users()
	{	is_logged_in();
		$data['users']=$this->member_model->select_all_users_activated();
		$this->template->admin_display('admin/users/user',$data);
	}
	
	function block_user()
	{	is_logged_in();
		$nim=$this->uri->segment(3);
		if(!$this->member_model->block_status_user($nim))
		{
			redirect('admin/users');
		}
	}
	
	function unblock_user()
	{	is_logged_in();
		$nim=$this->uri->segment(3);
		if(!$this->member_model->unblock_status_user($nim))
		{
			redirect('admin/users');
		}
	}
}
?>