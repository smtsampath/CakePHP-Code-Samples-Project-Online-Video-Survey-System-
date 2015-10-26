<?php
App::uses('AppModel', 'Model');
/**
 * PaymentDetail Model
 *
 * @property User $User
 */
class PaymentDetail extends AppModel {
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
		'bank_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid bank name',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'branch' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a branch',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'account_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid account number',
				'allowEmpty' => false,
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
	
    public function  getViewerFromUserId($user_id){
       $whitelist = array('bank_name', 'branch', 'account_number');//assuming you only want to update these fields 
       return $whitelist;
    }
}
