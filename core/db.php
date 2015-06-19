<?php
class db{
	function GetCon()
	{
		$con = mysql_connect($db_servername,$db_username,$db_password);
		if(!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		return $con;
	}
	
	function CloseCon($con)
	{
		mysql_close($con);
	}
	
	function Query($dbname,$command)
	{
		$con = GetCon();
		mysql_select_db("my_db", $con);
	
		$result = mysql_query($command);
		return $result;
	}
	
	$db_servername = "localhost";
	$db_username = "root";
	$db_password = "";
}


?>