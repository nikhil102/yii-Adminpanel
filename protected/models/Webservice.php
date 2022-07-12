<?php

/**
 * This is the model class for table "webservice".
 *
 * The followings are the available columns in table 'webservice':
 * @property integer $id
 * @property string $text
 * @property string $type
 * @property integer $Method
 * @property string $datetime
 * @property integer $createby
 * @property string $operation
 * @property string $coment
 */
class Webservice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'webservice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, type, Method, operation, ', 'required'),
			array('text, coment', 'length', 'max'=>3000),
			array('type', 'length', 'max'=>150),
			array('Method, operation', 'length', 'max'=>50),
                        array('datetime','default','value'=>new CDbExpression('CURRENT_TIMESTAMP'),'setOnEmpty'=>false,'on'=>'update'),
                         array('datetime','default','value'=>new CDbExpression('CURRENT_TIMESTAMP'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, text, type, Method, datetime, createby, operation, coment', 'safe', 'on'=>'search'),
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
			'text' => 'Text',
			'type' => 'Type',
			'Method' => 'Method',
			'datetime' => 'Datetime',
			'createby' => 'Createby',
			'operation' => 'Operation',
			'coment' => 'Coment',
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('Method',$this->Method);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('createby',$this->createby);
		$criteria->compare('operation',$this->operation,true);
		$criteria->compare('coment',$this->coment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Webservice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
