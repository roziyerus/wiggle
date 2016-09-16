<?php if(!defined('BASEPATH')) exit('No script allowed');
class Site extends CI_Controller{
	
	function __construct(){
	parent:: __construct();
	$this->load->model('member_model');
	$this->load->model('upload_model');
	$this->load->helper('check_sess');
	$this->load->helper('backbutton');
	$this->load->helper('get_pp');
	$this->load->library('session');
	$this->load->library('upload');
	$this->load->helper('html');
	$this->load->helper(array('form', 'url'));
	$this->load->library('template');
	$this->load->library('table');
	$this->load->library('javascript');
	$this->load->library('pagination');
	is_logged_in();//untuk mengecek user sudah login atau belum

	}
	
	function members_area(){
	//method untuk menghilangkan cache browser
	is_logged_in();
	
	//ambil foto dulu
	
	
	$this->template->display('template/menu');
	
	}
	
	function files()
	{
	is_logged_in();
		//mengambil id dari data user
	$user=$this->session->userdata('username');
	$pass=$this->session->userdata('password');
	
	$cek=$this->member_model->get_single_user($user,$pass);
	foreach ( $cek as $d)
	{
		$nim=$d->nim;//ambil data file berdasarkan nim
	}
	
	$get_id=$this->member_model->get_user_by_makul($user,$pass); //ambil id, nama makul, kelas
		foreach ($get_id as $d)
			{
			$data['id_makul']=$d->id_makul;
			$data['nm_makul']=$d->nm_makul;
			$data['nm_class']=$d->nm_class;
			$data['id_class']=$d->id_class;
			}
	
	if(!$data['result']=$this->member_model->select_all_files_by_user_id_pagination($nim,$config['per_page']=8,$this->uri->segment(3)))
	{
		$data['msg']="File empty";
	}
	
	else
	{	
		$data['msg']="";
		//membuat pagination,sebagian config ada di config/pagination.php
		$config['base_url']=base_url().'site/files';
		$config['total_rows']=$this->member_model->num_rows($nim);//jumlah baris by ko
		$config['uri_segment']=3;
		$config['use_page_numbers']=true;
		$config['num_links']=2;
		//inisialisasi config dari library pagination
		$this->pagination->initialize($config);
		//membuat pagination
		$data['pages']=$this->pagination->create_links();
		//membuat data
		
		$data['tanggal']=$this->member_model->select_tgl_by_user($nim);
		
		$this->template->display('konten/v_content_result',$data); //template akan diisi konten dari file v_content_menu
	}
	
	
	
	
	}
	
	function show_many_page()//ajxnya masih error
	{	
		$per_page=$_POST['page'];
		$dt_task=$_POST['dt_task'];
		
		
			$user=$this->session->userdata('username');
			$pass=$this->session->userdata('password');
			
			$cek=$this->member_model->get_single_user($user,$pass);
			foreach ( $cek as $d)
			{
				$nim=$d->nim;//ambil data file berdasarkan nim
			}
			
			//$get_id=$this->member_model->get_user_by_makul($user,$pass);

		if($dt_task=='-Judul Tugas-')
		{
		$do=$this->member_model->select_all_files_by_user_id_dat($nim);
			
			$no=1;
			foreach($do as $h)
			{	
				echo "		
					<tr>
					<td>". $no++."</td>
					<td>".$h->nm_files."</td>
					<td>". $h->nm_pengirim."</td>
					<td>".$h->nim."</td>
					<td>". $h->dt."</td></tr>";
										
			}
		}	
		else
		{
			$do=$this->member_model->select_all_files_by_user_id($nim,$dt_task);
			
			$no=1;
			foreach($do as $h)
			{	
				//echo $d->id." ".$d->nm_files." ".$d->nm_pengirim." ".$d->nim." ".$d->date;
				
				echo "		
					<tr>
					<td>". $no++."</td>
					<td>".$h->nm_files."</td>
					<td>". $h->nm_pengirim."</td>
					<td>".$h->nim."</td>
					<td>". $h->dt."</td></tr>";
										
			}
		}	
		//foreach ($get_id as $d){$data['id_makul']=$d->id_makul;}
	/*
		$config['base_url']=base_url().'site/members_area';//pagination
		$config['total_rows']=$this->member_model->num_rows($nim);
		$config['uri_segment']=3;
		$config['use_page_numbers']=true;
		$config['num_links']=2;
		$this->pagination->initialize($config);
		$data['pages']=$this->pagination->create_links();
		$data['result']=$this->member_model->select_all_files_by_user_id_pagination($nim,$config['per_page']=$per_page,$this->uri->segment(3));
		
		$this->template->display('konten/v_content_result',$data); //template akan diisi konten dari file v_content_menu
		*/
	}

	function show_page_by_date()
	{
		$tgl=$_POST['tgl'];
		
		
		
		$user=$this->session->userdata('username');
		$pass=$this->session->userdata('password');
		
		$cek=$this->member_model->get_single_user($user,$pass);
		foreach ( $cek as $d)
		{
			$nim=$d->nim;//ambil data file berdasarkan nim
		}
		
		//$get_id=$this->member_model->get_user_by_makul($user,$pass);
	if($tgl=='-Judul Tugas-')
		{
			if($do=$this->member_model->select_all_files_by_user_id_dat($nim))
			{
				//echo "ini tanggal ".$tgl;
				//die();
				$no=1;
				foreach($do as $h)
				{
					echo "
						<tr>
						<td>". $no++."</td>
						<td>".$h->nm_files."</td>
						<td>". $h->nm_pengirim."</td>
						<td>".$h->nim."</td>
						<td>". $h->dt."</td></tr>";
				}
			}		
		}
	else
	{	
			if($do=$this->member_model->select_all_files_by_user_id_date($nim,$tgl))
			{
				//echo "ini tanggal ".$tgl;
				//die();
				$no=1;
				foreach($do as $h)
				{
					echo "
						<tr>
						<td>". $no++."</td>
						<td>".$h->nm_files."</td>
						<td>". $h->nm_pengirim."</td>
						<td>".$h->nim."</td>
						<td>". $h->dt."</td></tr>";
				}
			}
			else
			{		echo "
						
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td></tr>";
				
				
			}	
	}
	}
	
	function edit_user()
	{ is_logged_in();
	$username=$this->session->userdata('username'); 
	$password=$this->session->userdata('password'); 
	$dt['data_user']=$this->member_model->get_single_user($username,$password);
	
	$ft=$this->member_model->get_single_user($username,$password);//ambil nim untuk ambil gambar
	
	foreach($ft as $f)
	{
		$nim=$f->nim;
	}
	
	if($get_ft=$this->upload_model->select_picture_by($nim))
	{
		foreach($get_ft as $ff)
		{
			$dt['profile_pic']=$ff->photos_name;
		}
	}
	else
	{
		$dt['profile_pic']=null;
	}
	
	$this->template->display('konten/v_menu_edit_profil',$dt);
	}
	
	function save_edit_user()
	{	is_logged_in();
		$id['nim']=$this->input->post('id');//pake nim
		$user=$this->input->post('user');
		$password=$this->input->post('password');
		//gambar
		
		//$config['allowed_types']='jpg';
			//		$config['max_size']='20000000';
				//	$config['max_width']='1024';
					//$config['max_height']='768';
					
		$config['upload_path']='./asset/img/users_photos';
		$config['file_name']=$this->input->post('profileimage');
		$this->upload->initialize($config);
		if($this->upload->do_upload('profileimage'))
		{//$data = array('upload_data' => $this->upload->data());
		echo "nama file ".$this->upload->file_name;
		}
		else
		{echo "gagal";
		}
		die();
		$data=array(
					'username'=>$user,
					'password'=>$password,
					'email'=>$email
					);
		if(!$this->member_model->save_edit_user($data,$id))
		{	
			$data=array
					(
					'username'=>$user,
					'password'=>$password,
					'is_logged_in'=>true
					);
			
			$this->session->set_userdata($data);
			redirect('site/edit_user');
		}
		else
		{
		echo "Failed";
		}
		
	}
	
	function photo_users_upload()
	{	is_logged_in();
		
		$user=$this->input->post('user');
		$password=md5($this->input->post('password'));
		$email=$this->input->post('email');
		$nim=$this->uri->segment(3);
		$id['nim']=$nim;
		//filenya
		$file = isset($_FILES['profileimage']['name']) ? $_FILES['profileimage'] : '';
		$fileArr = explode("." , $file["name"]);
		$ext = $fileArr[count($fileArr)-1];
		$allowed = array("jpg", "jpeg", "png", "gif", "bmp");
		
		$file_name=$file["name"];
		$size_file=$_FILES['profileimage']['size'];
		
		$size_maks=512*1024;// 512KB
		
		 if(
			($user==''||'0') ||
			($password==''||'0') ||
			($email==''||'0'||null) 
			)	
			{	
				redirect('site/members_area');
			}	
		
		else
			{	
					if($file_name!=null and( $size_file<$size_maks and $size_file>0))
						{	
						//die("Masuk kesini 1");
						//cek di db dulu udah ada fotonya apa belum
						if(!$get_pp=$this->upload_model->select_picture_by($nim))//jika tidak ada
							{	//die("Belum ada foto");	
									if (in_array($ext, $allowed) )
									{
										move_uploaded_file($file["tmp_name"],"asset/img/users_photos/".$file["name"]);
										
										$data=array(
													'nim'=>$nim,
													'photos_name'=>$file_name
													);
													
										$insert_edit_user=array(
										'username'=>$user,
										'password'=>$password,
										'email'=>$email
										
										);			
										if(!$this->upload_model->insert_users_photos($data) and !$this->member_model->save_edit_user($insert_edit_user,$id))
										{	$update_session=array(
												'username'=>$user,
												'password'=>$password,
												'is_logged_in'=>true
												);
								
												$this->session->set_userdata($update_session);
												redirect('site/edit_user');
										}		
									}	
									
									else
									{
										echo "invalid extension";
									}
					
							
							}		
							
							
						else 
							{	//select dulu di database
								foreach($get_pp as $g)
								{
									$pic_name=$g->photos_name;
								}
								
								if (unlink('asset/img/users_photos/'.$pic_name) and $allowed)
								{	//die("Masuk sini udah dihapus brohhh");
									move_uploaded_file($file["tmp_name"],"asset/img/users_photos/".$file["name"]);
									
									$data=array(
												'nim'=>$nim,
												'photos_name'=>$file_name
												);
												
									$insert_edit_user=array(
									'username'=>$user,
									'password'=>$password,
									'email'=>$email
									
									);			
									if(!$this->upload_model->update_users_photos($data,$id) and !$this->member_model->save_edit_user($insert_edit_user,$id))
									{	$update_session=array
											(
											'username'=>$user,
											'password'=>$password,
											'is_logged_in'=>true
											);
							
											$this->session->set_userdata($update_session);
											redirect('site/edit_user');
									}
							
							}
						}
					}
					
					else if($file_name!=null and ($size_file>$size_maks || $size_file==0))
					{	//die("Masuk kesini 2");
						echo "Maaf, file kamu terlalu besar maksimal 512 KB";
					
					}
					
					else 
					{	//g update foto
						//die("Masuk kesini 3");
						$insert_edit_user=array(
										'username'=>$user,
										'password'=>$password,
										'email'=>$email
										
										);			
						if(!$this->member_model->save_edit_user($insert_edit_user,$id))
							{	$update_session=array(
								'username'=>$user,
								'password'=>$password,
								'is_logged_in'=>true
								);
								
								$this->session->set_userdata($update_session);
								redirect('site/edit_user');
							}		
					
					}
			}		
	}
		
	
	
	

}
?>
