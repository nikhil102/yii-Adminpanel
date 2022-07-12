<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $product_source
 * @property string $name
 * @property string $uniquename
 * @property string $image_link
 * @property string $image_link1
 * @property string $image_link2
 * @property string $image_link3
 * @property string $price
 * @property string $desc
 * @property string $link
 * @property string $affiliate_link
 * @property integer $count
 * @property integer $wrappdcount
 * @property integer $status
 * @property string $date_last_modified
 * @property string $date_added
 * @property string $merchant_name
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('count, wrappdcount, status', 'numerical', 'integerOnly'=>true),
			array('product_source, name , image_link2, image_link3', 'length', 'max'=>150),
			array('uniquename', 'length', 'max'=>100),
			array('image_link, link', 'length', 'max'=>400),
			array('price', 'length', 'max'=>50),
			array('affiliate_link', 'length', 'max'=>600),
			array('merchant_name', 'length', 'max'=>200),
			array('description, date_last_modified, date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_source, name, uniquename, image_link, image_link1, image_link2, image_link3, price, description, link, affiliate_link, count, wrappdcount, status, date_last_modified, date_added, merchant_name', 'safe', 'on'=>'search'),
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
			'product_source' => 'Product Source',
			'name' => 'Name',
			'uniquename' => 'Uniquename',
			'image_link' => 'Image Link',
			'image_link1' => 'Image Link1',
			'image_link2' => 'Image Link2',
			'image_link3' => 'Image Link3',
			'price' => 'Price',
			'description' => 'description',
			'link' => 'Link',
			'affiliate_link' => 'Affiliate Link',
			'count' => 'Count',
			'wrappdcount' => 'Wrappdcount',
			'status' => 'Status',
			'date_last_modified' => 'Date Last Modified',
			'date_added' => 'Date Added',
			'merchant_name' => 'Merchant Name',
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
		$criteria->compare('product_source',$this->product_source,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('uniquename',$this->uniquename,true);
		$criteria->compare('image_link',$this->image_link,true);
		$criteria->compare('image_link1',$this->image_link1,true);
		$criteria->compare('image_link2',$this->image_link2,true);
		$criteria->compare('image_link3',$this->image_link3,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('affiliate_link',$this->affiliate_link,true);
		$criteria->compare('count',$this->count);
		$criteria->compare('wrappdcount',$this->wrappdcount);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('merchant_name',$this->merchant_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function subcategorylist($catgoryuniquename)
	{
              $subcategory = SubCategory::model()->findAllByAttributes(array('catuniquename' => $catgoryuniquename));
	
        return $subcategory;
	}
}