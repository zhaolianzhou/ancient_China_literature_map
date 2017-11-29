<?php

/**
 * This is the model class for table "tbl_chronology".
 *
 * The followings are the available columns in table 'tbl_chronology':
 * @property integer $id
 * @property string $dynasty
 * @property string $reign_title
 * @property integer $start_year
 * @property integer $end_year
 * @property integer $duration
 */
class Chronology extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_chronology';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_year, end_year, duration', 'numerical', 'integerOnly'=>true),
			array('dynasty, reign_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dynasty, reign_title, start_year, end_year, duration', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dynasty' => 'Dynasty',
			'reign_title' => 'Reign Title',
			'start_year' => 'Start Year',
			'end_year' => 'End Year',
			'duration' => 'Duration',
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
		$criteria->compare('dynasty',$this->dynasty,true);
		$criteria->compare('reign_title',$this->reign_title,true);
		$criteria->compare('start_year',$this->start_year);
		$criteria->compare('end_year',$this->end_year);
		$criteria->compare('duration',$this->duration);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Chronology the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
