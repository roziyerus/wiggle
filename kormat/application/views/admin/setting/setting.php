
<script type="text/javascript">
$(document).ready(function(){
	var form=$("#set");
	var submit=$("#sv");
	var alert=$("#msg");
	
	form.on('submit',function(e){
		e.preventDefault();

		$.ajax({
			url:'<?php echo base_url();?>admin/save_setting',
			type:'POST',
			dataType:'html',
			data:form.serialize(),
			beforeSend:function(){
				alert.fadeOut();
				submit.html("Menyimpan..");
			},

			success:function(data){
				alert.html(data).fadeIn("slow");
				submit.html('Simpan');
			},

			error:function(e){
				console.log(e)
			}
		});	
	});
});

</script>


		 <div class="row-fluid">
			
             	<div id="msg"></div>
             </div>
             
          
		
		 <div class="span12">
		 <!-- BEGIN EXAMPLE TABLE widget-->
		 <?php echo validation_errors();?>
                     <div class="widget black">
                         <div class="widget-title">
                             <h4><i class="icon-cog"></i>Pengaturan</h4>
                         </div>
                         <div class="widget-body ">
                          <div class="clearfix"></div>
                             <div class="row-fluid">
                             
                              	<form id="set" method="post" action="" class="form-horizontal">
                              		<div class="control-group">
                                    <label class="control-label span5">Mata Kuliah semester yang ditampilkan</label>
                                    <div class="controls" >
                                        <label class="radio">
                                            <input type="radio" name="makul_sem" value="1" <?php  foreach ($data as $d){if($d->set_makul==1){echo "checked='checked'";}}?> />
                                            Ganjil
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="makul_sem" value="2" <?php foreach ($data as $d){ if($d->set_makul==2){echo "checked='checked'";}}?>/>
                                            Genap
                                        </label>
                                    </div>
                                	</div>
									
									<div class="control-group">
										<label class="control-label span5">Kosongkan isi tabel</label>
											<div class="controls">
												<input type="checkbox" name="user" value="Pengguna">
											</div>
									</div>
                                	
                                	<button id="sv" class="btn btn-medium btn-primary">Simpan</button>
                               </form> 
							</div>
      					</div>
      				  </div>	
      		</div>			
 