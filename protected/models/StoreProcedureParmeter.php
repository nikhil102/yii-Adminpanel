<?php

/**
 * This is the model class for table "store_procedure_parmeter".
 *
 * The followings are the available columns in table 'store_procedure_parmeter':
 * @property integer $id
 * @property integer $sp_id
 * @property string $functionname
 * @property string $parmetername
 * @property string $parmeterdatatype
 * @property string $require
 * @property string $default
 * @property string $comment
 */
class StoreProcedureParmeter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store_procedure_parmeter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sp_id, functionname, parmetername, parmeterdatatype, require, default, comment', 'required'),
			array('sp_id', 'numerical', 'integerOnly'=>true),
			array('functionname, parmetername', 'length', 'max'=>100),
			array('parmeterdatatype', 'length', 'max'=>50),
			array('require', 'length', 'max'=>10),
			array('default', 'length', 'max'=>400),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sp_id, functionname, parmetername, parmeterdatatype, require, default, comment', 'safe', 'on'=>'search'),
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
			'sp_id' => 'Sp',
			'functionname' => 'Functionname',
			'parmetername' => 'Parmetername',
			'parmeterdatatype' => 'Parmeterdatatype',
			'require' => 'Require',
			'default' => 'Default',
			'comment' => 'Comment',
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
		$criteria->compare('sp_id',$this->sp_id);
		$criteria->compare('functionname',$this->functionname,true);
		$criteria->compare('parmetername',$this->parmetername,true);
		$criteria->compare('parmeterdatatype',$this->parmeterdatatype,true);
		$criteria->compare('require',$this->require,true);
		$criteria->compare('default',$this->default,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreProcedureParmeter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
