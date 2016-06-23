<?php

class m141105_012329_config extends CDbMigration
{
	public function up()
	{
	   $this->createTable('{{configs}}',array(
            'id' => 'pk',
            'name' => 'varchar(128) not null',
            'key' => 'varchar(32) not null unique',
            'value' => 'text null',
            'type' => 'varchar(32) not null',
            'language' => 'varchar(5) not null default "all"',
            'hidden' => 'int(1) not null default 0',
       ));
	}

	public function down()
	{
		$this->dropTable('{{configs}}');
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