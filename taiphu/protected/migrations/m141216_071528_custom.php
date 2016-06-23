<?php

class m141216_071528_custom extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{customer}}',array(
			'id'=>'pk',
			'name'=>'string not null',
			'email'=>'string not null',
			'phone'=>'string not null',
			'address'=>'string not null',
			'body'=>'text null',
		));
	}

	public function down()
	{
		$this->dropTable('{{customer}}');
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