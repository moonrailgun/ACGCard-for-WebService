<?php
require '../core/db.php';
require '../core/model.php';

$command = "SELECT * FROM task";

$result = $core_db->Query($command);
$TaskList = array();

while($row = mysql_fetch_array($result))
{
	$task = new taskInfo;

	$task->TaskID = (int)$row['TaskID'];
	$task->TaskName =(string)$row['TaskName'];
	$task->TaskDes = (string)$row['TaskDes'];
	$task->TaskExpire = (string)$row['TaskExpire'];

	$TaskList[count($TaskList)] = $task;
}

$returnJson["Type"] = "inventory";
$returnJson["Count"] = count($TaskList);
$returnJson["List"] = $TaskList;
echo json_encode($returnJson);
?>