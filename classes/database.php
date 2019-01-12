<?php 
	
	class database {

		private $db_connection;
		private $db_selection;

		function __construct($root=false){
			//buat tambahin .. pas include 
			$root_dot="";
			if($root==true){
				$root_dot="../";
			}else{
				$root_dot="";
			}

			include($root_dot . "config/database_config.php");
			$this->db_connection = new mysqli($db_server,$db_user,$db_password,$db_selected,$db_port);

		}

		function db_queryresult($sql=""){
			$result = array();
			if($sql!=""){
				$query=$this->db_connection->query($sql);
				if($query->num_rows>0){
					$rows=$query->fetch_assoc();
					do {
						$result[]=$rows;
					}while($rows=$query->fetch_assoc());
				}

			}
			return $result;
		}

		function db_getonerow($sqlimg=""){
			$result = 0;

			if($sqlimg!=""){
				$query=$this->db_connection->query($sqlimg) or die($this->db_connection->error);
				$result = $query->fetch_assoc() ;

			}

			return $result;
		}

		function db_insert($table="",$fielddata=NULL){
			$result = NULL;
            $result_2 = NULL;

			$fields="";

			$fieldsvalue="";

			if($table!="" && $fielddata!=NULL){
				//print_r($fielddata);
				foreach($fielddata as $rows=>$rowsvalue){
					$fields=$fields . $rows . ",";
					$fieldsvalue=$fieldsvalue . $rowsvalue . ",";
				}
				//buang koma terakhir
				//paramater pertama fields,posisi awal,banyaknya berapa
				$fields = substr($fields,0,strlen($fields)-1);
				$fieldsvalue = substr($fieldsvalue,0,strlen($fieldsvalue)-1);

				//Query insert ke sql
				$sql = "INSERT INTO " . $table . " ( " . $fields . " ) " . " VALUES ( " . $fieldsvalue . " ) ";
				//echo $sql . "<br>";
				//Execute Query
				$this->db_connection->query($sql);				
				//mysql_query($sql,$this->db_connection);
				$result = $this->db_connection->insert_id;
			}
			//return $result;
			return $result;
		}

		function db_update($table="",$fielddata=NULL,$wherestr=""){
			$result = 0;
			$fieldset="";
			if($table!="" && $fielddata!=NULL && $wherestr != ""){
				foreach($fielddata as $field=>$fieldvalue){
					$fieldset = $fieldset . $field . "=" . $fieldvalue . ",";
				}
				$fieldset = substr($fieldset,0,strlen($fieldset)-1);

				$sql ="UPDATE " . $table . " SET " . $fieldset;
				$sql = $sql . " WHERE " . $wherestr;

				$result = $this->db_connection->query($sql);
			}

			return $result;

		}

		function db_rowcount($sql=""){
			$result=0;
			// echo $sql;exit;
			if($sql!=""){

				$query=$this->db_connection->query($sql);
				$result=$query->num_rows;
				//echo $result;exit;
			}
			return $result;
		}

		function db_execute($sql=""){
			$result = 0;
			if($sql!=""){
				$result = $this->db_connection->query($sql);

			}
			return $result;
		}

	}
 ?>