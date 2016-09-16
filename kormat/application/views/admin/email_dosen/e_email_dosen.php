<div class="widget purple span5" id="add_form">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i>Edit Email Dosen</h4>
                         </div>
                         <div class="widget-body ">
                             <form  method="post" action="<?php echo base_url().'admin/save_edit_email_dosen/'.$id;?>" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Nama Dosen</label>
                                     <div class="controls">
                                         <input type="text"  name="nm_dosen" value="<?php echo $nm_dosen;?>"/>   
                                     </div>
                                 </div>
                                 
                                    <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Email Dosen</label>
                                     <div class="controls">
                                         <input type="text" name="email_dosen" value="<?php echo $email_dosen;?>"/>   
                                     </div>
                                 </div>
                                    
                                 <div class="controls">
                                  <button class="btn btn-small btn-info">Simpan Perubahan</button>
								</div>
                             </form>
                         </div>
                     </div>
