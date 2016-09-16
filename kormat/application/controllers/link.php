<?php
if(!defined('BASEPATH')) exit('No script allowed');
class Link extends CI_Controller
{

	function __construct()
	{
			
	parent ::__construct();
	$this->load->helper('html');
	$this->load->helper(array('form', 'url'));
	$this->load->library('upload');
	$this->load->helper('file');
	$this->load->helper('endekrip');
	$this->load->helper('directory');
	$this->load->model('upload_model');
	$this->load->model('member_model');

	}
	
	function p()
	{
		$id=$this->uri->segment(3);
		$id=endekrip_id($id,true);

		if($dt=$this->member_model->select_link($id))//id=nim kormat
		{
			foreach ($dt as $d)
				{
					$nim_kormat=$d->nim_kormat;
					$data['title']=$d->judul_tugas;
					//$data['times']=$d->times;		 
					$dt=$d->date;
					$data['dt_link']=$dt;
					$data['date']=$dt=date("d-m-Y H:i:s ",strtotime($dt));
					$data['decrip']=$d->decrip_tugas;
				}
				
			
	//form input nama pengirim
			
		$h=$this->member_model->select_makul_by_user($nim_kormat);
		foreach ($h as $d)
		{	$id_mk=$d->id_makul;
			$makul=$d->nm_makul;	
			$nama_kormat=$d->full_name;
			$kelas=$d->nm_class;
			$id_class=$d->id_class;
			
		}
		
		$data['id_mk']=$id_mk;
		$data['makul']=$makul;
		$data['nama_kormat']=$nama_kormat;
		$data['kelas']=$kelas;
		$data['id_class']=$id_class;
		
		
		$this->load->view('aplot/v_upload',$data);
		}
		else 
		{	
			$this->load->view('error_link');
		}
		
	}
	
	function check_nim()
	{	

		$id=$this->uri->segment(3);//nama kormat
		$id=str_replace("%20"," ",$id);
	
		$nim=$this->uri->segment(4);//nim pengirim
		
		if($id!=""&& $nim!="")
		{
			
			$cek=$this->member_model->cek_task_sender($id);
			foreach ($cek as $m)
			{
				if($m->nim==$nim)
					{
					echo true;
					}
				
				else
					{
					echo false;				
					}
			}	
		}	
		else
		{
			
			$this->load->view('error_link');
		}
	}
	
	
	
	function do_upload()
	{
		//untuk validasi form
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nim','NIM','trim|required|min_length[4]');
		$this->form_validation->set_rules('nama','Name','trim|required');
		//$this->form_validation->set_rules('makul','Makul','is_natural_no_zero|required');

			if($this->form_validation->run()==false)
			{
			$this->p();
			}
			else
			{		
					$config['upload_path']='./uploads/files';
					$config['allowed_types']='doc|docx|txt|ppt|pptx';
					$config['max_size']='20000000';
					$config['max_width']='1024';
					$config['max_height']='768';
					$config['file_name']=$this->input->post('userfile');
						
					$this->upload->initialize($config);	
					
					if($this->upload->do_upload('userfile'))
					{	//$data = array('upload_data' => $this->upload->data());
				
						$this->load->model('upload_model');
						
						//$now=gmdate('Y-m-d H:i:s',time()-60*60*8);//tanggal file diupload
						$now=date("Y-m-d H:i:s");	
						
						$insert=array
						(
							'nim'=>$this->input->post('nim'),//nim pengirim
							'nm_files'=>$this->upload->file_name,//nama files $this->upload->file_name
							'nm_pengirim'=>$this->input->post('nama'),
							'id_makul'=>$this->input->post('makul'),//tugas sesuai makul yang dipilih akan diatur id_makul
							'dt'=>$now,
							'dt_task'=>$this->input->post('dt_task'),
							'id_class'=>$this->input->post('id_class')
						);
													
							if($this->upload_model->insert_files($insert)==true)
								{
									$data['msg']="gagal mengunggah";
									$this->load->view('aplot/msg_upload',$data);
								}
							
							else	
								{
									$data['msg']="Selamat ! tugas kamu telah terkirim, semoga dapet nilai bagus :)";
									$this->load->view('aplot/msg_upload',$data);
								} 
						
					}
					
					else
					{	
						echo "Nama file yg diunggah ".$nama_file;
					
						echo "Maaf, tugas kamu gagal diunggah";
					}
				
			}
	}
	
		
	
		
}	

?>