<?php

	include "../../../config/config.php";
	include "../../../classes/Image.php";
	
	// delete gambar 
	
	$image_obj = new Image();
	$id = $_POST['id'];
	$shoes_id = $_POST['shoes_id'];
	
	//get_detail_image
	$f = $image_obj->get_detail_image($id);
	
	// get list image
	$f_img = $image_obj->get_image_list($shoes_id);
	
	
	$shoes_name = strtolower(str_replace(" ","_",$f_img['shoes_name']));
	$brand_name = strtolower(str_replace(" ","_",$f_img['brand_name']));
	$img = $f['image_name'];
	
	$location = "../../../asset/product_display/$brand_name/$shoes_name/$img";
	
	// hapus fisik gambar
	
	if(is_file($location))
	{
		unlink($location);
	}
	
	// hapus data gambar di database
	$str2 = "delete from ms_shoes_image where image_id = $id";
	$q = mysql_query($str2);
	
	if($q)
	{
		echo "hapus data image berhasil ";
	}
	

?>