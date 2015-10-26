<?php
App::uses('AppController', 'Controller');
/**
 * CreditLogs Controller
 *
 * @property CreditLog $CreditLog
 */
class CreditLogsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CreditLog->recursive = 0;
		$this->set('creditLogs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CreditLog->id = $id;
		if (!$this->CreditLog->exists()) {
			throw new NotFoundException(__('Invalid credit log'));
		}
		$this->set('creditLog', $this->CreditLog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CreditLog->create();
			if ($this->CreditLog->save($this->request->data)) {
				$this->Session->setFlash(__('The credit log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit log could not be saved. Please, try again.'));
			}
		}
		$users = $this->CreditLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CreditLog->id = $id;
		if (!$this->CreditLog->exists()) {
			throw new NotFoundException(__('Invalid credit log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CreditLog->save($this->request->data)) {
				$this->Session->setFlash(__('The credit log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CreditLog->read(null, $id);
		}
		$users = $this->CreditLog->User->find('list');
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
		$this->CreditLog->id = $id;
		if (!$this->CreditLog->exists()) {
			throw new NotFoundException(__('Invalid credit log'));
		}
		if ($this->CreditLog->delete()) {
			$this->Session->setFlash(__('Credit log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Credit log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CreditLog->recursive = 0;
		$this->set('creditLogs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CreditLog->id = $id;
		if (!$this->CreditLog->exists()) {
			throw new NotFoundException(__('Invalid credit log'));
		}
		$this->set('creditLog', $this->CreditLog->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CreditLog->create();
			if ($this->CreditLog->save($this->request->data)) {
				$this->Session->setFlash(__('The credit log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit log could not be saved. Please, try again.'));
			}
		}
		$users = $this->CreditLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CreditLog->id = $id;
		if (!$this->CreditLog->exists()) {
			throw new NotFoundException(__('Invalid credit log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CreditLog->save($this->request->data)) {
				$this->Session->setFlash(__('The credit log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CreditLog->read(null, $id);
		}
		$users = $this->CreditLog->User->find('list');
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
		$this->CreditLog->id = $id;
		if (!$this->CreditLog->exists()) {
			throw new NotFoundException(__('Invalid credit log'));
		}
		if ($this->CreditLog->delete()) {
			$this->Session->setFlash(__('Credit log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Credit log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
