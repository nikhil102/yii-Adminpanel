<?php

/**
 * This is the model class for table "gift".
 *
 * The followings are the available columns in table 'gift':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_registry
 * @property string $registryuniquename
 * @property integer $id_product
 * @property string $product_name
 * @property string $product_uniquename
 * @property integer $quantity
 * @property integer $fulfilled_quantity
 * @property string $image_link
 * @property string $image_link1
 * @property string $image_link2
 * @property string $image_link3
 * @property string $link
 * @property string $affiliate_link
 * @property integer $price
 * @property string $description
 * @property integer $count
 * @property integer $rapidcount
 * @property string $note
 * @property integer $buynow
 * @property integer $id_user_fulfilled_by
 * @property integer $status
 * @property integer $expiregift
 * @property string $date_last_modified
 * @property string $date_added
 * @property string $merchantname
 */
class Gift extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gift';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('registryuniquename, product_name, product_uniquename, image_link1, image_link2, image_link3, link, affiliate_link, price, description, count, rapidcount, buynow, merchantname', 'required'),
			array('id_user, id_registry, id_product, quantity, fulfilled_quantity, price, count, rapidcount, buynow, id_user_fulfilled_by, status, expiregift', 'numerical', 'integerOnly'=>true),
			array('registryuniquename', 'length', 'max'=>200),
			array('product_name, product_uniquename, merchantname', 'length', 'max'=>300),
			array('image_link, image_link1, image_link2, image_link3, affiliate_link', 'length', 'max'=>700),
			array('link, description', 'length', 'max'=>500),
			array('note, date_last_modified, date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, id_registry, registryuniquename, id_product, product_name, product_uniquename, quantity, fulfilled_quantity, image_link, image_link1, image_link2, image_link3, link, affiliate_link, price, description, count, rapidcount, note, buynow, id_user_fulfilled_by, status, expiregift, date_last_modified, date_added, merchantname', 'safe', 'on'=>'search'),
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
			'id_registry' => 'Id Registry',
			'registryuniquename' => 'Registryuniquename',
			'id_product' => 'Id Product',
			'product_name' => 'Gift Name',
			'product_uniquename' => 'Product Uniquename',
			'quantity' => 'Quantity',
			'fulfilled_quantity' => 'Fulfilled Quantity',
			'image_link' => 'Image Link',
			'image_link1' => 'Image Link1',
			'image_link2' => 'Image Link2',
			'image_link3' => 'Image Link3',
			'link' => 'Link',
			'affiliate_link' => 'Affiliate Link',
			'price' => 'Price',
			'description' => 'Description',
			'count' => 'Count',
			'rapidcount' => 'Rapidcount',
			'note' => 'Note',
			'buynow' => 'Buynow',
			'id_user_fulfilled_by' => 'Id User Fulfilled By',
			'status' => 'Status',
			'expiregift' => 'Expiregift',
			'date_last_modified' => 'Date Last Modified',
			'date_added' => 'Date Added',
			'merchantname' => 'Merchantname',
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
		$criteria->compare('id_registry',$this->id_registry);
		$criteria->compare('registryuniquename',$this->registryuniquename,true);
		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_uniquename',$this->product_uniquename,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('fulfilled_quantity',$this->fulfilled_quantity);
		$criteria->compare('image_link',$this->image_link,true);
		$criteria->compare('image_link1',$this->image_link1,true);
		$criteria->compare('image_link2',$this->image_link2,true);
		$criteria->compare('image_link3',$this->image_link3,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('affiliate_link',$this->affiliate_link,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('count',$this->count);
		$criteria->compare('rapidcount',$this->rapidcount);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('buynow',$this->buynow);
		$criteria->compare('id_user_fulfilled_by',$this->id_user_fulfilled_by);
		$criteria->compare('status',$this->status);
		$criteria->compare('expiregift',$this->expiregift);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('merchantname',$this->merchantname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	
	public static function reportcount()
	{
	
		return Gift::model()->count();
	}
	
	
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gift the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
