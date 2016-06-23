<?php

class m141119_081228_order extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{orders}}',array(
			'id' =>'pk',
			'productId'=>'int(11) not null',
			'productName'=>'string not null',
			'number'=>'int(11) not null',
			'custommerId'=>'int(11) not null',
			'check'=>'int(1) not null default 0',
			'date_time'=>'datetime null',
			'update_time'=>'datetime null',
		));
	}

	public function down()
	{
		$this->dropTable('{{orders}}');
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