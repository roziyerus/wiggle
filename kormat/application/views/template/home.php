<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Jadikormat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/css/style-default.css" rel="stylesheet" id="style_color" />
    
    <script>
    !function(d,s,id)
    {
        var js,fjs=d.getElementsByTagName(s)[0],
        p=/^http:/.test(d.location)?'http':'https';
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
    
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="background-color: white;">
<div class="container">
    <div class="space20"></div><!-- spasi -->
    <div class="row-fluid"><!-- baris pertama -->
        <div class="span3 offset6">
        <h1>Jadikormat</h1>
       </div>
    </div>
    
    <div class="space15">
    </div>      
       
       
    <div class="row"> <!-- baris kedua -->
       <div class="span4"><!-- kolom pertama -->                       
       <div class="blog-side-bar green-box">
                                 <h2> <i class="  icon-tasks"></i> Daftar Tugas</h2>
                                 <div class="space15"></div>
                                 <?php foreach ($get_task as $d){?>
                                 <div class="row-fluid">
                                     <div class="green-box-blog">
                                         <div class="span3">
                                             <img width="50" height="50" alt="<?php echo $d->full_name;?>" src="<?php if($d->photos_name==null){echo base_url().'asset/img/lock-thumb.jpg';}else{echo base_url().'asset/img/users_photos/'.$d->photos_name;}?>">
                                         </div>
                                         <div class="span9">
                                             <h5>
                                                 <a href="<?php echo base_url().'link/p/'.endekrip_id($d->nim_kormat); ?>" target="new_tab"><?php echo $d->nm_makul." ".$d->nm_class;?></a>
                                             </h5>
                                             <p><?php echo $d->judul_tugas;?></p>
                                             <i>Deadline : <?php echo $d->date;?></i>
                                         </div>
                                     </div>     
          						</div>
          						<?php }?>
          </div>
         </div> 

			<div class="span8"> <!-- kolom kedua -->
			
          	<div class="row">
          		<div class="span5 offset1">
	          		<p><h4>Mau ngumpulin tugas ke dosen tapi donlodin satu-satu ? </h4></p>
	          	</div>
	        </div> 
			
	          	<div class="row">	
	          		<div class="span5 offset1"> 
		          		<p><h4>Begadang nungguin sampe semua ngumpulin ?
		          		</h4></p>
	          		</div>
          		</div>
				
				<div class="row">	
	          		<div class="span5 offset1"> 
		          		<h4><p class="text-info">#ItuMasaLalu :)
		          		</p></h4>
	          		</div>
          		</div>
				
          
          
				<div class="row">
		     	<div class="span3 offset1">
		        <a class="btn btn-large btn-warning" href="<?php echo base_url().'login/sign_up';?>"> Daftar sekarang</a>
		       	</div>
				</div>
			  
				<div class="space20"></div>    
				<div class="row">	
			      	<div class="span3 offset1">
			      	Sudah punya akun ? <?php echo anchor('login/lgin','login');?>
			       	</div>
				</div>	
			  
				  <div class="space20"></div>
				  <div class="space20"></div> 
				  <div class="row">
						<div class="span2 offset1">     
						<a href="https://twitter.com/sintesisstudio" class="twitter-follow-button" data-show-count="false">@sintesisstudio</a>
						</div>
				  </div>
				
				<div class="row">
				<div class="span7 offset1">
				<p><h6>Persembahan untuk koordinator mata kuliah tercinta, <i class="icon-lock"></i> masih sistem komputer saja</h6></p>
				</div>
				</div>
 
 </div>
   
  
</div>  
</div>
</body>
<!-- END BODY -->
</html>
