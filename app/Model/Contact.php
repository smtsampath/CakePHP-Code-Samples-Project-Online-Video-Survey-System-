<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */

class Contact extends AppModel {
    var $name = 'Contact';
    var $useTable = false;  // Not using the database, of course.
    var $captcha = ''; //intializing captcha var
 
    // All the fancy validation you could ever want.
    var $validate = array(
        'name' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter name !',
			),
        ),
       
        'subject' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter subject !',
			),
        ),
        'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter valid email address !',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter email address !',
			),
		),
		'message' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter message !',
			),
        ),
        // Captcha code user input validation rules
	    'captcha'=>array(
				'rule' => array('matchCaptcha')
		),
        
    );
 
    // This is where the magic happens
    function schema() {
        return array (
            'name' => array('type' => 'string', 'length' => 60),
            'email' => array('type' => 'string', 'length' => 60),
            'message' => array('type' => 'text', 'length' => 2000),
            'subject' => array('type' => 'string', 'length' => 100),
        );
    }
    
	function matchCaptcha($inputValue)	{
		return $inputValue['captcha']	== $this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}
}
 
    
