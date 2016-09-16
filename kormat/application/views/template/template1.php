<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Jadikormat</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
 
   <link href="<?php echo base_url();?>asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
   <link rel="stylesheet" href="<?php echo base_url();?>asset/assets/data-tables/DT_bootstrap.css" />
	
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/bootstrap-timepicker/compiled/timepicker.css" />	
    
    <link rel="<?php echo base_url();?>asset/stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/jquery-tags-input/jquery.tagsinput.css" />
 
	 <link rel="stylesheet" href="<?php echo base_url();?>asset/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
   <link rel="<?php echo base_url();?>asset/stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
	<script src="<?php echo base_url();?>asset/js/jquery-1.8.2.min.js"></script>


</head>
<!-- BEGIN BODY -->
<body style="background-color: white">
<div class="container">
	<a href="<?php echo base_url().'site/members_area';?>"><h1>Beranda</h1></a>
	<ul class="nav pull-right top-menu" >
	<div class="dropdown">
						<span class="photo">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="<?php if(get_photo_profile()==null){echo base_url().'asset/img/avatar1_small.jpg';} 
							   else{echo base_url().'asset/img/users_photos/'.get_photo_profile();}
							   ?>" width="29" height="29"/>
							
						</span>		
						  <span class="username">Halo, <?php echo $this->session->userdata('username');?></span>
                               
                           </a>
						   
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo base_url().'site/edit_user';?>"><i class="icon-cog"></i> Ubah Akun</a></li>
                               <li><a href="<?php echo base_url().'login/logout';?>"><i class="icon-key"></i>Keluar</a></li>
                           </ul>
   </div>
      </ul>
                       
	<div class="space20"></div>
	
	<div class="row">
	
		<?php echo $_content;?>
		
	</div>	
	</div>
	
 <br>
<br>
<div id="footer"><?php echo date("Y");?> &copy; Sintesis Studio</div>
   
   
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url();?>asset/js/excanvas.js"></script>
   <script src="<?php echo base_url();?>asset/js/respond.js"></script>
   <![endif]-->

 <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>
   <!--script for this page-->
   <script src="<?php echo base_url();?>asset/js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->
   
   
<!-- END BODY -->
</html>