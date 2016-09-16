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
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
   <link rel="stylesheet" href="<?php echo base_url();?>asset/assets/data-tables/DT_bootstrap.css" />
	
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/bootstrap-timepicker/compiled/timepicker.css" />	
    <link href="<?php echo base_url();?>asset/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="<?php echo base_url();?>asset/stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/clockface/css/clockface.css" />
	 <link rel="stylesheet" href="<?php echo base_url();?>asset/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/assets/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
   <link rel="<?php echo base_url();?>asset/stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
	<script src="<?php echo base_url();?>asset/js/jquery-1.8.2.min.js"></script>


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
                <!-- BEGIN LOGO -->
               <a class="brand" href="<?php echo base_url().'site/members_area';?>">
                   <p>Jadikormat</p>
               </a>
               
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"> 
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               
               <!-- END RESPONSIVE MENU TOGGLER -->
                              
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       
                       <li class="dropdown mtop5">
                           <a class="dropdown-toggle element" href="mailto:roziyerus@gmail.com" data-placement="bottom" data-toggle="tooltip"  data-original-title="Bantuan">
                               <i class="icon-headphones">
                               </i>
                           </a>
                       </li>
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="<?php echo base_url(); ?>asset/img/avatar1_small.jpg" alt="">
                               <span class="username"><?php echo "Hi, ". $this->session->userdata('username'); ?></span>
                               <b class="caret"></b>
                           </a>
                        
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo base_url().'site/edit_user'; ?>"><i class="icon-user"></i>Edit profil</a></li>
                               <li><a href="<?php echo base_url().'login/logout'; ?>"><i class="icon-key"></i>Logout</a></li>
								
                           </ul>
                       
                        </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu active">
                  <a class="" href="<?php echo base_url().'site/members_area';?>">
                      <i class="icon-dashboard"></i>
                      <span>Beranda</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="<?php echo base_url().'site/members_area';?>" class="">
                      <i class="icon-file-text"></i>
                      <span>Berkas terkumpul</span>
                      
                  </a>
                  
              </li>
              <li class="sub-menu">
                  <a href="<?php echo base_url().'app/show_zip';?>" class="">
                      <i class="icon-file"></i>
                      <span>Berkas zip</span>
                        </a>
                  
              </li>
              <li class="sub-menu">
                  <a href="<?php echo base_url().'app/create_link';?>" class="">
                      <i class="icon-external-link-sign"></i>
                      <span>Buat Tautan Form</span>
                    
                  </a>
                  
              </li>
			  
             <li class="sub-menu">
                  <a href="<?php echo base_url().'mail';?>" class="">
                      <i class="icon-envelope"></i>
                      <span>Kirim Email</span>
                    
                  </a>
                  
              </li>
                  
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                <div class="metro-nav">
				<?php echo $_content;?>	
				</div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       <?php echo date("Y");?> &copy; Sintesis Studio
   </div>
   <!-- END FOOTER -->
 <!-- END FOOTER -->
 <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
	<script src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
   <script src="<?php echo base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>js/jquery.blockui.js"></script>
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