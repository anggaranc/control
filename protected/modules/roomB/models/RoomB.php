<?php

/**
 * This is the model class for table "{{room_b}}".
 *
 * The followings are the available columns in table '{{room_b}}':
 * @property string $id
 * @property string $lampB1
 * @property string $lampB2
 * @property string $ldrB1
 * @property string $ldrB2
 * @property string $lampB1TimerStatus
 * @property string $lampB1TimerStart
 * @property string $lampB1TimerStop
 * @property string $lampB2TimerStatus
 * @property string $lampB2TimerStart
 * @property string $lampB2TimerStop
 */
class RoomB extends CActiveRecord
{
        const PRIVILEGE_ROOM = 'Room_B';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{room_b}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lampB1, lampB2, ldrB1, ldrB2, lampB1TimerStatus, lampB1TimerStart, lampB1TimerStop, lampB2TimerStatus, lampB2TimerStart, lampB2TimerStop', 'required'),
			array('lampB1, lampB2, ldrB1, ldrB2, lampB1TimerStatus, lampB2TimerStatus', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lampB1, lampB2, ldrB1, ldrB2, lampB1TimerStatus, lampB1TimerStart, lampB1TimerStop, lampB2TimerStatus, lampB2TimerStart, lampB2TimerStop', 'safe', 'on'=>'search'),
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
			'lampB1' => 'Lamp B1',
			'lampB2' => 'Lamp B2',
			'ldrB1' => 'Ldr B1',
			'ldrB2' => 'Ldr B2',
			'lampB1TimerStatus' => 'Lamp B1 Timer Status',
			'lampB1TimerStart' => 'Lamp B1 Timer Start',
			'lampB1TimerStop' => 'Lamp B1 Timer Stop',
			'lampB2TimerStatus' => 'Lamp B2 Timer Status',
			'lampB2TimerStart' => 'Lamp B2 Timer Start',
			'lampB2TimerStop' => 'Lamp B2 Timer Stop',
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
		$criteria->compare('lampB1',$this->lampB1,true);
		$criteria->compare('lampB2',$this->lampB2,true);
		$criteria->compare('ldrB1',$this->ldrB1,true);
		$criteria->compare('ldrB2',$this->ldrB2,true);
		$criteria->compare('lampB1TimerStatus',$this->lampB1TimerStatus,true);
		$criteria->compare('lampB1TimerStart',$this->lampB1TimerStart,true);
		$criteria->compare('lampB1TimerStop',$this->lampB1TimerStop,true);
		$criteria->compare('lampB2TimerStatus',$this->lampB2TimerStatus,true);
		$criteria->compare('lampB2TimerStart',$this->lampB2TimerStart,true);
		$criteria->compare('lampB2TimerStop',$this->lampB2TimerStop,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomB the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
