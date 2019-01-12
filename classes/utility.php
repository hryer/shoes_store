<?php 

		
	class utility{
		function isarrayempty($dataarray=NULL){
			$result = false;

			if($dataarray!=NULL){
				if(count($dataarray)>0 && empty($dataarray[0])){
					$result = true;
				}else{
					$result = false;
				}
			}
			return $result;
		}

		function gotopage($page=""){
			global $base_url;
			if($page!=""){
				// overfly karna dlm tag php diisi js				
				echo "<script type='text/javascript' language='javascript'>";
				echo "window.location.href='" . $base_url . $page . "';";
				echo "</script>";
			}
		}

		function createoption($thevalue="",$thelable="",$selected=false){
			$selectedstr = "";
			if($selected == true){
				$selectedstr = "selected";
			}

			$theoptions = "<option value='" . $thevalue . "' " . $selectedstr . ">";
			$theoptions = $theoptions . $thelable . "</options>";

			return $theoptions;

		}
	}
 ?>