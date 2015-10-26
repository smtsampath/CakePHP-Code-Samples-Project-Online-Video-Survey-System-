<?php
App::uses('AppController', 'Controller');
/**
 * VideoFeedbacks Controller
 *
 * @property VideoFeedback $VideoFeedback
 */
class VideoFeedbacksController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VideoFeedback->recursive = 0;
		$this->set('videoFeedbacks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VideoFeedback->id = $id;
		if (!$this->VideoFeedback->exists()) {
			throw new NotFoundException(__('Invalid video feedback'));
		}
		$this->set('videoFeedback', $this->VideoFeedback->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VideoFeedback->create();
			if ($this->VideoFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback could not be saved. Please, try again.'));
			}
		}
		$videos = $this->VideoFeedback->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VideoFeedback->id = $id;
		if (!$this->VideoFeedback->exists()) {
			throw new NotFoundException(__('Invalid video feedback'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoFeedback->read(null, $id);
		}
		$videos = $this->VideoFeedback->Video->find('list');
		$this->set(compact('videos'));
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
		$this->VideoFeedback->id = $id;
		if (!$this->VideoFeedback->exists()) {
			throw new NotFoundException(__('Invalid video feedback'));
		}
		if ($this->VideoFeedback->delete()) {
			$this->Session->setFlash(__('Video feedback deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video feedback was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->VideoFeedback->recursive = 0;
		$this->set('videoFeedbacks', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->VideoFeedback->id = $id;
		if (!$this->VideoFeedback->exists()) {
			throw new NotFoundException(__('Invalid video feedback'));
		}
		$this->set('videoFeedback', $this->VideoFeedback->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($id=null) {
		if ($this->request->is('post')) {
			$this->VideoFeedback->create();
			$this->request->data['VideoFeedback']['video_id'] = $id;
			if ($this->VideoFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback has been saved'));
				$this->redirect(array('controller'=>'videos','action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The video feedback could not be saved. Please, try again.'));
			}
		}
		$videos = $this->VideoFeedback->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->VideoFeedback->id = $id;
		if (!$this->VideoFeedback->exists()) {
			throw new NotFoundException(__('Invalid video feedback'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoFeedback->read(null, $id);
		}
		$videos = $this->VideoFeedback->Video->find('list');
		$this->set(compact('videos'));
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
		$this->VideoFeedback->id = $id;
		if (!$this->VideoFeedback->exists()) {
			throw new NotFoundException(__('Invalid video feedback'));
		}
		if ($this->VideoFeedback->delete()) {
			$this->Session->setFlash(__('Video feedback deleted'));
			$this->redirect(array('controller'=>'videos','action' => 'index'));
		}
		$this->Session->setFlash(__('Video feedback was not deleted'));
		$this->redirect(array('controller'=>'videos','action' => 'index'));
	}
}
