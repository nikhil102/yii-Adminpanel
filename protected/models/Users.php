<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $date
 * @property string $randomnumber
 * @property integer $activated
 * @property string $role
 * @property string $auth_code
 * @property string $password_auth_code
 * @property string $date_modified
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, firstname, lastname, password, email, phone, date, randomnumber, activated, role, auth_code, password_auth_code, date_modified', 'required'),
			array('activated', 'numerical', 'integerOnly'=>true),
			array('username, firstname, lastname', 'length', 'max'=>25),
			array('password', 'length', 'max'=>200),
			array('email', 'length', 'max'=>80),
			array('phone', 'length', 'max'=>10),
			array('randomnumber', 'length', 'max'=>20),
			array('role, auth_code, password_auth_code', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, firstname, lastname, password, email, phone, date, randomnumber, activated, role, auth_code, password_auth_code, date_modified', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'password' => 'Password',
			'email' => 'Email',
			'phone' => 'Phone',
			'date' => 'Date',
			'randomnumber' => 'Randomnumber',
			'activated' => 'Activated',
			'role' => 'Role',
			'auth_code' => 'Auth Code',
			'password_auth_code' => 'Password Auth Code',
			'date_modified' => 'Date Modified',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('randomnumber',$this->randomnumber,true);
		$criteria->compare('activated',$this->activated);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('auth_code',$this->auth_code,true);
		$criteria->compare('password_auth_code',$this->password_auth_code,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function sea()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('randomnumber',$this->randomnumber,true);
		$criteria->compare('activated',$this->activated);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('auth_code',$this->auth_code,true);
		$criteria->compare('password_auth_code',$this->password_auth_code,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
