<?php
App::uses('AppController', 'Controller');
/**
 * Charities Controller
 *
 * @property Charity $Charity
 */
class CharitiesController extends AppController {


	
/**
 * donate method
 *
 * @return void
 */
    public function donate($id = null) {
    	
	    $logged_user_id         = $this->Auth->user('id');
	    $this->Charity->id      = $id;
	    $charity_user_id        = $this->Charity->find_user_id($id);
	    $this->loadModel('User');
	    $this->User->recursive  = -1;
	     $this->loadModel('CreditLog');
        $this->CreditLog->recursive  = -1;
          
        if (!$this->Charity->exists()) {
            throw new NotFoundException(__('Invalid charity'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
          $credits              = $this->request->data;
          $credits_to_transfer  = $credits['donate']['credit'];
          $users_credit_balace  = $this->User->findCurrentBalance($logged_user_id );
                    //prd($users_credit_balace);
          if ( $users_credit_balace >=  $credits_to_transfer) {
	          $this->User->donate_credits($charity_user_id, $logged_user_id, $credits_to_transfer);
	          
	          $currentbalance_user  = $this->User->findCurrentBalance( $logged_user_id);
	          $this->CreditLog->Deduct_donationCreditLog($logged_user_id, $credits_to_transfer, $currentbalance_user, $charity_user_id);
              $currentbalance_charity  = $this->User->findCurrentBalance( $charity_user_id);
	          $this->CreditLog->Add_donationCreditLog($charity_user_id, $credits_to_transfer, $currentbalance_charity, $logged_user_id);
	          $this->Session->setFlash(__('Thank you for the donation'));
	          $this->redirect(array('controller'=>'users', 'action' => 'viewer_home'));
          }else{
          	  $this->Session->setFlash(__('Your donation was unsuccessful. Your available balance is '.$users_credit_balace.'    eels'));
              $this->redirect(array('controller'=>'charities', 'action' => 'donate', $id));
          }
        }
              
    }
	
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Charity->recursive = 0;
		$this->set('charities', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Charity->id = $id;
		if (!$this->Charity->exists()) {
			throw new NotFoundException(__('Invalid charity'));
		}
		$this->set('charity', $this->Charity->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Charity->create();
			if ($this->Charity->save($this->request->data)) {
				$this->Session->setFlash(__('The charity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The charity could not be saved. Please, try again.'));
			}
		}
		$users = $this->Charity->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Charity->id = $id;
		if (!$this->Charity->exists()) {
			throw new NotFoundException(__('Invalid charity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Charity->save($this->request->data)) {
				$this->Session->setFlash(__('The charity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The charity could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Charity->read(null, $id);
		}
		$users = $this->Charity->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Charity->id = $id;
		if (!$this->Charity->exists()) {
			throw new NotFoundException(__('Invalid charity'));
		}
		if ($this->Charity->delete()) {
			$this->Session->setFlash(__('Charity deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Charity was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Charity->recursive = 0;
		$charities = $this->Charity->find('all');
		$this->set('charities',$charities, $this->paginate());
		
		$this->loadModel('User');
        $this->User->recursive   = -1;
		$charity_credits = array();
		$x = 0;
		foreach ($charities as $charity){
			$userId = $charity['Charity']['user_id'];
		    $charity_credits[$x] = $this->User->findCurrentBalance($userId);
		    $x++;
		  }
		 $this->set('charity_credits', $charity_credits);
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Charity->id = $id;
		if (!$this->Charity->exists()) {
			throw new NotFoundException(__('Invalid charity'));
		}
		$this->set('charity', $this->Charity->read(null, $id));
	}
	
	
	

    
    
  
    

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
        
         if (!empty($this->data)) {
			$this->Charity->create();
			if ($this->Charity->save($this->data)) {
			    if ($this->__processImage($this->Charity->id)) {
                    $this->Session->setFlash(__('The Charity has been saved', true));  
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->redirect('/admin/charities' );
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
            }
		}
		$opts['conditions'] = array('User.group_id' => '4');
		$users = $this->Charity->User->find('list', $opts);
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		 if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid image', true));
            $this->redirect(array('action' => 'index'));
        }       
		
		$this->Charity->id = $id;
		if (!$this->Charity->exists()) {
			throw new NotFoundException(__('Invalid charity'));
		}
		 if (!empty($this->data)) {
		if ($this->Charity->save($this->data)) {
                if ($this->__processImage($this->Charity->id)) {
                    $this->Session->setFlash(__('The image has been saved', true)); 
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->redirect('/admin/charities' );
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
            }
		} else {
			$this->request->data = $this->Charity->read(null, $id);
		}
		$users = $this->Charity->User->find('list');
		$this->set(compact('users'));
	}
	
/**
     * 
     * Saves the image. prepends the id
     * @param $fileName
     */
    function __processImage($id = 0) { 
        if (isset($_FILES) && !empty($_FILES)) {
            $ext    =  strtolower(substr($_FILES['theImage']['name'], strrpos($_FILES['theImage']['name'], '.') + 1));
            
            if (is_uploaded_file($_FILES['theImage']['tmp_name']) && $ext == 'jpg') {
                //move files
                $path   = WWW_ROOT . 'charity' . DS . $id . '.' . $ext;
                unlink($path); // in case the image is already there
                $this->__clearCache();
                return (@move_uploaded_file($_FILES['theImage']['tmp_name'], $path) !== false);
                
            }
        }
        return true;
    }   
    
    function __deleteImage($id = 0) {
        $path   = WWW_ROOT . 'charity' . DS . $id . '.jpg';
        @unlink($path); 
    }
    
    function __clearCache() {
        $path   = WWW_ROOT . 'cache' . DS;
        $files  = @scandir($path);
        if (is_array($files)) {
            foreach ($files as $file) {
                @unlink($path . $file);
            }
        }
    }

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Charity->id = $id;
		if (!$this->Charity->exists()) {
			throw new NotFoundException(__('Invalid charity'));
		}
		if ($this->Charity->delete()) {
			$this->Session->setFlash(__('Charity deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Charity was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
