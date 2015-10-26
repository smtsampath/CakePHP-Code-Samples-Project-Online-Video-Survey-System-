<?php
App::uses('AppModel', 'Model');
/**
 * Viewer Model
 *
 * @property User $User
 */
class Viewer extends AppModel {
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
		'nic' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'NIC cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'length' => array(
				'rule' => array('minLength',10),
				'message' => 'NIC must be atleast 10 characters',
				'allowEmpty' => false
			),
		),
		'dob' => array(
		     'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Date of birth cannot be empty',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select a gender',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Address cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'City cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'district' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'District cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'province' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Province cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'country' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		'unskipped' => array(
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
	
	function afterSave($created) {
		if($created) {
			$datas 				= array();
			$viewer_id			= $this->getInsertID();
			$opts['conditions'] = array('Viewer.id' => $viewer_id);
			$datas 				= $this->find('first', $opts);
			
			App::import('Model', 'UserFilter');
			$userFilter 		= new UserFilter();
			$userFilter->updateTable($datas);   
			$this->updateAll(
                    array(
                        'Viewer.unskipped' => true),
                    array(
                        'Viewer.id' => $viewer_id)
                    );  
		}
	}
	
	public function getTrustScore($user_id){
		$opts['conditions']   = array('Viewer.user_id' => $user_id);
        $viewer_fields             = $this->find('first', $opts);
        $x =0;
        $y= 0;
        if ($viewer_fields != null) {
        foreach ($viewer_fields['Viewer'] as $key => $viewer_field){
        	if (empty($viewer_field)){
        		if ($key == 'id'          || 
        		    $key == 'user_id'     ||
                     $key == 'contact2'   ||
        		    $key == 'address2'    ||
        		    $key == 'created'     ||
        		    $key == 'updated'     ||
        		    $key == 'unskipped'
        		    ){
        		    	
        		    }else{
        		    	$x++;//number of empty fields out of 16
        		    }
	            	
        	}else{
        	   if ($key == 'id'          || 
                    $key == 'user_id'     ||
                     $key == 'contact2'   ||
                    $key == 'address2'    ||
                    $key == 'created'     ||
                    $key == 'updated'     ||
                    $key == 'unskipped'
                    ){
                        
                    }else{
                        $y++;//number of completed fields out of 16
                    }
        	}
        }
        }
       // prd($y);
       if($y == 0){
       //	$trust = 16000 - 0;
        $trust = 0;
       //prd($trust);
        return $trust;
       }elseif ($y == 16){
        	
        $trust = 16000;
        return $trust;
        
       }else{
        $trust = $y * 1000;
       // $trust = 16000 - $trust; 
        return $trust;
       }
	}
	
	
	public function  getViewerFromUserId($user_id){
		$whitelist = array('user_id','nic', 'dob', 'gender', 'address1', 'address2', 'city', 'district', 'province','country', 'contact1', 'contact2', 'education', 'relationship_status', 'num_of_kids', 'employment', 'designation', 'career', 'monthly_income');//assuming you only want to update these fields 
	   return $whitelist;
	}
	

	public function  findSkipped($user_id){
		$viewer                    = array();
	    $opts['conditions']        = array('Viewer.user_id' => $user_id);
	    $viewer                    = $this->find('first', $opts);
	    if ($viewer == null ) {
	    	return true;
	    }else{
	    	return false;
	    }
    }
    
    public function  findNic($user_id){
    	 $opts['conditions']        = array('Viewer.user_id' => $user_id);
         $viewer                    = $this->find('first', $opts);
         return $viewer['Viewer']['nic'];
    }
    public function  findDob($user_id){
         $opts['conditions']        = array('Viewer.user_id' => $user_id);
         $viewer                    = $this->find('first', $opts);
         return $viewer['Viewer']['dob'];
    }
    public function  findDistrict($user_id){
         $opts['conditions']        = array('Viewer.user_id' => $user_id);
         $viewer                    = $this->find('first', $opts);
         return $viewer['Viewer']['district'];
    }
    public function  findProvince($user_id){
         $opts['conditions']        = array('Viewer.user_id' => $user_id);
         $viewer                    = $this->find('first', $opts);
         return $viewer['Viewer']['province'];
    }
    public function  findGender($user_id){
         $opts['conditions']        = array('Viewer.user_id' => $user_id);
         $viewer                    = $this->find('first', $opts);
         return $viewer['Viewer']['gender'];
    }
    
    
    
 public  function checkNicValidity($user_id){
        $opts['conditions']        = array('Viewer.user_id' => $user_id);
        $viewer                    = $this->find('first', $opts);
        $nic                       = $viewer['Viewer']['nic'];
        $year                      = substr($nic, 0, -8);
        $leap_year                 = 0;
        $dob_year                  = substr($viewer['Viewer']['dob'], 2, -6);
        $dob_month                 = substr($viewer['Viewer']['dob'], 5, -3);
        $dob_day                   = substr($viewer['Viewer']['dob'], 8);
        $dob_month                 = ltrim($dob_month,'0');
        $dob_day                   = ltrim($dob_day,'0');
        $dob_month                 = intval($dob_month);
        $dob_day                   = intval($dob_day);
        $month                     = 0;
        $day                       = 0;
        if (($dob_year%4) == 0){
            $leap_year             = 1;
        }
    
        if ($year !== $dob_year){
            return false;
        }
        $threedigits               = substr($nic, 2, -5);
        $threedigits               = intval($threedigits);
        if ($threedigits < 501){
            $gender                = 'M';
        }else {
            $gender                = 'F';
        }
  
        if ($gender == 'M'){
            if ($viewer['Viewer']['gender'] == 'male' || $viewer['Viewer']['gender'] == 'Male')   {
                if ($leap_year == 1){
                        if ($threedigits <= 31){ //31 jan
                            $month = 1;
                            $day   = $threedigits;
                        }elseif ($threedigits <= 60){ //29 feb
                            $month = 2;
                            $day   = $threedigits - 31;
                        }elseif ($threedigits <= 91){ //31 mar
                            $month = 3;
                            $day   = $threedigits - 60;
                        }elseif ($threedigits <= 121){ //30 apr
                            $month = 4;
                            $day   = $threedigits - 91;
                        }elseif ($threedigits <= 152){ //31 may
                            $month = 5;
                            $day   = $threedigits - 121;
                        }elseif ($threedigits <= 182){ //30 jun
                            $month = 6;
                            $day   = $threedigits - 152;
                        }elseif ($threedigits <= 213){ //31 jul
                            $month = 7;
                            $day   = $threedigits - 182;
                        }elseif ($threedigits <= 244){ //31 aug
                            $month = 8;
                            $day   = $threedigits - 213;
                        }elseif ($threedigits <= 274){ //30 sep
                            $month = 9;
                            $day   = $threedigits - 244;
                        }elseif ($threedigits <= 305){ //31 oct
                            $month = 10;
                            $day   = $threedigits - 274;
                        }elseif ($threedigits <= 335){ //30 nov
                            $month = 11;
                            $day   = $threedigits - 305;
                        }elseif ($threedigits <= 366){// 31 dec
                            $month = 12;
                            $day   = $threedigits - 335;
                        }
                   }else {
                        if ($threedigits <= 31){ //31 jan
                            $month = 1;
                            $day   = $threedigits;
                        }elseif ($threedigits <= 59){ //28 feb
                            $month = 2;
                            $day   = $threedigits - 31;
                        }elseif ($threedigits <= 91){ //31 mar
                            $month = 3;
                            $day   = $threedigits - 60;
                        }elseif ($threedigits <= 121){ //30 apr
                            $month = 4;
                            $day   = $threedigits - 91;
                        }elseif ($threedigits <= 152){ //31 may
                            $month = 5;
                            $day   = $threedigits - 121;
                        }elseif ($threedigits <= 182){ //30 jun
                            $month = 6;
                            $day   = $threedigits - 152;
                        }elseif ($threedigits <= 213){ //31 jul
                            $month = 7;
                            $day   = $threedigits - 182;
                        }elseif ($threedigits <= 244){ //31 aug
                            $month = 8;
                            $day   = $threedigits - 213;
                        }elseif ($threedigits <= 274){ //30 sep
                            $month = 9;
                            $day   = $threedigits - 244;
                        }elseif ($threedigits <= 305){ //31 oct
                            $month = 10;
                            $day   = $threedigits - 274;
                        }elseif ($threedigits <= 335){ //30 nov
                            $month = 11;
                            $day   = $threedigits - 305;
                        }elseif ($threedigits <= 366){ // 31 dec
                            $month = 12;
                            $day   = $threedigits - 335;
                        }
                   }
            
                    if ($month == $dob_month && $day == $dob_day){
                   
                         return true;
                   }
                   
                   return false;

            }else {
                return false;
            }
        }elseif ($gender == 'F'){
            
            if ($viewer['Viewer']['gender'] == 'female' || $viewer['Viewer']['gender'] == 'Female'){
            
                   $threedigits = $threedigits - 500;
           
                   if ($leap_year == 1){
                 
                        if ($threedigits <= 31){ //31 jan
                            $month = 1;
                            $day   = $threedigits;
                        }elseif ($threedigits <= 60){ //29 feb
                            $month = 2;
                            $day   = $threedigits - 31;
                        }elseif ($threedigits <= 91){ //31 mar
                            $month = 3;
                            $day   = $threedigits - 60;
                        }elseif ($threedigits <= 121){ //30 apr
                            $month = 4;
                            $day   = $threedigits - 91;
                        }elseif ($threedigits <= 152){ //31 may
                            $month = 5;
                            $day   = $threedigits - 121;
                        }elseif ($threedigits <= 182){ //30 jun
                            $month = 6;
                            $day   = $threedigits - 152;
                        }elseif ($threedigits <= 213){ //31 jul
                            $month = 7;
                            $day   = $threedigits - 182;
                        }elseif ($threedigits <= 244){ //31 aug
                            $month = 8;
                            $day   = $threedigits - 213;
                        }elseif ($threedigits <= 274){ //30 sep
                            $month = 9;
                            $day   = $threedigits - 244;
                        }elseif ($threedigits <= 305){ //31 oct
                            $month = 10;
                            $day   = $threedigits - 274;
                        }elseif ($threedigits <= 335){ //30 nov
                            $month = 11;
                            $day   = $threedigits - 305;
                        }elseif ($threedigits <= 366){
                            $month = 12;
                            $day   = $threedigits - 335; // 31 dec
                        }
                   }else {
                    
                        if ($threedigits <= 31){ //31 jan
                            $month = 01;
                            $day   = $threedigits;
                        }elseif ($threedigits <= 59){ //28 feb
                            $month = 02;
                            $day   = $threedigits - 31;
                        }elseif ($threedigits <= 91){ //31 mar
                            $month = 3;
                            $day   = $threedigits - 60;
                        }elseif ($threedigits <= 121){ //30 apr
                            $month = 4;
                            $day   = $threedigits - 91;
                        }elseif ($threedigits <= 152){ //31 may
                            $month = 5;
                            $day   = $threedigits - 121;
                        }elseif ($threedigits <= 182){ //30 june
                            $month = 6;
                            $day   = $threedigits - 152;
                        }elseif ($threedigits <= 213){ //31 july
                            $month = 7;
                            $day   = $threedigits - 182;
                            
                        }elseif ($threedigits <= 244){ //31 aug
                            $month = 8;
                            $day   = $threedigits - 213;
                            
                        }elseif ($threedigits <= 274){ //30 sep
                            $month = 9;
                            $day   = $threedigits - 244;
                        }elseif ($threedigits <= 305){ //31 oct
                            $month = 10;
                            $day   = $threedigits - 274;
                        }elseif ($threedigits <= 335){ //30 nov
                            $month = 11;
                            $day   = $threedigits - 305;//31 dec
                        }elseif ($threedigits <= 366){
                            $month = 12;
                            $day   = $threedigits - 335;
                        }
                   }
                  
                   if ($month == $dob_month && $day == $dob_day){
                  
                         return true;
                   }
                   
                   return false;
            }else {
                 return false;
            }
        }
        
    }

    public  function findInAgegroup($x = null){
    
   
        switch ($x){
            case 0 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 18;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $year = date("Y") - 24;
                      $date2 = $year.'-'.$month.'-'.$day;
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1, 'Viewer.dob >='=> $date2);
                      $viewers = $this->find('all', $opts);
                      return  $viewers;
                      //prd($viewers);
            case 1 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 25;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $year = date("Y") - 30;
                      $date2 = $year.'-'.$month.'-'.$day;
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1, 'Viewer.dob >='=> $date2);
                      $viewers = $this->find('all', $opts);
                      return  $viewers;
                      //
           case 2 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 31;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $year = date("Y") - 35;
                      $date2 = $year.'-'.$month.'-'.$day;
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1, 'Viewer.dob >='=> $date2);
                      $viewers = $this->find('all', $opts);
                      return  $viewers;
           case 3 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 36;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $year = date("Y") - 40;
                      $date2 = $year.'-'.$month.'-'.$day;
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1, 'Viewer.dob >='=> $date2);
                      $viewers = $this->find('all', $opts); 
                      return  $viewers;   
           case 4 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 41;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $year = date("Y") - 45;
                      $date2 = $year.'-'.$month.'-'.$day;
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1, 'Viewer.dob >='=> $date2);
                      $viewers = $this->find('all', $opts);  
                      return  $viewers;
           case 5 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 46;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $year = date("Y") - 50;
                      $date2 = $year.'-'.$month.'-'.$day;
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1, 'Viewer.dob >='=> $date2);
                      $viewers = $this->find('all', $opts);   
                      return  $viewers;
//                     / prd($viewers);
          case 6 :  $month = date("m");
                      $day = date("d");
                      $year = date("Y") - 50;
                      $date1 = $year.'-'.$month.'-'.$day; 
                      $opts['conditions'] =  array('Viewer.dob <='=> $date1);
                      $viewers = $this->find('all', $opts);
                      return  $viewers;
                      
        }
        
    }
  public  function viewer_profile_exist($user_id){
        $opts['conditions'] = array('Viewer.user_id' => $user_id);
        $user = $this->find('first' , $opts);
        if (empty($user)){
            return false;
        }else{
            return true;
        }
    }
}
