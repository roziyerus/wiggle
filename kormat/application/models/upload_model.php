<?php if(!defined('BASEPATH')) exit ('No single script allowed');
class Upload_model extends CI_Model{
//fungsi untuk mengupload files
	function insert_files($insert)
	{
	$this->db->insert('file_makul',$insert);
	}

	function select_files_by_mk($id)
	{
	//$this->db->select('nm_files,nm_pengirim,date');
	//$this->db->get('file_makul');
	//$this->db->where($data);
	$q="select nm_files,
		nm_pengirim,
		nim,
		date 
		from file_makul 
		where id_makul='$id'";
	$query=$this->db->query($q);
	return $query->result();
	
	}	
	
	
	function select_just_files($id,$dt_task,$id_class)
	{
	/*$q="select nm_files from file_makul where id_makul='$id'";
	$query=$this->db->query($q);
	return $query->result();*/
	
	$this->db->select('nm_files');
	$this->db->where('id_makul',$id);
	$this->db->where('dt_task',$dt_task);
	$this->db->where('id_class',$id_class);
	return $this->db->get('file_makul')->result();
	
	}
	
	
	function select_all_files($id,$id_class)
	{
	$this->db->select('nm_files');
	$this->db->where('id_makul',$id);
	$this->db->where('id_class',$id_class);
	return $this->db->get('file_makul')->result();
	
	}
	
	
	function delete_by_mk($id)
	{
	$this->db->delete('file_makul',array('id_makul'=>$id));
	}
	
	function insert_zip_files($data)
	{
	$this->db->insert('zip_files',$data);	
	}
	
	function select_zip_files()
	{
	$q="select* from zip_files";
	$query=$this->db->query($q);
	return $query->result();
	}
	
	function select_zip_files_by_id($id)//berdasarkan id
	{
		$q="select* from zip_files where id_zip_file ='$id'";
		$query=$this->db->query($q);
		return $query->result();
	}
	
	function select_zip_files_by_kormat($nim)
	{
		$this->db->select('a.*');
		$this->db->join('users_data b','a.id_makul=b.id_makul and a.id_class=b.id_class','left');
		$this->db->where('b.nim',$nim);
		return $this->db->get('zip_files a')->result();
	
	}
	
	function delete_zip_by_mk($id)
	{
	$this->db->delete('zip_files',array('id_zip_file'=>$id));
	}
	
	//------------------- PHOTO USERS -----------------//
	function insert_users_photos($data)
	{
		$this->db->insert('users_photos',$data);
	}
	
	function select_picture_by($nim)
	{
		$this->db->where('nim',$nim);
		return $this->db->get('users_photos')->result();
	}
	function update_users_photos($data,$id)
	{
		$this->db->update('users_photos',$data,$id);
	}
}
?>