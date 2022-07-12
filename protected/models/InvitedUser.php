<?php

/**
 * This is the model class for table "invited_user".
 *
 * The followings are the available columns in table 'invited_user':
 * @property integer $id
 * @property integer $id_user_invited_by
 * @property integer $id_registry
 * @property string $regis_uniquename
 * @property string $name
 * @property string $email
 * @property string $date_added
 */
class InvitedUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invited_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('regis_uniquename', 'required'),
			array('id_user_invited_by, id_registry', 'numerical', 'integerOnly'=>true),
			array('regis_uniquename, name, email', 'length', 'max'=>100),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user_invited_by, id_registry, regis_uniquename, name, email, date_added', 'safe', 'on'=>'search'),
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
			'id_user_invited_by' => 'Id User Invited By',
			'id_registry' => 'Id Registry',
			'regis_uniquename' => 'Regis Uniquename',
			'name' => 'Name',
			'email' => 'Email',
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
		$criteria->compare('id_user_invited_by',$this->id_user_invited_by);
		$criteria->compare('id_registry',$this->id_registry);
		$criteria->compare('regis_uniquename',$this->regis_uniquename,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function reportcount()
	{
	
		return InvitedUser::model()->count();
	}	
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvitedUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
