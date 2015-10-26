<?php
App::uses('AppModel', 'Model');
/**
 * CreditLog Model
 *
 * @property User $User
 */
class CreditLog extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'note' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'credit_amount' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
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
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * addCreditLog method
 *
 *
 */	
	public function  addCreditLog($userId = null, $credit = null,  $currentbalance = null, $ext_id = null ){
		$data 	= $this->set(array(  
						        	'user_id' 			=> $userId,   
						        	'external_id' 		=> $ext_id,
									'type'				=> "VIDEO VIEW",
									'note'				=> "User watched video",
									'credit_amount'		=> $credit,								
						         	'credit_balance' 	=> $currentbalance
						          ));
      
      $this->saveAll($data);
	}
	
/**
 * left_CreditLog method
 *
 *
 */ 
    public function  left_CreditLog($userId = null, $credit = null,  $currentbalance = null, $ext_id = null ){
        $data   = $this->set(array(  
                                    'user_id'           => $userId,   
                                    'external_id'       => $ext_id,
                                    'type'              => "VIDEO VIEW",
                                    'note'              => "The remaining credit from the Video",
                                    'credit_amount'     => $credit,                             
                                    'credit_balance'    => $currentbalance
                                  ));
      
      $this->saveAll($data);
    }

	
/**
 * Deduct_donationCreditLog method
 *
 *
 */ 
    public function  Deduct_donationCreditLog($userId = null, $credit = null,  $currentbalance = null, $ext_id = null ){
        $data   = $this->set(array(  
                                    'user_id'           => $userId,   
                                    'external_id'       => $ext_id,
                                    'type'              => "DONATION",
                                    'note'              => "User donated to charity",
                                    'credit_amount'     => $credit,                             
                                    'credit_balance'    => $currentbalance
                                  ));
      
      $this->saveAll($data);
    }
	
/**
 * Add_donationCreditLog method
 *
 *
 */ 
    public function  Add_donationCreditLog($userId = null, $credit = null,  $currentbalance = null, $ext_id = null ){
        $data   = $this->set(array(  
                                    'user_id'           => $userId,   
                                    'external_id'       => $ext_id,
                                    'type'              => "DONATION",
                                    'note'              => "Charity received from User",
                                    'credit_amount'     => $credit,                             
                                    'credit_balance'    => $currentbalance
                                  ));
      
      $this->saveAll($data);
    }

    
/**
 * findCreditActivities method
 *
 *
 */		
	public function findCreditActivities($userId = null){
		$opts['conditions'] = array(
									'user_id' => $userId,
								);
		$creditDetails 		= $this->find('all', $opts);
		return $creditDetails;
	}

/**
 * addCreditLog2 method
 *
 *
 */
	public function  addCreditLog2($userId = null, $creditamount = null,  $total = null ){
 		$data = $this->set(array(    		
						        'user_id' 			=> $userId,        
								'type'				=> "MANUAL_UPDATE",
								'note'				=> 'Admin updated this log',
								'credit_amount'		=> $creditamount,		  
						        'credit_balance' 	=> $total
					      	));
      
      $this->saveAll($data);      
 	}	
}
