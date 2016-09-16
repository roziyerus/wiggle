<?php if(!defined('BASEPATH')) exit ('No single direct script allowed');?>

<legend>
<h3 align="center">Buat Link Pengumpulan Tugas <?php echo $makul." ". $kelas; ?></h3>
</legend>
<?php //$stat;?>
<?php if($stat=='1'){?>
	<div class="alert alert-block alert-info fade in">
    <button data-dismiss="alert" class="close" type="button">&times;</button>
    <h4 class="alert-heading">Perhatian!</h4>
    <p>
    Kamu sudah membuat tautan ini sebelumnya, tautan sebelumnya otomatis langsung diperbaharui.
    <a href="<?php echo base_url().'link/p/'.$link;?>" target="new"><b> Lihat tautan sebelumnya</b></a>
    </p>
    </div>   
<?php }?>


<!-- BEGIN FORM-->
<form action="<?php echo base_url().'app/do_cr_link';?>" method="post" class="form-horizontal" id="link">
      
     <input type="hidden" name="nim" value="<?php echo $nim_kormat ;?>"/>  
                            
    <div class="control-group">
    <label class="control-label">Judul Tugas</label>
    <div class="controls">
    <input type="text" required="required" name="title" class="span6  popovers" data-trigger="hover" data-content="Judul tentang tugas " />
    </div>
    </div>      							
                            
	<div class="control-group">
    <label class="control-label">Tanggal Maks</label>
	<div class="controls">
    <input id="dp1" required="required" name="date" type="text"  class="m-ctrl-medium popovers"  data-trigger="hover" data-content="Tanggal maksimal pengiriman tugas ">
    </div>
    </div>
															
	<div class="control-group">
    <label class="control-label">Waktu Maks</label>
    <div class="controls">
    <div class="input-append bootstrap-timepicker">
    <input name="time" id="timepicker2" type="text" required="required" class="input-medium popovers" data-trigger="hover" data-content="Waktu maksimal pengiriman tugas">
    <span class="add-on"> <i class="icon-time"></i></span>
    </div>
    </div>
    </div>
    						
    <div class="control-group">
    <label class="control-label">Deskripsi tugas</label>
    <div class="controls">
    <textarea name="dekrip"class="span6 popovers" required="required" rows="3" data-trigger="hover" data-content="Penjelasan mengenai tugas yang dikumpulkan"></textarea>
    </div>
    </div>
								
	<button class="btn btn-small btn-danger">OK</button>

</form>
<!-- END FORM-->
      
    <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>asset/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url();?>asset/js/excanvas.js"></script>
   <script src="<?php echo base_url();?>asset/js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.validate.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/additional-methods.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="<?php echo base_url();?>asset/assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/assets/uniform/jquery.uniform.min.js"></script>
   <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>
   
	<!--script for this page only-->
   <script src="<?php echo base_url();?>asset/js/gritter.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/js/pulstate.js" type="text/javascript"></script>

   <!-- END JAVASCRIPTS -->             
	