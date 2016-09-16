
<legend>
<h4>Kirim tugas ke Dosen</h5>
</legend>

<form method="post" action="<?php echo base_url().'mail/send';?>">
 <div class="control-group">
 <label class="control-label">Kirim ke</label>
 <div class="controls">
 <input id="dosen" class="span6 " type="text" name="to" />
 </div>
 </div>

<div class="control-group">
 <label class="control-label">Dari</label>
 <div class="controls">
 <input class="span6 " type="text" name="from"  />
 </div>
 </div>

<div class="control-group">
 <label class="control-label">Subyek</label>
 <div class="controls">
 <input class="span6 " type="text" name="subject"  />
 </div>
 </div>

<div class="control-group">
<label class="control-label">Pilih berkas yang akan dikirim</label>
<div class="controls">
<select name="id" tabindex="1" class="">
<option value="default"><?php echo "--Pilih Berkas--"?></option>
<?php foreach($result as $d){; ?>
<option value="<?php echo $d->id_zip_file;?>"><?php echo $d->nm_z_files;?></option>
<?php };?>
</select>
</div>
</div>


<div class="control-group"> 
<label class="control-label">Isi pesan</label>
<div class="controls">
<textarea class="span6 " rows="3" name="msg"></textarea>
</div> 
</div>
 
<button class="btn btn-small btn-danger">Kirim</button>
</form>


<!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <script src="<?php echo base_url();?>asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.autocomplete.js"></script>
   <script src="<?php echo base_url();?>asset/js/lat.js"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.blockui.js"></script>
  
  