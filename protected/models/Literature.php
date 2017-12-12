<?php

/**
 * This is the model class for table "tbl_literature".
 *
 * The followings are the available columns in table 'tbl_literature':
 * @property integer $id
 * @property string $title
 * @property integer $author
 * @property string $content
 * @property string $written_time
 * @property integer $position
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Toponymy $position0
 */
class Literature extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_literature';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('author, position, type', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('content, written_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, author, content, written_time, position, type', 'safe', 'on'=>'search'),
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
			'position0' => array(self::BELONGS_TO, 'Toponymy', 'position'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '題目',
			'author' => '作者',
			'content' => '內容',
			'written_time' => '創作時間',
			'position' => '創作地點',
			'type' => '類型',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('written_time',$this->written_time,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Literature the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
