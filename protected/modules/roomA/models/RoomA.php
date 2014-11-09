<?php

/**
 * This is the model class for table "{{room_a}}".
 *
 * The followings are the available columns in table '{{room_a}}':
 * @property string $id
 * @property string $lampA1
 * @property string $lampA2
 * @property string $ldrA1
 * @property string $ldrA2
 */
class RoomA extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{room_a}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lampA1, lampA2, ldrA1, ldrA2, lampA1TimerStatus, lampA1TimerStart, lampA1TimerStop, lampA2TimerStatus, lampA2TimerStart, lampA2TimerStop', 'required'),
			array('lampA1, lampA2, ldrA1, ldrA2, lampA1TimerStatus, lampA2TimerStatus', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lampA1, lampA2, ldrA1, ldrA2, lampA1TimerStatus, lampA1TimerStart, lampA1TimerStop, lampA2TimerStatus, lampA2TimerStart, lampA2TimerStop', 'safe', 'on'=>'search'),
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
			'lampA1' => 'Lamp A1',
			'lampA2' => 'Lamp A2',
			'ldrA1' => 'Ldr A1',
			'ldrA2' => 'Ldr A2',
                        'lampA1TimerStatus' => 'Lamp A1 Timer Status',
                        'lampA1TimerStart' => 'Lamp A1 Timer Start',
                        'LampA1TimerStop' => 'Lamp A1 Timer Stop',
                        'LampA2TimerStatus' => 'Lamp A2 Timer Status',
                        'LampA2TimerStart' => 'Lamp A2 Timer Start',
                        'LampA2TimerStop' => 'Lamp A2 Timer Stop',
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
		$criteria->compare('lampA1',$this->lampA1,true);
		$criteria->compare('lampA2',$this->lampA2,true);
		$criteria->compare('ldrA1',$this->ldrA1,true);
		$criteria->compare('ldrA2',$this->ldrA2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomA the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
