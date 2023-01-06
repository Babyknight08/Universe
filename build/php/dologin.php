<?php

require_once( dirname(__FILE__) . '/dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function doLogin($uname,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tblemployees WHERE Username=:username");
			$stmt->execute(array(':username'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['Userpass']))
				{
					$_SESSION['userid'] = $userRow['ID'];
					$_SESSION['fullname'] = $userRow['FirstName'] . ' ' . substr($userRow['MiddleName'],0,1) . '. ' . $userRow['NameExtension'] . ' ' . $userRow['LastName'];
					$_SESSION['usertype'] = $userRow['UserType'];
					$_SESSION['section'] = $userRow['Section'];
					return true;
				}
				else
				{
					return false;

				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['userid']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
		exit();
	}
	
	public function doLogout()
	{
		//session_destroy();
		unset($_SESSION['userid']);
		unset($_SESSION['fullname']);
		unset($_SESSION['usertype']);
		unset($_SESSION['section']);
		return true;
	}
	
}

?>