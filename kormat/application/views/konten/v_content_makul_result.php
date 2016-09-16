
<?php $this->load->view('v_content_menu');?>

<?php $d['id_mk']=$id;//diambil dari controller site?>
<div class="span5">
<?php echo "result: "; 
if($id==1){echo "Sistem Basis Data";}
else if($id==2){echo "Sistem Embedded";}
?>
</div>

<div class="span2">

<?php echo form_open('app/create_zip') ;?>
<?php echo form_hidden('id',$id);?>
<button class="btn btn-small btn-warning"><i class="icon-plus icon-white"></i>Buat zip</button>
<?php echo form_close();?>
</div>

<div class="span4">
<?php echo form_open('app/delete_files') ;?>
<?php echo form_hidden('id',$id);?>
 <button class="btn btn-small btn-danger"><i class="icon-remove icon-white"></i> Hapus</button>
<?php echo form_close();?>
</div>


<div span="12">

  <!-- BEGIN BASIC PORTLET-->
            <div class="widget green">
             <div class="widget-title">
             <h4><i class="icon-reorder"></i></h4>
             <span class="tools">
             <a href="javascript:;" class="icon-chevron-down"></a>               
             </span>
             </div>
             <div class="widget-body">
             <table class="table table-hover">
             
			<tr>
			<thead>
			<th>No</th>
				<th>Nama File</th>
				<th>Pengirim</th>
				<th>Nim</th>
				<th>Waktu</th>
				</thead>
			</tr>

<?php $i=1;?>
<?php foreach ($result as $h){
echo"<tr>
	<td>".$i++."</td>";
echo"<td>".$h->nm_files."</td>";
echo"<td>".$h->nm_pengirim."</td>";
echo"<td>".$h->nim."</td>";
echo"<td>".$h->date."</td>
	</tr>";
}
?>

<div class="pages">Pages : <?php //echo $pages;?></div>
</table>
</div>
</div>

<!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>/asset/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>/asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>/asset/assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>/asset/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
   <script src="<?php echo base_url();?>/asset/js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url();?>/asset/js/jquery.validate.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>/asset/js/additional-methods.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>/asset/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>/asset/assets/uniform/jquery.uniform.min.js"></script>

   <!--common script for all pages-->
   <script src="<?php echo base_url();?>/asset/js/common-scripts.js"></script>
   <!--script for this page-->
   <script src="<?php echo base_url();?>/asset/js/form-validation-script.js"></script>

   <!-- END JAVASCRIPTS -->