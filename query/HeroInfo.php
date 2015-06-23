<?php
require '../core/db.php';
require '../core/model.php';
$command = "SELECT * FROM card";

$result = $core_db->Query($command);
$heroInfoList = array();
while($row = mysql_fetch_array($result))
{
	$heroInfo = new heroInfo;

	$heroInfo->CardId = (int)$row['CardId'];
	$heroInfo->CardName = $row['CardName'];
	$heroInfo->CardRarity = (int)$row['CardRarity'];
	$heroInfo->BaseHealth = (int)$row['BaseHealth'];
	$heroInfo->GrowHealth = (int)$row['GrowHealth'];
	$heroInfo->BaseEnergy = (int)$row['BaseEnergy'];
	$heroInfo->GrowEnergy = (int)$row['GrowEnergy'];
	$heroInfo->BaseAttack = (int)$row['BaseAttack'];
	$heroInfo->GrowAttack = (int)$row['GrowAttack'];
	$heroInfo->BaseSpeed = (int)$row['BaseSpeed'];
	$heroInfo->GrowSpeed = (int)$row['GrowSpeed'];
	
	$heroInfoList[count($heroInfoList)] = $heroInfo;
}
$returnJson["Type"] = "hero";
$returnJson["Count"] = count($heroInfoList);
$returnJson["List"] = $heroInfoList;
echo json_encode($returnJson);
?>