<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
| -------------------------------------------------------------------
| EMAIL CONFIG
| -------------------------------------------------------------------
| Konfigurasi email keluar melalui mail server
| */  
$config['protocol']='smtp'; 
$config['smtp_host']='smtp.googlemail.com'; 
$config['smtp_port']=465; 
$config['smtp_timeout']=4; 
$config['smtp_user']='roziyers@gmail.com'; 
$config['smtp_pass']='1202173125'; 
$config['charset']='utf-8'; 
$config['crlf'] = '\r\n';
$config['newline']='\r\n'; 
   
/* End of file email.php */ 
/* Location: ./system/application/config/email.php */
?>