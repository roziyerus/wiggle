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

function getNim(dataSource) 
{   
	if (XMLHttpRequestObject) 
	{        
		XMLHttpRequestObject.open("GET", dataSource);
		XMLHttpRequestObject.onreadystatechange = 
			function()    
				{       
					if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200)
						{
							if(XMLHttpRequestObject.responseText==true) 
							{                
								var target = document.getElementById("nim");
								target.innerHTML = "<span>Nim "+input.value+" ini sudah menjadi kormat.</span>";
								
							}
							
							else if(XMLHttpRequestObject.responseText == false) 
								{                
									var target = document.getElementById("nim");
									target.innerHTML = "<span>OK, Kamu akan jadi kormat bahagia</span>";
									$("#fn,#ang,#id_makul,#clas,#usr,#m,#pass,#btn").attr("disabled",false);
									
								}
							else 
							{
								var target = document.getElementById("nim");
								$("#fn,#ang,#id_makul,#clas,#usr,#m,#pass,#btn").attr("disabled",true);
								target.innerHTML = "<span>Ups, Nim kamu tidak valid</span>";
							}
							
							}
					};
	XMLHttpRequestObject.send(null);
	} 
}

function getAng(dataSource) 
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
	var nama_kormat=document.getElementById("nm").value;
	if (keyEvent.type == "keyup") 
		{
			var target = document.getElementById("nim");
			target.innerHTML = "<span></span>";
				if (input.value) 
				{
					getNim("http://localhost/kormat/login/cek_nim/"+input.value);
				} 
		}
}


function cekUser(keyEvent) 
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
					getusername("http://localhost/kormat/login/cek_user/"+nama_kormat+"/"+input.value);
				} 
		}
}

function cekAng(data) 
{	
	//getAng("http://localhost/kormat/login/cek_ang/"+data);
	$.ajax({
	type:"post",
	url:"http://localhost/kormat/login/cek_ang",
	data:"data="+data,
	success:function(data)
	{
	$("#angkatan").html("Sudah Ada");	
	} 
	
	
});
		
}
