<?php

class SignMeUpBehavior extends ModelBehavior {

	var $captcha = ''; //intializing captcha var

	public $validate = array(
		'email' => array(
			'validEmail' => array(
				'rule' => array('email', true),
				'message' => 'Please supply a valid email address'
			),
			'emailExists' => array(
				'rule' => 'isUnique',
				'message' => 'Sorry, this email already in use'
			),
		),
		'password1' => array(			
			'minRequirements' => array(
				'rule' => array('minLength', 6),
				'message' => 'Need to be at least 6 characters long'
			),			
			'match' => array(
				'rule' => array('confirmPassword', 'password1', 'password2'),
				'message' => 'Passwords do not match'
			),
			
		),
		'password2' => array(			
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Confirm Password cannot be blank',
			),
		),
		'fullname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Full Name cannot be blank',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'captcha'=>array(
            
               
                'rule' => array('matchCaptcha')
            
                
        ),
		
	);


	
	public function beforeValidate(&$Model) {
		$this->model = $Model;
		
		$this->model->validate = array_merge($this->validate, $this->model->validate);
		//$this->model->data[$this->model->alias]['email1'] == $this->model->data[$this->model->alias]['email'];
		return true;
		
	}

	public function confirmPassword($field, $password, $password2) {
		if ($this->model->data[$this->model->alias]['password1'] == $this->model->data[$this->model->alias]['password2']) {
			//$this->model->data[$this->model->alias]['password'] = $this->model->data[$this->model->alias]['password1'];
			$this->model->data[$this->model->alias]['password'] = Security::hash($this->model->data[$this->model->alias]['password1'], null, true);
			return true;
		}
	}

	public function generateActivationCode($data) {
		return Security::hash(serialize($data).microtime().rand(1,100), null, true);
	}
	


}

?>