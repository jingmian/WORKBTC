<?php

class m141112_022950_categories extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{categories}}', array(
            'id' => 'pk',
            'parent'=>'int(11) not null default 0',
            'name_vi' => 'string not null',
            'name_en' => 'string null',
            'slug' => 'string not null unique',
            'des_vi' =>'text null',
            'des_en' =>'text null',
            'content_vi' => 'text null',
            'content_en'=>'text null',
            'status' => 'int(1) not null default 1',
            'image' => 'text null',
            'title' => 'varchar(70) null',
            'description' => 'varchar(170) null',
            'keyword' => 'text null',
            'created_date' =>'datetime',
            'updated_date' =>'datetime',
        ));
	}

	public function down()
	{
		$this->dropTable('{{categories}}');
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