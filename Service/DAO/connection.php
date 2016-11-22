<?php 
	class Connection{
		private $Host="";
		private $User="";
		private $Password="";
		private $DataBase="";
		private $Connection="";

		 public function __construct()
		{
			$this->Host="localhost";
			$this->User="root";
			$this->Password="";
			$this->DataBase="eventbd";
		}

		public function OpenConnection()
	{
		try 
		{
			$this->Connection = new  
			PDO(
				"mysql:host={$this->Host};
				 dbname={$this->DataBase}",
				 $this->User,
				 $this->Password
				);
			 $this->Connection->setAttribute
				 (
				 	PDO::ATTR_ERRMODE, 
				 	PDO::ERRMODE_EXCEPTION
				 );	



		} 
		catch (PDOException $e) {
			
		}
	}

		public function CloseConnection(){
			mysqli_close($this->Connection);
		}

		public function getConnection(){
			return $this->Connection;
		}
	}

	 /*$obj=new Connection();
	 $obj->OpenConnection();
	 if ($obj->getConnection()) {
	 	echo "Connection success!";
	 }*/
?>