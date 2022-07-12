<?php

/**
 * This is the model class for table "trade_enter_log".
 *
 * The followings are the available columns in table 'trade_enter_log':
 * @property integer $trade_id
 * @property string $trade_temp_unique_key
 * @property integer $raw_data_id
 * @property string $trade_insert_timestamp
 * @property string $trade_insert_date
 * @property double $future_price_in_raw_data
 * @property string $sin_comming_timestamp
 * @property string $fut_current_contract
 * @property integer $future_current_contrac_expiry_remaning_days
 * @property string $o_current_contract
 * @property integer $o_cu_con_exp_rem_days
 * @property double $o_strike_price
 * @property string $o_enter_action
 * @property integer $o_enter_price
 * @property string $o_ce_or_pe
 * @property string $o_orader_status
 */
class TradeEnterLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trade_enter_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trade_temp_unique_key, raw_data_id, trade_insert_timestamp, trade_insert_date, future_price_in_raw_data, sin_comming_timestamp, fut_current_contract, future_current_contrac_expiry_remaning_days, o_current_contract, o_cu_con_exp_rem_days, o_strike_price, o_enter_action, o_enter_price, o_ce_or_pe, o_orader_status', 'required'),
			array('raw_data_id, future_current_contrac_expiry_remaning_days, o_cu_con_exp_rem_days, o_enter_price', 'numerical', 'integerOnly'=>true),
			array('future_price_in_raw_data, o_strike_price', 'numerical'),
			array('trade_temp_unique_key', 'length', 'max'=>100),
			array('fut_current_contract, o_orader_status', 'length', 'max'=>7),
			array('o_enter_action', 'length', 'max'=>5),
			array('o_ce_or_pe', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('trade_id, trade_temp_unique_key, raw_data_id, trade_insert_timestamp, trade_insert_date, future_price_in_raw_data, sin_comming_timestamp, fut_current_contract, future_current_contrac_expiry_remaning_days, o_current_contract, o_cu_con_exp_rem_days, o_strike_price, o_enter_action, o_enter_price, o_ce_or_pe, o_orader_status', 'safe', 'on'=>'search'),
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
			'trade_id' => 'Trade',
			'trade_temp_unique_key' => 'Trade Temp Unique Key',
			'raw_data_id' => 'Raw Data',
			'trade_insert_timestamp' => 'Trade Insert Timestamp',
			'trade_insert_date' => 'Trade Insert Date',
			'future_price_in_raw_data' => 'Future Price In Raw Data',
			'sin_comming_timestamp' => 'Sin Comming Timestamp',
			'fut_current_contract' => 'Fut Current Contract',
			'future_current_contrac_expiry_remaning_days' => 'Future Current Contrac Expiry Remaning Days',
			'o_current_contract' => 'O Current Contract',
			'o_cu_con_exp_rem_days' => 'O Cu Con Exp Rem Days',
			'o_strike_price' => 'O Strike Price',
			'o_enter_action' => 'O Enter Action',
			'o_enter_price' => 'O Enter Price',
			'o_ce_or_pe' => 'O Ce Or Pe',
			'o_orader_status' => 'O Orader Status',
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

		$criteria->compare('trade_id',$this->trade_id);
		$criteria->compare('trade_temp_unique_key',$this->trade_temp_unique_key,true);
		$criteria->compare('raw_data_id',$this->raw_data_id);
		$criteria->compare('trade_insert_timestamp',$this->trade_insert_timestamp,true);
		$criteria->compare('trade_insert_date',$this->trade_insert_date,true);
		$criteria->compare('future_price_in_raw_data',$this->future_price_in_raw_data);
		$criteria->compare('sin_comming_timestamp',$this->sin_comming_timestamp,true);
		$criteria->compare('fut_current_contract',$this->fut_current_contract,true);
		$criteria->compare('future_current_contrac_expiry_remaning_days',$this->future_current_contrac_expiry_remaning_days);
		$criteria->compare('o_current_contract',$this->o_current_contract,true);
		$criteria->compare('o_cu_con_exp_rem_days',$this->o_cu_con_exp_rem_days);
		$criteria->compare('o_strike_price',$this->o_strike_price);
		$criteria->compare('o_enter_action',$this->o_enter_action,true);
		$criteria->compare('o_enter_price',$this->o_enter_price);
		$criteria->compare('o_ce_or_pe',$this->o_ce_or_pe,true);
		$criteria->compare('o_orader_status',$this->o_orader_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TradeEnterLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
