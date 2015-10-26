<?php
App::uses('AppController', 'Controller');
/**
 * UserFilters Controller
 *
 * @property UserFilter $UserFilter
 */
class UserFiltersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserFilter->recursive = 0;
		$this->set('userFilters', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserFilter->id = $id;
		if (!$this->UserFilter->exists()) {
			throw new NotFoundException(__('Invalid user filter'));
		}
		$this->set('userFilter', $this->UserFilter->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserFilter->create();
			if ($this->UserFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The user filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user filter could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserFilter->User->find('list');
		$filters = $this->UserFilter->Filter->find('list');
		$this->set(compact('users', 'filters'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserFilter->id = $id;
		if (!$this->UserFilter->exists()) {
			throw new NotFoundException(__('Invalid user filter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The user filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user filter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserFilter->read(null, $id);
		}
		$users = $this->UserFilter->User->find('list');
		$filters = $this->UserFilter->Filter->find('list');
		$this->set(compact('users', 'filters'));
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
		$this->UserFilter->id = $id;
		if (!$this->UserFilter->exists()) {
			throw new NotFoundException(__('Invalid user filter'));
		}
		if ($this->UserFilter->delete()) {
			$this->Session->setFlash(__('User filter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User filter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserFilter->recursive = 0;
		$this->set('userFilters', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->UserFilter->id = $id;
		if (!$this->UserFilter->exists()) {
			throw new NotFoundException(__('Invalid user filter'));
		}
		$this->set('userFilter', $this->UserFilter->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserFilter->create();
			if ($this->UserFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The user filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user filter could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserFilter->User->find('list');
		$filters = $this->UserFilter->Filter->find('list');
		$this->set(compact('users', 'filters'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->UserFilter->id = $id;
		if (!$this->UserFilter->exists()) {
			throw new NotFoundException(__('Invalid user filter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The user filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user filter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserFilter->read(null, $id);
		}
		$users = $this->UserFilter->User->find('list');
		$filters = $this->UserFilter->Filter->find('list');
		$this->set(compact('users', 'filters'));
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
		$this->UserFilter->id = $id;
		if (!$this->UserFilter->exists()) {
			throw new NotFoundException(__('Invalid user filter'));
		}
		if ($this->UserFilter->delete()) {
			$this->Session->setFlash(__('User filter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User filter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
