<?php
class heroInfo
{
	public $CardId;
	public $CardName;
	public $CardRarity;
	public $BaseHealth;
	public $GrowHealth;
	public $BaseEnergy;
	public $GrowEnergy;
	public $BaseAttack;
	public $GrowAttack;
	public $BaseSpeed;
	public $GrowSpeed;
}

class playerCard
{
	public $Id;
	public $CardId;
	public $CardName;
	public $CardRarity;
	public $CardOwnerId;
	public $CardLevel;
	public $CardOwnSkill;
	public $Health;
	public $Energy;
	public $Attack;
	public $Speed;
}
class taskInfo
{
	public $TaskID;
	public $TaskName;
	public $TaskDes;
	public $TaskExpire;
}

class news
{
	public $NewsID;
	public $Title;
	public $Content;
	public $PublishDate;
	public $ExpireDate;
}
?>