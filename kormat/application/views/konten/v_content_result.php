<script type="text/javascript">

function getValue(value)
{	
	var tgl=document.getElementById("dt_task").value;
	
	$.ajax({
	type:'post',
	url:'<?php echo base_url().'site/show_many_page';?>',
	data:'page='+value+'&dt_task='+tgl,
	success:function(data){
	$("#editable").html(data);
	},

	error:function(XMLHttpRequest){
		alert(XMLHttpRequest.responseText);
	}

	});
}


function getTgl(tgl)
{	document.getElementById("dt_task").value=tgl;
	$.ajax({
	type:'post',
	url:'<?php echo base_url().'site/show_page_by_date';?>',
	data:'tgl='+tgl,
	success:function(data){
	$("#editable").html(data);
	},

	error:function(XMLHttpRequest){
		alert(XMLHttpRequest.responseText);
	}

	});
}

</script>

<div span="12">

  <!-- BEGIN BASIC PORTLET-->
          <div class="widget orange">
                         <div class="widget-title">
                             <h4>
                             <i class="icon-reorder"></i> 
                             <?php echo $nm_makul." ".$nm_class;?>
                             </h4>
                         </div>
                         <div class="widget-body">
                             <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                 <div class="row-fluid">
                                 <div id="sample_1_length" class="dataTables_length">
                                 	 <label>
                                 		<select  tabindex="1" id="pag" onchange="getTgl(this.value);">
                                            <option>-Judul Tugas-</option>
                                            <?php foreach ($tanggal as $t){?>
                                            <option value="<?php echo $t->tgl_tugas;?>"><?php echo $t->jdl_tugas; //date("d-m-Y",strtotime($t->tgl_tugas));?></option>
                                            <?php }?>
                                        </select>
                                 	Tanggal Tugas </label>
                                 	
                                 	
                                 	
                                 	<label>
                                 		<select  tabindex="1" id="pag" onchange="getValue(this.value);">
                                            <option>-Tampilkan-</option>
                                            <option value="8">8</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">Semua</option>
                                        </select> Tampilkan per halaman
                                 	
                                 
                                </div> 
                                 <div class="clearfix">
                                     
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><a href="#myModal" data-toggle="modal">Buat Zip</a></li>
                                             <li><a href="#">Unduh</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="space15"></div>
                                 <table class="table table-striped table-hover table-bordered" >
                                    <tr>
                                    <thead>
                                		<th>No</th>
										<th>Berkas
										<th>Pengirim</th>
										<th>Nim</th>
										<th>Waktu pengiriman</th>
									</thead>
									</tr>
								
							<tbody id="editable">								
								<?php $i=1;?>
								<?php foreach ($result as $h){?>
									<tr  >	
									<td><?php echo $h->id;?></td>
									<td><?php echo $h->nm_files;?></td>
									<td><?php echo $h->nm_pengirim;?></td>
									<td><?php echo $h->nim;?></td>
								 	<td><?php echo $h->dt;?></td>
									</tr>
								<?php }?>
								</body>
								</table>

								<!-- Begin Pagination -->
								<?php echo $pages;?>
								<!-- End Pagination -->
								
								</div>
								</div>
								</div>
								</div>
								</div>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
 <form action="<?php echo base_url().'app/create_zip';?>" method="post">
  <div class="modal-header">
	   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	   <h3 id="myModalLabel2">Beri nama berkas</h3>
   </div>
	
   <div class="modal-body"> 
		<div class="control-group">
		<div class="controls">
		<input type="hidden" name="id_makul" value="<?php echo $id_makul;?>"/>
		<input type="hidden" name="id_class" value="<?php echo $id_class;?>"/>
		<input type="hidden" name="dt_task" id="dt_task" value="" />
		<input class="span4" type="text" name="nama_file_zip" required="required"/>
		</div>
		</div>
    </div>
	
   <div class="modal-footer">
   <button  class="btn btn-primary">OK</button>
   </div>
   
   </form>

</div>
 
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