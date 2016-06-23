<?php

class m141115_035410_video_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{videos}}',array(
			'id'=>'pk',
			'name_vi'=>'string not null',
			'name_en'=>'string null',
			'videoId'=>'string not null',
			'image' =>'text null',
			'homepage'=>'int(1) not null default 0',
			'order' =>'int(11) not null default 0',
			'created_date'=>'datetime',
			'update_date'=>'datetime',
		));
	}

	public function down()
	{
		$this->dropTable('{{videos}}');
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