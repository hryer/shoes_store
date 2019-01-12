<!-- include form upload gambar -->



<?php //include "function_upload_image.php";?> 



<style>



	/* it is my own style */



	



	#upload_gambar{ }



	



	#data_product



	{



		min-height:160px;



		border:1px solid #CCC;



		margin-top:10px;



		padding:7px;



	}



	



	#detail_product 



	{



		border:1px solid #CCC;



		min-height:140px;



		width:780px;



		float:left;



		padding:5px;



	}



	



	.img_box



	{



		padding: 5px;



		border:1px solid #CCC;	



		width:150px;



		float:left;



		margin:15px;



	}



	



	#upload_dashboard



	{



		margin-top:7px;



		padding:5px;	



		border:1px solid #CCC;



	}



	



	#data_gambar



	{



		border:1px solid #CCC;



		min-height:400px;



		margin-top:7px;



		padding:7px;



	}



	



	.cpanel_img a img{ margin:5px; margin-top:5px; float:right;}



	



	.img_p{ border:solid 1px #CCC; height:150px; width:200px; float:left; margin-right:7px;}







</style>



<div id="upload_gambar"> 

<?php

	$shoes_id = isset($_GET['id']) ? $_GET['id'] : 1 ;

?>

<script>
	
	function ajax_header()
	{
		$.ajax({
			
			type:"POST",
			url:"modules/shoes_layout/function_upload_image.php",
			data:"id=<?php echo $shoes_id; ?>&act=head",
			dataType:"json",
			success:function(data){
				
				$("#title_product").html(data.title_product);
				$("#data_product img").attr("src",data.url_image);
				$("#desc_product").html(data.desc_product);
				$("#price_product").html(data.price);
				
			}
			
		});
		
		
	}

</script>

<h2 id="title_product"></h2>

<div id="data_product">

    <img src="" class="img_p"/ >

    <div id="detail_product">

    	<p><span> Price </span> : <span id="price_product"></span> </p>

    	<p> Description : </p><br>

        <p id="desc_product"></p>

    </div>

    <div style="clear:both;"></div>

</div>


<div id="upload_dashboard">

<form action="modules/shoes_layout/function_upload_image.php?act=upload" method="post" enctype="multipart/form-data" id="form_upload">

Upload new Image : 



<input id="uimg" name="uimg" value="" type="file">
<input type="hidden" name="shoes_id" value="<?php echo $shoes_id ?>" >

<input type="submit" value="Upload">



</form>



<div id="info"></div>



<script src="http://malsup.github.com/jquery.form.js"></script> 

 

    <script> 

       // prepare the form when the DOM is ready 
	  $(document).ready(function() { 
	  	
		  ajax_header();
		  data_gambar();
		  
		  var options = { 

			  target:        '#info',   // target element(s) to be updated with server response 

			  beforeSubmit:  showRequest,  // pre-submit callback 

			  success:       showResponse,  // post-submit callback 

			  // other available options: 

			  //url:       url         // override for form's 'action' attribute 

			  //type:      "post"        // 'get' or 'post', override for form's 'method' attribute 

			  //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 

			  //clearForm: true        // clear all form fields after successful submit 

			  //resetForm: true        // reset the form after successful submit 

	   

			  // $.ajax options can be used here too, for example: 

			  //timeout:   3000 

		  }; 

	   

		  // bind form using 'ajaxForm' 

		  $('#form_upload').ajaxForm(options); 

	  }); 

	   

	  // pre-submit callback 

	  function showRequest(formData, jqForm, options) { 

		  // formData is an array; here we use $.param to convert it to a string to display it 

		  // but the form plugin does this for you automatically when it submits the data 

		  var queryString = $.param(formData); 

	   

		  // jqForm is a jQuery object encapsulating the form element.  To access the 

		  // DOM element for the form do this: 

		  // var formElement = jqForm[0]; 

	   

		  $("#info").html(" gambar sedang di proses ... "); 

	   

		  // here we could return false to prevent the form from being submitted; 

		  // returning anything other than false will allow the form submit to continue 

		  return true; 

	  } 

	   

	  // post-submit callback 

	  function showResponse(responseText, statusText, xhr, $form)  { 

		  // for normal html responses, the first argument to the success callback 

		  // is the XMLHttpRequest object's responseText property 

	   

		  // if the ajaxForm method was passed an Options Object with the dataType 

		  // property set to 'xml' then the first argument to the success callback 

		  // is the XMLHttpRequest object's responseXML property 

	   

		  // if the ajaxForm method was passed an Options Object with the dataType 

		  // property set to 'json' then the first argument to the success callback 

		  // is the json data object returned by the server 

	   

		  $("#info").html('status: ' + statusText + '\n\nresponseText: \n' + responseText + 

			  '\n\n Proses telah selesai .'); 
			  data_gambar();

	  } 

	  

	  /*$('#myForm').ajaxForm(function() { 

                alert("Thank you for your comment!"); 

            }); */

    </script> 

</div>







<div id="data_gambar">
<script>

function data_gambar()
{
	
	$.ajax({
		
		url:"modules/shoes_layout/function_upload_image.php",
		type:"post",
		data:"act=tampil&shoes_id=<?php echo $shoes_id; ?>",
		success:function(data)
		{
			$("#data_gambar").html(data);	
			
		}
		
	});
		
}


</script>
</div>







<script>







function maskot(id,shoes_id)



{



	$.ajax({



		



		type: "POST",



		data: "id="+id+"&shoes_id="+shoes_id,



		url:"modules/shoes_layout/maskot.php",



		success:function(data)



		{


			
			ajax_header();



			



		}



		



		



	});



	



	



}







function delete_img(id,shoes_id)



{



	$.ajax({



		



		type: "POST",



		data: "id="+id+"&shoes_id="+shoes_id,



		url:"modules/shoes_layout/delete_img.php",



		success:function(data)



		{



			alert(data);



			data_gambar();



			



		}



		



		



	});



}







</script>















</div><!-- upload gambar --> 







<!-- end include upload gambar -->