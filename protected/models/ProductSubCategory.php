<?php

/**
 * This is the model class for table "product_sub_category".
 *
 * The followings are the available columns in table 'product_sub_category':
 * @property integer $id
 * @property string $product_uniquename
 * @property string $subcategory_uniquename
 * @property string $category_uniquename
 * @property integer $status
 */
class ProductSubCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_sub_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_uniquename, subcategory_uniquename, category_uniquename', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('product_uniquename, subcategory_uniquename', 'length', 'max'=>100),
			array('category_uniquename', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_uniquename, subcategory_uniquename, category_uniquename, status', 'safe', 'on'=>'search'),
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
			'product_uniquename' => 'Product Uniquename',
			'subcategory_uniquename' => 'Subcategory Uniquename',
			'category_uniquename' => 'Category Uniquename',
			'status' => 'Status',
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
		$criteria->compare('product_uniquename',$this->product_uniquename,true);
		$criteria->compare('subcategory_uniquename',$this->subcategory_uniquename,true);
		$criteria->compare('category_uniquename',$this->category_uniquename,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductSubCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
