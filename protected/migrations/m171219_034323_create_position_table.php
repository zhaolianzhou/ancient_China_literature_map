<?php

class m171219_034323_create_position_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_official_position', array(
            'id' => 'pk',
            'position_name' => 'string NOT NULL',
            'time_period' => 'int(11) NOT NULL',
            'level' => 'string',
        ));
        $this->addForeignKey('period_fk', 'tbl_official_position', 'time_period',
            'tbl_chronology', 'id', 'CASCADE', 'CASCADE');
        $this->createTable('tbl_author_position_list', array(
            'id' => 'pk',
            'author' => 'int(11) NOT NULL',
            'official_position' => 'int(11) NOT NULL',
            'start_time' => 'int(6)',
            'end_time' => 'int(6)',
        ));
        $this->addForeignKey('author_fk', 'tbl_author_position_list', 'author',
            'tbl_author', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('position_fk', 'tbl_author_position_list', 'official_position',
            'tbl_official_position', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropTable('tbl_official_position');
        $this->dropTable('tbl_author_position_list');
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