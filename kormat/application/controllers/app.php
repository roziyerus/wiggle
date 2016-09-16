<?php if(!defined('BASEPATH')) exit('No script allowed');
class App extends CI_Controller
{

	function __construct ()
	{
	parent ::__construct();
	$this->load->helper('html');
	$this->load->helper(array('form', 'url'));
	$this->load->library('template');
	$this->load->helper('file');
	$this->load->helper('directory');
	$this->load->helper('endekrip');
	$this->load->helper('backbutton');
	$this->load->helper('get_pp');
	$this->load->helper('formatbytes');
	$this->load->model('upload_model');
	$this->load->model('member_model');
	$this->load->helper('date');
	$this->load->helper('check_sess');
	is_logged_in();
	
	}
	
	
	function create_link()
	{	
		is_logged_in();
		$data['stat']=null;
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		$dt=$this->member_model->get_single_user($username,$password);
		foreach ( $dt as $d)
			{	
				$nim=$data['nim_kormat']=$d->nim;
			}
			
		
		$d=$this->member_model->get_user_by_makul($username,$password);//kurang kelas bisa diambil dari tabel users_data
			foreach ($d as $a)
			{
				$data['makul']=$a->nm_makul;
				$data['kelas']=$a->nm_class;
			}
		
		$do=$this->member_model->select_link_all();
			foreach ($do as $a)
			{
				$nm=$a->nim_kormat;
			
		if($nm==$nim)
		{	
			$get=$this->member_model->select_link($nim);
				foreach ($get as $h)
				{
				$lnk=$h->nim_kormat;
				}
			$data['link']=endekrip_id($lnk);
			$data['stat']='1';//notifikasi pembaharuan
			//$this->template->display('app/v_create_link',$data);
		}
		
			}
			$this->template->display('app/v_create_link',$data);
		
	
	}
	
	function do_cr_link()
	{	is_logged_in();
				 $data['stat']=null;
				 $creator=$this->input->post('nim'); 
				 $time=$this->input->post('time');
				 $dte=$this->input->post('date');
				 
			if($creator==''||null 
				||$time==''||null
				||$dte==''||null
				)
			
			{	 
				
				redirect('site/members_area');
			}
			
			else
			{
				
				list($bln,$tgl,$thn)=explode("-",$dte);
				
				$date=$thn."-".$bln."-".$tgl;
					
				$nudate=array($date,$time);
				$nudate=implode(" ", $nudate);
				
				$title=$this->input->post('title');
				$dekrip=$this->input->post('dekrip');
			
			
				if(	$do=$this->member_model->select_link($creator))
				{
						
						$dt['stat']='2';//notif link berhasil diperbarui
						$data=array
								(
									'nim_kormat'=>$creator,
									'date'=>$nudate,
									'judul_tugas'=>$title,
									'decrip_tugas'=>$dekrip,
								);
			
							 if(!$this->member_model->update_link($data,$creator))
							 {
								$get=$this->member_model->select_link($creator);
									foreach ($get as $h)
									{
										$lnk=$h->nim_kormat;
										$title=$h->judul_tugas;
									}
									$dt['link']=endekrip_id($lnk);
									$dt['title']=$title;
									$this->template->display('konten/v_link',$dt);
							 }
							 
							 else //jika gagal update table link_tugas kembali ke menu create_link
							 {
								$this->create_link();
							 }				
				}	
			
				else
				{		
							$dt['stat']='3';//notif link berhasil dibuat
							$data=array
									(
										'nim_kormat'=>$creator,
										'date'=>$nudate,
										'judul_tugas'=>$title,
										'decrip_tugas'=>$dekrip,
									);
									
							 
							 if(!$this->member_model->save_cr_link($data))
							 {	
									$get=$this->member_model->select_link($creator);
									foreach ($get as $h)
									{
										$lnk=$h->nim_kormat;
										$title=$h->judul_tugas;
									}
										
									$dt['link']=endekrip_id($lnk);
									$dt['title']=$title;
									//echo var_dump($dt);
									
									$this->template->display('konten/v_link',$dt);
							 }
							 else
							 {
								echo "error";	
							 }
				}		
		
			}
	}
	
	
	
	function create_zip()//fungsi untuk membuat kompresi file
	{	is_logged_in();				
		$this->load->library('zip');
		$id=$this->input->get_post('id_makul');
		$id_class=$this->input->post('id_class');
		$time=date("Y-m-d H:i:s");//gmdate("Y-m-d H:i:s",time()-60*60*8);
		$makul=$this->input->get_post('nama_file_zip');
		$dt_task=$this->input->post('dt_task');		

		
		if($makul!=' '||" " and $id!=' ')
		{	
			$makul=$makul.".zip";
			$read_file_zip=$this->zip->read_file('uploads/zipped/'.$makul);
		
				if(!$read_file_zip)//jika tidak ditemukan file zip di folder zipped maka akan dibuat file zip
					{

					if($dt_task=='-Judul Tugas-' ||$dt_task=='' || "")
					{
						$dt=$this->upload_model->select_all_files($id,$id_class);
						
						foreach($dt as $h)
						{
							$this->zip->read_file('uploads/files/'.$h->nm_files,false);	
						}
						
						
						$a=$this->zip->archive('uploads/files/'.$makul); //membuat file zip

						if($a)//mengecek jika berhasil file zip terbuat maka
						{	//mengkopi file ke folder zipped,
							copy('uploads/files/'.$makul,'uploads/zipped/'.$makul);
							
							if(unlink('uploads/files/'.$makul))//membaca file zip lagi di folder files, jika terbaca akan menghapusnya
							{//jika berhasil menghapus file di folder files
									
									$data=array
											(
												'nm_z_files'=>$makul,
												'time_created'=>$time,								
												'id_makul'=>$id,
												'id_class'=>$id_class
											);
									
									$this->load->model('upload_model');
									if(!$this->upload_model->insert_zip_files($data))
									{
										//echo"Succes store ".$makul." into folder zipped<br>";
										//echo anchor('site/members_area','Back');
										redirect('app/show_zip');
									}
								}
							
							else
							{
								echo"zzzz";
							}
						}
						
						
						else
							{
								echo"cannot create ".$makul." files";
								echo anchor('site/members_area','Back');
							}
						
						
					}
					
					else
					{	
						$dt=$this->upload_model->select_just_files($id,$dt_task,$id_class);
						
						foreach($dt as $h)
						{
							$this->zip->read_file('uploads/files/'.$h->nm_files,false);	
						}
						
						
						$a=$this->zip->archive('uploads/files/'.$makul); //membuat file zip

						if($a)//mengecek jika berhasil file zip terbuat maka
						{	//mengkopi file ke folder zipped,
							copy('uploads/files/'.$makul,'uploads/zipped/'.$makul);
							
							if(unlink('uploads/files/'.$makul))//membaca file zip lagi di folder files, jika terbaca akan menghapusnya
							{//jika berhasil menghapus file di folder files
									
									$data=array
											(
												'nm_z_files'=>$makul,
												'time_created'=>$time,								
												'id_makul'=>$id,
												'id_class'=>$id_class
											);
									
									$this->load->model('upload_model');
									if(!$this->upload_model->insert_zip_files($data))
									{
										//echo"Succes store ".$makul." into folder zipped<br>";
										//echo anchor('site/members_area','Back');
										redirect('app/show_zip');
									}
								}
							
							else
							{
								echo"zzzz";
							}
						}
						
						
						else
							{
								echo"cannot create ".$makul." files";
								echo anchor('site/members_area','Back');
							}
					}	
				}
				
				else
				{
					echo" File ".$makul." is exist <br>";
					echo anchor('site/members_area','Back');
				}
		}
		else
		{	//die("makul kosong");
			//echo "Nama berkas tidak boleh kosong";
			redirect('site/members_area');
		}
	
	}
	
	function show_zip()
	{	is_logged_in();
		//ambil id yg sesuai dg kormat
		//ambil data file zip by id
		//ambil info file
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		$dt=$this->member_model->get_single_user($username,$password);
		foreach($dt as $d)
		{
			$nim=$d->nim;
		}
	
		$data['data']=$this->upload_model->select_zip_files_by_kormat($nim);
		/*foreach ($a as $d)
		{	
			$file='./uploads/zipped/'.$d->nm_z_files;
			$data['size']=formatbytes($file, "MB");	
			//$data['size']=$s['file_size'];
			//$data['data']=$this->upload_model->select_zip_files_by_kormat($nim);
		}
		
		
        //$map = directory_map('./uploads/zipped/');
   		//$info=get_file_info('')
		*/
		$data['files']='./uploads/zipped/';
		$this->template->display('app/v_show_zip',$data);
	}
	
	
	
	function delete_files()//sementara g dipake
	{is_logged_in();
	$id=$this->input->post('id');
	
	$read_f=$this->upload_model->select_just_files($id);
	if($read_f)
	{
			foreach($read_f as $g)
					{
					$del_dt=$this->upload_model->delete_by_mk($id);
					$del_file=unlink('uploads/files/'.$g->nm_files);
					}
					
				if((!$del_dt) AND $del_file) 
				{
					redirect(base_url().'site/members_area');				
				}
				else{
					echo "gagal";
					}
	}
	
	else
	{
		echo"data empty";
	}
	
	}
	
	function download()//download file zip
	{	is_logged_in();
		$this->load->helper('download');
		$this->load->library('zip');
		$id=$this->uri->segment(3);
		$don=$this->upload_model-> select_zip_files_by_id($id);
			if($don)
			{	
					foreach ($don as $f)
					{	$this->zip->read_file('uploads/zipped/'.$f->nm_z_files,false);
						$this->zip->download($f->nm_z_files);
					}	
			}
			
			else
			{
				echo "Fail"; 	
			}
	}
	
	function delete()
	{
		is_logged_in();
		$this->load->library('zip');
		$id=$this->uri->segment(3);
		$don=$this->upload_model-> select_zip_files_by_id($id);

		if($don)
		{	
				foreach ($don as $f)
				{	
				
					$del_file=unlink('uploads/zipped/'.$f->nm_z_files);
				}	
				
				if((!$this->upload_model->delete_zip_by_mk($id)) AND $del_file) 
				{
					redirect(base_url().'app/show_zip');				
				}
				else
				{
					echo "Error";
				}
				
		}
		
		else
		{
		echo "Cannot select zip file"; 	
		}
	
	
	}
	

}
?>