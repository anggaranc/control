<?php

/**
 * This is the model class for table "{{room_c}}".
 *
 * The followings are the available columns in table '{{room_c}}':
 * @property string $id
 * @property string $lampC1
 * @property string $lampC2
 * @property string $ldrC1
 * @property string $ldrC2
 * @property string $lampC1TimerStatus
 * @property string $lampC1TimerStart
 * @property string $lampC1TimerStop
 * @property string $lampC2TimerStatus
 * @property string $lampC2TimerStart
 * @property string $lampC2TimerStop
 */
class RoomC extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{room_c}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lampC1, lampC2, ldrC1, ldrC2, lampC1TimerStatus, lampC1TimerStart, lampC1TimerStop, lampC2TimerStatus, lampC2TimerStart, lampC2TimerStop', 'required'),
			array('lampC1, lampC2, ldrC1, ldrC2, lampC1TimerStatus, lampC2TimerStatus', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lampC1, lampC2, ldrC1, ldrC2, lampC1TimerStatus, lampC1TimerStart, lampC1TimerStop, lampC2TimerStatus, lampC2TimerStart, lampC2TimerStop', 'safe', 'on'=>'search'),
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
			'lampC1' => 'Lamp C1',
			'lampC2' => 'Lamp C2',
			'ldrC1' => 'Ldr C1',
			'ldrC2' => 'Ldr C2',
			'lampC1TimerStatus' => 'Lamp C1 Timer Status',
			'lampC1TimerStart' => 'Lamp C1 Timer Start',
			'lampC1TimerStop' => 'Lamp C1 Timer Stop',
			'lampC2TimerStatus' => 'Lamp C2 Timer Status',
			'lampC2TimerStart' => 'Lamp C2 Timer Start',
			'lampC2TimerStop' => 'Lamp C2 Timer Stop',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('lampC1',$this->lampC1,true);
		$criteria->compare('lampC2',$this->lampC2,true);
		$criteria->compare('ldrC1',$this->ldrC1,true);
		$criteria->compare('ldrC2',$this->ldrC2,true);
		$criteria->compare('lampC1TimerStatus',$this->lampC1TimerStatus,true);
		$criteria->compare('lampC1TimerStart',$this->lampC1TimerStart,true);
		$criteria->compare('lampC1TimerStop',$this->lampC1TimerStop,true);
		$criteria->compare('lampC2TimerStatus',$this->lampC2TimerStatus,true);
		$criteria->compare('lampC2TimerStart',$this->lampC2TimerStart,true);
		$criteria->compare('lampC2TimerStop',$this->lampC2TimerStop,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomC the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
