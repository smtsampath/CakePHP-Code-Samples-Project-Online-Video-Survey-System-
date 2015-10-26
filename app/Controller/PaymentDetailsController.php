<?php
App::uses('AppController', 'Controller');
/**
 * PaymentDetails Controller
 *
 * @property PaymentDetail $PaymentDetail
 */
class PaymentDetailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PaymentDetail->recursive = 0;
		$this->set('paymentDetails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PaymentDetail->id = $id;
		if (!$this->PaymentDetail->exists()) {
			throw new NotFoundException(__('Invalid payment detail'));
		}
		$this->set('paymentDetail', $this->PaymentDetail->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$user_id = $this->Auth->user('id');
        $payment_record = null;
        $opts['conditions'] = array('PaymentDetail.user_id' => $user_id);
        $payment_record = $this->PaymentDetail->find('first', $opts);
		
        $whitelist = $this->PaymentDetail->getViewerFromUserId($user_id);
        $cleanData = array();
        
        if (empty($payment_record)){
			$this->layout = 'users_default';
			if ($this->request->is('post')) {
				$this->PaymentDetail->create();
				$cleanData['PaymentDetail'] = $this->PaymentDetail->getWhitelistedArray($this->data['PaymentDetail'], $whitelist);
				$cleanData['PaymentDetail']['user_id'] = $this->Auth->user('id');
				if ($this->PaymentDetail->save($cleanData)) {
					$this->Session->setFlash(__('The payment detail has been saved'));
					$this->redirect('/users/home');
				} else {
					$this->Session->setFlash(__('The payment detail could not be saved. Please, try again.'));
				}
			}
        }else{
             $this->redirect('/payment_details/edit');
        }		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit() {
		$this->layout = 'users_default';
		$user_id =  $this->Auth->user('id');
		$opts['conditions'] = array('PaymentDetail.user_id' => $user_id);
        $paymentdetail = $this->PaymentDetail->find('first', $opts);
        $id = $paymentdetail['PaymentDetail']['id'];
            
        $whitelist = $this->PaymentDetail->getViewerFromUserId($user_id);
        $cleanData = array();
        
        
		$this->PaymentDetail->id = $id;
		if (!$this->PaymentDetail->exists()) {
			throw new NotFoundException(__('Invalid payment detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$cleanData['PaymentDetail'] = $this->PaymentDetail->getWhitelistedArray($this->data['PaymentDetail'], $whitelist);
			$cleanData['PaymentDetail']['user_id'] = $this->Auth->user('id');
			//prd($cleanData);
			if ($this->PaymentDetail->save($cleanData)) {
				$this->Session->setFlash(__('The payment detail has been saved'));
				$this->redirect('/users/payments');
			} else {
				$this->Session->setFlash(__('The payment detail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PaymentDetail->read(null, $id);
		}
		$users = $this->PaymentDetail->User->find('list');
		$this->set(compact('users'));		
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
		$this->PaymentDetail->id = $id;
		if (!$this->PaymentDetail->exists()) {
			throw new NotFoundException(__('Invalid payment detail'));
		}
		if ($this->PaymentDetail->delete()) {
			$this->Session->setFlash(__('Payment detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Payment detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PaymentDetail->recursive = 0;
		$this->set('paymentDetails', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->PaymentDetail->id = $id;
		if (!$this->PaymentDetail->exists()) {
			throw new NotFoundException(__('Invalid payment detail'));
		}
		$this->set('paymentDetail', $this->PaymentDetail->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PaymentDetail->create();
			if ($this->PaymentDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The payment detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment detail could not be saved. Please, try again.'));
			}
		}
		$users = $this->PaymentDetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->PaymentDetail->id = $id;
		if (!$this->PaymentDetail->exists()) {
			throw new NotFoundException(__('Invalid payment detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PaymentDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The payment detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment detail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PaymentDetail->read(null, $id);
		}
		$users = $this->PaymentDetail->User->find('list');
		$this->set(compact('users'));
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
		$this->PaymentDetail->id = $id;
		if (!$this->PaymentDetail->exists()) {
			throw new NotFoundException(__('Invalid payment detail'));
		}
		if ($this->PaymentDetail->delete()) {
			$this->Session->setFlash(__('Payment detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Payment detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
