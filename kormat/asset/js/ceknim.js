var XMLHTTPRequestObject = false;
	if (window.XMLHttpRequest)
		{   
			XMLHttpRequestObject = new XMLHttpRequest();
		}
	 else if (window.ActiveXObject) 
		{    
		 	XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHttp");
		} 
function getusername(dataSource) 
{   
	if (XMLHttpRequestObject) 
	{        
		XMLHttpRequestObject.open("GET", dataSource);
		XMLHttpRequestObject.onreadystatechange = 
			function()    
				{       
					if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200)
						{
							if (XMLHttpRequestObject.responseText ==true)
									{                
										var target = document.getElementById("target");
										target.innerHTML = "<span>Nim "+input.value+" ini sudah mengirimkan tugas.</span>";
									} 
							else //if(XMLHttpRequestObject.responseText == "belum_mengirim") 
								{                
									var target = document.getElementById("target");
									target.innerHTML = "<span>Kok baru ngumpulin sekarang </span>";
								}
							}
					};
	XMLHttpRequestObject.send(null);
	} 
}

function cekNim(keyEvent) 
{
	keyEvent = (keyEvent) ? keyEvent: window.event;
	input = (keyEvent.target) ? keyEvent.target : keyEvent.srcElement;
	var nama_kormat=document.getElementById("nama_kormat").value;
	if (keyEvent.type == "keyup") 
		{
			var target = document.getElementById("target");
			target.innerHTML = "<span></span>";
				if (input.value) 
				{
					getusername("http://localhost/kormat/link/check_nim/"+nama_kormat+"/"+input.value);
				} 
		}
}
