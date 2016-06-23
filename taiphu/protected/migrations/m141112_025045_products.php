<?php

class m141112_025045_products extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{products}}', array(
            'id' => 'pk',
            'parent'=>'int(11) not null',
            'name_vi' => 'string not null',
            'name_en'=>'string null',
            'slug' => 'string not null unique',
            'des_vi' =>'text null',
            'des_en' =>'text null',
            'content_vi' => 'text null',
            'content_en' =>'text null',
            'status' => 'int(1) not null default 1',
            'image' => 'text null',
            'title' => 'varchar(70) null',
            'price' => 'int(11) not null default 0',
            'description' => 'varchar(170) null',
            'keyword' => 'text null',
            'created_date' =>'datetime',
            'updated_date' =>'datetime',
            'feature' =>'int(10) null',
        ));
	}

	public function down()
	{
		$this->dropTable('{{products}}');
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