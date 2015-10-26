<?php
App::uses('AppController', 'Controller');
/**
 * VideoFilters Controller
 *
 * @property VideoFilter $VideoFilter
 */
class VideoFiltersController extends AppController {

var $helpers = array('Vimeo');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VideoFilter->recursive = 0;
		$this->set('videoFilters', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VideoFilter->id = $id;
		if (!$this->VideoFilter->exists()) {
			throw new NotFoundException(__('Invalid video filter'));
		}
		$this->set('videoFilter', $this->VideoFilter->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
	
			$this->VideoFilter->create();
			
			if ($this->VideoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The video filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video filter could not be saved. Please, try again.'));
			}
		}
		$videos = $this->VideoFilter->Video->find('list');
		$filters = $this->VideoFilter->Filter->find('list');
		$this->set(compact('videos', 'filters'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VideoFilter->id = $id;
		if (!$this->VideoFilter->exists()) {
			throw new NotFoundException(__('Invalid video filter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The video filter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video filter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoFilter->read(null, $id);
		}
		$videos = $this->VideoFilter->Video->find('list');
		$filters = $this->VideoFilter->Filter->find('list');
		$this->set(compact('videos', 'filters'));
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
		$this->VideoFilter->id = $id;
		if (!$this->VideoFilter->exists()) {
			throw new NotFoundException(__('Invalid video filter'));
		}
		if ($this->VideoFilter->delete()) {
			$this->Session->setFlash(__('Video filter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video filter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->VideoFilter->recursive = 0;
		$this->set('videoFilters', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->VideoFilter->id = $id;
		if (!$this->VideoFilter->exists()) {
			throw new NotFoundException(__('Invalid video filter'));
		}
		$this->set('videoFilter', $this->VideoFilter->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($id = null) {
//		$this->loadModel('Filter');
//        $this->Filter->recursive     = -1;
//        
		
		$this->loadModel('Video');
		$this->Video->recursive 	= -1;
		$opts['conditions'] 		= array('Video.id' => $id);
		$vid 						= $this->Video->find('first', $opts);
		if ($vid['Video']['target']=="CUSTOM"){
			if ($this->request->is('post')) {			
				$items 		= array();		
			 	$x			= 0;
				foreach ($this->data['Filter'] as $filter_name => $value) {
					
					if($filter_name  		== 'district'){
							$y	= 2;
					} elseif($filter_name  	== 'city'){
							$y	= 3;
					} elseif($filter_name  	== 'gender'){
							$y	= 4;
					} elseif($filter_name  	== 'income'){
							$y 	= 5;
					} elseif ($filter_name	== 'age'){
						    $y	= 7;
					}
			   		if(!empty($value)) {
						$items[$x] 		= array(
													'filter_id' => $y,
													'value' 	=> $value
												);
					$x++;
					}
				}
				
				foreach ($items as $item){
					$this->VideoFilter->create();
					$this->request->data['VideoFilter']['video_id'] 	= $id;
					$this->request->data['VideoFilter']['filter_id'] 	= $item['filter_id'];
					$this->request->data['VideoFilter']['value'] 		= $item['value'];
					if ($this->VideoFilter->save($this->request->data)) {
						$this->Session->setFlash(__('The video filter has been saved'));
						if (!empty($id)){
						$this->redirect(array('controller' => 'videos',  'action' => 'view', $id));
						}
					} else {
						$this->Session->setFlash(__('The video filter could not be saved. Please, try again.'));
					}			
				}
				
			}
			$videos 	= $this->VideoFilter->Video->find('list');
			$filters 	= $this->VideoFilter->Filter->find('list');
			$this->set(compact('videos', 'filters'));
		} else {		
			$this->redirect(array('controller'=>'videos','action' => 'view', $id));
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null, $v_id = null) {
		$this->VideoFilter->id = $id;
		if (!$this->VideoFilter->exists()) {
			throw new NotFoundException(__('Invalid video filter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The video filter has been saved'));
				if (!empty($v_id)) {
	                $this->redirect(array('controller' => 'videos',  'action' => 'view', $v_id));
	            }else{
	            $this->redirect(array('action' => 'index'));
	            }
				//$this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(__('The video filter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VideoFilter->read(null, $id);
		}
		$videos = $this->VideoFilter->Video->find('list');
		$filters = $this->VideoFilter->Filter->find('list');
		$this->set(compact('videos', 'filters'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null,$v_id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->VideoFilter->id = $id;
		if (!$this->VideoFilter->exists()) {
			throw new NotFoundException(__('Invalid video filter'));
		}
		if ($this->VideoFilter->delete()) {
			$this->Session->setFlash(__('Video filter deleted'));
		    if (!empty($v_id)) {
                $this->redirect(array('controller' => 'videos',  'action' => 'view', $v_id));
            }else{
			$this->redirect(array('action' => 'index'));
            }
		}
		$this->Session->setFlash(__('Video filter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
