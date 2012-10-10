<?php

class m121009_101517_create_dept_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('debt', array(
			'id' => 'pk',
			'sum' => 'decimal(10,2)',
			'date_time' => 'datetime',
			'description' => 'string',
			'done' => 'boolean'
		));
	}

	public function down()
	{
		$this->dropTable('debt');
	}
}
