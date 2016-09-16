<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title><?php echo $title;?></title>
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
	<script src="<?php echo base_url();?>asset/js/ceknim.js"></script>
	<script src="<?php echo base_url();?>asset/js/gritter.js"></script>
<style type="text/css">
#b
{
background-color:white;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
  var form = $('#uggh'); // contact form
  var submit = $('#submit');  // submit button
  var alert = $('.pesan'); // alert div for show alert message

   //form submit event
  form.on('submit', function(e) {
  e.stopPropagation();
  e.preventDefault(); // prevent default form submit

    $.ajax({
     url: '<?php echo base_url();?>link/do_upload', 
      type: 'POST', // form submit method get/post
     dataType: 'html', // request type html/json/xml
      data: form.serialize(), // serialize form data 
      beforeSend: function() {
        alert.fadeOut();
       submit.html('Mengunggah....'); // change submit button text
      },
      success: function(data) {
        alert.html(data).fadeIn(); // fade in response data
      form.trigger('reset'); // reset form
        submit.html('OK'); // reset submit button text
      },
     error: function(e) {
        console.log(e)
     }
    });
  });
});
</script>
<?php 
//$current_time=strtotime(date("H:i:s"));//jam sekarang
$current_date=strtotime(date("d-m-Y H:i:s"));// jam sekarang
//$tms=strtotime($times);
$dt=strtotime($date);
?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="b">
   
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
     
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span10 offset1">
                   
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     <?php echo $makul." ".$kelas;?>
                   </h3>
                   
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            
            <!-- BEGIN PAGE CONTENT-->
             <div class="row-fluid">
                 <div class="span8 offset3">
                     <!-- BEGIN BLOG PORTLET-->  
                          <h3>
                              <a href="#"><?php echo $title;?>.</a>
                          </h3>
                             <p>
                                Oleh <a href="javascript:;" class="author"><?php echo $nama_kormat;?></a> | Deadline: <?php echo $date; if($current_date>=$dt){?><h4 style="color: red"> Sudah Melebihi Batas Waktu, Silahkan menghubungi kormat yang bersangkutan</h4><?php }?> 
                             <input type="hidden" value="<?php echo $nama_kormat;?>" id="nama_kormat"/>
                             </p>
             
                             <p><?php echo "Tentang tugas : ".$decrip;?></p>
                             
                   </div>
				   
				   <div class="space10"></div>
                             <div class="row-fluid">
                              <div class="span5 offset3">
                              
                              <div class="pesan" style="color:green;">
								
							  </div>
					<div class="space10"></div>		  
							  
                              <!-- BEGIN widget-->
                    	<div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Unggah berkas</h4>
                                <span class="tools">
                                   <a class="icon-chevron-down" href="javascript:;"></a>
                                   <a class="icon-remove" href="javascript:;"></a>
                                   </span>
                        </div>
                        <div class="widget-body form">
                        <form id="" method="post"  enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url().'link/do_upload';?>">
							 
                            <input type="hidden" value="<?php echo $id_class;?>" name="id_class"/> 
                     		<input type="hidden" value="<?php echo $dt_link;?>" name="dt_task"/> 
                     		
							<div class="control-group">
    						<label class="control-label">NIM</label>
    						<div class="controls">
    						<?php echo form_error('nim');?>
    						<input class="span10 " type="text" name="nim" placeholder="21120111130038"  onkeyup="cekNim(event)" required="required" 
    						<?php if($current_date>=$dt){echo"disabled=disabled";}?>
    						/>
    						<span id="target" class="help-inline"></span>
    						</div>
    						</div>
							
							<div class="control-group">
    						<label class="control-label">Nama</label>
    						<div class="controls">
							<?php echo form_error('nama');?>
							<input class="span10 " type="text" name="nama" placeholder="Muhammad Rozi Yerusalem" required="required"
							 <?php if($dt<=$current_date){echo"disabled";}?>/>
							 
							<br>
						
							</div>
							</div>
							
							<input type="hidden" name="makul" value="<?php echo $id_mk;?>"/>
							
							<div class="control-group">
    						<label class="control-label">Pilih berkas</label>
    						<div class="controls">
							<input class="span10" type="file" name="userfile" size="20" 
							<?php if($dt<=$current_date){echo"disabled";}else {echo "required=required";}?>
							/>
							<input id="submit" class="btn btn-medium btn-success" type="submit" value="OK" <?php if( $dt<=$current_date){echo"disabled";}?>/>
							</div>
							</div>
					
                        </form>
                        
                        </div>
                        </div>
                        </div>
  
                     </div>
                     <!-- END BLOG PORTLET-->
                 </div>
             </div>
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       <?php echo date("Y");?> &copy; Sintesis Studio.
   </div>
   <!-- END FOOTER -->

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
</body>
<!-- END BODY -->
</html>