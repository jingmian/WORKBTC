<?php

class m141117_011514_content_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{contents}}',array(
			'id'=>'pk',
			'name'=>'varchar(32) not null',
			'key'=>'varchar(32) not null unique',
			'type'=>'varchar(32) not null',
			'value'=>'text null',

		));
	}

	public function down()
	{
		$this->dropTable('{{contents}}');
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