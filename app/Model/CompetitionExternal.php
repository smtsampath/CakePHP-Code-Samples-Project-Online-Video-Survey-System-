<?php
App::uses('AppModel', 'Model');
/**
 * CompetitionExternal Model
 *
 * @property Competition $Competition
 */
class CompetitionExternal extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'competition_external';
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
		'external_id' => array(
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
		'Competition' => array(
			'className' => 'Competition',
			'foreignKey' => 'competition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'external_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * findVotes method
 *
 *
 */		
	public function findVotes($videoId){
		$opts['conditions'] = array(
										'CompetitionExternal.external_id' => $videoId
									);
		$item 				= $this->find('first', $opts);
		return $item['CompetitionExternal']['external_id'];
	}

/**
 * findAllVids method
 *
 *
 */	
	public function findAllVids($compId) {
		$opts['conditions'] = array(
										'CompetitionExternal.competition_id' => $compId
									);
		$vids 				= $this->find('all', $opts);
		return $vids;
	}
}
