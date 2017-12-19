<?php

class m171218_235558_insert_alias_in_user extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_author', 'courtesy_name', 'string'); //字
        $this->addColumn('tbl_author', 'pseudonym', 'string');    //号
    }

	public function down()
	{
        $this->dropColumn('tbl_author', 'courtesy_name', 'string'); //字
        $this->dropColumn('tbl_author', 'pseudonym', 'string');    //号
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