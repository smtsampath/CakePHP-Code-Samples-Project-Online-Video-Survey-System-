<?php
App::uses('AppController', 'Controller');
/**
 * CompetitionsVotes Controller
 *
 * @property CompetitionsVote $CompetitionsVote
 */
class CompetitionsVotesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CompetitionsVote->recursive = 0;
		$this->set('competitionsVotes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CompetitionsVote->id = $id;
		if (!$this->CompetitionsVote->exists()) {
			throw new NotFoundException(__('Invalid competitions vote'));
		}
		$this->set('competitionsVote', $this->CompetitionsVote->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CompetitionsVote->create();
			if ($this->CompetitionsVote->save($this->request->data)) {
				$this->Session->setFlash(__('The competitions vote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competitions vote could not be saved. Please, try again.'));
			}
		}
		$users = $this->CompetitionsVote->User->find('list');
		$competitions = $this->CompetitionsVote->Competition->find('list');
		$this->set(compact('users', 'competitions'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CompetitionsVote->id = $id;
		if (!$this->CompetitionsVote->exists()) {
			throw new NotFoundException(__('Invalid competitions vote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CompetitionsVote->save($this->request->data)) {
				$this->Session->setFlash(__('The competitions vote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competitions vote could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CompetitionsVote->read(null, $id);
		}
		$users = $this->CompetitionsVote->User->find('list');
		$competitions = $this->CompetitionsVote->Competition->find('list');
		$this->set(compact('users', 'competitions'));
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
		$this->CompetitionsVote->id = $id;
		if (!$this->CompetitionsVote->exists()) {
			throw new NotFoundException(__('Invalid competitions vote'));
		}
		if ($this->CompetitionsVote->delete()) {
			$this->Session->setFlash(__('Competitions vote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competitions vote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CompetitionsVote->recursive = 0;
		$this->set('competitionsVotes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CompetitionsVote->id = $id;
		if (!$this->CompetitionsVote->exists()) {
			throw new NotFoundException(__('Invalid competitions vote'));
		}
		$this->set('competitionsVote', $this->CompetitionsVote->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CompetitionsVote->create();
			if ($this->CompetitionsVote->save($this->request->data)) {
				$this->Session->setFlash(__('The competitions vote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competitions vote could not be saved. Please, try again.'));
			}
		}
		$users = $this->CompetitionsVote->User->find('list');
		$competitions = $this->CompetitionsVote->Competition->find('list');
		$this->set(compact('users', 'competitions'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CompetitionsVote->id = $id;
		if (!$this->CompetitionsVote->exists()) {
			throw new NotFoundException(__('Invalid competitions vote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CompetitionsVote->save($this->request->data)) {
				$this->Session->setFlash(__('The competitions vote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competitions vote could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CompetitionsVote->read(null, $id);
		}
		$users = $this->CompetitionsVote->User->find('list');
		$competitions = $this->CompetitionsVote->Competition->find('list');
		$this->set(compact('users', 'competitions'));
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
		$this->CompetitionsVote->id = $id;
		if (!$this->CompetitionsVote->exists()) {
			throw new NotFoundException(__('Invalid competitions vote'));
		}
		if ($this->CompetitionsVote->delete()) {
			$this->Session->setFlash(__('Competitions vote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competitions vote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
