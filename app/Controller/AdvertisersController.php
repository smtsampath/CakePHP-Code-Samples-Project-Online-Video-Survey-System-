<?php
App::uses('AppController', 'Controller');
/**
 * Advertisers Controller
 *
 * @property Advertiser $Advertiser
 */
class AdvertisersController extends AppController {

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Advertiser->recursive = 0;
		$this->set('advertisers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Advertiser->id = $id;
		if (!$this->Advertiser->exists()) {
			throw new NotFoundException(__('Invalid advertiser'));
		}
		$this->set('advertiser', $this->Advertiser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Advertiser->create();
			$this->request->data['Advertiser']['user_id'] = $this->Auth->user('id'); 
			if ($this->Advertiser->save($this->request->data)) {
				$this->Session->setFlash(__('The advertiser has been saved'));
				$this->redirect('/advertisers/home');
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.'));
			}
		}
		$users = $this->Advertiser->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'users_default';
		$this->Advertiser->id = $id;
		if (!$this->Advertiser->exists()) {
			throw new NotFoundException(__('Invalid advertiser'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Advertiser']['user_id'] = $this->Auth->user('id'); 
			if ($this->Advertiser->save($this->request->data)) {
				$this->Session->setFlash(__('The advertiser has been saved'));
				$this->redirect('/advertisers/accounts');
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Advertiser->read(null, $id);
		}
		$users = $this->Advertiser->User->find('list');
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
		$this->Advertiser->id = $id;
		if (!$this->Advertiser->exists()) {
			throw new NotFoundException(__('Invalid advertiser'));
		}
		if ($this->Advertiser->delete()) {
			$this->Session->setFlash(__('Advertiser deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Advertiser was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Advertiser->recursive = 0;
		$this->set('advertisers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Advertiser->id = $id;
		if (!$this->Advertiser->exists()) {
			throw new NotFoundException(__('Invalid advertiser'));
		}
		$this->set('advertiser', $this->Advertiser->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Advertiser->create();
			if ($this->Advertiser->save($this->request->data)) {
				$this->Session->setFlash(__('The advertiser has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('User');
		$this->User->recursive = -1;
		$opts['conditions']	= array('User.group_id' => 3);
		$users = $this->Advertiser->User->find('list', $opts);
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Advertiser->id = $id;
		if (!$this->Advertiser->exists()) {
			throw new NotFoundException(__('Invalid advertiser'));
		}
		if ($this->request->is('post') || $this->request->is('put')) { 
			if ($this->Advertiser->save($this->request->data)) {
				$this->Session->setFlash(__('The advertiser has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertiser could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Advertiser->read(null, $id);
		}
		$this->loadModel('User');
		$this->User->recursive = -1;
		$opts['conditions']	= array('User.group_id' => 3);
		$users = $this->Advertiser->User->find('list', $opts);
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
		$this->Advertiser->id = $id;
		if (!$this->Advertiser->exists()) {
			throw new NotFoundException(__('Invalid advertiser'));
		}
		if ($this->Advertiser->delete()) {
			$this->Session->setFlash(__('Advertiser deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Advertiser was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
