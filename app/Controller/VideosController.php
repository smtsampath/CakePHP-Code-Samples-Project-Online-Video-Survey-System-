<?php
App::uses('CakeTime', 'Utility');
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 */
class VideosController extends AppController {

	var $helpers = array('Video');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('archive_view', 'list_video'));
    }	
    	
/**
 * advertisers_home method
 *
 * @return void
 */	
  	public function advertisers_home() {
		
		$this->layout 			= 'users_default';
		$this->Video->recursive	= 0;
		$opts['limit']			= 10;
		$opts['conditions']		= array('Video.user_id'=>$this->Auth->user('id'));
		$videos					= $this->Video->find('all', $opts);
		$this->set('videos', $videos,  $this->paginate());
		
		$user_id 				= $this->Auth->user('id');
		$numOfVideos 			= $this->Video->advertiserNumOfVideos($user_id);
		$this->set('numOfVideos', $numOfVideos);
		
		$videos 				= $this->Video->find('all');
   		$vidsToDisplay 			= array();
		$i=0;
		foreach ($videos as $video){
				$vidsToDisplay[$i]	= $video;
				$vidsTime[$i] 		= $this->getTimeInMins($video['Video']['length']);
				$i++;
		}
		$this->set('vidsTime', $vidsTime); 		
		
    }
    
    
/**
 * video_summary method
 *
 * @return void
 */     
    public function video_summary() {
    	$user_id = $this->Auth->user('id');
        $this->layout               = 'users_default';      
        $this->Video->recursive     = 0;    
        $this->paginate             = array(
                                            'Video' => array(
                                                        'conditions'    => array('Video.user_id' => $user_id),
                                                        'order'         => array('id' => 'desc')
                                                        )
                                            );
        $this->set('videos', $this->paginate()) ;   
       
    }
    
    
    
/**
 * video_detail_report method
 *
 * @return void
 */     
    public function video_detail_report($id) {
      $this->loadModel('VideoFeedback');
      $this->VideoFeedback->recursive = -1;
      $this->loadModel('VideoResponse');
      $this->VideoResponse->recursive = -1;
      $this->loadModel('VideoLog');
      $this->VideoLog->recursive = -1;
      $this->loadModel('VideoFeedbackOption');
      $this->VideoFeedbackOption->recursive = -1;
      $user_id = $this->Auth->user('id');
      $this->layout               = 'users_default';      
      $this->Video->recursive     = 0;    
      $optss['conditions']           =   array('Video.user_id' => $user_id);
      $videos = $this->Video->find('all', $optss);

      
      $videoBelongsToAdvertiser = false;
      foreach ($videos as $video) {
      	if ($id == $video['Video']['id']){
      		$videoBelongsToAdvertiser = true;
      	}
      }
      if ($videoBelongsToAdvertiser == false){
      	$this->redirect('/advertisers/summary');
      }

      
      $optsss['conditions'] = array('Video.id' => $id);
      $video = $this->Video->find('first', $optsss);
      $this->set('video', $video);
      $video_details = array();
      $video_details = $this->VideoFeedback->findFeedback($video['Video']['id']);
        
    //  prd($video_details);
      
      $x =0;
            foreach ($video_details as $video_detail){
                $opts['conditions'] = array('VideoFeedbackOption.video_feedback_id' => $video_detail['VideoFeedback']['id']);
                
                $video_details[$x]['VideoFeedback']['VideoFeedbackOption'] = $this->VideoFeedbackOption->find('all', $opts);
//                $opts_num_of_records['conditions'] = array('VideoResponse.video_feedback_id' => $video_details[0]['VideoFeedback']['id'],
//                                                            'VideoResponse.id'               => $video_details[0]['VideoFeedback']['VideoFeedbackOption']['VideoFeedbackOption']['id']);
//                 $video_details[$x]['VideoFeedback']['VideoFeedbackOption']['VideoFeedbackOption']['number_of_records'] = $this->VideoResponse->find('count', $opts_num_of_records);
              //  prd($video_detail);
                $x++;
            }
      //prd( $video_details[1]);
         $x = 0;   
       foreach ( $video_details as $feedback) {
       	if ($x == 1){
       		//prd($x);
       	}
       	$z = 0;
       //	prd($feedback);
       	    foreach ($feedback['VideoFeedback']['VideoFeedbackOption'] as $feedopt){
       	    	//prd($feedopt['VideoFeedbackOption']);
       	    	$opts_num_of_records['conditions'] = array('VideoResponse.video_feedback_id'                       => $feedopt['VideoFeedbackOption']['video_feedback_id'],
                                                            'VideoResponse.video_feedback_option_id'               => $feedopt['VideoFeedbackOption']['id']);
       	    	 $video_details[$x]['VideoFeedback']['VideoFeedbackOption'][$z]['VideoFeedbackOption']['number_of_records'] = $this->VideoResponse->find('count', $opts_num_of_records);
       	    	//prd($video_details[$x]['VideoFeedback']['VideoFeedbackOption'][$z]['VideoFeedbackOption']);
       	    	$z++;
       	    }
       	
       	$x++;
       }
       
      // prd($video_details);
             $x =0;
             $opts_logs['conditions'] = array('VideoLog.video_id' => $id);
             $logs = $this->VideoLog->find('all', $opts_logs);
            // prd($logs);
             foreach ($logs as $log) {
             	$opts_response['conditions'] = array('VideoResponse.video_log_id' => $log['VideoLog']['id']);
             	$responses[$log['VideoLog']['id']] = $this->VideoResponse->find('all', $opts_response);
             }
            // prd($responses); 
            $response_num = 0;
            $count = 0;
            
             
            foreach ($video_details as $video_detail){    
                 foreach ($video_details[$x]['VideoFeedback']['VideoFeedbackOption'] as $option){
             //    	$logs = 
                 }
            }
                 
    // prd($video_details);
          $this->set('video_details', $video_details);
          
          
         
    }
    
/**
 * reports method
 *
 * @return void
 */		
	public function reports() {
		$user_id = $this->Auth->user('id');
		$this->layout 				= 'users_default';		
		$this->Video->recursive 	= 0;	
		$this->paginate 			= array(
									        'Video' => array(
														'conditions' 	=> array('Video.user_id' => $user_id),
											            'order' 		=> array('id' => 'desc')
									        			)
   		 									);
   		$this->set('videos', $this->paginate())	;   		
  
	}

/**
 * filterpage method
 *
 * @param string $id
 * @return void
 */
	public function filterpage($id = null) {
		$this->layout 		= 'users_default';
		$this->Video->id 	= $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));
		
		$this->loadModel('VideoFilter');
		$this->loadModel('FilterGroup');
		$this->VideoFilter->recursive = 0;
		if ($this->request->is('post')) {
			$this->VideoFilter->create();
			$this->request->data['VideoFilter']['video_id'] = $id; 
			if ($this->VideoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The VideoFilter has been saved'));
				$this->redirect(array('action' => 'filterpage', $id));
			} else {
				$this->Session->setFlash(__('The VideoFilter could not be saved. Please, try again.'));
			}
		}
		$filters 			= $this->VideoFilter->Filter->find('all');
		$this->set('filters', $filters);
	
		$opts['order']		= array('VideoFilter.id');
		$opts['conditions'] = array('VideoFilter.video_id' => $id);
		$videofilters		= $this->VideoFilter->find('all', $opts);		
		$this->set('videofilters', $videofilters);
	}
	
/**
 * admin_filterpage method
 *
 * @param string $id
 * @return void
 */	
	public function admin_filterpage($id = null) {
		$this->Video->id 	= $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));
		
		$this->loadModel('VideoFilter');
		$this->loadModel('FilterGroup');
		$this->VideoFilter->recursive 	= 0;
		if ($this->request->is('post')) {
			$this->VideoFilter->create();
			$this->request->data['VideoFilter']['video_id'] = $id; 
			if ($this->VideoFilter->save($this->request->data)) {
				$this->Session->setFlash(__('The VideoFilter has been saved'));
				$this->redirect(array('action' => 'filterpage', $id));
			} else {
				$this->Session->setFlash(__('The VideoFilter could not be saved. Please, try again.'));
			}
		}		
		$filters 			= $this->VideoFilter->Filter->find('all');											
		$this->set('filters', $filters);
		
		$opts['order']		= array('VideoFilter.id');
		$opts['conditions'] = array('VideoFilter.video_id' => $id);
		$videofilters		= $this->VideoFilter->find('all', $opts);		
		$this->set('videofilters', $videofilters);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout 	= 'users_default';
		$this->Video->recursive = 0;		
		$this->paginate = array(
						        'Video' => array(
						            'order' => array('id' => 'desc')
						        )
   		 					);
   		$videos 		= $this->Video->find('all');
   		$vidsToDisplay 	= array();
		$i				= 0;
		foreach ($videos as $video){
				$vidsToDisplay[$i]	= $video;
				$vidsTime[$i] 		= $this->getTimeInMins($video['Video']['length']);
				$i++;
		}
		$this->set('vidsTime', $vidsTime); 					
   		$this->set('videos', $this->paginate())	;
	
	}
	
/**
 * list_video method
 *
 * @return void
 */
	public function list_video() {
		$this->layout = 'video_view';
		$this->Video->recursive = -1;		
		$this->paginate = array(
						        'Video' => array(
						            'order' => array('id' => 'desc')
						        )
   		 					);
		$videos 		= $this->Video->find('all');
		$vidsToDisplay 	= array();
		$i=0;
		foreach ($videos as $video){
				$vidsToDisplay[$i]	= $video;
				$vidsTime[$i]	 	= $this->getTimeInMins($video['Video']['length']);
				$i++;
		}
		$this->set('vidsTime', $vidsTime);
   		$this->set('videos',$videos, $this->paginate())	;				
	
	}
	
/**
 * getTimeInMins method
 *
 *
 */	
	function getTimeInMins($timeinsecs) {
		$minsdecimal 		= $timeinsecs%60;
		$mins 				= ($timeinsecs - $minsdecimal)/60;
		$hoursdecimal 		= $mins%60;
		$hours 				= ($mins - $hoursdecimal)/60;
		if($hours<10){
			$hours			= "0$hours";
		}
		if($hoursdecimal<10){
			$hoursdecimal	= "0$hoursdecimal";
		}
		if($minsdecimal<10){
			$minsdecimal	= "0$minsdecimal";
		}		
		$displaytime 	= "$hours:$hoursdecimal:$minsdecimal";		
		return $displaytime;
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$user_id                  = $this->Auth->user('id');
		/*if ($user_id == 36){
			
		}else{
			$this->redirect(array('controller'=>'users', 'action' => 'viewer_home'));
		}*/
		$this->layout 				= 'ajax';
		$this->layout 				= 'video_view';
		$this->loadModel('VideoLog');
		$isViewed 					= $this->VideoLog->isVideoViewed($this->Auth->user('id'), $id );
		if ($isViewed == true) {
			//$this->Session->setFlash("You Don't get pay for this video");
		}		
		$this->loadModel('User');
		$this->loadModel('VideoLog');
		$this->VideoLog->recursive 	= -1;
		
		$creditLimit 				= $this->User->findCreditLimit($user_id);
		$creditlimitreached 		= $this->VideoLog->checkCreditLimit($user_id, $creditLimit);
		$this->set('creditlimitreached',$creditlimitreached);
		
		$this->Video->recursive 	= 2;
		$this->Video->id 			= $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		
		$fullVideos					= $this->Video->loadfullvideo($id);
		$this->set('isViewed', $isViewed);
		$this->set('fullVideos', $fullVideos);		
		$this->set('video', $this->Video->read(null, $id));		
		
		$current_credit = $this->Video->findCreditOfVideo($id);
		$trust_score = $this->Viewer->getTrustScore($user_id);
		$credit_earned = ($trust_score/16000)*$current_credit;
		$this->set('credit_earned', $credit_earned);
		
		$totalCredits             =  $this->User->findCurrentBalance($user_id);
		$current_total = $credit_earned + $totalCredits;
        $this->set('current_total', $current_total);
	}

/**
 * archive_view method
 *
 * @param string $id
 * @return void
 */	
	public function archive_view($id = null) {
		$this->layout 			= 'video_view';
		$this->Video->recursive = -1;
		$this->Video->id 		= $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));	
	}

/**
 * competition_view method
 *
 * @param string $id
 * @return void
 */	
	public function competition_view($id = null) {
		$this->layout 			= 'pop-up';
		$this->Video->recursive = -1;
		$this->Video->id 		= $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));	
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		/*/if ($this->request->is('post')) {
			//$this->Video->create();
		//	$this->request->data['Video']['user_id'] = $this->Auth->user('id'); 
			//if ($this->Video->save($this->request->data)) {
		//		$this->Session->setFlash(__('The video has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		}
		$users = $this->Video->User->find('list');
		$this->set(compact('users'));*/
		
		
		  if (!empty($this->data)) {
            $this->Video->create();
            $this->request->data['Video']['user_id'] = $this->Auth->user('id'); 
            if ($this->Video->save($this->data)) {
                if ($this->__processImage($this->Video->id)) {
                    $this->Session->setFlash(__('The Coupon has been saved', true));  
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->Session->setFlash(__('The video has been saved'));
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('The video could not be saved. Please, try again.'));
            }
            $users = $this->Video->User->find('list');
        $this->set(compact('users'));
        }
        
        $categories = $this->Item->Category->find('list');
        $this->set(compact('categories'));
	}
	

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Video']['user_id'] = $this->Auth->user('id'); 
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Video->read(null, $id);
		}
		$users = $this->Video->User->find('list');
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
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('Video deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Video->recursive = 0;
		$this->set('videos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Video->recursive = 2;
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
	//	if ($this->request->is('post')) {
	//		$this->Video->create();
	//		$this->request->data['Video']['user_id'] = $this->Auth->user('id');
			//prd($_FILES);
			//$name = Security::hash($this->request->data['Video']['id']).'.jpg';	
			//$this->request->data['Video']['thumbnail_name'] = $name; 	
		//	if ($this->Video->save($this->request->data)) {
				 //die('here');
			/*if (is_uploaded_file($_FILES['theImage']['tmp_name'])) {					
//			
//			    $path = WWW_ROOT . 'video_thumbnails' . DS . $name;//only JPG allowed					 
//			   	move_uploaded_file($_FILES['theImage']['tmp_name'], $path);	
//			   	debug($path);	
//			   	 die('here');    
//		   	}*/
//				$this->Session->setFlash(__('The video has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
//			}
//		}
//		$users = $this->Video->User->find('list');
//		$this->set(compact('users'));
//		
		
		
		 if (!empty($this->data)) {
            $this->Video->create();
            //$this->request->data['Video']['user_id'] = $this->Auth->user('id'); 
            if ($this->Video->save($this->data)) {
                if ($this->__processImage($this->Video->id)) {
                    $this->Session->setFlash(__('The Coupon has been saved', true));  
                    $this->Video->couponAvailable($this->Video->id);
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->Session->setFlash(__('The video has been saved'));
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('The video could not be saved. Please, try again.'));
            }
		 }
           $opts['conditions'] = array('User.group_id' => 3);
            $users = $this->Video->User->find('list', $opts);
        $this->set(compact('users'));
       
        
        
	}
	
	

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		//$this->Video->id = $id;
		////if (!$this->Video->exists()) {
		//	throw new NotFoundException(__('Invalid video'));
		//}
	//	if ($this->request->is('post') || $this->request->is('put')) {
		//	$this->request->data['Video']['user_id'] = $this->Auth->user('id');
		//	if ($this->Video->save($this->request->data)) {
			//	$this->Session->setFlash(__('The video has been saved'));
			//	$this->redirect(array('action' => 'index'));
			//} else {
		//		$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
		//	}
		//} else {
		//	$this->request->data = $this->Video->read(null, $id);
		//}
		//$users = $this->Video->User->find('list');
		//$this->set(compact('users'));
		
		
				   
  $this->Video->id = $id;
  if (!$this->Video->exists()) {
   throw new NotFoundException(__('Invalid video'));
  }
        
        if (!empty($this->data)) {
        	//$this->request->data['Video']['user_id'] = $this->Auth->user('id');
        
            if ($this->Video->save($this->data)) {
                if ($this->__processImage($this->Video->id)) {
                    $this->Session->setFlash(__('The image has been saved', true)); 
                     $this->Video->couponAvailable($this->Video->id);
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->Session->setFlash(__('The video has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The video could not be saved. Please, try again.'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Video->read(null, $id);
        }
        $users = $this->Video->User->find('list');
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
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('Video deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	
	/**
	 * *coupon
	 * 
	 * 
	 */
/*    function admin_add($id = false) {
        if (!empty($this->data)) {
            $this->Item->create();
            
            if ($this->Item->save($this->data)) {
                if ($this->__processImage($this->Item->id)) {
                    $this->Session->setFlash(__('The item has been saved', true));  
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->redirect('/admin/categories/view/' . $this->data['Item']['category_id']);
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
            }
        }
        
        $categories = $this->Item->Category->find('list');
        $this->set(compact('categories'));
    }*/

 /*   function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid image', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Item->save($this->data)) {
                if ($this->__processImage($this->Item->id)) {
                    $this->Session->setFlash(__('The image has been saved', true)); 
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->redirect('/admin/categories/view/' . $this->data['Item']['category_id']);
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Item->read(null, $id);
        }
            $items = $this->Item->Category->find('list');
        $this->set(compact('categories'));
    }
    */
    /**
     * 
     * Saves the image. prepends the id
     * @param $fileName
     */
    function __processImage($id = 0) { 
        if (isset($_FILES) && !empty($_FILES)) {
            $ext    =  strtolower(substr($_FILES['theImage']['name'], strrpos($_FILES['theImage']['name'], '.') + 1));
            
            if (is_uploaded_file($_FILES['theImage']['tmp_name']) && $ext == 'jpg') {
                //move files
                $path   = WWW_ROOT . 'coupons' . DS . $id . '.' . $ext;
                unlink($path); // in case the image is already there
                $this->__clearCache();
                return (@move_uploaded_file($_FILES['theImage']['tmp_name'], $path) !== false);
                
            }
        }
        return true;
    }   
    
    function __deleteImage($id = 0) {
        $path   = WWW_ROOT . 'coupons' . DS . $id . '.jpg';
        @unlink($path); 
    }
    
    function __clearCache() {
        $path   = WWW_ROOT . 'cache' . DS;
        $files  = @scandir($path);
        if (is_array($files)) {
            foreach ($files as $file) {
                @unlink($path . $file);
            }
        }
    }


	     
    
}
