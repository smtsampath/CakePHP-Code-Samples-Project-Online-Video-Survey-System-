<?php 
App::uses('CakeEmail', 'Network/Email');
class ContactsController extends AppController {
    var $name = 'Contact';
    var $uses = 'Contact';
    var $helpers = array('Html', 'Form', 'Js');
	var $components = array('Email', 'Captcha');
     
  
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow(array('index' , 'captcha')); 
	}
	
/**
 * captcha method
 * 
 * @return void
 */
	function captcha()	{
		$this->autoRender = false;
		$this->layout='ajax';
		if(!isset($this->Captcha))	{ //if Component was not loaded throug $components array()
			App::import('Component','Captcha'); //load it
			$this->Captcha = new CaptchaComponent(); //make instance
			$this->Captcha->startup($this); //and do some manually calling
		}
		$this->Captcha->create();
	}

/**
 * contact index method
 * 
 * @return void
 */
	
	

    public function index(){   
		if ($this->request->is('post')) {			
			if(!isset($this->Captcha))	{ //if Component was not loaded throug $components array()
				App::import('Component','Captcha'); //load it
				$this->Captcha = new CaptchaComponent(); //make instance
				$this->Captcha->startup($this); //and do some manually calling
			}
			$this->Contact->setCaptcha($this->Captcha->getVerCode());
            $this->Contact->create($this->data);
            // There is no save(), so we need to validate manually.
            if($this->Contact->validates()){
            	
            	
            	$this->Email->smtpOptions = array(				
				'port'=>'587',
				'timeout'=>'30',
            	'host' => 'smtp.sendgrid.net',
		        'username' => 'lakmalj',
		        'password' => '510662',
		        'client' => 'eloeel.com',
				);
            	
            	$this->Email->delivery 	= 'smtp';
            	$this->Email->from 		= $this->data['Contact']['name'].' <'.$this->data['Contact']['email'].'>';
            	$this->Email->to 		= array('sampath@flipit.lk');
            	$this->Email->cc 		= array('lakmal@flipit.lk');
            	$this->Email->subject 	= 'Eloeel.com - Contact Form: '.$this->data['Contact']['subject'];	
            	$this->Email->replyTo 	= $this->data['Contact']['email'];  
                $this->Email->sendAs   	= 'both';    
                               
                if ($this->Email->send($this->data['Contact']['message'])) {
                    $this->Session->setFlash('Thank you for contacting us');	          
                } else {
                    $this->Session->setFlash('Mail Not Sent');
                }
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Please Correct Errors');	      
            }
        }
    }
}
