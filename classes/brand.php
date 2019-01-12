<?php 

	class brand extends database{
		private $sql = "SELECT * FROM ms_brand";

		function __construct($root){
			parent::__construct($root);

		}

		function createoptionbrand($brand_id=0){
			$result = NULL;
			$sql = $this->sql;

			$query = parent::db_queryresult($sql);

			$utility_obj = new utility();
			if(!$utility_obj->isarrayempty($query)){
				$selected = false;
				$result ="";
				foreach($query as $rows){
					if($rows["brand_id"]==$brand_id){
						$selected = true;
					}else{
						$selected = false;
					}
					$result = $result . $utility_obj->createoption($rows["brand_id"],$rows["brand_name"],$selected);
				}
			}

			return $result;

		}
	}

 ?>