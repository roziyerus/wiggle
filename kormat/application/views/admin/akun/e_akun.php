<div class="widget yellow span5" id="add_form">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i>Edit Akun Mimin</h4>
                         </div>
                         <div class="widget-body ">
                             <form  method="post" action="<?php echo base_url().'admin/save_set_admin/'.$id;?>" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Username</label>
                                     <div class="controls">
                                         <input type="text"  name="username" value="<?php echo $username;?>"/>   
                                     </div>
                                 </div>
                                 
                                    <div class="control-group">
                                     <label class="control-label" for="inputSuccess">Password</label>
                                     <div class="controls">
                                         <input type="text" name="password" value="<?php echo $password;?>"/>   
                                     </div>
                                 </div>
                                 
                                 <div class="controls">
                                  <button class="btn btn-small btn-info">Simpan Perubahan</button>
								</div>
                             </form>
                         </div>
                     </div>
