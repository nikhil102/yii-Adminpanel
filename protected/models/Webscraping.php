<?php

/**
 * This is the model class for table "webscraping".
 *
 * The followings are the available columns in table 'webscraping':
 * @property integer $id
 * @property string $merchantname
 * @property string $titleselector
 * @property string $imgselector
 * @property string $priceselector
 * @property string $disselector
 * @property string $link
 */
class Webscraping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'webscraping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merchantname, titleselector, imgselector, priceselector, disselector, link', 'required'),
			array('merchantname, titleselector, imgselector, priceselector, disselector, link', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, merchantname, titleselector, imgselector, priceselector, disselector, link', 'safe', 'on'=>'search'),
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
			'merchantname' => 'Merchantname',
			'titleselector' => 'Titleselector',
			'imgselector' => 'Imgselector',
			'priceselector' => 'Priceselector',
			'disselector' => 'Disselector',
			'link' => 'Link',
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
		$criteria->compare('merchantname',$this->merchantname,true);
		$criteria->compare('titleselector',$this->titleselector,true);
		$criteria->compare('imgselector',$this->imgselector,true);
		$criteria->compare('priceselector',$this->priceselector,true);
		$criteria->compare('disselector',$this->disselector,true);
		$criteria->compare('link',$this->link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Webscraping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
