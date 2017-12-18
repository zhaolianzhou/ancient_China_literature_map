<?php

/**
 * This is the model class for table "tbl_author".
 *
 * The followings are the available columns in table 'tbl_author':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $dob
 * @property string $dod
 * @property string $gender
 * @property integer $age
 * @property string $native_place
 *
 * The followings are the available model relations:
 * @property Relations[] $relations
 * @property Relations[] $relations1
 */
class Author extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_author';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name', 'required'),
			array('first_name, last_name, native_place', 'length', 'max'=>255),
			array('gender', 'length', 'max'=>1),
			array('dob, dod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, dob, dod, gender, age, native_place', 'safe', 'on'=>'search'),
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
			'relations' => array(self::HAS_MANY, 'Relations', 'author_1'),
			'relations1' => array(self::HAS_MANY, 'Relations', 'author_2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => '名',
			'last_name' => '姓',
			'dob' => '生日',
			'dod' => '祭日',
			'gender' => '性别',
			'native_place' => '出生地',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('dod',$this->dod,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('native_place',$this->native_place,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Author the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

//	public function getAge($dob, $date_of_death = null, $check_date = null){
//	    if (!$dob){
//	        return 'Unknown';
//        }
//
//        $dob_datetime = new DateTime($dob);
//	    $check_datetime = new DateTime($check_date);
//
//	    if ($date_of_death) {
//	        $dod_datetime = new DateTime($date_of_death);
//	        if ($check_datetime->diff($dod_datetime)->invert) {
//	            $check_datetime = $dod_datetime;
//            }
//        }
//
//        return $dob_datetime->diff($check_datetime)->y;
//    }
}
