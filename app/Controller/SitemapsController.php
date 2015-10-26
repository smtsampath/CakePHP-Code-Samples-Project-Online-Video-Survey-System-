<?php
App::uses('AppController', 'Controller');
/**
 * SitemapsController Controller
 *
 */
class SitemapsController extends AppController {
	
	public function beforeFilter() {
		$this->Auth->autoRedirect = false;
	    parent::beforeFilter();
	    $this->Auth->allow(array('index')); 
	}
	
		

	    var $name = 'Sitemaps';
	    var $uses = array('Post', 'Info');
	    var $helpers = array('Time');
	    var $components = array('RequestHandler');
	         var $live_site = 'http://rest-api.quinnsupplee.com';

     var $app_name = 'REST API with XML and CakePHP Demo ';
	
	    function index (){    
	
	        $this->loadModel('Doc');
			$this->Doc->recursive= -1;
			
			$this->paginate = array(
		        'conditions' => array('Doc.enabled' => 1),
		        'limit' => 100
		    );
		    $docs = $this->paginate('Doc');
		    $this->set(compact('docs'));
		    Configure::write ('debug', 0);
		    
		    $this->loadModel('Video');
			$this->Video->recursive= -1;
			$this->paginate = array(
		        'conditions' => array('Video.status' => 'PUBLISHED'),
		        'limit' => 1000
		    );
		    $videos = $this->paginate('Video');
		    $this->set(compact('videos'));
		    Configure::write ('debug', 0);
	    }
	}
?>