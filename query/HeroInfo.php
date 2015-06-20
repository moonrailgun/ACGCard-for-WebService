<?php
require '../core/db.php';
$command = "SELECT * FROM card";

$con = $core_db->GetCon($command);

$result = mysql_query($command);

while($row = mysql_fetch_array($result))
{
	$cardid = $row['CardId'];
	$cardname = $row['CardName'];
	$cardrarity = $row['CardRarity'];
	$basehealth = $row['BaseHealth'];
	$growhealth = $row['GrowHealth'];
	$baseenergy = $row['BaseEnergy'];
	$growenergy = $row['GrowEnergy'];
	$baseattack = $row['BaseAttack'];
	$growattack = $row['GrowAttack'];
	$basespeed = $row['BaseSpeed'];
	$growspeed = $row['GrowSpeed'];
	
	echo $cardid." ".$cardname." ".$cardrarity." ";
	echo $basehealth." ".$growhealth." ";
	echo $baseenergy." ".$growenergy." ";
	echo $baseattack." ".$growattack." ";
	echo $basespeed." ".$growspeed;
	echo "<br />";
}
?>