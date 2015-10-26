<?php
App::uses('AppController', 'Controller');
/**
 * VideoLogs Controller
 *
 * @property VideoLog $VideoLog
 */
class VideoLogsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VideoLog->recursive = 0;
		$this->set('videoLogs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VideoLog->id = $id;
		if (!$this->VideoLog->exists()) {
			throw new NotFoundException(__('Invalid video log'));
		}
		$this->set('videoLog', $this->VideoLog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VideoLog->create();
			if ($this->VideoLog->save($this->request->data)) {
				$this->Session->setFlash(__('The video log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video log could not be saved. Please, try again.'));
			}
		}
		$users = $this->VideoLog->User->find('list');
		$videos = $this->VideoLog->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * clear method
 *
 * @param string $id
 * @return void
 */	
	function admin_clear($u_id = null){
		      //prd($u_id);
        if ($u_id == 36){
            $this->VideoLog->clearTestLogs($u_id);
            $this->Session->setFlash(__('The video test logs have been cleared'));
             $this->redirect(array('controller'=>'users', 'action' => 'index'));
        }
		
	}
	
/**
 * create method
 *
 * @param string $id
 * @return void
 */
	
	function create($id = null) {
		$this->autoRender = true; 

		$this->VideoLog->video_id = $id;
		$data = array();
		
		if ($this->request->is('post')) {
				
		    $this->loadModel('VideoResponse');
			$xdatas = $this->data['VideoResponse'];
          //  
         
			foreach ($xdatas as   $xdata) {
				
				//prd($xdata['video_feedback_option_id']);
				if ($xdata['video_feedback_option_id'] == null){
					echo json_encode(array('error' => '1'));
					die();
				}
			}
		
			$this->request->data['VideoLog']['user_id'] 	= $this->Auth->user('id');
			$this->request->data['VideoLog']['video_id'] 	= $id;
			
			$this->VideoLog->create();
			if ($this->VideoLog->save($this->request->data)) {
			
				echo json_encode(array('success' => '1'));
			
			} else {
				echo json_encode(array('error' => '2'));
			}
			die();
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VideoLog->id = $id;
		if (!$this->VideoLog->exists()) {
			throw new NotFoundException(__('Invalid video log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoLog->save($this->request->data)) {
				$this->Session->setFlash(__('The video log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoLog->read(null, $id);
		}
		$users = $this->VideoLog->User->find('list');
		$videos = $this->VideoLog->Video->find('list');
		$this->set(compact('users', 'videos'));
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
		$this->VideoLog->id = $id;
		if (!$this->VideoLog->exists()) {
			throw new NotFoundException(__('Invalid video log'));
		}
		if ($this->VideoLog->delete()) {
			$this->Session->setFlash(__('Video log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->loadModel('Video');
		$this->VideoLog->recursive 	= 0;
		$videos 					= array ();
		$videos 					= $this->Video->getAllVideos();
		$uniqueCounts 				= array();
		$i =0;
		foreach ($videos as $video) {
			$opts['conditions'] 	= array('VideoLog.video_id'=> $video['Video']['id']);
			$uniqueCounts[$i] 		= $this->VideoLog->find('count',$opts);
			$i++;
		}
		$this->set('videos', $videos, $this->paginate());
		$this->set('uniqueCounts', $uniqueCounts);
	}
	
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->VideoLog->id = $id;
		if (!$this->VideoLog->exists()) {
			throw new NotFoundException(__('Invalid video log'));
		}
		$this->set('videoLog', $this->VideoLog->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->VideoLog->create();
			if ($this->VideoLog->save($this->request->data)) {
				$this->Session->setFlash(__('The video log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video log could not be saved. Please, try again.'));
			}
		}
		$users = $this->VideoLog->User->find('list');
		$videos = $this->VideoLog->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->VideoLog->id = $id;
		if (!$this->VideoLog->exists()) {
			throw new NotFoundException(__('Invalid video log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoLog->save($this->request->data)) {
				$this->Session->setFlash(__('The video log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoLog->read(null, $id);
		}
		$users = $this->VideoLog->User->find('list');
		$videos = $this->VideoLog->Video->find('list');
		$this->set(compact('users', 'videos'));
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
		$this->VideoLog->id = $id;
		if (!$this->VideoLog->exists()) {
			throw new NotFoundException(__('Invalid video log'));
		}
		if ($this->VideoLog->delete()) {
			$this->Session->setFlash(__('Video log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
