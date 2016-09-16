
		 <div class="widget-body">
		 <h3>Daftar Pengguna</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>Nama Lengkap</th>
								<th class="hidden-phone">Username</th>
								<th class="hidden-phone">Angkatan</th>
                                <th class="hidden-phone">Email</th>
                                <th class="hidden-phone">Kormat Mata Kuliah</th>
                                <th class="hidden-phone">Kelas</th>
                                <th class="hidden-phone">Bergabung</th>
								<th class="hidden-phone">Status</th>
								<th class="hidden-phone">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach($users as $u){ ?>
                            <tr class="odd gradeX">
                                <td class="hidden-phone"><?php echo $u->full_name;?></td>
								<td class="hidden-phone"><?php echo $u->username;?></td>
								<td class="hidden-phone"><?php echo $u->nm_angkatan;?></td>
								<td class="hidden-phone"><?php echo $u->email;?></td>
								<td class="hidden-phone"><?php echo $u->nm_makul;?></td>
								<td class="hidden-phone"><?php echo $u->nm_class;?></td>
								<td class="hidden-phone"><?php echo $u->joined;?></td>
                                <td class="hidden-phone">
								<span class="label label-success"><?php if($u->status==1){ echo"Approved";}?></span>
								<span class="label label-inverse"><?php if($u->status!=1){ echo" Diblokir";}?></span>
								</td>
								
								<td class="hidden-phone">                  
                              
								<?php if($u->status==1){?><a class="btn  btn-danger" href="<?php echo base_url().'admin/block_user/'.$u->nim;?>"><i  class="icon-trash"></i> Blokir</a> <?php } ?>
			
								<?php if($u->status!=1) {?><a class="btn btn-success" href="<?php echo base_url().'admin/unblock_user/'.$u->nim;?>"><i class="icon-ok"></i> Unblokir</a> <?php } ?>
								</td>
                            </tr>
                            <?php }?>
						</table>
		</div>
	</div>
