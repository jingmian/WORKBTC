<?php

class m141103_032737_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{users}}',array(
			'id'=>'pk',
			'username' => 'varchar(32) not null unique',
			'email' => 'varchar(128) not null unique',
			'password' => 'varchar(250) not null',
			'last_session'=>'varchar(128) null',
			'created_date' => 'datetime',
			'updated_date' => 'datetime',
		));
		
		$this->createTable('{{authitem}}',array(
			'name'=>'varchar(64) not null',
			'type'=>'integer not null',
			'description' => 'string',
			'bizrule' => 'string',
			'data' => 'string',
			'PRIMARY KEY (`name`)'
		));

		$this->createTable('{{authitemchild}}',array(
			'parent' => 'varchar(64) not null',
			'child' => 'varchar(64) not null',
			'PRIMARY KEY (`parent`,`child`)'
		));

		$this->createTable('{{authassignmen}}',array(
			'itemname' => 'varchar(64) not null',
			'userid' =>'varchar(64) not null',
			'bizrule' =>'text null',
			'data' => 'text null',
			'PRIMARY KEY (`itemname`,`userid`)'
		));
	}

	public function down()
	{
		$this->dropTable('{{users}}');
		$this->dropTable('{{authassignmen}}');
		$this->dropTable('{{authitemchild}}');
		$this->dropTable('{{authitem}}');
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