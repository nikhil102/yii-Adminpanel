<?php

/**
 * This is the model class for table "tradingview_alert_data".
 *
 * The followings are the available columns in table 'tradingview_alert_data':
 * @property integer $id
 * @property integer $raw_data_id
 * @property string $script_name
 * @property string $contract_month
 * @property integer $contract_year
 * @property double $current_price
 * @property double $current_candle_open
 * @property double $current_candle_high
 * @property double $current_candle_low
 * @property integer $current_candle_volume
 * @property string $str_name
 * @property integer $str_timeframe_number
 * @property string $str_timeframe_unit
 * @property string $action_enter
 * @property string $action_exit
 * @property integer $str_fut_cont_sl
 * @property integer $str_fut_cont_tar
 * @property integer $str_opt_cont_sl
 * @property integer $str_opt_cont_tar
 * @property string $trading_type
 * @property string $mysql_time_stamp
 * @property string $raw_data
 * @property string $alert_time
 * @property string $date
 * @property integer $time_hour
 * @property integer $time_min
 * @property integer $time_seconds
 */
class TradingviewAlertData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tradingview_alert_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('raw_data_id, script_name, contract_month, contract_year, current_price, current_candle_open, current_candle_high, current_candle_low, current_candle_volume, str_name, str_timeframe_number, str_timeframe_unit, action_enter, action_exit, str_fut_cont_sl, str_fut_cont_tar, str_opt_cont_sl, str_opt_cont_tar, trading_type, mysql_time_stamp, raw_data, alert_time, date, time_hour, time_min, time_seconds', 'required'),
			array('raw_data_id, contract_year, current_candle_volume, str_timeframe_number, str_fut_cont_sl, str_fut_cont_tar, str_opt_cont_sl, str_opt_cont_tar, time_hour, time_min, time_seconds', 'numerical', 'integerOnly'=>true),
			array('current_price, current_candle_open, current_candle_high, current_candle_low', 'numerical'),
			array('script_name', 'length', 'max'=>30),
			array('contract_month, str_timeframe_unit', 'length', 'max'=>10),
			array('str_name, action_enter, action_exit, trading_type', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, raw_data_id, script_name, contract_month, contract_year, current_price, current_candle_open, current_candle_high, current_candle_low, current_candle_volume, str_name, str_timeframe_number, str_timeframe_unit, action_enter, action_exit, str_fut_cont_sl, str_fut_cont_tar, str_opt_cont_sl, str_opt_cont_tar, trading_type, mysql_time_stamp, raw_data, alert_time, date, time_hour, time_min, time_seconds', 'safe', 'on'=>'search'),
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
			'script_name' => 'Script Name',
			'contract_month' => 'Contract Month',
			'contract_year' => 'Contract Year',
			'current_price' => 'Current Price',
			'current_candle_open' => 'Current Candle Open',
			'current_candle_high' => 'Current Candle High',
			'current_candle_low' => 'Current Candle Low',
			'current_candle_volume' => 'Current Candle Volume',
			'str_name' => 'Str Name',
			'str_timeframe_number' => 'Str Timeframe Number',
			'str_timeframe_unit' => 'Str Timeframe Unit',
			'action_enter' => 'Action Enter',
			'action_exit' => 'Action Exit',
			'str_fut_cont_sl' => 'Str Fut Cont Sl',
			'str_fut_cont_tar' => 'Str Fut Cont Tar',
			'str_opt_cont_sl' => 'Str Opt Cont Sl',
			'str_opt_cont_tar' => 'Str Opt Cont Tar',
			'trading_type' => 'Trading Type',
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
		$criteria->compare('script_name',$this->script_name,true);
		$criteria->compare('contract_month',$this->contract_month,true);
		$criteria->compare('contract_year',$this->contract_year);
		$criteria->compare('current_price',$this->current_price);
		$criteria->compare('current_candle_open',$this->current_candle_open);
		$criteria->compare('current_candle_high',$this->current_candle_high);
		$criteria->compare('current_candle_low',$this->current_candle_low);
		$criteria->compare('current_candle_volume',$this->current_candle_volume);
		$criteria->compare('str_name',$this->str_name,true);
		$criteria->compare('str_timeframe_number',$this->str_timeframe_number);
		$criteria->compare('str_timeframe_unit',$this->str_timeframe_unit,true);
		$criteria->compare('action_enter',$this->action_enter,true);
		$criteria->compare('action_exit',$this->action_exit,true);
		$criteria->compare('str_fut_cont_sl',$this->str_fut_cont_sl);
		$criteria->compare('str_fut_cont_tar',$this->str_fut_cont_tar);
		$criteria->compare('str_opt_cont_sl',$this->str_opt_cont_sl);
		$criteria->compare('str_opt_cont_tar',$this->str_opt_cont_tar);
		$criteria->compare('trading_type',$this->trading_type,true);
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
	 * @return TradingviewAlertData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
