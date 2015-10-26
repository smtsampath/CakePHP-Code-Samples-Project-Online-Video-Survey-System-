<?php
App::uses('AppModel', 'Model');
/**
 * UserFilter Model
 *
 * @property User $User
 * @property Filter $Filter
 */
class UserFilter extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

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
		'Filter' => array(
			'className' => 'Filter',
			'foreignKey' => 'filter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function updateTable($datas) {	
	$id 	= $datas['Viewer']['user_id'];
	$items 	= array();
		$x	= 0;
		if(!empty($datas['Viewer']['gender'])){
			$items[$x] = array(
				        		'filter_id' => 4,
				      		  	'value' 	=> $datas['Viewer']['gender']
				 			);
 			$x++;
		}
		if(!empty($datas['Viewer']['city'])){
			$items[$x] = array(
				        		'filter_id' => 3,
				      	   		'value' 	=> $datas['Viewer']['city']
				 			);
 			  $x++;
		}
		if(!empty($datas['Viewer']['district'])){
			$items[$x] = array(
				        		'filter_id' => 2,
				      	   		'value' 	=> $datas['Viewer']['district']
				 			);
 			$x++;
		}
		if(!empty($datas['Viewer']['monthly_income'])){
			
			$items[$x] = array(
					        	'filter_id' => 5,
					      	   	'value' 	=> $datas['Viewer']['monthly_income']
				 			);
 			$x++;
		}
		
		if(!empty($datas['Viewer']['dob'])){
			$dob 		= $datas['Viewer']['dob'];
			$yob 		= date('Y', strtotime($dob));
			$this_year 	= date('Y');
			$age 		= $this_year - $yob;
			if($age < 18){
				$val 	= 1;
			} elseif ($age>=18 && $age <= 25){
				$val 	= 2;
			} elseif ($age >=26 && $age <=35){
				$val 	= 3;
			} elseif ($age >= 36 && $age <=45){
				$val 	= 4;
			} else {
				$aval 	= 5;
			}
			$items[$x] 	= array(
	               		 		'filter_id' => 7,
	               				'value' 	=> $val
	                  		);
            	$x++;
		}
	//	prd($items);  
		foreach ($items as $item){			
			$data	= $this->set(array(  
										'user_id' 	=> $id,   
										'filter_id' => $item['filter_id'], 	    
										'value' 	=> $item['value'], 		   
									));
									
			$opts['conditions'] = array('UserFilter.user_id' => $id, 
			                            'UserFilter.filter_id' => $item['filter_id'],
			                            //'UserFilter.value'  => $item['value'], 
			
			                         );
		    $records  = $this->find('all', $opts);
		  // prd($records);
		    if (!empty($records)){
		    	foreach ($records as $record){
		    	
		    		$this->delete($record['UserFilter']['id']);
		    	} 
		    	
		    }
									
			$this->saveAll(array(  
							      'user_id'   => $id,   
                                    'filter_id' => $item['filter_id'],      
                                    'value'     => $item['value'],         
                                ));    	
		}
	}
}
