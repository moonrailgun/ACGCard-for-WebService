<?php
class db{
	function GetCon()
	{
		$con = mysql_connect($this->db_servername,$this->db_username,$this->db_password);
		if(!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($this->db_dbname, $con);
		return $con;
	}
	
	function CloseCon($con)
	{
		mysql_close($con);
	}
	
	function Query($command)
	{
		$con = $this->GetCon();
		
		$result = mysql_query($command);
		$this->CloseCon($con);
		
		return $result;
	}
	
	private $db_servername = "localhost";
	private $db_dbname = "acgcard";
	private $db_username = "root";
	private $db_password = "";
}

$core_db = new db();
?>