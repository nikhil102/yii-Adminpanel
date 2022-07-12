<?php

/**
 * This is the model class for table "homebanner".
 *
 * The followings are the available columns in table 'homebanner':
 * @property integer $id
 * @property string $bannerlink
 * @property string $appimagelink
 * @property integer $bannerorder
 * @property integer $is_video
 * @property string $videolink
 * @property string $link
 * @property string $name
 */
class Homebanner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'homebanner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, bannerorder', 'required'),
			array('bannerorder, is_video', 'numerical', 'integerOnly'=>true),
			array('bannerlink', 'length', 'max'=>400),
			array('appimagelink, videolink, link', 'length', 'max'=>300),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, bannerlink, appimagelink, bannerorder, is_video, videolink, link, name', 'safe', 'on'=>'search'),
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
			'bannerlink' => 'Bannerlink',
			'appimagelink' => 'Appimagelink',
			'bannerorder' => 'Order',
			'is_video' => 'Is Video',
			'videolink' => 'Videolink',
			'link' => 'Link',
			'name' => 'Name',
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
		$criteria->compare('bannerlink',$this->bannerlink,true);
		$criteria->compare('appimagelink',$this->appimagelink,true);
		$criteria->compare('bannerorder',$this->bannerorder);
		$criteria->compare('is_video',$this->is_video);
		$criteria->compare('videolink',$this->videolink,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Homebanner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
