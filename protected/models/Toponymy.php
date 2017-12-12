<?php

/**
 * This is the model class for table "tbl_toponymy".
 *
 * The followings are the available columns in table 'tbl_toponymy':
 * @property integer $id
 * @property string $current_name
 * @property string $ancient_name
 * @property integer $start_chronology
 * @property integer $end_chronology
 * @property integer $start_year
 * @property integer $end_year
 *
 * The followings are the available model relations:
 * @property Literature[] $literatures
 * @property Chronology $endChronology
 * @property Chronology $startChronology
 */
class Toponymy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_toponymy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_chronology, end_chronology, start_year, end_year', 'numerical', 'integerOnly'=>true),
			array('current_name, ancient_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, current_name, ancient_name, start_chronology, end_chronology, start_year, end_year', 'safe', 'on'=>'search'),
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
			'literatures' => array(self::HAS_MANY, 'Literature', 'position'),
			'endChronology' => array(self::BELONGS_TO, 'Chronology', 'end_chronology'),
			'startChronology' => array(self::BELONGS_TO, 'Chronology', 'start_chronology'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'current_name' => '今名',
			'ancient_name' => '古名',
			'start_chronology' => '始於',
			'end_chronology' => '終於',
			'start_year' => '起始年',
			'end_year' => '結束年',
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
		$criteria->compare('current_name',$this->current_name,true);
		$criteria->compare('ancient_name',$this->ancient_name,true);
		$criteria->compare('start_chronology',$this->start_chronology);
		$criteria->compare('end_chronology',$this->end_chronology);
		$criteria->compare('start_year',$this->start_year);
		$criteria->compare('end_year',$this->end_year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Toponymy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
