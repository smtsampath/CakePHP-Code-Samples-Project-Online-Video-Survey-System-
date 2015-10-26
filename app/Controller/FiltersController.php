<?php
App::uses('AppController', 'Controller');
/**
 * Filters Controller
 *
 * @property Filter $Filter
 */
class FiltersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->recursive = 0;
		$this->set('filters', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		$this->set('filter', $this->Filter->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Filter->create();
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('The filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter could not be saved. Please, try again.'));
			}
		}
		$videoFilters = $this->Filter->VideoFilter->find('list');
		$this->set(compact('videoFilters'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('The filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Filter->read(null, $id);
		}
		$videoFilters = $this->Filter->VideoFilter->find('list');
		$this->set(compact('videoFilters'));
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
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		if ($this->Filter->delete()) {
			$this->Session->setFlash(__('Filter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Filter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Filter->recursive = 0;
		$this->set('filters', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		$this->set('filter', $this->Filter->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Filter->create();
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('The filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter could not be saved. Please, try again.'));
			}
		}
		$videoFilters = $this->Filter->VideoFilter->find('list');
		$this->set(compact('videoFilters'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Filter->save($this->request->data)) {
				$this->Session->setFlash(__('The filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Filter->read(null, $id);
		}
		$videoFilters = $this->Filter->VideoFilter->find('list');
		$this->set(compact('videoFilters'));
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
		$this->Filter->id = $id;
		if (!$this->Filter->exists()) {
			throw new NotFoundException(__('Invalid filter'));
		}
		if ($this->Filter->delete()) {
			$this->Session->setFlash(__('Filter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Filter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
