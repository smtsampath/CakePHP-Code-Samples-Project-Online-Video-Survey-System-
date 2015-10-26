<?php
App::uses('AppModel', 'Model');
/**
 * Video Model
 *
 * @property User $User
 * @property VideoFeedback $VideoFeedback
 * @property VideoLog $VideoLog
 * @property VideoTarget $VideoTarget
 */
class Video extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
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
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Enter a valid url!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'thumbnail_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'length' => array(
			'notempty' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a title!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'target' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select a target customers!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'credit_value' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a credit value!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select a status!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'max_view' => array(
			'notempty' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'coupon' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'VideoFeedback' => array(
			'className' => 'VideoFeedback',
			'foreignKey' => 'video_id',
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
		'VideoLog' => array(
			'className' => 'VideoLog',
			'foreignKey' => 'video_id',
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
		'VideoFilter' => array(
			'className' => 'VideoFilter',
			'foreignKey' => 'video_id',
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
	);
	
	
	
    public function  getViewerFromUserId($user_id){
       $whitelist = array('fullname', 'email', 'password1', 'password2', 'captcha');//assuming you only want to update these fields 
       return $whitelist;
    }
	
	public function couponAvailable($videoId){
		  $this->updateAll(
                    array(
                        'Video.coupon' => true),
                            array(
                                'Video.id' => $videoId
                            )
                        );
	}
	
	public function loadfullvideo($videoId) {				
		$questions			= $this->VideoFeedback->loadFeedback($videoId);
		return $questions;				
	}		
	
	
	public function findCreditOfVideo($videoId) {		
		$opts['conditions']	= array('Video.id' => $videoId);
		$vid 				= $this->find('first', $opts);
		return $vid['Video']['credit_value'];		
	}
	
	
	public function incrementvideoview($videoId){	  
	  	$this->updateAll(
				    array(
				    	'Video.video_views' => 'Video.video_views + 1'),
				    		array(
				    			'Video.id' => $videoId
				    		)
				 		);
	}
	
	
	public function getAllVideos(){
		$videos 			= $this->find('all');
		return $videos;
	}
	
	public function findCreditValue($videoId){
		$opts['conditions']	= array('Video.id'=>$videoId);
		$vid 				= $this->find('first', $opts);
		return $vid['Video']['credit_value'];		
	}
	
	public function findMostViewed(){
		$vids				= $this->find('all', array('order' => 'Video.video_views DESC'));
		return $vids;		
	}
	
	public function findLatestVids(){
		$vids				= $this->find('all', array('order' => 'Video.created DESC'));
		return $vids;		
	}
	
	public function getTargetedVideosForUser($userId) {
	    App::import('Model', 'Viewer');
	    $viewerModel   		= new Viewer();	    
	    $user          		= $viewerModel->findByUserId($userId);	  
	    $sql 				= "SELECT DISTINCT
	    							(user_video_filter_view.video_id)
	    						FROM  
	    							user_video_filter_view 
	    						WHERE 
	    							user_video_filter_view.user_id = {$userId};";
	   
        $results        	= $this->query($sql);      
        $videos				= array();
        				$x	= 0;
      
        foreach ($results as $result){      
	        $vidId			= $result['user_video_filter_view']['video_id'];   
	        $videos[$x]		= $this->findVideo($vidId);
	        $x++;       
        }
        return $videos;
	}
	
	public function findVideoTitle($videoId = null){
		$opts['conditions'] = array(
									'Video.id' => $videoId
								);
		$vid 				= $this->find('first', $opts);
		return $vid['Video']['title'];
	}
	
	public function findVideo($videoId=null){
		$opts['conditions'] = array(
									'Video.id' => $videoId
								);
		$vid 				= $this->find('first', $opts);
		return $vid;
	}
	
	public function findVideosBelongtoUser($user_id=null){
        $opts['conditions'] = array(
                                    'Video.user_id' => $user_id,
                                  );
        $videos          = $this->find('all', $opts);
        return $videos;
    }   
    
	public	function advertiserNumOfVideos($user_id=null){
		$opts['conditions'] = array(
								  	'Video.user_id' => $user_id,
								  );
		$numofvids 			= $this->find('count', $opts);
		return $numofvids;
	}

    public function disableVideo($videoId){
            $this->updateAll(
                    array(
                        'Video.status' => "DISABLED"),
                            array(
                                'Video.id' => $videoId
                            )
                        );
    }
}
