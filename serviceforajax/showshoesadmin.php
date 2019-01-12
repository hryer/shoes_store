<?php 
	include("../config/config.php");
	include("../classes/utility.php");
	include("../classes/database.php");
	include("../classes/shoes.php");

	$shoesobj = new shoes("",true);
	$allshoes = $shoesobj->get_all(0,0);

	$no=1;
	foreach ($allshoes as $row){
		echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>" . $no . "</td>";
		echo "<td>" . $row["shoes_name"] . "</td>";
		echo "<td>" . $row["brand_name"] . "</td>";
		echo "<td>" . $row["stock"] . "</td>";
		echo "<td>" . $row["price"] . "</td>";
		echo "<td>"; 
			echo "<a href='javascript:' class='linkedit' shoes-id='" . $row["shoes_id"] . "'><img src='" . $base_url . "asset/cms/b_edit.png'></a>";
			echo "&nbsp;";

			echo "<a href='javascript:' class='linkdelete' shoes-id='" . $row["shoes_id"] . "'><img src='" . $base_url . "asset/cms/b_drop.png'></a>";

		echo "</td>";
		echo "<tr>";
		$no++;
	}


 ?>
<!--  <script>alert("SADASDASDAS");</script> -->