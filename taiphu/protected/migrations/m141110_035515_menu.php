<?php

class m141110_035515_menu extends CDbMigration
{
	public function up()
	{
	   $this->createTable('{{menus}}',array(
            'id'=>'pk',
            'group'=>'varchar(32) not null',
            'type'=>'varchar(32) not null',
            'targetId'=>'int(11) not null',
            'parent'=>'int(11) not null default 0',
            'sort'=>'int(11) not null default 0'
       ));
	}

	public function down()
	{
		$this->dropTable('{{menus}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}