<?php

/**
 * This is the model class for table "requestanaltics".
 *
 * The followings are the available columns in table 'requestanaltics':
 * @property integer $requestid
 * @property string $link
 * @property string $parameters
 * @property string $parameterstype
 * @property string $requesttime
 * @property string $responsetime
 * @property string $responsetype
 * @property string $responsestatus
 * @property string $responseerror
 * @property string $response
 * @property string $operation
 * @property string $token_id
 * @property string $app_id
 */
class Requestanaltics extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requestanaltics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('token_id, app_id', 'required'),
			array('link, token_id, app_id', 'length', 'max'=>300),
			array('parameters, responseerror', 'length', 'max'=>200),
			array('parameterstype, responsetype, responsestatus, operation', 'length', 'max'=>50),
			array('response', 'length', 'max'=>3000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('requestid, link, parameters, parameterstype, requesttime, responsetime, responsetype, responsestatus, responseerror, response, operation, token_id, app_id', 'safe', 'on'=>'search'),
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
			'requestid' => 'Requestid',
			'link' => 'Link',
			'parameters' => 'Parameters',
			'parameterstype' => 'Parameterstype',
			'requesttime' => 'Requesttime',
			'responsetime' => 'Responsetime',
			'responsetype' => 'Responsetype',
			'responsestatus' => 'Responsestatus',
			'responseerror' => 'Responseerror',
			'response' => 'Response',
			'operation' => 'Operation',
			'token_id' => 'Token',
			'app_id' => 'App',
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

		$criteria->compare('requestid',$this->requestid);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('parameters',$this->parameters,true);
		$criteria->compare('parameterstype',$this->parameterstype,true);
		$criteria->compare('requesttime',$this->requesttime,true);
		$criteria->compare('responsetime',$this->responsetime,true);
		$criteria->compare('responsetype',$this->responsetype,true);
		$criteria->compare('responsestatus',$this->responsestatus,true);
		$criteria->compare('responseerror',$this->responseerror,true);
		$criteria->compare('response',$this->response,true);
		$criteria->compare('operation',$this->operation,true);
		$criteria->compare('token_id',$this->token_id,true);
		$criteria->compare('app_id',$this->app_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Requestanaltics the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
