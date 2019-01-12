// JavaScript Document

function plus()
{
	var a = document.getElementById("aaxx1").value;
	
	if(!isNaN(a)){
	var b = parseInt(a) + 1;
	
	document.getElementById("aaxx1").value = b;
	}
	else
	{
		document.getElementById("aaxx1").value = 1;
	}

}

function minus()
{
	var a = document.getElementById("aaxx1").value;
	
	if(!isNaN(a) && (a > 1 )){
	var b = parseInt(a) - 1;
	
	document.getElementById("aaxx1").value = b;}
	else
	{
		document.getElementById("aaxx1").value = 1;
	}
}