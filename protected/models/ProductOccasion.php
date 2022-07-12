<?php

/**
 * This is the model class for table "product_occasion".
 *
 * The followings are the available columns in table 'product_occasion':
 * @property integer $id
 * @property integer $id_product
 * @property string $occasion_uniquename
 * @property string $product_uniquename
 * @property string $subcategory_uniquename
 * @property string $category_uniquename
 * @property integer $status
 */
class ProductOccasion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_occasion';
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
			array('id_product, status', 'numerical', 'integerOnly'=>true),
			array('occasion_uniquename, product_uniquename, subcategory_uniquename, category_uniquename', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_product, occasion_uniquename, product_uniquename, subcategory_uniquename, category_uniquename, status', 'safe', 'on'=>'search'),
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
			'id_product' => 'Id Product',
			'occasion_uniquename' => 'Occasion Uniquename',
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
		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('occasion_uniquename',$this->occasion_uniquename,true);
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
	 * @return ProductOccasion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
