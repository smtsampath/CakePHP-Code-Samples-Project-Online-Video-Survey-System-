<?php
App::uses('AppController', 'Controller');
/**
 * Competitions Controller
 *
 * @property Competition $Competition
 */
class CompetitionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Competition->recursive = 0;
		$this->set('competitions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		$this->set('competition', $this->Competition->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Competition->create();
			if ($this->Competition->save($this->request->data)) {
				$this->Session->setFlash(__('The competition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Competition->save($this->request->data)) {
				$this->Session->setFlash(__('The competition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Competition->read(null, $id);
		}
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
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		if ($this->Competition->delete()) {
			$this->Session->setFlash(__('Competition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Competition->recursive = 0;
		$this->set('competitions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		$this->set('competition', $this->Competition->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Competition->create();
			if ($this->Competition->save($this->request->data)) {
				$this->Session->setFlash(__('The competition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Competition->save($this->request->data)) {
				$this->Session->setFlash(__('The competition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Competition->read(null, $id);
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
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		if ($this->Competition->delete()) {
			$this->Session->setFlash(__('Competition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
