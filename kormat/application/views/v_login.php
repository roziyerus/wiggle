<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="background-color: white">
    <div class="container">
        <div class="row-fluid"><!-- baris pertama -->
        <h1>Masuk Aplikasi </h1>
        </div>
    
    	<div class="space20"></div>
    	<div class="space20"></div>
    	<!-- BEGIN PAGE CONTENT-->
             <div class="row-fluid">
                     
                   <div class="span5 offset4">
                     
                        <div class="widget-body form">
	                        <form id="uggh" method="post"  action="<?php echo base_url().'login/auth';?>">
							
								<div class="control-group">
	    						<label class="control-label">Username</label>
	    						<div class="controls">
	    						<input class="span10 " type="text" name="username" 	value="<?php set_value('username')?>"/>
	    						<span class="help-inline"><?php echo form_error('username'); ?></span>
	    						</div>
	    						</div>
								
								<div class="control-group">
	    						<label class="control-label">Password</label>
	    						<div class="controls">
								<input class="span10 " type="password" name="password"  value="<?php set_value('password')?>"/>
								<span class="help-inline"><?php echo form_error('password'); ?></span>
								</div>
								</div>
								
								<input id="submit" class="btn btn-medium btn-primary span10" type="submit" value="OK" />
							</form>
						
						</div>
					
                      
                        
                        </div>
                        </div>
                       
  
   </div>
  <!-- END Container-->
                 
             
    	
    	                 <!-- END ROW-->
         	    
				   <!-- BEGIN FOOTER -->
			   <div id="footer">
			       <?php echo date("Y");?> &copy; Sintesis Studio
			   </div>
   				<!-- END FOOTER -->
   				
 </div>  
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>asset/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.validate.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/additional-methods.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/uniform/jquery.uniform.min.js"></script>


   <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>
   <!--script for this page-->
   <script src="<?php echo base_url();?>asset/js/form-validation-script.js"></script>

   <!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>