<div class="widget yellow span5" id="add_form">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i>Edit Angkatan</h4>
                         </div>
                         <div class="widget-body ">
                             <form  method="post" action="<?php echo base_url().'admin/save_angkatan/'.$kd_angkatan;?>" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Kode Angkatan</label>
                                     <div class="controls">
                                         <input type="text"  name="kd_angkatan" value="<?php echo $kd_angkatan;?>"/>   
                                     </div>
                                 </div>
                                 
                                    <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Angkatan</label>
                                     <div class="controls">
                                         <input type="text" name="nm_angkatan" value="<?php echo $nm_angkatan;?>"/>   
                                     </div>
                                 </div>
                                 
                                 <div class="controls">
                                  <button class="btn btn-small btn-info">Simpan Perubahan</button>
								</div>
                             </form>
                         </div>
                     </div>
