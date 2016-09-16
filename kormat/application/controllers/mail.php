<?php if(!defined('BASEPATH')) exit ('No single script allowed');
class Mail extends CI_Controller{
	
	function __construct()
	{
	parent::__construct();
	$this->load->helper('html');
	$this->load->helper(array('form','url'));
	$this->load->library('template');
	$this->load->helper('get_pp');
	$this->load->model('member_model');
	$this->load->model('upload_model');
	$this->load->library('email');
	$this->load->helper('file');
	$this->load->library('zip');
	$this->load->library('My_PHPMailer');
	$this->load->helper('path');
	$this->load->helper('backbutton');
	$this->load->helper('check_sess');
	is_logged_in();
	backButtonHandle();
	}

	function index()
	{	
	is_logged_in();
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		$dt=$this->member_model->get_single_user($username,$password);
		foreach($dt as $d)
		{
			$nim=$d->nim;
		}
		
		$data['result']=$this->upload_model->select_zip_files_by_kormat($nim);
		
		
		$this->template->display('app/v_sendmail',$data);
	}
	
	function searchMailDosen()//untuk auto complete
	{	
		$dosen=$_GET['query'];
		$a=$this->member_model->select_email_dosen($dosen);
		foreach($a as $row)
		{
			$arr['query'] = $dosen;
         	$arr['suggestions'][]= array('value'  =>$row->email_dosen);
		}
		echo json_encode($arr);
	}
	
	function send()//trigger mengirim berkas
	{	is_logged_in();
	 //mengambil data dari halaman view v_sendmail;
	 $id=$this->input->post('id');
	 $msg=$this->input->post('msg');
	 $to=$this->input->post('to');
	 $from=$this->input->post('from');
	 $subject=$this->input->post('subject');
	
		$result=$this->upload_model->select_zip_files_by_id($id);
		if($result)
		{
			foreach($result as $d)
			 {	//njereng file zip
				$b=$d->nm_z_files;		
			 }
				$mail=new PHPMailer();
				//kalo pengirim pengen disesuaikan sama emailnya maka alamat email dipanggil dari dab
				 //dicek kalo gmai/ymail maka:
				 
				$mail->IsSMTP();
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='ssl';
				$mail->Host='smtp.gmail.com';
				$mail->Port=465;
				$mail->Username='roziyers@gmail.com';
				$mail->Password='1202173125';
				$mail->SetFrom('roziyers@gmail.com',$from);
				$mail->Subject=$subject;
				$mail->MsgHTML($msg);
				$mail->AddAddress($to,'dosen');
				$cc=$mail->AddAttachment('uploads/zipped/'.$b);
				if($cc)
				{
					if($mail->send()){echo "Success"; echo anchor('mail/index','Back');}
					
					else{echo $mail->ErrorInfo; echo "FAILED";
						echo anchor('mail/send',"Try again"); }
				}
				else
				{
					echo"error";
				}
		}
		else
		{
			echo "File not found or corrupt<br>";
			echo anchor('mail/index','Back');
		}
	
	
	}
	
	

	
}
?>

