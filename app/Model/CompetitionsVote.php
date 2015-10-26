<?php
App::uses('AppModel', 'Model');
/**
 * CompetitionsVote Model
 *
 * @property User $User
 * @property Competition $Competition
 */
class CompetitionsVote extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'competitions_vote';
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
		'competition_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'votes' => array(
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
		'Competition' => array(
			'className' => 'Competition',
			'foreignKey' => 'competition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * checkVotedBefore method
 *
 *
 */		
	public function checkVotedBefore($userId, $compId, $extId) {
		$opts['conditions'] = array(
										'CompetitionsVote.user_id' 			=> $userId,
										'CompetitionsVote.competition_id' 	=> $compId,
										'CompetitionsVote.external_id' 		=> $extId
									);
		$rec 				= $this->find('first', $opts);		
		$chek			 	= false;
		if (!empty($rec)) {
			$chek = true;
			return $chek;
		}
		else{
			return $chek;
		}
	}

/**
 * checkVoteLimit method
 *
 *
 */		
	public  function checkVoteLimit($userId, $compId) {
		$opts['conditions'] = array(
										'CompetitionsVote.user_id' 			=> $userId,
										'CompetitionsVote.competition_id' 	=> $compId
									);
		
		$lim 				= $this->find('count', $opts);
		return  $lim;		
	}
	
/**
 * findVotesForVids method
 *
 *
 */	
	public function findVotesForVids($compId) {
		$votes					= array();
	    App::import('Model', 'CompetitionExternal');
	    $competitionExternal 	= new CompetitionExternal();
	  	$vids 					= $competitionExternal->findAllVids($compId);
		$i=0;
		foreach ($vids as $vid) {			
			$opts2['conditions']= array(
											'CompetitionsVote.external_id' => $vid['CompetitionExternal']['external_id']
										);
			$votes[$i] 			= $this->find('count', $opts2);
			$i++;
		}
		return $votes;
	}
}
