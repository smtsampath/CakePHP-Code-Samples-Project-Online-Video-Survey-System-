<?php
App::uses('AppModel', 'Model');
/**
 * VideoFeedback Model
 *
 * @property Video $Video
 * @property VideoResponse $VideoResponse
 * @property VideoFeedbackOption $VideoFeedbackOption
 */
class VideoFeedback extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'video_feedback';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'question';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'video_id' => array(
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
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'video_id',
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
			'foreignKey' => 'video_feedback_id',
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
		'VideoFeedbackOption' => array(
			'className' => 'VideoFeedbackOption',
			'foreignKey' => 'video_feedback_id',
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
	
	
	public function loadfeedback($videoId) {	 	
		$opts				= array(
						  		'conditions' => 
									array(
						  				'video_id' => $videoId
						  			)
						  		);
	  	$this->recursive 	= -1;
	 	$questions 			= $this->find('all', $opts);	 	
	 	$ids 				= array();
		$groupedQuestion 	= array();
		foreach ($questions as $question) {
   			 $ids[] 		= $question['VideoFeedback']['id'];
   			 $groupedQuestion[$question['VideoFeedback']['id']] = $question;
		} 
			 	
	 	$opts 				= array();	 		
		$opts['conditions']['video_feedback_id'] = $ids; 
			
		$this->VideoFeedbackOption->recursive = -1;
		$feedback_options = $this->VideoFeedbackOption->find('all', $opts);

		foreach ($feedback_options as $feedback) {
   			if (!isset($groupedQuestion[$feedback['VideoFeedbackOption']['video_feedback_id']]['VideoFeedbackOptions'] )) 
    			$groupedQuestion[$feedback['VideoFeedbackOption']['video_feedback_id']]['VideoFeedbackOptions'] = array();
    		
    		$groupedQuestion[$feedback['VideoFeedbackOption']['video_feedback_id']]['VideoFeedbackOptions'][] = $feedback; 
		} 
		//prd($groupedQuestion);
		return $groupedQuestion;
		
	}
	
	public function findFeedback($videoId){
		$opts['conditions'] = array('VideoFeedback.video_id' => $videoId);
		$feedbacks = $this->find('all' ,  $opts);
		return $feedbacks;
		//prd($feedbacks);
	//	$this->loadModel('VideoFeedbackOption');
//		$this->recursive  = -1;
//		  $this->VideoFeedbackOption->recursive = -1;
//		  $feedback_options = array();
//		foreach($feedbacks as $feedback){
//			$feedback_id = $feedback['VideoFeedback']['id'];
// 			$opts['conditions'] = array('VideoFeedbackOption.feedback_id' => $feedback['VideoFeedback']['id']);
//			$feedback_options[$feedback_id] = $this->VideoFeedbackOptions->find('all', $opts);
//		}
	}
	
	
}
