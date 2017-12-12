<?php

class m171126_025444_create_project_table extends CDbMigration
{
	public function up()
	{
	    $transaction = $this->getDbConnection()->beginTransaction();
	    try {
            //create the table of author
            $this->createTable('tbl_author', array(
                'id' => 'pk',
                'first_name' => 'string NOT NULL',
                'last_name' => 'string NOT NULL',
                'dob' => 'datetime DEFAULT NULL',  //date of birth
                'dod' => 'datetime DEFAULT NULL', //date of death
                'gender' => 'char(1)',
                'native_place' => 'string',
            ), 'ENGINE = InnoDB  CHARSET=utf8');

            //create the table of chronology
            $this->createTable('tbl_chronology', array(
                'id' => 'pk',
                'dynasty' => 'string',
                'reign_title' => 'string',  //年号
                'start_year' => 'int(6)',
                'end_year' => 'int(6)',
                'duration' => 'int(6)',
            ), 'ENGINE = InnoDB  CHARSET=utf8');

            //create the table of relations between author
            $this->createTable('tbl_relations', array(
                'id' => 'pk',
                'relations' => 'string NOT NULL',
                'author_1' => 'int(11) NOT NULL',
                'author_2' => 'int(11) NOT NULL',
            ), 'ENGINE = InnoDB  CHARSET=utf8');
            $this->addForeignKey('author1_fk', 'tbl_relations', 'author_1',
                'tbl_author', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('author2_fk', 'tbl_relations', 'author_2',
                'tbl_author', 'id', 'CASCADE', 'CASCADE');
            $transaction->commit();

            //create the table of toponymy
            $this->createTable('tbl_toponymy',array(
                'id' => 'pk',
                'current_name' => 'string',
                'ancient_name' => 'string',
                'start_chronology' => 'int(11)',
                'end_chronology' => 'int(11)',
                'start_year' => 'int(6)',
                'end_year' => 'int(6)',
            ),'ENGINE = InnoDB  CHARSET=utf8');
            $this->addForeignKey('start_fk', 'tbl_toponymy','start_chronology',
                'tbl_chronology', 'id');
            $this->addForeignKey('end_fk', 'tbl_toponymy','end_chronology',
                'tbl_chronology', 'id');

            $this->createTable("tbl_literature",array(
                'id' =>'pk',
                'title' => 'string not null',
                'author' => 'int(11)',
                'content' => 'text',
                'written_time' => 'date',
                'position' => 'int(11)',
                'type' => 'int(11)',
            ),'ENGINE = InnoDB  CHARSET=utf8');

            $this->addForeignKey('position_fk', 'tbl_literature', 'position',
                'tbl_toponymy', 'id');

        }
        catch (Exception $e){
	        echo "Exception: ".$e->getMessage().'\n';
	        $transaction->rollback();
	        return false;
        }
	}

	public function down()
	{
	    $this->dropTable("tbl_literature");
	    $this->dropTable("tbl_toponymy");
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