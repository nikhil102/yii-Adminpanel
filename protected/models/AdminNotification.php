<?php

/**
 * This is the model class for table "admin_notification".
 *
 * The followings are the available columns in table 'admin_notification':
 * @property integer $id
 * @property string $text
 * @property string $href
 * @property integer $status
 * @property string $date_added
 */
class AdminNotification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('text ,href', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('text, href', 'length', 'max'=>400),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, text, href, status,send_status,send_time, date_added', 'safe', 'on'=>'search'),
                        array('date_added', 'default','value'=>new CDbExpression('CURRENT_TIMESTAMP'),'setOnEmpty'=>false,'on'=>'insert'),
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
			'href' => 'Href',
			'status' => 'Status',
                        'send_status' => 'Send Status',
                        'date_added' => 'Date Added',
                        'send_time' => 'Send Time',
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
		$criteria->compare('href',$this->href,true);
		$criteria->compare('status',$this->status);
                $criteria->compare('send_status',$this->send_status);
		$criteria->compare('date_added',$this->date_added,true);
                $criteria->compare('send_time',$this->date_added,true);
                
                 $criteria->order = 'date_added DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminNotification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
