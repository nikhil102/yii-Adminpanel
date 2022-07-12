<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $full_name
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $mobile
 * @property string $profile_image_link
 * @property string $address
 * @property string $city
 * @property string $gender
 * @property string $dob
 * @property integer $status
 * @property integer $cohost_flag
 * @property string $facebook_id
 * @property string $twitter_id
 * @property string $google_id
 * @property string $checksum
 * @property string $date_added
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, facebook_id, twitter_id, google_id, date_added', 'required'),
			array('status, cohost_flag', 'numerical', 'integerOnly'=>true),
			array('email, facebook_id, twitter_id, google_id', 'length', 'max'=>150),
			array('full_name', 'length', 'max'=>300),
			array('first_name, last_name', 'length', 'max'=>170),
			array('password', 'length', 'max'=>200),
			array('mobile', 'length', 'max'=>20),
			array('profile_image_link, address', 'length', 'max'=>400),
			array('city', 'length', 'max'=>60),
			array('gender, dob', 'length', 'max'=>10),
			array('checksum', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, full_name, first_name, last_name, password, mobile, profile_image_link, address, city, gender, dob, status, cohost_flag, facebook_id, twitter_id, google_id, checksum, date_added', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'full_name' => 'Full Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'password' => 'Password',
			'mobile' => 'Mobile',
			'profile_image_link' => 'Profile Image Link',
			'address' => 'Address',
			'city' => 'City',
			'gender' => 'Gender',
			'dob' => 'Dob',
			'status' => 'Status',
			'cohost_flag' => 'Cohost Flag',
			'facebook_id' => 'Facebook',
			'twitter_id' => 'Twitter',
			'google_id' => 'Google',
			'checksum' => 'Checksum',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('profile_image_link',$this->profile_image_link,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('cohost_flag',$this->cohost_flag);
		$criteria->compare('facebook_id',$this->facebook_id,true);
		$criteria->compare('twitter_id',$this->twitter_id,true);
		$criteria->compare('google_id',$this->google_id,true);
		$criteria->compare('checksum',$this->checksum,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function reportcount()
	{
	
		return User::model()->count();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
