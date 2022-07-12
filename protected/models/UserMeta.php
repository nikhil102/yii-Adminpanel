<?php

/**
 * This is the model class for table "user_meta".
 *
 * The followings are the available columns in table 'user_meta':
 * @property integer $id
 * @property integer $id_user
 * @property string $registration_source
 * @property string $device_platform
 * @property string $browser_version
 * @property string $ip_address
 * @property string $user_meta
 * @property string $date_last_logged_in
 * @property string $date_added
 */
class UserMeta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_meta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('registration_source', 'length', 'max'=>100),
			array('device_platform, browser_version', 'length', 'max'=>50),
			array('ip_address, user_meta', 'length', 'max'=>150),
			array('date_last_logged_in, date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, registration_source, device_platform, browser_version, ip_address, user_meta, date_last_logged_in, date_added', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'registration_source' => 'Registration Source',
			'device_platform' => 'Device Platform',
			'browser_version' => 'Browser Version',
			'ip_address' => 'Ip Address',
			'user_meta' => 'User Meta',
			'date_last_logged_in' => 'Date Last Logged In',
			'date_added' => 'Date Added',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('registration_source',$this->registration_source,true);
		$criteria->compare('device_platform',$this->device_platform,true);
		$criteria->compare('browser_version',$this->browser_version,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('user_meta',$this->user_meta,true);
		$criteria->compare('date_last_logged_in',$this->date_last_logged_in,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserMeta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
