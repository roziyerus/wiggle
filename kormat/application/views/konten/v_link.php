<?php if(!defined('BASEPATH')) exit ('No single direct script allowed');?>
<script>
!function(d,s,id)
{
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id))
		{
		js=d.createElement(s);
		js.id=id;
		js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);
		}
}
(document, 'script', 'twitter-wjs');
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<legend>
<h3 align="center">Tautan Pengumpulan Tugas</h3>
</legend>

	<div class="alert alert-block alert-success fade in">
    <button data-dismiss="alert" class="close" type="button"> &times;</button>
    <h4 class="alert-heading">Sukses!</h4>
    <p>
	<?php if($stat=='2'){?>
   	Tautan berhasil diperbaharui
    <?php } else if($stat=='3'){?>  
    Tautan berhasil dibuat
    <?php }?>
    </p>
    </div>        


 <div class="control-group">
 <label class="control-label">Tautan</label>
 <div class="controls">
 <input type="text" name="title" class="span4" value="<?php echo base_url().'link/p/'.$link;?>"/>
<a class="btn  btn-warning" href="<?php echo base_url().'link/p/'.$link;?>" target="new">Buka di tab baru</a>
 
 </div>
 </div>
 
 <div class="row-fluid">
 <div class="span3">Bagikan tautan tugas</div>
 </div>
 
<div class="row-fluid">
 <div class="span1">
		 <!-- penempatan penulisan makul masih galau -->
		<a 	href="https://twitter.com/share" 
			data-text="<?php echo $title;?>" 
			class="twitter-share-button" 
			data-url="<?php echo "http://himaskomfm.tk/p/".$link;?>" 
			data-hashtags="kormatpintar" data-count="none"
		>Tweet
		</a>
 
 
 </div>
 
 <div class="span1">
<div class="fb-share-button" data-href="<?php echo "http://himaskomfm.tk/p/".$link;?>" data-width="400" data-type="button">FB</div> 
 </div>
</div>
<br>
<!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url();?>asset/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/assets/bootstrap/js/bootstrap.min.js"></script>
	
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url();?>asset/js/excanvas.js"></script>
   <script src="<?php echo base_url();?>asset/js/respond.js"></script>
   <![endif]-->

   <!--common script for all pages-->
   <script src="<?php echo base_url();?>asset/js/common-scripts.js"></script>

   <!-- END JAVASCRIPTS -->                                 


