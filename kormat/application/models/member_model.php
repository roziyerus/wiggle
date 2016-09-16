<?php if(!defined('BASEPATH')) exit('No script allowed');
class Member_Model extends CI_Model{


//++++++++++++++++++++++++++ VALIDASI MIMIN +++++++++++++++++++++++++//
	function validate_admin()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		return $this->db->get('mimin')->result();
	}

//++++++++++++++++++++++++++ VALIDASI USERS +++++++++++++++++++++++++//
	//fungsi untuk validasi kecocokan username & password di DB
	function validate()
	{
	$this->db->where('username',$this->input->post('username'));
	$this->db->where('password',md5($this->input->post('password')));
	$this->db->where('status',1);
	return $this->db->get('users_data')->result();

	
	}

//+++++++++++++++++++++++++++++++++++++ APP ++++++++++++++++++++++++++++++++++++++++++++++++++++++//	
	function get_single_user($username,$password)
	{	
		//$this->db->select('id');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('status',1);
		$query=$this->db->get('users_data');
		return $query->result();
	}	
	
	function get_user_by_makul($username,$password)
	{	
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->select('a.id_makul,b.nm_makul,c.*');
		$this->db->join('makul b','a.id_makul=b.id_makul','left');
		$this->db->join('class c','c.id_class=a.id_class','left');
		return $this->db->get('users_data a')->result();

	}
	
	
	function get_memberdata()
	{
		$query=$this->db->get('users_data');
		return $query->result();
	}
	
	function select_email_dosen($dosen)//autocomplete
	{
		$this->db->select('email_dosen');
		$this->db->like('nm_dosen',$dosen);
		return $this->db->get('email_dosen')->result();
	}
	
	
	
	function save_edit_user($data,$id)//  data	
	{
	$query=$this->db->update('users_data',$data,$id);
	}
	
	
//----------------------------------------- FILES ----------------------------------------------//	
	//fungsi untuk mengambil semua files di tabel ditampilkan di dashboard/files
	function select_all_files_by_user_id_pagination($nim,$per_page,$offset)
	{
		$this->db->select('a.id_makul,b.*,c.nm_makul');
		//$this->db->from('users_data a');
		$this->db->join('file_makul b','b.id_makul=a.id_makul and b.id_class=a.id_class','left');
		$this->db->join('makul c','c.id_makul=a.id_makul','left');
		$this->db->where('a.nim',$nim);
	
		return $this->db->get('users_data a',$per_page,$offset)->result();
	}
	
	
	function select_all_files_by_user_id($nim,$dt_task)
	{
		$this->db->select('a.id_makul,b.*,c.nm_makul,d.nm_class');
		//$this->db->from('users_data a');
		$this->db->join('file_makul b','b.id_makul=a.id_makul','left');
		$this->db->join('makul c','c.id_makul=a.id_makul','left');
		$this->db->join('class d','d.id_class=a.id_class','left');
		$this->db->where('a.nim',$nim);
		$this->db->where('b.dt_task',$dt_task);
		return $this->db->get('users_data a')->result();
	}
	
	function select_all_files_by_user_id_date($nim,$tgl)
	{
		$this->db->select('a.id_makul,b.*,c.nm_makul,d.nm_class');
		$this->db->join('file_makul b','b.id_makul=a.id_makul','left');
		$this->db->join('makul c','c.id_makul=a.id_makul','left');
		$this->db->join('class d','d.id_class=a.id_class','left');
		$this->db->where('a.nim',$nim);
		$this->db->where('b.dt_task',$tgl);
		
		return $this->db->get('users_data a')->result();
	}
	
	function select_all_files_by_user_id_dat($nim)
	{
		$this->db->select('a.id_makul,b.*,c.nm_makul,d.nm_class');
		$this->db->join('file_makul b','b.id_makul=a.id_makul','left');
		$this->db->join('makul c','c.id_makul=a.id_makul','left');
		$this->db->join('class d','d.id_class=a.id_class','left');
		$this->db->where('a.nim',$nim);
		
		return $this->db->get('users_data a')->result();
	}
	
	function num_rows($nim)
	{ 
		$this->db->select('a.id_makul,b.*,c.nm_makul');
		$this->db->join('file_makul b','b.id_makul=a.id_makul and b.id_class=a.id_class','left');
		$this->db->join('makul c','c.id_makul=a.id_makul','left');
		return $this->db->get('users_data a')->num_rows();
		
	}
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++ SIGN UP ++++++++++++++++++++++++++++++++++++++++++
	
	//---- cek available user data-------------
	function check_available($nim,$makul,$clas,$angkatan)
	{
		$this->db->where('nim',$nim);
		$this->db->where('id_makul',$makul);
		$this->db->where('id_class',$clas);
		$this->db->where('angkatan',$angkatan);
		return $this->db->get('users_data')->result();
	}
		
	function cek_available($nim)
	{
		$this->db->where('nim',$nim);
		return $this->db->get('users_data')->result();
	}
	
	
	function insert_user_data($data)
	{
	$this->db->insert('users_data',$data);
	}
	
	function insert_pending_users($data)
	{
	$this->db->insert('pending_users',$data);	
	}
	
	function select_makul_by_user($nim)
	{
		$this->db->select('a.id_makul,a.full_name,a.id_class,b.nm_makul,c.nm_class');
		$this->db->from('users_data a');
		$this->db->join('makul b','b.id_makul=a.id_makul','left');
		$this->db->join('class c','c.id_class=a.id_class','left');
		$this->db->where('nim',$nim);
		return $this->db->get()->result();
		 
	}
	
	//++++++++++++++++++++++++++++++++++++++++++++++++ LINK ++++++++++++++++++++++++++++++++++++++++++++++++++
	
	function save_cr_link($data)
	{
		$this->db->insert('link_tugas',$data);
	}
	
	function select_link($nim)
	{	
		$this->db->where('nim_kormat',$nim);
		return $this->db->get('link_tugas')->result();		 
	}
	
	function select_link_all()
	{	
		return $this->db->get('link_tugas')->result();
	}
	
	function get_all_tasks_link()
	{
		$this->db->select('a.full_name,b.*,c.nm_makul,d.nm_class,e.photos_name');
		$this->db->join('link_tugas b','b.nim_kormat=a.nim ','inner');
		$this->db->join('makul c','c.id_makul=a.id_makul','inner');
		$this->db->join('class d','a.id_class=d.id_class','inner');
		$this->db->join('users_photos e','a.nim=e.nim','left');
		return	$this->db->get('users_data a')->result();
		
	}
	
	function update_link($data,$nim)
	{
		$this->db->where('nim_kormat',$nim);
		$this->db->update('link_tugas',$data);
		
	}
	
	function cek_task_sender($id)
	{
		$this->db->select('b.nim');
		$this->db->join('file_makul b',
						'a.id_makul=b.id_makul 
						and 
						a.id_class=b.id_class',
						'left');
		$this->db->where('a.full_name',$id);
		return $this->db->get('users_data a')->result();
	}

	function select_tgl_by_user($nim)
	{
		$this->db->select('b.*');
		$this->db->join('date_task b','a.nim_kormat=b.nim','left');
		return $this->db->get('link_tugas a')->result();
	}
	
	//++++++++++++++++++++++++++++++++++++++++++++++++++ TOKEN && ACTIVATE ACCOUNT ++++++++++++++++++++++++++++++++++++++++++//
	function get_token($token)
	{	
		$this->db->select('a.*');
		$this->db->join('users_data b','b.nim=a.nim and b.username=a.username','right');
		$this->db->where('token',$token);
		return $this->db->get('pending_users a')->result();
	}
	
	function activate_user($nim)
	{	
		$this->db->set('status','1',FALSE);
		$this->db->where('nim',$nim);
		$this->db->update('users_data');
	}
	
	function get_user_by_nim($nim)
	{
		$this->db->where('nim',$nim);
		return $this->db->get('users_data')->result();
	}
	
	function delete_pending_users($nim)
	{
		$this->db->where('nim',$nim);
		$this->db->delete('pending_users');	
	}
	
	//++++++++++++++++++++++++++++++++++++++++++++++++++++SETTING ADMIN++++++++++++++++++++++++++++++++++++++++++++++++++++
	//++++++++++++++++++++++++++++++++++++++++++++++++++++ MASTER DATA ++++++++++++++++++++++++++++++++++++++++++++++++++++
	//class belum dipake
	function select_class()
	{
		return $this->db->get('class')->result();
	}
	
	function select_class_by($id)
	{
		$this->db->where('id_class',$id);
		return $this->db->get('class')->result();
	}
	
	function update_class_by($data,$id)
	{
		$this->db->update('class',$data,$id);
	}
	
	function delete_class_by_id($id)
	{
		$this->db->where('id_class',$id);
		$this->db->delete('class');
	}
	
	
	//angkatan
	function select_angkatan()
	{
		return $this->db->get('angkatan')->result();
	}
	
	function select_angkatan_by($id)
	{
		$this->db->where('kd_angkatan',$id);
		return $this->db->get('angkatan')->result();
		
	}
	
	function insert_angkatan($data)
	{
		$this->db->insert('angkatan',$data);
	}
	function update_angkatan_by($data,$id)
	{
		$this->db->update('angkatan',$data,$id);
	}
	
	function delete_angkatan_by_id($id)
	{
		$this->db->where('kd_angkatan',$id);
		$this->db->delete('angkatan');
	}
	
	//makul
	function select_all_makul()
	{	
		return $this->db->get('makul')->result();
	}
	
	function select_makul_by($id)
	{
		$this->db->where('id_makul',$id);
		return $this->db->get('makul')->result();
		
	}
	
	function insert_makul($data)
	{
		$this->db->insert('makul',$data);
	}
	
	function update_makul($data,$id)
	{
		$this->db->update('makul',$data,$id);
	}
	
	function delete_makul_by($id)
	{
		$this->db->where('id_makul',$id);
		$this->db->delete('makul');
	}
	
	//email_dosen
	function select_all_email_dosen()
	{	
		return $this->db->get('email_dosen')->result();
	}
	
	function select_email_dosen_by($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('email_dosen')->result();
		
	}
	
	function insert_email_dosen($data)
	{
		$this->db->insert('email_dosen',$data);
	}
	
	function update_email_dosen($data,$id)
	{
		$this->db->update('email_dosen',$data,$id);
	}
	
	
	function delete_email_dosen_by($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('email_dosen');
	}
	
	//setting
	
	function update_setting_makul($data)
	{
		$this->db->update('setting',$data);
	}
	
	function select_setting_makul()
	{
		return $this->db->get('setting')->result();
	}
	
	
	function select_all_makul_by_semester()
	{	
		
		$this->db->join('setting','setting.set_makul=makul.semester','inner');
		return $this->db->get('makul')->result();
	}
	
	//users
	
	function select_all_users_activated()
	{
		$this->db->select('a.*,b.nm_class,c.nm_makul,d.nm_angkatan');
		$this->db->join('class b','b.id_class=a.id_class','left');
		$this->db->join('makul c','c.id_makul=a.id_makul','left');
		$this->db->join('angkatan d','d.kd_angkatan=a.angkatan','left');
		$this->db->where('a.status',1)->or_where('a.status',2);
		//$this->db->where('a.status',2);
		return $this->db->get('users_data a')->result();
	}
	
	//akun mimin
	function select_mimin_by($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('mimin')->result();
	}
	
	function update_akun_mimin($data,$id)
	{
		$this->db->update('mimin',$data,$id);
	}
	
	//blocking user
	function block_status_user($nim)
	{
		$this->db->set('status','2',FALSE);
		$this->db->where('nim',$nim);
		$this->db->update('users_data');	
	}
	
	//unblocking
	function unblock_status_user($nim)
	{
		$this->db->set('status','1',FALSE);
		$this->db->where('nim',$nim);
		$this->db->update('users_data');	
	}
	
	
}


?>
