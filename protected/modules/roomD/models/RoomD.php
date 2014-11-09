<?php

/**
 * This is the model class for table "{{room_d}}".
 *
 * The followings are the available columns in table '{{room_d}}':
 * @property string $id
 * @property string $lampD1
 * @property string $lampD2
 * @property string $ldrD1
 * @property string $ldrD2
 * @property string $lampD1TimerStatus
 * @property string $lampD1TimerStart
 * @property string $lampD1TimerStop
 * @property string $lampD2TimerStatus
 * @property string $lampD2TimerStart
 * @property string $lampD2TimerStop
 */
class RoomD extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{room_d}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lampD1, lampD2, ldrD1, ldrD2, lampD1TimerStatus, lampD1TimerStart, lampD1TimerStop, lampD2TimerStatus, lampD2TimerStart, lampD2TimerStop', 'required'),
			array('lampD1, lampD2, ldrD1, ldrD2, lampD1TimerStatus, lampD2TimerStatus', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lampD1, lampD2, ldrD1, ldrD2, lampD1TimerStatus, lampD1TimerStart, lampD1TimerStop, lampD2TimerStatus, lampD2TimerStart, lampD2TimerStop', 'safe', 'on'=>'search'),
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
			'lampD1' => 'Lamp D1',
			'lampD2' => 'Lamp D2',
			'ldrD1' => 'Ldr D1',
			'ldrD2' => 'Ldr D2',
			'lampD1TimerStatus' => 'Lamp D1 Timer Status',
			'lampD1TimerStart' => 'Lamp D1 Timer Start',
			'lampD1TimerStop' => 'Lamp D1 Timer Stop',
			'lampD2TimerStatus' => 'Lamp D2 Timer Status',
			'lampD2TimerStart' => 'Lamp D2 Timer Start',
			'lampD2TimerStop' => 'Lamp D2 Timer Stop',
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
		$criteria->compare('lampD1',$this->lampD1,true);
		$criteria->compare('lampD2',$this->lampD2,true);
		$criteria->compare('ldrD1',$this->ldrD1,true);
		$criteria->compare('ldrD2',$this->ldrD2,true);
		$criteria->compare('lampD1TimerStatus',$this->lampD1TimerStatus,true);
		$criteria->compare('lampD1TimerStart',$this->lampD1TimerStart,true);
		$criteria->compare('lampD1TimerStop',$this->lampD1TimerStop,true);
		$criteria->compare('lampD2TimerStatus',$this->lampD2TimerStatus,true);
		$criteria->compare('lampD2TimerStart',$this->lampD2TimerStart,true);
		$criteria->compare('lampD2TimerStop',$this->lampD2TimerStop,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomD the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
