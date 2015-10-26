<?php
App::uses('AppController', 'Controller');
/**
 * VideoFeedbackOptions Controller
 *
 * @property VideoFeedbackOption $VideoFeedbackOption
 */
class VideoFeedbackOptionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VideoFeedbackOption->recursive = 0;
		$this->set('videoFeedbackOptions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VideoFeedbackOption->id = $id;
		if (!$this->VideoFeedbackOption->exists()) {
			throw new NotFoundException(__('Invalid video feedback option'));
		}
		$this->set('videoFeedbackOption', $this->VideoFeedbackOption->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VideoFeedbackOption->create();
			if ($this->VideoFeedbackOption->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback option could not be saved. Please, try again.'));
			}
		}
		$videoFeedbacks = $this->VideoFeedbackOption->VideoFeedback->find('list');
		$this->set(compact('videoFeedbacks'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VideoFeedbackOption->id = $id;
		if (!$this->VideoFeedbackOption->exists()) {
			throw new NotFoundException(__('Invalid video feedback option'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoFeedbackOption->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback option could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoFeedbackOption->read(null, $id);
		}
		$videoFeedbacks = $this->VideoFeedbackOption->VideoFeedback->find('list');
		$this->set(compact('videoFeedbacks'));
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
		$this->VideoFeedbackOption->id = $id;
		if (!$this->VideoFeedbackOption->exists()) {
			throw new NotFoundException(__('Invalid video feedback option'));
		}
		if ($this->VideoFeedbackOption->delete()) {
			$this->Session->setFlash(__('Video feedback option deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video feedback option was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->VideoFeedbackOption->recursive = 0;
		$this->set('videoFeedbackOptions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->VideoFeedbackOption->id = $id;
		if (!$this->VideoFeedbackOption->exists()) {
			throw new NotFoundException(__('Invalid video feedback option'));
		}
		$this->set('videoFeedbackOption', $this->VideoFeedbackOption->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($id = null) {
		$this->set('videofeedback' , $id);
		if ($this->request->is('post')) {
			$this->VideoFeedbackOption->create();
	       	if (!empty($id)) {
              $this->request->data['VideoFeedbackOption']['video_feedback_id'] = $id; 
            }
			if ($this->VideoFeedbackOption->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback option has been saved'));
				if (!empty($id)) {
					$this->redirect(array('controller' => 'videoFeedbacks',  'action' => 'view', $id));
				}
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback option could not be saved. Please, try again.'));
			}
		}
		$videoFeedbacks = $this->VideoFeedbackOption->VideoFeedback->find('list');
		$this->set(compact('videoFeedbacks'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null, $v_id = null) {
		$this->set('videofeedback' , $v_id);
		$this->VideoFeedbackOption->id = $id;
		if (!$this->VideoFeedbackOption->exists()) {
			throw new NotFoundException(__('Invalid video feedback option'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		    if (!empty($v_id)) {
              $this->request->data['VideoFeedbackOption']['video_feedback_id'] = $v_id; 
            }
			if ($this->VideoFeedbackOption->save($this->request->data)) {
				$this->Session->setFlash(__('The video feedback option has been saved'));
			    if (!empty($v_id)) {
                    $this->redirect(array('controller' => 'videoFeedbacks',  'action' => 'view', $v_id));
                }
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video feedback option could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoFeedbackOption->read(null, $id);
		}
		$videoFeedbacks = $this->VideoFeedbackOption->VideoFeedback->find('list');
		$this->set(compact('videoFeedbacks'));
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
		$this->VideoFeedbackOption->id = $id;
		if (!$this->VideoFeedbackOption->exists()) {
			throw new NotFoundException(__('Invalid video feedback option'));
		}
		if ($this->VideoFeedbackOption->delete()) {
			$this->Session->setFlash(__('Video feedback option deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video feedback option was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
