<?php if(!defined('BASEPATH')) exit ('No single script allowed');?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Mendaftar</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="roziyerus" name="author" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
  <script src="<?php echo base_url();?>asset/js/cekava.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="background-color: white">
 <div class="container"><!-- BEGIN CONTAINER -->	
	
	<div class="row-fluid"><h1>Mendaftar</h1></div><!-- baris pertama -->
	<div class="space20"></div><!-- spasi antar baris -->
	<div class="space20"></div>
	
	<div class="row-fluid"><!-- baris kedua -->
		 <div class="span8 offset4"><!-- kolom -->     
			    <form method="post" action="<?php echo base_url().'login/do_sign_up';?>">
					
				<input type="hidden" name="id_user" />	  
				<div class="control-group text">
				 <div class="controls">
				 <input id="fn" class="span6" type="text" name="full-name" placeholder="Nama Lengkap"  value="<?php echo set_value('full-name'); ?>"/>
				 <span class="help-inline "><?php echo form_error('full-name');?></span>
				 </div>
				 </div>
			
				<div class="input-control text">
				<div class="controls">
				<input id="nm" class="span6" type="text" name="nim" placeholder="NIM"  value="<?php echo set_value('nim'); ?>" onkeyup="cekNim(event);" />
				<span id="nim" class="help-inline"><?php echo form_error('nim');?></span>
				</div>
				</div>
				
				<div class="input-control select">
				<div class="controls">
				<select name="angkatan" class="span6" tabindex="1" id="ang">
				<option value="default" selected="selected">Angkatan</option>
				<?php foreach ($angkatan as $a){?>
				<option  value="<?php echo $a->kd_angkatan;?>"><?php echo $a->nm_angkatan;?>
				</option>
				<?php }?>
				</select>
				<span id="angkatan" class="help-inline">	<?php echo form_error('angkatan');?></span>
				</div>
				</div>
				
				<div class="input-control select">
				<div class="controls">
				<select name="id_makul" class="span6" tabindex="1" id="id_makul">	
				<option value="default" selected="selected">Mata Kuliah</option>
				<?php foreach ($makul as $mk){?>
				<option value="<?php echo $mk->id_makul; ?>" ><?php echo $mk->nm_makul ;?>
				</option>	
				<?php }?>
				</select>
				<span class="help-inline"><?php echo form_error('id_makul');?></span>
				</div>
				</div>
				
				<div class="input-control select">
				<div class="controls">
				<select name="clas" class="span6" tabindex="1" id="clas">	
				<option value="default" selected="selected">Kelas</option>
				<?php foreach ($kelas as $k){?>
				<option value="<?php echo $k->id_class;?>"><?php echo $k->nm_class ;?>
				</option>
				<?php }?>
				</select>
				<span class="help-inline"><?php echo form_error('clas');?></span>
				</div>
				</div>
				
				<div class="input-control text  ">
				<input id="usr" type="text" class="span6" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
				<span class="help-inline"><?php echo form_error('username');?></span>
				</div>
				<div class="input-control text  ">
				<input id="m" type="text" class="span6" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
				<span class="help-inline"><?php echo form_error('email');?></span>
				</div>
					
				<div class="input-control text  ">
				<input id="pass" type="password" class="span6" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
				<span class="help-inline"><?php echo form_error('password');?></span>
				</div>
					
				<div class="input-control text  ">
				<button id="btn" class="btn btn-small btn-danger span6">Daftar</button>
				</div>
				</form>
		   </div><!-- akhir kolom -->  
		 </div><!-- akhir baris -->
   


</div><!-- end container -->

<div class="space20"></div>
<div class="space20"></div>
<div class="row-fluid">
	<div id="footer">
	<?php echo date("Y");?> &copy; Sintesis Studio
	</div>
</div>

  <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>asset/js/jquery-1.8.2.min.js"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
  
     <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="<?php echo base_url();?>asset/assets/fancybox/source/jquery.fancybox.pack.js"></script>


   <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>

   <!--script for this page-->
   <script src="<?php echo base_url();?>asset/js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->
   
</body>
<!-- END BODY -->
</html>