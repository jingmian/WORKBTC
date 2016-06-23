<?php

class m141117_043452_special_tour extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{specialtour}}',array(
			'id'=>'pk',
			'targetId'=>'int(11) not null unique',
			'order'=>'int(11) not null default 0',
		));
	}

	public function down()
	{
		$this->dropTable('{{specialtour}}');
	}
}