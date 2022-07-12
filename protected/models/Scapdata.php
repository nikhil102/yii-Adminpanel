<?php

/**
 * This is the model class for table "scapdata".
 *
 * The followings are the available columns in table 'scapdata':
 * @property integer $scap_id
 * @property string $product_url
 * @property string $affi_url
 * @property string $product_title
 * @property string $product_img_link
 * @property string $product_dis
 * @property string $product_price
 */
class Scapdata extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'scapdata';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_url, affi_url, product_title, product_img_link, product_dis, product_price', 'required'),
			array('product_url, product_img_link', 'length', 'max'=>1000),
			array('affi_url', 'length', 'max'=>1500),
			array('product_title', 'length', 'max'=>500),
			array('product_dis', 'length', 'max'=>4000),
			array('product_price', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('scap_id, product_url, affi_url, product_title, product_img_link, product_dis, product_price', 'safe', 'on'=>'search'),
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
			'scap_id' => 'Scap',
			'product_url' => 'Product Url',
			'affi_url' => 'Affi Url',
			'product_title' => 'Product Title',
			'product_img_link' => 'Product Img Link',
			'product_dis' => 'Product Dis',
			'product_price' => 'Product Price',
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

		$criteria->compare('scap_id',$this->scap_id);
		$criteria->compare('product_url',$this->product_url,true);
		$criteria->compare('affi_url',$this->affi_url,true);
		$criteria->compare('product_title',$this->product_title,true);
		$criteria->compare('product_img_link',$this->product_img_link,true);
		$criteria->compare('product_dis',$this->product_dis,true);
		$criteria->compare('product_price',$this->product_price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Scapdata the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
