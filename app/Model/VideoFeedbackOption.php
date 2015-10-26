<?php
App::uses('AppModel', 'Model');
/**
 * VideoFeedbackOption Model
 *
 * @property VideoFeedback $VideoFeedback
 * @property VideoResponse $VideoResponse
 */
class VideoFeedbackOption extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'option';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'video_feedback_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valid' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'VideoFeedback' => array(
			'className' => 'VideoFeedback',
			'foreignKey' => 'video_feedback_id',
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
		'VideoResponse' => array(
			'className' => 'VideoResponse',
			'foreignKey' => 'video_feedback_option_id',
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

}
