<?php
require '../core/db.php';
require '../core/model.php';

$CardOwnerId = $_GET["ownerid"] or die("不合法查询条件");

$command = "SELECT * FROM card INNER JOIN cardinventory ON card.CardId = cardinventory.CardId WHERE CardOwnerId = '".$CardOwnerId."'";

$result = $core_db->Query($command);
$InventoryList = array();

while($row = mysql_fetch_array($result))
{
	$playerCard = new playerCard;
	$playerCard->Id = (int)$row["Id"];
	$playerCard->CardId = (int)$row["CardId"];
	$playerCard->CardName = $row["CardName"];
	$playerCard->CardRarity = (int)$row["CardRarity"];
	$playerCard->CardOwnerId = (int)$row["CardOwnerId"];
	$playerCard->CardLevel = (int)$row["CardLevel"];
	$playerCard->CardOwnSkill = $row["CardOwnSkill"];
	$playerCard->Health = (int)$row["BaseHealth"] + (int)$row["GrowHealth"] * (int)$row["CardLevel"] + (int)$row["SpecialHealth"];
	$playerCard->Energy = (int)$row["BaseEnergy"] + (int)$row["GrowEnergy"] * (int)$row["CardLevel"] + (int)$row["SpecialEnergy"];
	$playerCard->Attack = (int)$row["BaseAttack"] + (int)$row["GrowAttack"] * (int)$row["CardLevel"] + (int)$row["SpecialAttack"];
	$playerCard->Speed = (int)$row["BaseSpeed"] + (int)$row["GrowSpeed"] * (int)$row["CardLevel"] + (int)$row["SpecialSpeed"];
	
	$InventoryList[count($InventoryList)] = $playerCard;
}

$returnJson["Type"] = "inventory";
$returnJson["Count"] = count($InventoryList);
$returnJson["List"] = $InventoryList;
echo json_encode($returnJson);
?>