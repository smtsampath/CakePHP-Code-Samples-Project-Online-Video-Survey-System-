<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	
	public $helpers 	= array('Html', 'Form', 'Session');
	public $components 	= array(		
	        'Acl',
	        'Auth' => array(
	            'authorize' 		=> array(
	                'Actions' 		=> array('actionPath' => 'controllers')
	            ),
	            'authenticate' 		=> array(
		            'Form' 			=> array(
		                'fields' 	=> array('username' => 'email')
		            )
	        	)
	        ),
	        'Session'
    );
    

    public function beforeFilter() {
    	
        //Configure AuthComponent           	
        $this->Auth->loginAction 	= array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect 	= array('controller' => 'users', 'action' => 'login');
               
        $this->Auth->allow('display');
        $this->set('logged_in', $this->Auth->loggedIn()); 			// check is user logged in
        $this->set('current_user', $this->Auth->user());			// get logged user
        $this->set('user_group', $this->Auth->user('group_id'));	// get logged user group
       // $this->set('count_login_attempts', 0);
        
        //  select admin layout 
    	if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
	    	$this->layout			= 'admin_default';
	    }
        
        //  checking whether users (viewers) has a profile records       
        $this->loadModel('Viewer');
		$this->Viewer->recursive	= -1;
		$opts['limit'] 				= 1;
		$opts['conditions']			= array('Viewer.user_id' => $this->Auth->User('id'));
		$userProfile				= $this->Viewer->find('all', $opts);		    		
        $this->set('userProfile', $userProfile);
         	
	    
	    // set the about_comp docs in to register & login pages 
   		$this->loadModel('Doc');
		$this->Doc->recursive		= -1;
		$opts['limit'] 				=  1;
		$opts['conditions']			= array('Doc.code' => 'about_comp');
		$aboutComp					= $this->Doc->find('all', $opts);
		if(!empty($aboutComp)) {
		  foreach ($aboutComp as $ab){
		  	$about 	= $ab['Doc']['body'];
		  }
		  $this->set('about', $about);
		  
		 }
    }
    
	/**
	 * rememberMe method
	 * 
	 */function _rememberMember() {
	    if ($this->params['action'] != 'logout') {
	        $this->RememberMe->checkUser();
	    }
	}
}
