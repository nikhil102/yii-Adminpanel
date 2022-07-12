<?php

/**
 * This is the model class for table "tradingview_future_and_option_data".
 *
 * The followings are the available columns in table 'tradingview_future_and_option_data':
 * @property integer $id
 * @property integer $raw_data_id
 * @property string $future_current_contract_end_date
 * @property string $option_current_contract_end_date
 * @property integer $day_require_for_option_weekly_expiry
 * @property integer $day_require_for_future_monthly_expiry
 * @property string $mysql_time_stamp
 * @property string $raw_data
 * @property string $alert_time
 * @property string $date
 * @property integer $time_hour
 * @property integer $time_min
 * @property integer $time_seconds
 */
class TradingviewFutureAndOptionData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tradingview_future_and_option_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('raw_data_id, future_current_contract_end_date, option_current_contract_end_date, day_require_for_option_weekly_expiry, day_require_for_future_monthly_expiry, mysql_time_stamp, raw_data, alert_time, date, time_hour, time_min, time_seconds', 'required'),
			array('raw_data_id, day_require_for_option_weekly_expiry, day_require_for_future_monthly_expiry, time_hour, time_min, time_seconds', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, raw_data_id, future_current_contract_end_date, option_current_contract_end_date, day_require_for_option_weekly_expiry, day_require_for_future_monthly_expiry, mysql_time_stamp, raw_data, alert_time, date, time_hour, time_min, time_seconds', 'safe', 'on'=>'search'),
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
			'raw_data_id' => 'Raw Data',
			'future_current_contract_end_date' => 'Future Current Contract End Date',
			'option_current_contract_end_date' => 'Option Current Contract End Date',
			'day_require_for_option_weekly_expiry' => 'Day Require For Option Weekly Expiry',
			'day_require_for_future_monthly_expiry' => 'Day Require For Future Monthly Expiry',
			'mysql_time_stamp' => 'Mysql Time Stamp',
			'raw_data' => 'Raw Data',
			'alert_time' => 'Alert Time',
			'date' => 'Date',
			'time_hour' => 'Time Hour',
			'time_min' => 'Time Min',
			'time_seconds' => 'Time Seconds',
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
		$criteria->compare('raw_data_id',$this->raw_data_id);
		$criteria->compare('future_current_contract_end_date',$this->future_current_contract_end_date,true);
		$criteria->compare('option_current_contract_end_date',$this->option_current_contract_end_date,true);
		$criteria->compare('day_require_for_option_weekly_expiry',$this->day_require_for_option_weekly_expiry);
		$criteria->compare('day_require_for_future_monthly_expiry',$this->day_require_for_future_monthly_expiry);
		$criteria->compare('mysql_time_stamp',$this->mysql_time_stamp,true);
		$criteria->compare('raw_data',$this->raw_data,true);
		$criteria->compare('alert_time',$this->alert_time,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time_hour',$this->time_hour);
		$criteria->compare('time_min',$this->time_min);
		$criteria->compare('time_seconds',$this->time_seconds);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TradingviewFutureAndOptionData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
