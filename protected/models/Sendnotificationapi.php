<?php

/**
 * This is the model class for table "sendnotificationapi".
 *
 * The followings are the available columns in table 'sendnotificationapi':
 * @property integer $id
 * @property string $GOOGLE_API_KEY
 * @property string $GOOGLE_API_URL
 */
class Sendnotificationapi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sendnotificationapi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GOOGLE_API_KEY, GOOGLE_API_URL', 'required'),
			array('GOOGLE_API_KEY, GOOGLE_API_URL', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, GOOGLE_API_KEY, GOOGLE_API_URL', 'safe', 'on'=>'search'),
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
			'GOOGLE_API_KEY' => 'Google Api Key',
			'GOOGLE_API_URL' => 'Google Api Url',
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
		$criteria->compare('GOOGLE_API_KEY',$this->GOOGLE_API_KEY,true);
		$criteria->compare('GOOGLE_API_URL',$this->GOOGLE_API_URL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sendnotificationapi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
