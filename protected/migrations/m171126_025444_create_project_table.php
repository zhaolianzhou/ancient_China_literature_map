<?php

class m171126_025444_create_project_table extends CDbMigration
{
	public function up()
	{
	    //create the atble of author
//        $this->createTable('tbl_author', array(
//           'id' => 'pk',
//           'first_name' => 'string NOT NULL',
//           'last_name' => 'string NOT NULL',
//           'dob' => 'datetime DEFAULT NULL',  //date of birth
//            'dod' => 'datetime DEFAULT NULL', //date of death
//            'gender' => 'char(1)',
//            'age' => 'int(3) DEFAULT NULL',
//            'native_place' => 'string',
//        ),'ENGINE = InnoDB');

        //create the table of chronology
//        $this->createTable('tbl_chronology',array(
//            'id' => 'pk',
//            'dynasty' => 'string',
//            'reign_title' => 'string',  //年号
//            'start_year' => 'int(6)',
//            'end_year' => 'int(6)',
//            'duration' => 'int(6)',
//        ), 'ENGINE = InnoDB');

        //create the table of relations between author
//        $this->createTable('tbl_relations',array(
//            'id' => 'pk',
//            'relations' => 'string NOT NULL',
//            'author_1' => 'string NOT NULL',
//            'author_2' => 'string NOT NULL',
//        ));
        $this->addForeignKey('fk_author','tbl_relations', 'author_1',
            'tbl_author', 'id','CASCADE', 'CASCADE');
        $this->addForeignKey('fk_author','tbl_relations', 'author_2',
            'tbl_author', 'id','CASCADE', 'CASCADE');
	}

	public function down()
	{
        $this->dropTable('tbl_relations');
        $this->dropTable('tbl_chronology');
        $this->dropTable('tbl_author');
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