<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $enable
 * @property string $userType
 */
class User extends CActiveRecord {
	const PRIVILEGE_CREATE = 'User_Create';
	const PRIVILEGE_UPDATE = 'User_Update';
	const PRIVILEGE_DELETE = 'User_Delete';
	const PRIVILEGE_VIEW = 'User_View';
	
	const USER_ADMIN = 1;
	
	public $searchPrivilege;
    public $currentPassword;
    public $newPassword;
	public $retypePassword;
    public $retypeForgotPassword;
    public $forgotPassword;

    const ENABLE_YES = 'Yes';
	const ENABLE_NO = 'No';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, userType, enable', 'required'),
			array('username, password, email', 'length', 'max'=>128),
			array('userType', 'length', 'max'=>7),
            array('forgotPassword', 'required', 'on'=>'forgot'),
            array('retypePassword', 'confirmPassword', 'on'=>'profile'),
            array('currentPassword, newPassword', 'compareCurrentPassword', 'on'=>'profile'),
            //array('retypeForgotPassword', 'on'=>'forgot'),
            array('retypeForgotPassword', 'compare', 'compareAttribute'=>'forgotPassword', 'message'=>'Password don\'t match!', 'on'=>'forgot'),   
            //array('newPassword', 'compare', 'compareAttribute' => 'retypePassword', 'message'=>'Password don\'t match!', 'on'=>'profile'),
            //array('retypePassword', 'safe'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, enable, userType, retypePassword, searchPrivilege, forgotPassword, retypeForgotPassword', 'safe', 'on'=>'search'),
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
			'privileges' => array(self::HAS_MANY, 'AuthAssignment', 'userid'),
            'userprofile' => array(self::HAS_ONE, 'UserProfile', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'enable' => 'Enable',
			'userType' => 'User Type',
			'currentPassword' => Yii::t('User', 'Current Password'),
            'newPassword' => Yii::t('User', 'New Password'),
            'retypePassword' => Yii::t('User', 'Re-type Password'),
            'searchPrivilege' => Yii::t('User', 'Privilege'),
            'forgotPassword' => Yii::t('User', 'New Password'),
            'retypeForgotPassword' => Yii::t('User', 'Re-type Password'),
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

		$criteria = new CDbCriteria;

        $criteria->with = array('privileges');
        $criteria->together = true;
		$criteria->group = 't.id';
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('enable', $this->enable);
		$criteria->compare('userType', $this->userType, true);
        $criteria->compare('privileges.itemname', $this->searchPrivilege, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort' => array(
				'defaultOrder' => 'username',
				'attributes' => array(
					'*',
				),
			),
		));
	}

	public function beforeSave() {
		$isOnCreate = $this->isNewRecord;
		$go = true;
		
		if (parent::beforeSave()) {
			if ($isOnCreate) { // Create
				$twinUsername = User::model()->find('username=:username', array(
					':username' => $this->username,
				));
				
				$twinEmail = User::model()->find('email=:email', array(
					':email' => $this->email,
				));
				
				if ($twinUsername !== null) {
					$this->addError('username', Yii::t('User', 'Username already exists!'));
					$go = false;
				}
				
				if ($twinEmail !== null) {
					$this->addError('email', Yii::t('User', 'Email already registered!'));
					$go = false;
				}
			}
			else { // Update
				$twinEmail = User::model()->find('email=:email AND id <> :id', array(
					':email' => $this->email,
					':id' => $this->id,
				));
				
				if ($twinEmail) {
					$this->addError('email', Yii::t('User', 'Email already registered!'));
					$go = false;
				}
			}
			
			return $go;
		}
		
		return false;
	}
    
    public function compareCurrentPassword($attribute, $params){
        $pass = crypt($this->currentPassword, $this->currentPassword);
        
        if($this->currentPassword == null){
            
        }
        else if( $pass !== $this->password ){
            $this->addError('currentPassword','Wrong current password!');
            
            if($this->newPassword == null){
                $this->addError('newPassword','New Password cannot be blank!');
            }
            if($this->retypePassword == null){
                $this->addError('retypePassword','Re-type Password cannot be blank!');
            }
        }
        else if( $pass == $this->password ){
            if($this->newPassword == null){
                $this->addError('newPassword','New Password cannot be blank!');
            }
            if($this->retypePassword == null){
                $this->addError('retypePassword','Re-type Password cannot be blank!');
            }
            if($this->newPassword !== $this->retypePassword){
                $this->addError('retypePassword','Password don\'t match!');
            }
        }
    }
    
    public function confirmPassword($attribute, $params){
        if($this->currentPassword == null && $this->newPassword == null && $this->retypePassword == null){
            
        }
        else if( ($this->newPassword !== $this->retypePassword) && $this->currentPassword == null){
            $this->addError($attribute,'Password don\'t match!');
            $this->addError('currentPassword','Current Password cannot be blank!');
        }
        else if( ($this->newPassword == $this->retypePassword) && $this->currentPassword == null){
            $this->addError('currentPassword','Current Password cannot be blank!');
        }
    }
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
