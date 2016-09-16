<script type="text/javascript">
$(document).ready(function(){
		$("#d").hide();
		$("#h").hide();
		$("#hisow").mouseenter(function(){
			$("#d").show("slow");
			$("#h").show("slow");
			$("#hisow").mouseleave(function(){
				$("#d").hide("slow");
				$("#h").hide("slow");
				});
		});
});

</script>

<?php if(!defined('BASEPATH')) exit ('No single script allowed');?>
<!-- BEGIN FILE SEARCH-->
File zip
<table class="table table-hover file-search">
   <thead>
    <tr>
    <th>Berkas</th>
    <th>Dibuat</th>
	<th>Ukuran</th>
    <th></th>
	<th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $a){?>
    <tr id="hisow">
    <td>
		<img src="<?php echo base_url();?>asset/img/file-search/zip.png" alt="">
		
		<strong>	<?php echo $a->nm_z_files; ?></strong>                                          
    </td>
    <td><?php echo $a->time_created; ?></td>                                               
    <td><?php echo formatbytes($files.$a->nm_z_files,"MB");?></td>
	
	<td>
		<a id="d" href="<?php echo base_url().'app/download/'.$a->id_zip_file;?>"><i class="icon-download"></i> Unduh</a>
	<td>
		<a id="h" onclick="return confirm('Kamu yakin akan menghapus berkas ini ?');" href="<?php echo base_url().'app/delete/'.$a->id_zip_file;?>"><i class="icon-remove"></i> Hapus</a>		
	</td>
						
  </tr>
  <?php };?>
</table>

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





		
		


	
	
	



















		
	
	