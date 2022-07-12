<?php

/**
 * This is the model class for table "scraped_data".
 *
 * The followings are the available columns in table 'scraped_data':
 * @property integer $id
 * @property integer $id_registry
 * @property string $link
 * @property string $merchant_name
 * @property string $name
 * @property string $image_link
 * @property string $price
 * @property string $desc
 * @property string $date_added
 */
class ScrapedData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'scraped_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_registry', 'numerical', 'integerOnly'=>true),
			array('link, merchant_name, name, image_link, price, desc', 'length', 'max'=>4),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_registry, link, merchant_name, name, image_link, price, desc, date_added', 'safe', 'on'=>'search'),
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
			'id_registry' => 'Id Registry',
			'link' => 'Link',
			'merchant_name' => 'Merchant Name',
			'name' => 'Name',
			'image_link' => 'Image Link',
			'price' => 'Price',
			'desc' => 'Desc',
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
		$criteria->compare('id_registry',$this->id_registry);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('merchant_name',$this->merchant_name,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image_link',$this->image_link,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ScrapedData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
