<!--halaman untuk mengedit profil dengan nama file v_menu_edit_profil -->
<?php 
foreach ($data_user as $row){$nimUser=$row->nim;}
?>
<!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>asset/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jQuery-custom-input-file.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.upload.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url();?>asset/js/excanvas.js"></script>
   <script src="<?php echo base_url();?>asset/js/respond.js"></script>
   <![endif]-->

   <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>

   <!-- END JAVASCRIPTS -->                                 

<script type="text/javascript">
$(document).ready(function(){
	
   
    var preview = $("#profileImage");

    $(".profileImageFile").change(function(event){
       var input = $(event.currentTarget);
       var file = input[0].files[0];
       var reader = new FileReader();
       reader.onload = function(e){
           image_base64 = e.target.result;
           preview.attr("src", image_base64);
		   
       };
       reader.readAsDataURL(file);
   
});


});



function cancel()
{
window.location.href='http://localhost/kormat/site/members_area';
}


</script>
<?php if(!defined('BASEPATH')) exit ('No direct script allowed');?>

<legend>
<h3 align="center"><?php echo"Ubah Akun";?></h3>
</legend>

<div class="row-fluid">
<div class="span2 offset3">
	<img src="<?php if($profile_pic==null){echo base_url().'asset/img/lock-thumb.jpg';}else{echo base_url().'asset/img/users_photos/'.$profile_pic;}?>"id="profileImage"/>
	
<form action="<?php echo base_url().'site/photo_users_upload/'.$nimUser;?>" enctype="multipart/form-data" accept-charset="utf-8" method="post" class="profileForm">
<input type="file" name="profileimage" class="profileImageFile">	
</div>

<div class="span6 offset">
	

<?php //echo form_open('site/save_edit_user');?>
<?php foreach($data_user as $row){?>
<div class="input-control text info-state span8">

	<input type="hidden" name="id" value="<?php echo $row->nim;?>"/>
	
	<div class="control-group">
	<label class="control-label">Username</label>
	<div class="controls">
	<input class="span6 " type="text" name="user" value="<?php echo $row->username;?>" />
	</div>
	</div>
	
	<div class="control-group">
	<label class="control-label">Email</label>
	<div class="controls">
	<input class="span6 " type="text" name="email" value="<?php echo $row->email;}?>" />
	</div>
	</div>
	
	<div class="control-group">
	<label class="control-label">Password Baru</label>
	<div class="controls">
	<input class="span6 " type="text" name="password" value="" />
	</div>
	</div>
	
	<button type="submit" class="btn btn-medium btn-info">Simpan Perubahan</button>
	<button type="reset" class="btn btn-medium btn-danger" onclick="cancel();">Batal</button>
	</form>	
	</div>
</div>
	
</div>	
