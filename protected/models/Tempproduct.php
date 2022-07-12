<?php

/**
 * This is the model class for table "tempproduct".
 *
 * The followings are the available columns in table 'tempproduct':
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $desc
 * @property string $link
 * @property string $image_link
 * @property string $subcatuniquename
 * @property string $catuniquename
 */
class Tempproduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tempproduct';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, price, desc, link, image_link, subcatuniquename, catuniquename', 'required'),
			array('name', 'length', 'max'=>300),
			array('price', 'length', 'max'=>50),
			array('desc', 'length', 'max'=>700),
			array('link, image_link', 'length', 'max'=>500),
			array('subcatuniquename, catuniquename', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, price, desc, link, image_link, subcatuniquename, catuniquename', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'price' => 'Price',
			'desc' => 'Desc',
			'link' => 'Link',
			'image_link' => 'Image Link',
			'subcatuniquename' => 'Subcatuniquename',
			'catuniquename' => 'Catuniquename',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('image_link',$this->image_link,true);
		$criteria->compare('subcatuniquename',$this->subcatuniquename,true);
		$criteria->compare('catuniquename',$this->catuniquename,true);

		return new CActiveDataProvider($this, array(
			   'pagination' => array(
					 'pageSize' => 100,
				),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempproduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
