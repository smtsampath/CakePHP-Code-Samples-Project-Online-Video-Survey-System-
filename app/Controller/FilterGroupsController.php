<?php
App::uses('AppController', 'Controller');
/**
 * FilterGroups Controller
 *
 * @property FilterGroup $FilterGroup
 */
class FilterGroupsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FilterGroup->recursive = 0;
		$this->set('filterGroups', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FilterGroup->id = $id;
		if (!$this->FilterGroup->exists()) {
			throw new NotFoundException(__('Invalid filter group'));
		}
		$this->set('filterGroup', $this->FilterGroup->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FilterGroup->create();
			if ($this->FilterGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The filter group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter group could not be saved. Please, try again.'));
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
		$this->FilterGroup->id = $id;
		if (!$this->FilterGroup->exists()) {
			throw new NotFoundException(__('Invalid filter group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FilterGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The filter group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FilterGroup->read(null, $id);
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
		$this->FilterGroup->id = $id;
		if (!$this->FilterGroup->exists()) {
			throw new NotFoundException(__('Invalid filter group'));
		}
		if ($this->FilterGroup->delete()) {
			$this->Session->setFlash(__('Filter group deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Filter group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FilterGroup->recursive = 0;
		$this->set('filterGroups', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->FilterGroup->id = $id;
		if (!$this->FilterGroup->exists()) {
			throw new NotFoundException(__('Invalid filter group'));
		}
		$this->set('filterGroup', $this->FilterGroup->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FilterGroup->create();
			if ($this->FilterGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The filter group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter group could not be saved. Please, try again.'));
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
		$this->FilterGroup->id = $id;
		if (!$this->FilterGroup->exists()) {
			throw new NotFoundException(__('Invalid filter group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FilterGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The filter group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filter group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FilterGroup->read(null, $id);
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
		$this->FilterGroup->id = $id;
		if (!$this->FilterGroup->exists()) {
			throw new NotFoundException(__('Invalid filter group'));
		}
		if ($this->FilterGroup->delete()) {
			$this->Session->setFlash(__('Filter group deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Filter group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
