<?php
App::uses('AppModel', 'Model');
/**
 * VideoResponse Model
 *
 * @property VideoLog $VideoLog
 * @property VideoFeedback $VideoFeedback
 * @property VideoFeedbackOption $VideoFeedbackOption
 */
class VideoResponse extends AppModel {
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
		'video_log_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'video_feedback_option_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'VideoLog' => array(
			'className' => 'VideoLog',
			'foreignKey' => 'video_log_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'VideoFeedback' => array(
			'className' => 'VideoFeedback',
			'foreignKey' => 'video_feedback_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'VideoFeedbackOption' => array(
			'className' => 'VideoFeedbackOption',
			'foreignKey' => 'video_feedback_option_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
