<script type="text/javascript">

$(document).ready(function () {
	$("#add_form").hide();
	//$("#edit_form").hide();
	$("#add_new").click(function(){
			$("#add_form").show();
			$("#add_new").click(function(){
				$("#add_form").hide();
			});	
		//});
	//$("#editt").click(function(){
	//		$("#edit_form").show();
	});

	
});


</script>

<script type="text/javascript">
function sem(value){

	$.ajax({
		url:'<?php echo base_url().'admin/makul_by_sem';?>',
		type:'POST',
		data:'sem='+value,
		succes:function(data){
		$("#tabel").result(data);
		},
		error:function(e)
		{
			console.log(e);
		}
	});
});

</script>

		 <div class="span5">
		 <!-- BEGIN EXAMPLE TABLE widget-->
		 <?php echo validation_errors();?>
                     <div class="widget purple span5">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Email Dosen</h4>
                         </div>
                         <div class="widget-body ">
                             <div>
                                 <div class="clearfix">
                                     <div class="span2">
                                         <button id="add_new" class="btn green">
                                             Add New <i class="icon-plus"></i>
                                         </button>
                                      </div>
                                 </div>
                                 <div class="space15"></div>
                                 <table  id="tabel"class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                         <th>Nama Dosen</th>
                                         <th>Email Dosen </th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                             		<?php foreach($data as $d){?>        
                                     <tr class="">
                                         <td><?php echo $d->nm_dosen;?></td>
                                         <td><?php echo $d->email_dosen;?></td>
                                         <td><a id="editt"  class="edit" href="<?php echo base_url().'admin/edit_email_dosen/'.$d->id;?>">Edit</a></td>
                                         <td><a class="delete" href="<?php echo base_url().'admin/delete_email_dosen/'.$d->id;?>" onclick="return confirm('Anda yakin akan menghapus ini ?');">Delete</a></td>
                                     </tr>
                                     <?php }?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
                 
                <div class="span5 ">
                	<div class="span5">
			 <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget purple span5" id="add_form">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i>Add Email Dosen</h4>
                         </div>
                         <div class="widget-body ">
                             <form  method="post" action="<?php echo base_url().'admin/add_email_dosen';?>" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Nama Dosen</label>
                                     <div class="controls">
                                         <input type="text"  name="nm_dosen"/>   
                                     </div>
                                 </div>
                                 
                                    <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Email Dosen</label>
                                     <div class="controls">
                                         <input type="text" name="email_dosen" />   
                                     </div>
                                 </div>

                                 <div class="controls">
                                  <button class="btn btn-small btn-info">OK</button>
								</div>
                             </form>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
               </div>  
                 
                
                 



