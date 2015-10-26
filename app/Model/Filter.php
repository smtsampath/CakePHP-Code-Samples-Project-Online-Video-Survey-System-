<?php
App::uses('AppModel', 'Model');



/**
 * Filter Model
 *
 * @property video_filter $video_filter
 */
class Filter extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'key_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'label' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'VideoFilter' => array(
			'className' => 'VideoFilter',
			'foreignKey' => 'filter_id',
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

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FilterGroup' => array(
			'className' => 'FilterGroup',
			'foreignKey' => 'filter_groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
}
