<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Mimin</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
	<script src="<?php echo base_url();?>asset/js/jquery-1.8.3.min.js"></script>

</head>
<body style="background-color: white">
<div class="container">
	<a href="<?php echo base_url().'admin';?>"><h1>Beranda Mimin</h1></a>
	<ul class="nav pull-right top-menu" >
	<div class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="<?php echo base_url();?>asset/img/avatar1_small.jpg" alt="">
                               <span class="username">Halo, <?php echo $this->session->userdata('username');?></span>
                               
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo base_url().'admin/set_admin';?>"><i class="icon-cog"></i> Pengaturan</a></li>
                               <li><a href="<?php echo base_url().'login/logout';?>"><i class="icon-key"></i>Keluar</a></li>
                           </ul>
   </div>
      </ul>
                       
	<div class="space20"></div>
	
	<div class="row">
	
		<?php echo $menu;?>
		
	</div>	
	</div>
	
 <br>
<br>
<div id="footer"><?php echo date("Y");?> &copy; Sintesis Studio</div>

 <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>asset/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url();?>asset/js/excanvas.js"></script>
   <script src="<?php echo base_url();?>asset/js/respond.js"></script>
   <![endif]-->

   <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
</html>
