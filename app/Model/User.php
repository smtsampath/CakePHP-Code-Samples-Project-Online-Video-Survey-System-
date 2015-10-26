<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Advertiser $Advertiser
 * @property CreditLog $CreditLog
 * @property PaymentDetail $PaymentDetail
 * @property Viewer $Viewer
 * @property Group $Group
 * @property VideoLog $VideoLog
 * @property Video $Video
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fullname';
	
	public $name = 'User';
	var $captcha = ''; //intializing captcha var
	
	public $actsAs = array('SignMeUp.SignMeUp', 'Acl' => array('type' => 'requester'));
	    
	public function bindNode($user) {
	    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	
		'new_password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A password is required'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'length' => array(
				'rule' => array('minLength',6),
				'message' => 'Password must be at least 6 characters long',
				'allowEmpty' => false
			),
		),
		
		'confirm_password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A confirm_password is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'old_password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A confirm_password is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),		
		
		'credit' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			// Captcha code user input validation rules
	        'captcha'=>array(
	                'rule' => array('matchCaptcha')
	        ),
        
		),
		
	);
	

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Advertiser' => array(
			'className' => 'Advertiser',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CreditLog' => array(
			'className' => 'CreditLog',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PaymentDetail' => array(
			'className' => 'PaymentDetail',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Viewer' => array(
			'className' => 'Viewer',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Charity' => array(
            'className' => 'Charity',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'VideoLog' => array(
			'className' => 'VideoLog',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
    

	public function  getViewerFromUserId($user_id){
       $whitelist = array('fullname', 'email', 'password1', 'password2', 'captcha');//assuming you only want to update these fields 
       return $whitelist;
    }
    
    
	public function donate_credits($charity_user_id, $logged_user_id, $credits_to_transfer){
		//prd($charity_user_id);    
        $this->transfer_deduct_credituser($logged_user_id , $credits_to_transfer);
		$this->transfer_credit_user($charity_user_id , $credits_to_transfer);
	
	}

	public function credituser($userId , $credit, $trust){
		$rate =  ($trust/16000);
		if($rate == 1) {
			 $this->transfer_credit_user($userId , $credit);
		}else{
		$credit_added = $credit * $rate;
		$credit_left  = $credit - $credit_added;
		 $this->transfer_credit_user($userId , $credit_added);
		 $this->transfer_credit_user(18 , $credit_left);
		}
	}	
	
	public function transfer_credit_user($userId , $credit){
        $this->updateAll(
                    array(
                        'User.credit' => 'User.credit + '.$credit.''),
                    array(
                        'User.id' => $userId)
                    );
    }   
	
	public function transfer_deduct_credituser($userId , $credit){
        $this->updateAll(
                    array(
                        'User.credit' => 'User.credit - '.$credit.''),
                    array(
                        'User.id' => $userId)
                    );
    }   
	
	public function findCurrentBalance($userId ){
		$opts['conditions']	= array('User.id' => $userId);
		$curbal		 		= $this->find('first', $opts);
		return $curbal['User']['credit'];		
	}
	
	public function findCreditLimit($userId) {
		$opts['conditions']	= array('User.id' => $userId);
		$creditlim 			= $this->find('first', $opts);
		return $creditlim['User']['credit_limit'];
	}
	
	public function findPayMethod($userId) {
		$opts['conditions']	= array('User.id' => $userId);
		$user= $this->find('first', $opts);
		return $user['User']['payment_method'];
		
	}
	
    function matchCaptcha($inputValue)  {
    	//prd($inputValue);
    	if (empty($inputValue) || !empty($inputValue['credit'])){
    		return true;
    	}else{
            return $inputValue['captcha']   == $this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
    	}
    }

    function setCaptcha($value) {
        $this->captcha = $value; //setting captcha value
    }

    function getCaptcha()   {
        return $this->captcha; //getting captcha value
    }


}
