<?php if(!defined('BASEPATH')) exit ('No script allowed');?>
<?php echo form_open('menu/search');?>
<?php echo form_input('search');?>
<?php echo form_submit('submit','Search');?>