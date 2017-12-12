<?php

class m171208_021624_create_user_table extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        $this->createTable('tbl_user', array(
            'id' => 'pk',
            'username' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'password' => 'varchar(40)',
        ), 'ENGINE = InnoDB CHARSET=utf8');
        $this->insert('tbl_user', array('username' => 'admin', 'email'=>'zhaolianzhou92@gmail.com', 'password'=> SHA1('admin')));
    }

	public function down()
	{
	    
        $this->dropTable("tbl_user");
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