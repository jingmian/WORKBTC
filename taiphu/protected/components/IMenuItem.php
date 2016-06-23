<?php
interface IMenuItem{
	public function getItemName($id,$type);
	public function getItem($id,$type);
	public function getType(CActiveRecord $item);
	public function getLink(CActiveRecord $item);
}
?>