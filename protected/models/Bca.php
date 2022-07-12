<?php

/**
 * This is the model class for table "bca".
 *
 * The followings are the available columns in table 'bca':
 * @property integer $bcid
 * @property string $bcname
 * @property string $bcshortname
 * @property string $yearofoperation
 * @property string $flagbcbrach
 * @property string $dateofregistration
 * @property string $constitution
 * @property string $ageoforg
 * @property string $landmark
 * @property string $village
 * @property string $panchayat
 * @property string $block
 * @property string $city
 * @property string $taluk
 * @property string $district
 * @property string $state
 * @property string $postoffice
 * @property integer $postalcode
 * @property string $phonenumber
 * @property integer $mobilenumber
 * @property string $keypersonemail
 * @property string $keypersonname
 * @property string $bcusername
 * @property string $bcpassword
 * @property string $ca_landmark
 * @property string $ca_village
 * @property string $ca_panchayat
 * @property string $ca_block
 * @property string $ca_city
 * @property string $ca_taluk
 * @property string $ca_district
 * @property string $ca_state
 * @property integer $ca_postcode
 * @property string $ca_phonenumber
 * @property integer $ca_mobilenumber
 * @property string $bankbranchid
 * @property string $customerid
 * @property integer $accountnumber
 * @property string $accounttype
 * @property string $accountopeningdate
 * @property string $branchname1
 * @property string $branchname2
 * @property string $branchname3
 * @property string $accounttype1
 * @property string $accounttype2
 * @property string $accounttype3
 * @property integer $accountno1
 * @property integer $accountno2
 * @property integer $accountno3
 * @property string $extra
 */
class Bca extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bcname, bcshortname, flagbcbrach, dateofregistration, constitution , city, taluk, district, state, postoffice, postalcode, phonenumber, mobilenumber, keypersonemail, keypersonname, bcusername, bcpassword,bankbranchid, customerid, accountnumber, accounttype, accountopeningdate', 'required'),
			array('postalcode, mobilenumber, ca_postcode, ca_mobilenumber, accountnumber, accountno1, accountno2, accountno3', 'numerical', 'integerOnly'=>true),
			array('bcname, bcshortname, postoffice, ca_city, ca_taluk', 'length', 'max'=>60),
			array('yearofoperation, ca_phonenumber', 'length', 'max'=>20),
			array('flagbcbrach', 'length', 'max'=>5),
			array('dateofregistration, phonenumber, accounttype, accounttype1, accounttype2, accounttype3', 'length', 'max'=>15),
			array('constitution, branchname1, branchname2, branchname3', 'length', 'max'=>100),
			array('ageoforg, accountopeningdate, extra', 'length', 'max'=>10),
			array('landmark, village, panchayat, block, city, taluk, district, state, keypersonemail, keypersonname, bcusername, bcpassword, ca_village, ca_panchayat', 'length', 'max'=>150),
			array('ca_landmark', 'length', 'max'=>250),
			array('ca_block', 'length', 'max'=>200),
			array('ca_district, ca_state, bankbranchid, customerid', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bcid, bcname, credit bcshortname, yearofoperation, flagbcbrach, dateofregistration, constitution, ageoforg, landmark, village, panchayat, block, city, taluk, district, state, postoffice, postalcode, phonenumber, mobilenumber, keypersonemail, keypersonname, bcusername, bcpassword, ca_landmark, ca_village, ca_panchayat, ca_block, ca_city, ca_taluk, ca_district, ca_state, ca_postcode, ca_phonenumber, ca_mobilenumber, bankbranchid, customerid, accountnumber, accounttype, accountopeningdate', 'safe', 'on'=>'search'),
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
			'bcid' => 'Bc Id',
			'bcname' => 'Bc Name',
                        'credit' => 'Credit',
                        'bcshortname' => 'Bc Shortname',
			'yearofoperation' => 'Year of Operation',
			'flagbcbrach' => 'Flagbcbrach',
			'dateofregistration' => 'Date of Registration',
			'constitution' => 'Constitution',
			'ageoforg' => 'Age Of Orgaztion',
			'landmark' => 'Landmark',
			'village' => 'Village',
			'panchayat' => 'Panchayat',
			'block' => 'Block',
			'city' => 'City',
			'taluk' => 'Taluk',
			'district' => 'District',
			'state' => 'State',
			'postoffice' => 'Post Office',
			'postalcode' => 'Postal Code',
			'phonenumber' => 'Phone Number',
			'mobilenumber' => 'Mobile Number',
			'keypersonemail' => 'Key Person Email',
			'keypersonname' => 'Key Person Name',
			'bcusername' => 'Bc Username',
			'bcpassword' => 'Bc Password',
			'ca_landmark' => 'Landmark',
			'ca_village' => 'Village',
			'ca_panchayat' => 'Panchayat',
			'ca_block' => 'Block',
			'ca_city' => 'City',
			'ca_taluk' => 'Taluk',
			'ca_district' => 'District',
			'ca_state' => 'State',
			'ca_postcode' => 'Post Code',
			'ca_phonenumber' => 'Phone Number',
			'ca_mobilenumber' => 'Mobile Number',
			'bankbranchid' => 'Bank Branch Id',
			'customerid' => 'Customer Id',
			'accountnumber' => 'Account Number',
			'accounttype' => 'Account Type',
			'accountopeningdate' => 'Account Opening Date',
			'branchname1' => 'Branch Name',
			'branchname2' => 'Branch Name',
			'branchname3' => 'Branch Name',
			'accounttype1' => 'Account Type',
			'accounttype2' => 'Account Type',
			'accounttype3' => 'Account Type',
			'accountno1' => 'Account No',
			'accountno2' => 'Account No',
			'accountno3' => 'Account No',
			'extra' => 'Extra',
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

		$criteria->compare('bcid',$this->bcid);
		$criteria->compare('bcname',$this->bcname,true);
		$criteria->compare('bcshortname',$this->bcshortname,true);
		$criteria->compare('yearofoperation',$this->yearofoperation,true);
		$criteria->compare('flagbcbrach',$this->flagbcbrach,true);
		$criteria->compare('dateofregistration',$this->dateofregistration,true);
		$criteria->compare('constitution',$this->constitution,true);
		$criteria->compare('ageoforg',$this->ageoforg,true);
		$criteria->compare('landmark',$this->landmark,true);
		$criteria->compare('village',$this->village,true);
		$criteria->compare('panchayat',$this->panchayat,true);
		$criteria->compare('block',$this->block,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('taluk',$this->taluk,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('postoffice',$this->postoffice,true);
		$criteria->compare('postalcode',$this->postalcode);
		$criteria->compare('phonenumber',$this->phonenumber,true);
		$criteria->compare('mobilenumber',$this->mobilenumber);
		$criteria->compare('keypersonemail',$this->keypersonemail,true);
		$criteria->compare('keypersonname',$this->keypersonname,true);
		$criteria->compare('bcusername',$this->bcusername,true);
		$criteria->compare('bcpassword',$this->bcpassword,true);
		$criteria->compare('ca_landmark',$this->ca_landmark,true);
		$criteria->compare('ca_village',$this->ca_village,true);
		$criteria->compare('ca_panchayat',$this->ca_panchayat,true);
		$criteria->compare('ca_block',$this->ca_block,true);
		$criteria->compare('ca_city',$this->ca_city,true);
		$criteria->compare('ca_taluk',$this->ca_taluk,true);
		$criteria->compare('ca_district',$this->ca_district,true);
		$criteria->compare('ca_state',$this->ca_state,true);
		$criteria->compare('ca_postcode',$this->ca_postcode);
		$criteria->compare('ca_phonenumber',$this->ca_phonenumber,true);
		$criteria->compare('ca_mobilenumber',$this->ca_mobilenumber);
		$criteria->compare('bankbranchid',$this->bankbranchid,true);
		$criteria->compare('customerid',$this->customerid,true);
		$criteria->compare('accountnumber',$this->accountnumber);
		$criteria->compare('accounttype',$this->accounttype,true);
		$criteria->compare('accountopeningdate',$this->accountopeningdate,true);
		$criteria->compare('branchname1',$this->branchname1,true);
		$criteria->compare('branchname2',$this->branchname2,true);
		$criteria->compare('branchname3',$this->branchname3,true);
		$criteria->compare('accounttype1',$this->accounttype1,true);
		$criteria->compare('accounttype2',$this->accounttype2,true);
		$criteria->compare('accounttype3',$this->accounttype3,true);
		$criteria->compare('accountno1',$this->accountno1);
		$criteria->compare('accountno2',$this->accountno2);
		$criteria->compare('accountno3',$this->accountno3);
		$criteria->compare('extra',$this->extra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
