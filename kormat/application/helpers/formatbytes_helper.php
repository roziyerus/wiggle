<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function formatbytes($file, $type)
{
   switch($type){
      case "KB":
         $filesize = filesize($file) * .0009765625; // bytes to KB
      break;
      case "MB":
         $filesize = (filesize($file) * .0009765625) * .0009765625; // bytes to MB
      break;
      case "GB":
         $filesize = ((filesize($file) * .0009765625) * .0009765625) * .0009765625; // bytes to GB
      break;
   }
   if($filesize < 0)
   		{
      		return $filesize = "ukuran tidak diketahui";
   		}
   
   else
   		{	
   			return round($filesize, 2).' '.$type;
   		}
}
?>
