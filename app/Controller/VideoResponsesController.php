<?php
App::uses('AppController', 'Controller');
/**
 * VideoResponses Controller
 *
 * @property VideoResponse $VideoResponse
 */
class VideoResponsesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VideoResponse->recursive = 0;
		$this->set('videoResponses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VideoResponse->id = $id;
		if (!$this->VideoResponse->exists()) {
			throw new NotFoundException(__('Invalid video response'));
		}
		$this->set('videoResponse', $this->VideoResponse->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VideoResponse->create();
			if ($this->VideoResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The video response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video response could not be saved. Please, try again.'));
			}
		}
		$videoLogs = $this->VideoResponse->VideoLog->find('list');
		$videoFeedbacks = $this->VideoResponse->VideoFeedback->find('list');
		$videoFeedbackOptions = $this->VideoResponse->VideoFeedbackOption->find('list');
		$this->set(compact('videoLogs', 'videoFeedbacks', 'videoFeedbackOptions'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VideoResponse->id = $id;
		if (!$this->VideoResponse->exists()) {
			throw new NotFoundException(__('Invalid video response'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The video response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video response could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoResponse->read(null, $id);
		}
		$videoLogs = $this->VideoResponse->VideoLog->find('list');
		$videoFeedbacks = $this->VideoResponse->VideoFeedback->find('list');
		$videoFeedbackOptions = $this->VideoResponse->VideoFeedbackOption->find('list');
		$this->set(compact('videoLogs', 'videoFeedbacks', 'videoFeedbackOptions'));
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
		$this->VideoResponse->id = $id;
		if (!$this->VideoResponse->exists()) {
			throw new NotFoundException(__('Invalid video response'));
		}
		if ($this->VideoResponse->delete()) {
			$this->Session->setFlash(__('Video response deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video response was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->VideoResponse->recursive = 0;
		$this->set('videoResponses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->VideoResponse->id = $id;
		if (!$this->VideoResponse->exists()) {
			throw new NotFoundException(__('Invalid video response'));
		}
		$this->set('videoResponse', $this->VideoResponse->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->VideoResponse->create();
			if ($this->VideoResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The video response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video response could not be saved. Please, try again.'));
			}
		}
		$videoLogs = $this->VideoResponse->VideoLog->find('list');
		$videoFeedbacks = $this->VideoResponse->VideoFeedback->find('list');
		$videoFeedbackOptions = $this->VideoResponse->VideoFeedbackOption->find('list');
		$this->set(compact('videoLogs', 'videoFeedbacks', 'videoFeedbackOptions'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->VideoResponse->id = $id;
		if (!$this->VideoResponse->exists()) {
			throw new NotFoundException(__('Invalid video response'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The video response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video response could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoResponse->read(null, $id);
		}
		$videoLogs = $this->VideoResponse->VideoLog->find('list');
		$videoFeedbacks = $this->VideoResponse->VideoFeedback->find('list');
		$videoFeedbackOptions = $this->VideoResponse->VideoFeedbackOption->find('list');
		$this->set(compact('videoLogs', 'videoFeedbacks', 'videoFeedbackOptions'));
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
		$this->VideoResponse->id = $id;
		if (!$this->VideoResponse->exists()) {
			throw new NotFoundException(__('Invalid video response'));
		}
		if ($this->VideoResponse->delete()) {
			$this->Session->setFlash(__('Video response deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video response was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
