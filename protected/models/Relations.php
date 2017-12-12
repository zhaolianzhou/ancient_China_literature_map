<?php

/**
 * This is the model class for table "tbl_relations".
 *
 * The followings are the available columns in table 'tbl_relations':
 * @property integer $id
 * @property string $relations
 * @property integer $author_1
 * @property integer $author_2
 *
 * The followings are the available model relations:
 * @property Author $author1
 * @property Author $author2
 */
class Relations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_relations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relations, author_1, author_2', 'required'),
			array('author_1, author_2', 'numerical', 'integerOnly'=>true),
			array('relations', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, relations, author_1, author_2', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author1' => array(self::BELONGS_TO, 'Author', 'author_1'),
			'author2' => array(self::BELONGS_TO, 'Author', 'author_2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'relations' => '關係',
			'author_1' => '作者1',
			'author_2' => '作者2',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('relations',$this->relations,true);
		$criteria->compare('author_1',$this->author_1);
		$criteria->compare('author_2',$this->author_2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Relations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
