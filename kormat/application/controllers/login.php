<?php if(!defined('BASEPATH')) exit ('No script allowed');
class Login extends CI_Controller 
{
	public $data;
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('endekrip');
		$this->load->helper('backbutton');
		$this->load->model('member_model');
		$this->load->library('email');
		$this->load->library('My_PHPMailer');
		$this->load->helper('html');
		$this->load->helper('check_sess_helper');
		backButtonHandle();
	}
	

	function index()
	{	backButtonHandle();
		cek_ses();
		
	}
	
	function lgin()
	{	backButtonHandle();	
		cek_ses_lg();
		
	}
//----------------------------- AUTHTENTIFIKASI-------------------------------------	
	function auth()
	{	
			$this->form_validation->set_rules
			('username','Username','callback_msg_error_username');
			$this->form_validation->set_rules
			('password','Password','callback_msg_error_pass');
		
		if($this->form_validation->run()==false)
		{
			$this->lgin();
		}
		
		
		else
		{	
			$this->load->model('member_model');
			if($cek=$this->member_model->validate())
			{
				$data=array
				(
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'is_logged_in'=>true,
				);
				$this->session->set_userdata($data);
				redirect('site/members_area');
			}
			
			else if($this->member_model->validate_admin())
			{
				$data=array
				(
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'is_logged_in'=>true,
				'level'=>'mimin'
				);
				$this->session->set_userdata($data);
				redirect('admin/index');
			}
			
			else
			{
					
					$this->lgin();
			
			}
		}
	
	}
	
			public function msg_error_username($user)//penambahan pesan error jika username kosong
			{
					if(trim($user)==''||null)
					{
						$this->form_validation->set_message('msg_error_username', 'Username tidak boleh kosong');
						return FALSE;
					}
					else
					{
						return TRUE;
					}	
			}
			
			public function msg_error_pass($pass)//penambahan pesan error jika password kosong
			{
					if($pass==''||null)
					{
						$this->form_validation->set_message('msg_error_pass', 'Password tidak boleh kosong');
						return FALSE;
					}
					else
					{
						return TRUE;
					}	
			}
	
//------------------------------------- LOGOUT -------------------------------------------
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}

	
//------------------------------------- SIGN UP --------------------------------------------	
	function sign_up()
	{	
		$data['makul']=$this->member_model->select_all_makul_by_semester();
		$data['angkatan']=$this->member_model->select_angkatan();
		$data['kelas']=$this->member_model->select_class();
		$this->load->view('v_sign_up',$data);
	}
	
	function cek_nim()
	{
		$nim=$this->uri->segment(3);
		$i=strlen($nim);
	if($i<14 ||$i>14)
	{
		echo "no_valid";
	}
	
	else if($i=14)
	{	
		if($this->member_model->cek_available($nim))
		{
			echo  true;//sudah ada
		}
		else
		{
			echo false;// belum ada
		}
		
	}
	else
	{
		echo "no_valid";
	}
		
	}
	
	function do_sign_up()
	{
	
		$this->form_validation->set_rules
		('full-name','Nama lengkap','trim|required');
		$this->form_validation->set_rules
		('nim','NIM','trim|required|min_length[4]');
		
		$this->form_validation->set_rules
		('angkatan','Angkatan','is_natural_no_zero|required');
		
		$this->form_validation->set_rules
		('id_makul','Mata Kuliah','is_natural_no_zero|required');
		
		$this->form_validation->set_rules
		('clas','Kelas','is_natural_no_zero|required');
	
		$this->form_validation->set_rules
		('username','Username','trim|required|min_length[4]');
		
		$this->form_validation->set_rules
		('email','Email','trim|required|valid_email');
		
		$this->form_validation->set_rules
		('password','Password','trim|required|min_length[8]');
		
		

	if($this->form_validation->run()==false)
		{
		
			$this->sign_up();
		
		}
	else
		{
					 $full_name=$this->input->post('full-name');
					 $nim=$this->input->post('nim');
					 $angkatan=$this->input->post('angkatan');//angkatan
					 $makul=$this->input->post('id_makul');
					 $clas=$this->input->post('clas');
					 $username=$this->input->post('username');
					 $password=$this->input->post('password');
					 $email=$this->input->post('email');
					 $datetime=date("Y-m-d H:i:s");
			//-- cek sudah ada yg daftar belum----
				
					 //$id_user=$this->input->post('id_user');
			
					$insert = array
					(
						'full_name'=>$full_name,
						'nim'=>$nim,
						'email'=>$email,
						'angkatan'=>$angkatan,
						'username'=>$username,
						'password'=>md5($password),
						'status'=>0,
						'joined'=>$datetime,
						'id_makul'=>$makul,
						'id_class'=>$clas//pake id class
					);
				
					$token=sha1(uniqid($full_name,true));
					$timestamp=time();//pencatatan waktu
					//tabel pending users
					$data=array(
						'username'=>$username,
						'token'=>$token,
						'timestamp'=>$timestamp,
						'nim'=>$nim
						);
				
		//--------------------------------------------------- SEND TOKEN ----------------------------------------------		
				if(!$this->member_model->insert_user_data($insert) and !$this->member_model->insert_pending_users($data))
				{	
					$link=base_url().'activate/u/'.$token;
					$msg="<p>Selamat bergabung menjadi bagian Jadikormat, silahkan lakukan aktivasi dengan mengklik tautan ini ".$link." agar 
							kamu bahagia menjadi kormat</p>";
					
					
					$mail=new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='ssl';
					$mail->Host='smtp.gmail.com';
					$mail->Port=465;
					$mail->Username='roziyers@gmail.com';
					$mail->Password='1202173125';
					$mail->SetFrom('roziyers@gmail.com','Sintesis Studio');
					$mail->Subject='Verifikasi Akun';
					$mail->MsgHTML($msg);
					$mail->AddAddress($email);
						
					/*Webmail Address	http://webmail.2freehosting.com
					Login Username	support@himaskomfm.tk
					Password	******
					POP3/IMAP Host	mx1.2freehosting.com
					POP3 Port	110
					IMAP Port	143
					SMTP Host	mx1.2freehosting.com
					SMTP Port	2525	*/
				/*		
					$mail=new PHPMailer();
					$mail->IsSMTP();
					//$mail->SMTPDebug  = 2;    
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='ssl';
					$mail->Host='ototkawat.ototkawat.com ';
					$mail->Port= 465;
					$mail->Username='support@sintesisstudio.com';
					$mail->Password='$upp0rt1';
					$mail->SetFrom('sintesis@sintesisstudio.com','Sintesis Studio');
					$mail->Subject='Verifikasi Akun';
					$mail->MsgHTML($msg);
					$mail->AddAddress($email);*/
		
						
					if($mail->send())
					{	
						//echo "Your token has beent sent to your mail". $email." Check your email";
						$data['h_msg']="Selamat Kamu Berhasil Bergabung :)";
						$data['msg']="Kode aktifasi sudah terkirim ke email kamu ".$email." masa aktifasi 24 jam, silahkan cek email untuk jadi kormat bahagia ";
						$this->load->view('msg_sent_token',$data);
					}
					
					else
					{	$data['h_msg']=null;
						$data['msg']="Maaf, ada kesalahan :( , akan segera kami perbaiki, 
										jenis kesalahan".$mail->ErrorInfo;
						$this->load->view('msg_sent_token',$data);
					}
				}
				
				else
				{
					echo"fail";
				}
			
		}
		
		
	}
	
}
?>