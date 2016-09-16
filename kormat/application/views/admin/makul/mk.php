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
		success:function(data){
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
                     <div class="widget green span5">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Mata Kuliah</h4>
                         </div>
                         <div class="widget-body ">
                             <div>
                                 <div class="clearfix">
                                     <div class="span2">
                                         <button id="add_new" class="btn green">
                                             Add New <i class="icon-plus"></i>
                                         </button>
                                      </div>
                                    
                                      <div class="span2">                                            
                                       
                                       <div class="control-group">
									<div class="controls">
									<select id="sem" name="semm" tabindex="1" onchange="sem(this.value);">
									<option value="default"><?php echo "--Pilih Semester--"?></option>
									<option value="1">Ganjil</option>
									<option value="2">Genap</option>
									</select>
									</div>
									</div>
									                                       
                                       
                                     </div>
                                 </div>
                                 <div class="space15"></div>
                                 <table  id="tabel"class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                         <th>Nama Mata Kuliah</th>
                                         <th>Id Mata Kuliah </th>
                                         <th>Semester </th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                             		<?php foreach($data as $d){?>        
                                     <tr class="">
                                         <td><?php echo $d->nm_makul;?></td>
                                         <td><?php echo $d->id_makul;?></td>
                                          <td><?php if($d->semester==1){echo " Ganjil";} else if($d->semester==2){echo "Genap";}?></td>
                                         <td><a id="editt"  class="edit" href="<?php echo base_url().'admin/edit_makul/'.$d->id_makul;?>">Edit</a></td>
                                         <td><a class="delete" href="<?php echo base_url().'admin/delete_makul/'.$d->id_makul;?>">Delete</a></td>
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
                     <div class="widget green span5" id="add_form">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i>Add Mata Kuliah</h4>
                         </div>
                         <div class="widget-body ">
                             <form  method="post" action="<?php echo base_url().'admin/add_makul';?>" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Nama Mata Kuliah</label>
                                     <div class="controls">
                                         <input type="text"  name="nm_makul"/>   
                                     </div>
                                 </div>
                                 
                                    <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Kode Mata Kuliah</label>
                                     <div class="controls">
                                         <input type="text" name="kd_makul" />   
                                     </div>
                                 </div>
                                 
                                  <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Semester</label>
                                     <div class="controls">
                                         <select name="semester" >
                                         <option value="1">Ganjil</option>
                                         <option value="2">Genap</option>
                                         </select>   
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
                 
			
                 



