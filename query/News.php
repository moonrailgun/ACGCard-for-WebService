<?php
require '../core/db.php';
require '../core/model.php';

$command = "SELECT * FROM news";

$result = $core_db->Query($command);
$NewsList = array();

while($row = mysql_fetch_array($result))
{
	$news = new news;

	$news->NewsID = (int)$row['NewsID'];
	$news->Title =(string)$row['Title'];
	$news->Content = (string)$row['Content'];
	$news->PublishDate = (string)$row['PublishDate'];
	$news->ExpireDate = (string)$row['ExpireDate'];

	$NewsList[count($NewsList)] = $news;
}

$returnJson["Type"] = "inventory";
$returnJson["Count"] = count($NewsList);
$returnJson["List"] = $NewsList;
echo json_encode($returnJson);
?>