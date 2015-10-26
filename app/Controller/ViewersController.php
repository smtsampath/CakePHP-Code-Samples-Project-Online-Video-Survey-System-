<?php
App::uses('AppController', 'Controller');
/**
 * Viewers Controller
 *
 * @property Viewer $Viewer
 */
class ViewersController extends AppController {


/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Viewer->recursive = 0;
        $this->set('viewers', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Viewer->id = $id;
        if (!$this->Viewer->exists()) {
            throw new NotFoundException(__('Invalid viewer'));
        }
        $this->set('viewer', $this->Viewer->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $user_id = $this->Auth->user('id');
        $viewer = null;
        $opts['conditions'] = array('Viewer.user_id' => $user_id);
        $viewer = $this->Viewer->find('first', $opts);
        
        $whitelist = $this->Viewer->getViewerFromUserId($user_id);
        $cleanData = array();
       
        if (empty($viewer)){
            if ($this->request->is('post')) {
//             if (($this->data['Viewer']['employment'] == 'Part time' || $this->data['Viewer']['employment'] == 'Full time'  || $this->data['Viewer']['employment'] == 'Self employed')&& (empty($this->data['Viewer']['designation']))) {
//                 $this->Session->setFlash(__('Please enter your designation')); 
//                 $this->redirect('/viewers/edit/');
//             }
                $this->Viewer->create();
                $this->request->data['Viewer']['user_id'] = $user_id;
                $this->request->data['Viewer']['country'] = 'Sri lanka';
                $cleanData['Viewer'] = $this->Viewer->getWhitelistedArray($this->data['Viewer'], $whitelist);
                if ($this->Viewer->save($cleanData)) {
//                    if ($cleanData['Viewer']['employment'] == 'Part time' || $cleanData['Viewer']['employment'] == 'Full time'  || $cleanData['Viewer']['employment'] == 'Self employed') {
//                        $this->Session->setFlash(__('Please enter your designation')); 
//                    	$this->redirect('/viewers/edit/');
//                    }
                    $this->Session->setFlash(__('The viewer has been saved'));   
                    $this->redirect('/users/home/');
        
                } else {
                    $this->Session->setFlash(__('The viewer could not be saved. Please, try again.'));
                }
            }
        }else{
             $this->redirect('/viewers/edit');
        }
            
        $users = $this->Viewer->User->find('list');
        $this->set(compact('users'));

        
        
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit() {
        $user_id = $this->Auth->user('id');
        $opts['conditions'] = array('Viewer.user_id' => $user_id);
        $viewer = $this->Viewer->find('first', $opts);
        $id = $viewer['Viewer']['id'];
        
        $whitelist = $this->Viewer->getViewerFromUserId($user_id);
        $cleanData = array();
         
        $this->layout = 'users_default';
        $this->Viewer->id = $id;
        if (!$this->Viewer->exists()) {
            throw new NotFoundException(__('Invalid viewer'));
        }
        
        
        if ($this->request->is('post') || $this->request->is('put')) {
//        	if ($this->request->data['Viewer']['employment'] == 'Unemployed' || $this->request->data['Viewer']['employment'] == 'Student' ||  $this->request->data['Viewer']['employment'] == 'Housewife') {
//        		$this->request->data['Viewer']['designation'] == 'none'; 
//        	}
        	$this->request->data['Viewer']['country'] = 'Sri lanka';
            $this->request->data['PaymentDetail']['user_id'] = $this->Auth->user('id');
        
         $cleanData['Viewer'] = $this->Viewer->getWhitelistedArray($this->data['Viewer'], $whitelist);
            
            //prd($cleanData);
            if ($this->Viewer->save($cleanData)) {
//                     if (($cleanData['Viewer']['employment'] == 'Part time' || $cleanData['Viewer']['employment'] == 'Full time'  || $cleanData['Viewer']['employment'] == 'Self employed') && (empty($cleanData['Viewer']['designation'])))  {
//                         $this->Session->setFlash(__('Please enter your designation')); 
//                     	$this->redirect('/viewers/edit/');
//                    
//                    }
                $this->Session->setFlash(__('The viewer has been saved'));
                $this->redirect('/users/accounts');
            } else {
                $this->Session->setFlash(__('The viewer could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Viewer->read(null, $id);
        }
        $users = $this->Viewer->User->find('list');
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
        $this->Viewer->id = $id;
        if (!$this->Viewer->exists()) {
            throw new NotFoundException(__('Invalid viewer'));
        }
        if ($this->Viewer->delete()) {
            $this->Session->setFlash(__('Viewer deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Viewer was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Viewer->recursive = 0;
        $this->paginate             = array(
                                            'Viewer' => array(
                                                        'order'         => array('Viewer.id' => 'desc')
                                                        )
                                            );
        $this->set('viewers', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Viewer->id = $id;
        if (!$this->Viewer->exists()) {
            throw new NotFoundException(__('Invalid viewer'));
        }
        $this->set('viewer', $this->Viewer->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Viewer->create();
            if ($this->Viewer->save($this->request->data)) {
                $this->Session->setFlash(__('The viewer has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The viewer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Viewer->User->find('list');
        $this->set(compact('users'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Viewer->id = $id;
        if (!$this->Viewer->exists()) {
            throw new NotFoundException(__('Invalid viewer'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Viewer->save($this->request->data)) {
                $this->Session->setFlash(__('The viewer has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The viewer could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Viewer->read(null, $id);
        }
        $this->loadModel('User');
        $this->User->recursive = -1;
        $opts['conditions'] = array('User.group_id' => 2);
        $users = $this->Viewer->User->find('list', $opts);
        $this->set(compact('users'));
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
        $this->Viewer->id = $id;
        if (!$this->Viewer->exists()) {
            throw new NotFoundException(__('Invalid viewer'));
        }
        if ($this->Viewer->delete()) {
            $this->Session->setFlash(__('Viewer deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Viewer was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
