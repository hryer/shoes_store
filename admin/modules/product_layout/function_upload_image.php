<?php

include "../../../config/config.php";
include "../../../classes/Image.php";
include "../../../classes/resize.class.php";

function upload()
{
	$shoes_id = $_POST['shoes_id'];

$image_obj = new Image();

$img_name = $_FILES['uimg']['name'];

$img_size = $_FILES['uimg']['size'];

$img_type = $_FILES['uimg']['type']; //echo "<br>";//exit;

$img_err  = $_FILES['uimg']['error'];

$img_tmp  = $_FILES['uimg']['tmp_name'];

// =========== generate data shoes dan brand ============== //
	
$sql_p = "SELECT * FROM ms_shoes a, ms_brand b where a.brand_id = b.brand_id and a.shoes_id = $shoes_id";

$q_p = mysql_query($sql_p) or die(mysql_error());

$fp = mysql_fetch_array($q_p);

// ======================================================== 




$ip_address	= $_SERVER['REMOTE_ADDR'];


$shoes_name = strtolower(str_replace(" ","_",$fp['shoes_name']));

$brand_name = strtolower(str_replace(" ","_",$fp['brand_name']));


$new_date   = date('dmyhis'); 

$new_type	= substr($img_type,6);





$new_img_small	= $brand_name."-".$shoes_name."-".$new_date."_small.".$new_type; 

$new_img_name = $brand_name."-".$shoes_name."-".$new_date.".".$new_type; 


//echo substr($img_type,0,5); exit;


if(substr($img_type,0,5) == "image" && $img_name != "" && $img_err == 0)



{


	$brand_id = $fp['brand_id'];

	// CEK DAHULU 



	$cek_brand = $image_obj->check_dir_brand($brand_id); //exit;



	$cek_shoes = $image_obj->check_dir_shoes($shoes_id);



	// insert data image ke database



	$str  = " insert into ms_shoes_image set ";



	$str .= " shoes_id		= '$shoes_id'		,";



	$str .= " image_name	= '$new_img_name'	,";



	$str .= " image_type	= '$img_type'		,";



	$str .= " image_size	= '$img_size'		,";



	$str .= " maskot		= 0					,";



	$str .= " ip_address	= '$ip_address'		,";



	$str .= " datetime		= now()			 	 ";



	mysql_query($str);



	//echo $str;



	// image besar  

	$image_obj->upload_image($new_img_name,$new_img_small,$img_tmp,$brand_name,$shoes_name);



	//$resizeObj = new resize($save_besar);

    //$resizeObj -> resizeImage(250, 150, 0);

    //$resizeObj -> saveImage($save_kecil,100);

	

}
}


function data_gambar($shoes_id){

	
	// menampilkan semua data gambar 

	$str_sg = "SELECT * FROM ms_shoes_image where shoes_id = $shoes_id ";

	$q_img 	= mysql_query($str_sg);

	$f_img = mysql_fetch_array($q_img);
	
	// data brand dand data shoes ( product ) 
	$sql_p = "SELECT * FROM ms_shoes a, ms_brand b where a.brand_id = b.brand_id and a.shoes_id = $shoes_id";

	$q_p = mysql_query($sql_p);

	$fp = mysql_fetch_array($q_p);
	
	$shoes_name = strtolower(str_replace(" ","_",$fp['shoes_name']));
	$brand_name = strtolower(str_replace(" ","_",$fp['brand_name']));
	// ==================================================================
	
	if(empty($f_img))

	{

		//$url_image = "../images/no_product_image.jpg";

		echo " No Image in this product. Please Upload new Image in this product .. ";

	}

	else

	{
		do

		{

			$image_id = $f_img['image_id'];

			$shoes_id = $f_img['shoes_id'];
			
			//$shoes_name = strtolower(str_replace(" ","_",$fp['shoes_name']));
			//$brand_name = strtolower(str_replace(" ","_",$fp['brand_name']));



			// buat nama file baru untuk image kecil 

			$small_type = strrchr($f_img['image_name'],".");

			$small_img2 = rtrim($f_img['image_name'],$small_type);

			$small_img3 = $small_img2."_small".$small_type; 

			

			$check_url_image = "../../../asset/product_display/$brand_name/$shoes_name/thumb/$small_img3"; //echo "<br>";
			$url_image = "../asset/product_display/$brand_name/$shoes_name/thumb/$small_img3";	
			

			if(is_file($check_url_image)){		



			echo "<div class='img_box'>

			<img src ='$url_image' width='150' height='100'/>

			<div align='center' style=\"word-wrap:break-word\">$f_img[image_name]</div>

			<div class='cpanel_img'>


				<a href=\"javascript:delete_img($image_id,$shoes_id)\" ><img src='../asset/cms/del_img.jpg' width='16' height='16' title='delete image..' >



				</a>


				<a href=\"javascript:maskot($image_id,$shoes_id)\"><img src='../asset/cms/publish.png' width='16' height='16' title='make a maskot '></a>

				<div style=\"clear:both;\"></div>

			</div>


			</div>"; }

			else

			{

				$url_image_none = "../images/no_product_image.jpg";



				echo "<div class='img_box'>



				<img src ='$url_image_none' width='150' height='100'/>

				<div align='center' style=\"word-wrap:break-word\">$f_img[image_name]</div>

				<div class='cpanel_img'>


					<a href=\"javascript:delete_img($image_id,$shoes_id)\"><img src='../asset/cms/del_img.jpg' width='16' height='16' title='delete image..' data-id='$image_id'>



					</a>


					<a href=\"javascript:maskot($image_id,$shoes_id)\"><img src='../asset/cms/publish.png' width='16' height='16' title='make a maskot ' data-id='$image_id'></a>


					<div style=\"clear:both;\"></div>



				</div>



				</div>";



			}


		}		

		while($f_img = mysql_fetch_array($q_img));

		echo "<div style=\"clear:both;\"></div>";

	}	
	
}// akhir function data_gambar

function header_gambar()
{
	// data product
	
	$shoes_id = $_POST['id'];
	
	$sql_p = "SELECT * FROM ms_shoes a, ms_brand b where a.brand_id = b.brand_id and a.shoes_id = $shoes_id";

	$q_p = mysql_query($sql_p);

	$fp = mysql_fetch_array($q_p);


	// data gambar 

	$sql = "select * from ms_shoes_image where shoes_id = $shoes_id and maskot = 1";

	$q = mysql_query($sql);

	$f = mysql_fetch_array($q);

	// =================================================================

	$shoes_name = strtolower(str_replace(" ","_",$fp['shoes_name']));
	$brand_name = strtolower(str_replace(" ","_",$fp['brand_name']));

	// ==================================================================

	// buat nama file baru untuk image kecil 

	$small_type = strrchr($f['image_name'],".");

	$small_img2 = rtrim($f['image_name'],$small_type);

	$small_img3 = $small_img2."_small".$small_type; 


	$check_url_image = "../../../asset/product_display/$brand_name/$shoes_name/thumb/$small_img3"; //echo "<br>";
	$url_image = "../asset/product_display/$brand_name/$shoes_name/thumb/$small_img3";

	if(empty($f) || !is_file($check_url_image))
	{

		$url_image = "../images/no_product_image.jpg";

	}
	else
	{
		$url_image = "../asset/product_display/$brand_name/$shoes_name/thumb/$small_img3";
	}
	
	echo "{\"url_image\":\"$url_image\",\"title_product\":\"$fp[shoes_name]\",\"desc_product\":\"$fp[description]\",\"price\":\"".number_format($fp['price'])."\"}";	
}

// controller

$act = $_REQUEST['act'];
$shoes_id = $_POST['shoes_id'];

if($act == "upload")
{
	upload();
}
else if($act == "tampil")
{
	
	data_gambar($shoes_id);	
	
}
else if($act == "head")
{
	header_gambar();
}



/*print_r($_FILES); print "<br>";



print_r($_POST);



exit;*/


//header("location:../../admin.php?p=upload_img&id=$shoes_id");

?>