<?php

App::uses('CakeRequest', 'Network');
App::uses('CakeEmail', 'Network/Email');

class SignMeUpComponent extends Component {



	public $components 	= array('Session', 'Auth', 'RequestHandler','Captcha');
	public $helpers 	= array('Html', 'Form', 'Js');
	public $defaults 	= array(
		'activation_field' 			=> 'activation_code',
		'useractive_field' 			=> 'active',
		'login_after_activation' 	=> false,
		'welcome_subject' 			=> 'Welcome',
		'activation_subject' 		=> 'Please Activate Your Account',
		'password_reset_field' 		=> 'password_reset',
		'fullname_field' 			=> 'fullname',
		'sendAs'	 				=> 'both',
		'email_field' 				=> 'email',
		'email_layout' 				=> 'default',
 		'password_field' 			=> 'password',
		'tmp_password_field' 		=> 'tmp_password',
		'activation_template' 		=> 'activate',
		'welcome_template' 			=> 'welcome',
		'password_reset_template' 	=> 'forgotten_password',
		'password_reset_subject' 	=> 'Password Reset Request',
		'new_password_template' 	=> 'new_password',
		'new_password_subject' 		=> 'Your new Password',
		'group_id_field'            => 'group_id',
	);
	
   /**
 * captcha method
 * 
 * @return void
 */
    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))  { //if Component was not loaded throug $components array()
            App::import('Component','Captcha'); //load it
            $this->Captcha = new CaptchaComponent(); //make instance
            $this->Captcha->startup($this); //and do some manually calling
        }
        $this->Captcha->create();
    }
	public $name = 'SignMeUp';
	public $uses = array('SignMeUp');

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
		$this->settings = $settings;
	}

	public function initialize(&$controller) {
		$this->__loadConfig();
		$settings = array_merge($this->settings, Configure::read('SignMeUp'));
		$this->settings = array_merge($this->defaults, $settings);
		$this->requestHandler = new CakeRequest();
		$this->signMeUpEmailer = new CakeEmail('signMeUp');
		$this->data = $this->requestHandler->data(null);
		$this->controller = $controller;
	}

	private function __loadConfig() {
		if (Configure::load('sign_me_up', 'default', false) === false) {
			die('Could not load sign me up config');
		}
	}

	private function __setUpEmailParams($user) {
		$this->__loadConfig();
		extract($this->settings);
		if (empty($user[$fullname_field])) {
			$this->signMeUpEmailer->to($user[$email_field], $user[$email_field]);
		} else {
			$this->signMeUpEmailer->to($user[$email_field], $user[$fullname_field]);
		}
		$this->signMeUpEmailer->viewVars(compact('user'));
	}

	private function __parseEmailSubject($action = '', $user = array()) {
		$subject = $this->settings->{$action.'_subject'};
		preg_match_all('/%(\w+?)%/', $subject, $matches);
		$foundMatch = false;
		foreach ($matches[1] as $match) {
			if (!empty($user[$match])) {
				$foundMatch = true;
				$this->signMeUpEmailer->subject(str_replace('%'.$match.'%', $user[$match], $subject));
			}
		}

		if ($foundMatch === false) {
			$this->signMeUpEmailer->subject($subject);
		}
	}
		
	

	public function register() {
		$this->__isLoggedIn();
		if (!empty($this->data)) {
			
			//prd($this->data);
			if ($this->data['User']['terms'] == 0){
				$this->Session->setFlash(__('You have to accept the terms and conditions in order to continue.'));
				$this->controller->redirect('/register');
			}
			$whitelist = array('fullname', 'email', 'password1', 'password2', 'captcha');//assuming you only want to update these fields 
            $cleanData = array();
		    foreach ($whitelist as $whitelist_field) {
                foreach ($this->data['User'] as $field => $value){
                    if ($whitelist_field == $field){
                        $cleanData['User'][$field] = $value;
                    }
                    
                }
                
            }
            $this->data['User']['credit_limit'] = 300;
           $this->data['User']['group_id'] = 2;
			//$cleanData['User'] = $this->getWhitelistedArray($this->data['User'], $whitelist);
			//prd($cleanData);
			extract($this->settings);
			$model = $this->controller->modelClass;
			$this->controller->loadModel($model);
			$this->controller->{$model}->set($this->data);
			
			//prd($this->data);

			if (CakePlugin::loaded('Mongodb')) {
				$this->controller->{$model}->Behaviors->attach('Mongodb.SqlCompatible');
			}
			
			
			
			if ($this->controller->{$model}->validates()) {
				
				if (!empty($activation_field)) {
					$this->data[$model][$activation_field] = $this->controller->{$model}->generateActivationCode($this->data);
				} elseif (!empty($useractive_field)) {
					$this->data[$model][$useractive_field] = true;
				}
				
				if ($this->controller->{$model}->save($this->data, false)) {
					//If an activation field is supplied send out an email
					if (!empty($activation_field)) {
						$this->__sendActivationEmail($this->data[$model]);
						if (!$this->controller->request->is('ajax')) {
							$this->controller->redirect(array('action' => 'activate'));
						} else {
							return true;
						}
					} else {
						$this->__sendWelcomeEmail($this->data[$model]);
					}
					if (!$this->controller->request->is('ajax')) {
						$this->controller->redirect('/login');
					} else {
						return true;
					}
				}
			} else {
				unset($this->controller->request->data[$model]['password1']);
				unset($this->controller->request->data[$model]['password2']);
			}
		}
	}

	private function __isLoggedIn() {
		if ($this->Auth->user()) {
			if (!$this->controller->request->is('ajax')) {
				$this->controller->redirect($this->Auth->loginRedirect);
			}
		}
	}

	protected function __sendActivationEmail($userData) {
		
		$this->__setUpEmailParams($userData);
		$this->signMeUpEmailer->subject('Please Activate Your Account');
		if ($this->signMeUpEmailer->template($this->settings['activation_template'], $this->settings['email_layout'])) {
			$this->Session->write('userInfoRedirect', true);
			if ($this->signMeUpEmailer->send()) {
				return true;
			}
		}
	}

	protected function __sendWelcomeEmail($userData) {
		$this->__setUpEmailParams($userData);
		$this->signMeUpEmailer->subject('Welcome');
		if ($this->signMeUpEmailer->template($this->settings['welcome_template'], $this->settings['email_layout'])) {
			if ($this->signMeUpEmailer->send()) {
				return true;
			}
		}
	}

	public function activate() {
		$this->__isLoggedIn();
		extract($this->settings);
		//If there is no activation field specified, don't bother with activation
		if (!empty($activation_field)) {
			//Test for an activation code in the parameters
			if (!empty($this->controller->request->params[$activation_field])) {
				$activation_code = $this->controller->request->params[$activation_field];
			}

			//If there is an activation code supplied, either in _POST or _GET
			if (!empty($activation_code) || !empty($this->data)) {
				$model = $this->controller->modelClass;
				$this->controller->loadModel($model);

				if (!empty($this->data)) {
					$activation_code = $this->data[$model][$activation_field];
				}

				$inactive_user = $this->controller->{$model}->find('first', array('conditions' => array($activation_field => $activation_code), 'recursive' => -1));
				if (!empty($inactive_user)) {
					$this->controller->{$model}->id = $inactive_user[$model][$this->controller->{$model}->primaryKey];
					if (!empty($useractive_field)) {
						$data[$model][$useractive_field] = true;
					}
					$data[$model][$activation_field] = null;
					if ($this->controller->{$model}->save($data)) {
						$this->__sendWelcomeEmail($inactive_user['User']);
						if ($login_after_activation === true) {
							$this->Auth->login($inactive_user);
						}
						if (!$this->controller->request->is('ajax')) {
							$user = '';
							if (!empty($inactive_user[$model][$fullname_field])) {
								$user = ' '.$inactive_user[$model][$fullname_field];
							}
							$this->Session->write('userInfoRedirect', true);
							$this->Session->setFlash('Thank you'.$user.', your account is now active');
							if ($login_after_activation === true) {
								$this->controller->redirect('/login');
							} else {
								$this->controller->redirect('/login');
							}
						} else {
							return true;
						}
					}
				} else {
					$this->Session->setFlash('Sorry, that code is incorrect.');
				}
			}
		}
	}
	public function forgottenPassword() {
		extract($this->settings);
		$model = $this->controller->modelClass;
		if (!empty($this->data[$model])) {
			$data = $this->data[$model];
		}

		//User has code to reset their password
		if (!empty($this->controller->request->params[$password_reset_field])) {
			$this->__generateNewPassword($model);
		} elseif (!empty($password_reset_field) && !empty($data['email'])) {
			$this->__requestNewPassword($data, $model);
		}
	}

	private function __generateNewPassword($model = '') {
		extract($this->settings);
		$user = $this->controller->{$model}->find('first', array(
			'conditions' => array($password_reset_field => $this->controller->request->params[$password_reset_field]),
			'recursive' => -1
		));

		if (!empty($user)) {
			$password = substr(String::uuid(), 0, 8);
			//$user[$model][$tmp_password_field] = $password;
			$user[$model][$password_field] = $password;
			$user[$model][$password_reset_field] = null;		
			//$this->controller->set(compact('password'));
			if ($this->controller->{$model}->save($user) && $this->__sendNewPassword($user[$model])) {
				$user[$model][$password_field] = AuthComponent::password($password);	
				//$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
				$this->controller->{$model}->save($user);						
				if (!$this->controller->request->is('ajax')) {					
					$this->Session->setFlash('Thank you '.$user[$model][$fullname_field].', your new password has been emailed to you.');
					$this->controller->redirect($this->Auth->loginAction);
				} else {
					return true;
				}
			
			}
		}
	}
	
	private function __sendNewPassword($user = array()) {
		$this->__setUpEmailParams($user);
		//$this->Email->sendAs = 'html'; 
		//$this->set('password',$pass);
		$this->signMeUpEmailer->subject('Your new Password');
		
		if ($this->signMeUpEmailer->template($this->settings['new_password_template'], $this->settings['email_layout'])) {
			//$password = substr(Security::hash(String::uuid(), null, true), 0, 8);
			//$this->controller->set('password');
			if ($this->signMeUpEmailer->send()) {
				return true;
			}
		}
	}

	private function __requestNewPassword($data = array(), $model = '') {
		extract($this->settings);
		$this->controller->loadModel($model);
		$user = $this->controller->{$model}->find('first', array('conditions' => array('email' => $data['email']), 'recursive' => -1));
		if (!empty($user)) {
			$user[$model][$password_reset_field] = md5(String::uuid());

			if ($this->controller->{$model}->save($user) && $this->__sendForgottenPassword($user[$model])) {
				if (!$this->controller->request->is('ajax')) {
					$this->Session->setFlash('Thank you. A password recovery email has now been sent to '.$data['email']);
					$this->controller->redirect($this->Auth->loginAction);
				} else {
					return true;
				}
			}
		} else {
			$this->controller->{$model}->invalidate('email', 'No user found with email: '.$data['email']);
		}
	}

	private function __sendForgottenPassword($user = array()) {
		$this->__setUpEmailParams($user);
		$this->signMeUpEmailer->subject('Password Reset Request');
		//$this->Email->sendAs = 'html'; 
		if ($this->signMeUpEmailer->template($this->settings['password_reset_template'], $this->settings['email_layout'])) {
			
			//$this->signMeUpEmailer->subject = $this->settings['password_reset_subject'];
			if ($this->signMeUpEmailer->send()) {				
				return true;
			}
		}
	}
		

}