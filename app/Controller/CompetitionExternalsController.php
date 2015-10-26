<?php
App::uses('AppController', 'Controller');
/**
 * CompetitionExternals Controller
 *
 * @property CompetitionExternal $CompetitionExternal
 */
class CompetitionExternalsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CompetitionExternal->recursive = 0;
		$this->set('competitionExternals', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CompetitionExternal->id = $id;
		if (!$this->CompetitionExternal->exists()) {
			throw new NotFoundException(__('Invalid competition external'));
		}
		$this->set('competitionExternal', $this->CompetitionExternal->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CompetitionExternal->create();
			if ($this->CompetitionExternal->save($this->request->data)) {
				$this->Session->setFlash(__('The competition external has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition external could not be saved. Please, try again.'));
			}
		}
		$competitions = $this->CompetitionExternal->Competition->find('list');
		$videos = $this->CompetitionExternal->Video->find('list');
		$this->set(compact('competitions', 'videos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CompetitionExternal->id = $id;
		if (!$this->CompetitionExternal->exists()) {
			throw new NotFoundException(__('Invalid competition external'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CompetitionExternal->save($this->request->data)) {
				$this->Session->setFlash(__('The competition external has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition external could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CompetitionExternal->read(null, $id);
		}
		$competitions = $this->CompetitionExternal->Competition->find('list');
		$videos = $this->CompetitionExternal->Video->find('list');
		$this->set(compact('competitions', 'videos'));
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
		$this->CompetitionExternal->id = $id;
		if (!$this->CompetitionExternal->exists()) {
			throw new NotFoundException(__('Invalid competition external'));
		}
		if ($this->CompetitionExternal->delete()) {
			$this->Session->setFlash(__('Competition external deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competition external was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CompetitionExternal->recursive = 0;
		$this->set('competitionExternals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->CompetitionExternal->id = $id;
		if (!$this->CompetitionExternal->exists()) {
			throw new NotFoundException(__('Invalid competition external'));
		}
		$this->set('competitionExternal', $this->CompetitionExternal->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CompetitionExternal->create();
			if ($this->CompetitionExternal->save($this->request->data)) {
				$this->Session->setFlash(__('The competition external has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition external could not be saved. Please, try again.'));
			}
		}
		$competitions = $this->CompetitionExternal->Competition->find('list');
		$this->set(compact('competitions'));		
	
		$this->loadModel('Video');
		$this->Video->recursive= -1;
		$videos = $this->Video->find('all');
		$this->set('videos', $videos);
		
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->CompetitionExternal->id = $id;
		if (!$this->CompetitionExternal->exists()) {
			throw new NotFoundException(__('Invalid competition external'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CompetitionExternal->save($this->request->data)) {
				$this->Session->setFlash(__('The competition external has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition external could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CompetitionExternal->read(null, $id);
		}
		$competitions = $this->CompetitionExternal->Competition->find('list');
		$videos = $this->CompetitionExternal->Video->find('list');
		$this->set(compact('competitions', 'videos'));
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
		$this->CompetitionExternal->id = $id;
		if (!$this->CompetitionExternal->exists()) {
			throw new NotFoundException(__('Invalid competition external'));
		}
		if ($this->CompetitionExternal->delete()) {
			$this->Session->setFlash(__('Competition external deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competition external was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
