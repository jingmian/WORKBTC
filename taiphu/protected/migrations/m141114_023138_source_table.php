<?php

class m141114_023138_source_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{sources}}',array(
			'id'=>'pk',
			'name_vi'=>'string not null',
			'name_en'=>'string not null',
			'des_vi'=>'text null',
			'des_en'=>'text null',
			'created_date'=>'datetime null',
			'updated_date'=>'datetime null',
		));
	}

	public function down()
	{
		$this->dropTable('{{sources}}');
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