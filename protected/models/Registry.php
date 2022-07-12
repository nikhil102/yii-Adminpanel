<?php

/**
 * This is the model class for table "registry".
 *
 * The followings are the available columns in table 'registry':
 * @property integer $id
 * @property integer $public
 * @property string $name
 * @property string $occasion
 * @property integer $custom_occ_flag
 * @property string $eventdate
 * @property string $eventtime
 * @property integer $radio_shipping
 * @property integer $date_undecided
 * @property integer $tentative
 * @property string $email
 * @property string $eventname
 * @property string $eventmsg
 * @property string $eventaddr
 * @property string $shipaddr
 * @property string $phone
 * @property string $instructions
 * @property string $registry_unique_name
 * @property string $bg_image_link
 * @property string $profile_image_link
 * @property string $description
 * @property integer $status
 * @property string $date_last_modified
 * @property integer $featured
 * @property integer $featured_home
 * @property string $homebanner
 * @property string $date_added
 * @property integer $inviteduser
 */
class Registry extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
		
			array('public, status', 'numerical', 'integerOnly'=>true),
            array('registry_unique_name','unique', 'message'=>'This issue already exists.'),
            array('name, occasion', 'length', 'max'=>300),
			array('registry_unique_name', 'length', 'max'=>80),
			array('bg_image_link', 'length', 'max'=>200),
			array('profile_image_link', 'length', 'max'=>150),
			array('featured', 'length', 'max'=>100),
			
			//array('date_last_modified, date_added', 'safe'),
			
                        array('profile_image_link, bg_image_link', 'file', 'types'=>'jpg, gif, png', 'safe' => false),
                        array('date_last_modified','default','value'=>new CDbExpression('CURRENT_TIMESTAMP'),'setOnEmpty'=>false,'on'=>'update'),
                        array('date_added','default','value'=>new CDbExpression('CURRENT_TIMESTAMP'),'setOnEmpty'=>false,'on'=>'insert'),
						
						
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			
			
			array('id, public, name, occasion, custom_occ_flag, eventdate, eventtime, radio_shipping, date_undecided, tentative, email, eventname, eventmsg, eventaddr, shipaddr, phone, instructions, registry_unique_name, bg_image_link, profile_image_link, description, status, date_last_modified, featured, featured_home, homebanner, date_added, inviteduser', 'safe', 'on'=>'search'),
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
			'public' => 'Public',
			'name' => 'Name',
			'occasion' => 'Occasion',
			'custom_occ_flag' => 'Custom Occ Flag',
			'eventdate' => 'Eventdate',
			'eventtime' => 'Eventtime',
			'radio_shipping' => 'Radio Shipping',
			'date_undecided' => 'Date Undecided',
			'tentative' => 'Tentative',
			'email' => 'Email',
			'eventname' => 'Eventname',
			'eventmsg' => 'Eventmsg',
			'eventaddr' => 'Eventaddr',
			'shipaddr' => 'Shipaddr',
			'phone' => 'Phone',
			'instructions' => 'Instructions',
			'registry_unique_name' => 'Registry Unique Name',
			'bg_image_link' => 'Bg Image Link',
			'profile_image_link' => 'Profile Image Link',
			'description' => 'Description',
			'status' => 'Status',
			'date_last_modified' => 'Date Last Modified',
			'featured' => 'Featured',
			'featured_home' => 'Featured Home',
			'homebanner' => 'Homebanner',
			'date_added' => 'Date Added',
			'inviteduser' => 'Inviteduser',
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
		$criteria->compare('public',$this->public);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('occasion',$this->occasion,true);
		$criteria->compare('custom_occ_flag',$this->custom_occ_flag);
		$criteria->compare('eventdate',$this->eventdate,true);
		$criteria->compare('eventtime',$this->eventtime,true);
		$criteria->compare('radio_shipping',$this->radio_shipping);
		$criteria->compare('date_undecided',$this->date_undecided);
		$criteria->compare('tentative',$this->tentative);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('eventname',$this->eventname,true);
		$criteria->compare('eventmsg',$this->eventmsg,true);
		$criteria->compare('eventaddr',$this->eventaddr,true);
		$criteria->compare('shipaddr',$this->shipaddr,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('instructions',$this->instructions,true);
		$criteria->compare('registry_unique_name',$this->registry_unique_name,true);
		$criteria->compare('bg_image_link',$this->bg_image_link,true);
		$criteria->compare('profile_image_link',$this->profile_image_link,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('featured_home',$this->featured_home);
		$criteria->compare('homebanner',$this->homebanner,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('inviteduser',$this->inviteduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function reportcount()
	{
	
		return Registry::model()->count();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
