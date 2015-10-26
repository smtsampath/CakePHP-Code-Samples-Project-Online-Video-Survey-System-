<?php
App::uses('AppModel', 'Model');
//App::import('model','CreditLog');
//App::uses('Model', 'CreditLog');
// $crl = new CreditLog();
//ClassRegistry::init('CreditLog');
/**
 * VideoLog Model
 *
 * @property User $User
 * @property Video $Video
 * @property VideoResponse $VideoResponse
 */
class VideoLog extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	
	
	public $displayField = 'id';
	var $name = 'video_log';
	
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
			'foreignKey' => 'video_log_id',
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
	
	public	function isVideoViewed($userId = null, $videoId = null){
		$opts['conditions'] = array(
									'VideoLog.user_id' => $userId,
									'VideoLog.video_id'=> $videoId
								);
		$viewed 			= $this->find('count', $opts);
		$result 			= true;
		if($viewed > 0){
			return $result;
		}else { 
			$result	= false;
			return $result;
		}		
	}
	
	public	function watchedVideosByUser($userId=null){
		$opts['conditions'] = array(
									'VideoLog.user_id' => $userId,
								);
		$watchedVideos 		= $this->find('all', $opts);		
		return $watchedVideos;
	}
	
	public	function findVidsWatchedToday($userId=null){
		$opts['conditions'] = array(
									  'VideoLog.user_id' => $userId,
									  'TIMESTAMPDIFF(DAY, created, NOW())  <=24'
								  );
		$numofvids 			= $this->find('count', $opts);
		return $numofvids;
	}
	
	public	function findVidsWatchedThisMonth($userId=null){
		$opts['conditions'] = array(
								 	'VideoLog.user_id' => $userId,
								 	'TIMESTAMPDIFF(DAY, created, NOW())  <=24*30'
								 );
		$numofvids 			= $this->find('count', $opts);		
		return $numofvids;
	}
	
	public function checkCreditLimit($userId, $creditLim){
		$opts['conditions'] = array(
									'VideoLog.user_id' => $userId,
									'TIMESTAMPDIFF(DAY, created, NOW())  <= 24'
								);
		
		$videos 			= $this->find('all', $opts);
		$totalCredits 		= 0;
		
		foreach ($videos as $video) {
			$curVidId 			= $video['VideoLog']['video_id'];
			$creditOfThisVid 	= $this->Video->findCreditOfVideo($curVidId);
			$totalCredits 		= $totalCredits + $creditOfThisVid ;
		}
		
		if ($totalCredits >= $creditLim){
			$creditLimReached 	= true;
			return $creditLimReached;
		} else {
			$creditLimReached 	= false;
			return $creditLimReached;
		}
	}
	
	///////Clear the Test Logs of the test User/////////////////
	public function clearTestLogs($userId){        
	    $opts['conditions'] = array('VideoLog.user_id' => $userId);
		$records = $this->find('all', $opts);
	//prd($records);
		foreach ($records as $record){
			 $this->delete($record['VideoLog']['id']);
		}
		
	}
	//////////////////////////////////////////////////
	function afterSave($created) {
		
		if($created) {
	//		$user_id                 = $this->Auth->user('id');
			$data 		= array();
			$vlog_id	= $this->getInsertID();
			$datas 		= $this->data['VideoResponse'];
			
			if ($this->data['VideoLog']['user_id'] == 36){
				
			}else{
				foreach ($datas as  $key => $val) {	 
					$data	= $this->VideoResponse->set(array(  
															'video_log_id' 				=> $vlog_id,   
															'video_feedback_id' 		=> $key, 	    
															'video_feedback_option_id' 	=> $val['video_feedback_option_id'], 		   
														));				
					$this->VideoResponse->saveAll($data);			    
				}   
				
				$this->Video->incrementvideoview( $this->data['VideoLog']['video_id']);
				$vid = $this->Video->findVideo( $this->data['VideoLog']['video_id']);
				$num_views = $vid['Video']['video_views'];
				$max_views = $vid['Video']['max_view'];
				if ($num_views == $max_views || $num_views > $max_views){
				    $this->Video->disableVideo( $this->data['VideoLog']['video_id']);
				}
				
				App::import('Model', 'Viewer');
	            $viewer      = new Viewer();
				$trust          = $viewer->getTrustScore($this->data['VideoLog']['user_id']);
				
				$credit			= $this->Video->findCreditValue($this->data['VideoLog']['video_id']);
				$this->User->credituser( $this->data['VideoLog']['user_id'], $credit, $trust);
				$currentbalance	= $this->User->findCurrentBalance( $this->data['VideoLog']['user_id']);
				
				
				App::import('Model', 'CreditLog');
				$creditLog 		= new CreditLog();
				$ext_id 		= $this->data['VideoLog']['video_id'];		
	            
				$rate =  ($trust/16000);//checking trust percentage
				
				if ($rate ==  1 ){ // check if user has 100% trust
				    $creditLog->addCreditLog($this->data['VideoLog']['user_id'], $credit, $currentbalance, $ext_id);//log entry of the Video View
				}else{
					$credit_added = $credit * $rate; //eels credited to the users account
		            $credit_left  = $credit - $credit_added; // credits left from the video view
					$currentbalance_flipit = $this->User->findCurrentBalance(18); //current balance ofthe flipit account
		            $creditLog->addCreditLog($this->data['VideoLog']['user_id'], $credit_added, $currentbalance, $ext_id); // log entry of the percentage of credit deposited into user account
		            $creditLog->left_CreditLog(18, $credit_left, $currentbalance_flipit, $ext_id); // Log entry of the remaining crdits from the video to flipit account
	            	
				}
			}
			
		}
		
	}
	
	

}
