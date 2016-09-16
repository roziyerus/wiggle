<div class="widget green span5" id="add_form">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i>Edit Mata Kuliah</h4>
                         </div>
                         <div class="widget-body ">
                             <form  method="post" action="<?php echo base_url().'admin/save_makul/'.$id_makul;?>" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Id Mata Kuliah</label>
                                     <div class="controls">
                                         <input type="text"  name="id_makul" value="<?php echo $id_makul;?>"/>   
                                     </div>
                                 </div>
                                 
                                    <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Mata Kuliah</label>
                                     <div class="controls">
                                         <input type="text" name="nm_makul" value="<?php echo $nm_makul;?>"/>   
                                     </div>
                                 </div>
                                 
                                  <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Mata Kuliah</label>
                                     <div class="controls">
                                         <select name="semester">
                                         <option value="1" <?php if($semester==1){echo "selected=selected";}?>>Ganjil</option>
                                         <option value="2" <?php if($semester==2){echo "selected=selected";}?>>Genap</option>
                                         </select>   
                                     </div>
                                 </div>
                                 
                                 <div class="controls">
                                  <button class="btn btn-small btn-info">Simpan Perubahan</button>
								</div>
                             </form>
                         </div>
                     </div>
