<?php
App::uses('AppController', 'Controller');
/**
 * Docs Controller
 *
 * @property Doc $Doc
 */
class DocsController extends AppController {

	public function beforeFilter() {
	  	parent::beforeFilter();
	    $this->Auth->allow('view', 'help');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Doc->recursive = 0;
		$this->set('docs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid doc'));
			$this->redirect('/');
		}
		
		if (intval($id)) {
			$doc 	= $this->Doc->read(null, $id);	
		} else {
			$opts	= array();
			$opts['conditions']	= array('Doc.code' => $id);  // set Doc. code as a Doc.id
			$doc 	= $this->Doc->find('first', $opts);
		}
		$this->set('title_for_layout', $doc['Doc']['title']);
		$this->set('doc', $doc);
		
		$this->loadModel('Menu');
		$this->Menu->recursive= 0;
		$opts2['conditions']	= array('enabled' => 1);	
		$menus	= $this->Menu->find('all', $opts2);
		$this->set('menus', $menus);
	}
    
public function help($id = null) {
	   $this->layout               = 'video_view';
        if (!$id) {
            $this->Session->setFlash(__('Invalid doc'));
            $this->redirect('/');
        }
        
        if (intval($id)) {
            $doc    = $this->Doc->read(null, $id);  
        } else {
            $opts   = array();
            $opts['conditions'] = array('Doc.code' => $id);  // set Doc. code as a Doc.id
            $doc    = $this->Doc->find('first', $opts);
        }
        $this->set('title_for_layout', $doc['Doc']['title']);
        $this->set('doc', $doc);
        
        $this->loadModel('Menu');
        $this->Menu->recursive= 0;
        $opts2['conditions']    = array('enabled' => 1);    
        $menus  = $this->Menu->find('all', $opts2);
        $this->set('menus', $menus);
    }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Doc->create();
			if ($this->Doc->save($this->request->data)) {
				$this->Session->setFlash(__('The doc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc could not be saved. Please, try again.'));
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
		$this->Doc->id = $id;
		if (!$this->Doc->exists()) {
			throw new NotFoundException(__('Invalid doc'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Doc->save($this->request->data)) {
				$this->Session->setFlash(__('The doc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Doc->read(null, $id);
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
		$this->Doc->id = $id;
		if (!$this->Doc->exists()) {
			throw new NotFoundException(__('Invalid doc'));
		}
		if ($this->Doc->delete()) {
			$this->Session->setFlash(__('Doc deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Doc was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Doc->recursive = 0;
		$this->set('docs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Doc->id = $id;
		if (!$this->Doc->exists()) {
			throw new NotFoundException(__('Invalid doc'));
		}
		$this->set('doc', $this->Doc->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Doc->create();
			if ($this->Doc->save($this->request->data)) {
				$this->Session->setFlash(__('The doc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc could not be saved. Please, try again.'));
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
		$this->Doc->id = $id;
		if (!$this->Doc->exists()) {
			throw new NotFoundException(__('Invalid doc'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Doc->save($this->request->data)) {
				$this->Session->setFlash(__('The doc has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doc could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Doc->read(null, $id);
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
		$this->Doc->id = $id;
		if (!$this->Doc->exists()) {
			throw new NotFoundException(__('Invalid doc'));
		}
		if ($this->Doc->delete()) {
			$this->Session->setFlash(__('Doc deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Doc was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
