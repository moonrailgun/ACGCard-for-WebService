<?php
require '../core/db.php';
require '../core/model.php';

$playerUid = (int)$_GET["uid"] or die("不合法查询条件,请根据uid进行查询");
$playerinfo = new playerinfo;

//角色基本信息
$command = "SELECT * FROM playerinfo WHERE Uid = '".$playerUid."'";
$result = $core_db->Query($command);
$row = mysql_fetch_array($result);
$playerinfo->Uid = (int)$row["Uid"];
$playerinfo->PlayerName = (string)$row["PlayerName"];
$playerinfo->Level = (int)$row["Level"];
$playerinfo->Coin = (int)$row["Coin"];
$playerinfo->Gem = (int)$row["Gem"];
$playerinfo->VipExpire = (string)$row["VipExpire"];

$command = "SELECT * FROM card INNER JOIN cardinventory ON card.CardId = cardinventory.CardId WHERE CardOwnerId = '".$playerUid."'";

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
$playerinfo->OwnCardList = $InventoryList;
$playerinfo->OwnCardCount = count($InventoryList);

$returnJson["Type"] = "playerinfo";
$returnJson["Info"] = $playerinfo;
echo json_encode($returnJson);
?>