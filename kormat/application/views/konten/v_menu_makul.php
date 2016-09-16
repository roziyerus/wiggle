<?php if(!defined('BASEPATH')) exit ('No script allowed');?>
<?php $makul=array(
					'default'=>'--Choose Makul--',
					1=>'Sistem Basis Data',
					2=>'Sistem Embedded'
				);
				?>
<?php echo form_open('menu/show_makul');?>
Tampilkan makul by <?php// echo form_dropdown('id_makul',$makul,'default');?>

    <select name="id_makul" class="span4 "  tabindex="1">
      <?php foreach($makul as $id=>$mkl){?>
	  <option value="<?php echo $id ;?>"><?php echo $mkl; }?></option>
                                        
    </select>
	<button class="btn btn-small btn-primary" type="submit" class="span9">OK</button>

<?php echo form_close();?>
  


                                
                           