<?php 

	class customer extends database{
		private $_customer_id=0;
		private $_customer_name="";
		private $_customer_address="";
		private $_country="";
		private $_city="";
		private $_post_code=0;
		private $_customer_email="";
		private $_username="";
		private $_password="";
		private $_gender="";
		private $_phone_no=0;
		private $_bank_account=0;
		private $_create_date="";
		private $sql = "SELECT * FROM ms_customer mc ";

		function __construct($customer_id,$root=false){
			parent::__construct($root);

			// echo $customer_id; exit;
			if($customer_id!=NULL){
				$carisql=$this->sql . "WHERE mc.customer_id=" . $customer_id;
				


				$query=parent::db_getonerow($carisql);

			

				if($query != NULL){
					$this->_customer_id = $query['customer_id'];
					$this->_customer_name = $query['customer_name'];
					$this->_customer_address = $query['customer_address'];
					$this->_country = $query['country'];
					$this->_city = $query['city'];
					$this->_post_code = $query['post_code'];
					$this->_customer_email = $query['customer_email'];
					$this->_username = $query['username'];
					$this->_password = $query['password'];
					$this->_gender = $query['gender'];
					$this->_phone_no = $query['phone_no'];
					$this->_bank_account = $query['bank_account'];
					$this->_create_date = $query['create_date'];

				}
			}
		}

		function customer_id(){
			return $this->_customer_id;
		}

		function customer_name(){
			return $this->_customer_name;
		}

		function customer_address(){
			return $this->_customer_address;
		}

		function country(){
			return $this->_country;
		}

		function city(){
			return $this->_city;
		}

		function post_code(){
			return $this->_post_code;
		}

		function customer_email(){
			return $this->_customer_email;
		}

		function username(){
			return $this->_username;
		}

		function password(){
			return $this->_password;
		}

		function gender(){
			return $this->_gender;
		}

		function phone_no(){
			return $this->_phone_no;
		}

		function bank_account(){
			return $this->_bank_account;
		}

		function create_date(){
			return $this->_create_date;
		}

		function get_customer($customer_id=0){
			$result = NULL;
			$sql = $this->sql;

			if($customer_id>0){
				$sql = $sql . "WHERE mc.customer_id=" . $customer_id . " ";
			}

			$query=parent::db_queryresult($sql);
			$utility_obj = new utility();
			if(!$utility_obj->isarrayempty($query)){
				$result = $query;
			}

			return $result;
		}


	}


 ?>