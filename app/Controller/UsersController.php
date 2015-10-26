<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	var $helpers = array('Video');
	var $allowCookie = true;
    var $cookieTerm = '0';
    
	public $components = array(
		'Captcha',
	  // 'MathCaptcha',
		'RememberMe.RememberMe' => array(
		'field_name' => 'remember_me'), 
		 
		'SignMeUp.SignMeUp' => array(
			'activation_field' => false,
			'useractive_field' => false,
	));
	
	public function beforeFilter() {
		$this->Auth->autoRedirect = false;
	    parent::beforeFilter();
	    $this->Auth->allow(array( 'login', 'logout', 'forgotten_password', 'register', 'activate', 'initDB', 'captcha', 'not_srilankan')); 
	}
	
   function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))  { //if Component was not loaded throug $components array()
            App::import('Component','Captcha'); //load it
            $this->Captcha = new CaptchaComponent(); //make instance
            $this->Captcha->startup($this); //and do some manually calling
        }
        $this->Captcha->create();
    }
/*	function captcha_image(){
	    App::import('Vendor', 'captcha/captcha');
	    $captcha = new captcha();
	    $captcha->show_captcha();
	}
	*/
/**
 * initDB method
 * 
 * Setting up permissions
 */	
	
	public function initDB() {
	    $group = $this->User->Group;
	    //Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');
	    
	 	//Allow Viewers to following
	   	$group->id = 2;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/users/viewer_home');
	    
	    $this->Acl->allow($group, 'controllers/users/all_videos');
	    $this->Acl->allow($group, 'controllers/users/custom_videos');
	    
	    $this->Acl->allow($group, 'controllers/users/accounts');
	    $this->Acl->allow($group, 'controllers/users/change_password');
	    
	    $this->Acl->allow($group, 'controllers/users/payments');
	    $this->Acl->allow($group, 'controllers/users/payments_details');
	    $this->Acl->allow($group, 'controllers/users/payments_history');
	    $this->Acl->allow($group, 'controllers/users/credit_activity');
	    $this->Acl->allow($group, 'controllers/users/payment_method');
	    
	    $this->Acl->allow($group, 'controllers/viewers/add');
	    $this->Acl->allow($group, 'controllers/viewers/edit');
	    	    
	    $this->Acl->allow($group, 'controllers/payment_details/add');
	    $this->Acl->allow($group, 'controllers/payment_details/edit');	    
	    
	    $this->Acl->allow($group, 'controllers/video_logs/create');
	    
	    $this->Acl->allow($group, 'controllers/videos/index');
	    $this->Acl->allow($group, 'controllers/videos/archive_view');
	    $this->Acl->allow($group, 'controllers/videos/view');
	    
	    $this->Acl->allow($group, 'controllers/docs');
	    $this->Acl->allow($group, 'controllers/docs/view');
	    
	    $this->Acl->allow($group, 'controllers/menus');
	    $this->Acl->allow($group, 'controllers/menus/view');  
	    
	    $this->Acl->allow($group, 'controllers/users/competitions');
	    $this->Acl->allow($group, 'controllers/users/competition');

	    $this->Acl->allow($group, 'controllers/videos/competition_view');
	    $this->Acl->allow($group, 'controllers/charities/index');
	    $this->Acl->allow($group, 'controllers/charities/donate');
	    
	    //Allow Advertisers to following
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/videos/advertiser_home');	    
	    $this->Acl->allow($group, 'controllers/videos/reports');
	    $this->Acl->allow($group, 'controllers/videos/video_summary');
	    $this->Acl->allow($group, 'controllers/videos/video_detail_report');
	    $this->Acl->allow($group, 'controllers/videos/index');
	    $this->Acl->allow($group, 'controllers/videos/view');
	    
	    $this->Acl->allow($group, 'controllers/advertisers/add');
	    $this->Acl->allow($group, 'controllers/advertisers/edit');
	    
	    //$this->Acl->allow($group, 'controllers/videos/filterpage');
	    
	    $this->Acl->allow($group, 'controllers/users/advertiser_accounts');
	    $this->Acl->allow($group, 'controllers/users/change_password');	    	    
	   
	    $this->Acl->allow($group, 'controllers/docs');
	    $this->Acl->allow($group, 'controllers/docs/view');
	    
	    $this->Acl->allow($group, 'controllers/menus');
	    $this->Acl->allow($group, 'controllers/menus/view');
	    
	    //we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
	}
	
/**
 * competitions method 
 * 
 * @return void
 */	
	public function competitions() {
		$this->layout 	= 'users_default';
		$this->loadModel('Competition');
		$this->Competition->recursive	= -1;		
		$competitions 	= $this->Competition->find('all');
		$this->set('competitions',$competitions);		
	}

/**
 * competition method 
 * 
 * @param string $id
 * @return void
 */	
	public function competition($id=null) {
		
		$this->layout 			= 'users_default';
		
		$user_id 				= $this->Auth->user('id');
		$this->loadModel('CompetitionExternal');
		$this->CompetitionExternal->recursive	= -1;		
		$opts['limit'] 			= 5;
		$opts['conditions'] 	= array('CompetitionExternal.competition_id' => $id);
		$items 					= $this->CompetitionExternal->find('all', $opts);		
		$this->set('items',$items);
		
		$this->loadModel('Video');
		$this->Video->recursive	= -1;
		$vids= array();
		$i 						= 0;
		foreach ($items as $item) {
		$vidId 					= $item['CompetitionExternal']['external_id'];
		$vids[$i] 				= $this->Video->findVideo($vidId);
		$i++;
		}
				
		$this->set('vids', $vids);
		$this->loadModel('CompetitionsVote');
		$this->CompetitionsVote->recursive	= -1;
		if ($this->request->is('post')) {
			$ext_id 		= $this->request->data['CompetitionsVote']['external_id'];
			$votedBefore 	= $this->CompetitionsVote->checkVotedBefore($user_id, $id, $ext_id );
			$voteLimit 		= $this->CompetitionsVote->checkVoteLimit($user_id, $id);
			
			if ($voteLimit < 3 ) {	
				if ($votedBefore == false) {
					$this->CompetitionsVote->create();
					$this->request->data['CompetitionsVote']['user_id'] 		= $this->Auth->user('id');
					$this->request->data['CompetitionsVote']['competition_id'] 	= $id;
					$this->request->data['CompetitionsVote']['vote_value'] 		= 1;
					if ($this->CompetitionsVote->save($this->request->data)) {
						$this->Session->setFlash(__('Your vote has been saved'));
						$this->redirect(array('controller' => 'users', 'action' => 'competition' , $id));
					} else {
						$this->Session->setFlash(__('Your vote could not be saved. Please, try again.'));
					}
					
				} else {
						$this->Session->setFlash(__('You have voted this before'));
				}
				
			} else {
				$this->Session->setFlash(__('You have exceeded your vote limit'));
			}
		}	
		$votespervid 	= array();
		$votespervid 	= $this->CompetitionsVote->findVotesForVids($id);
		$this->set('votespervid',$votespervid);
		
		$this->loadModel('Competition');
		$this->Competition->recursive= -1;
		$compTitle 		= $this->Competition->getTitle($id);
		$this->set('compTitle', $compTitle);				
	}
	
/**
 * Not Srilankan method 
 * 
 * @return void
 */     
 public function not_srilankan() {
// 	$this->loadModel('VideoResponse');
//        $this->VideoResponse->recursive= -1;
        $opts['conditions'] = array('User.fullname' => '',
                                     'VideoResponse.video_feedback_option_id' => 1   );
        $records = $this->VideoResponse->find('all', $opts);
       // prd($records);
        foreach ($records as $record){
             $this->VideoResponse->updateAll(
                    array(
                        'VideoResponse.video_feedback_option_id' => 50),
                    array(
                        'VideoResponse.id' => $record['VideoResponse']['id'])
                    );
        }
        
    }
	
	
	
/**
 * register method 
 * 
 * @return void
 */		
	public function register() {
		          
    
	if ($this->request->is('post')) { 
		if (empty($this->data['User']['captcha'])){
		  $this->request->data['User']['captcha'] = 'Cannot be blank';
		}
		//prd($this->data['User']['captcha']);	
		//$this->data['captcha']
		if(!isset($this->Captcha))   { //if Component was not loaded throug $components array()
                App::import('Component','Captcha'); //load it
                $this->Captcha = new CaptchaComponent(); //make instance
                $this->Captcha->startup($this); //and do some manually calling
            }
            $this->User->setCaptcha($this->Captcha->getVerCode());
	}		
		$this->SignMeUp->register();
		
	    $groups = $this->User->Group->find('list');
		$this->set(compact('groups'));		
		
	 // set the about_comp docs in to register & login pages 
        $this->loadModel('Doc');
        $this->Doc->recursive       = -1;
        $opts['limit']              =  1;
        $opts['conditions']         = array('Doc.code' => 'register_doc');
        $registerdoc                  = $this->Doc->find('first', $opts);
        
       
          $this->set('registerdoc', $registerdoc);
          
         
	}
	
/**
 * activate method 
 * 
 * @return void
 */	
	public function activate() {
		 $this->SignMeUp->activate();
	}

/**
 * forgotten_password method 
 * 
 * @return void
 */	
	public function forgotten_password() {
		if ($this->request->is('post')) {  
		  $this->SignMeUp->forgottenPassword();
		}
	}
	
/**
 * login method 
 * 
 * @return void
 */	
	public function login() {
		    if ($this->request->is('post')) {
		  
      
		        if ($this->Auth->login()) {    
		        	  	
		        	if($this->Auth->User('active')==0){
			    			$this->Session->setFlash('Your account has been disabled / inactive. please contact administrator.');
			    			$this->redirect($this->Auth->logout());
			    			
			    	} else {    
			    		
			        	if($this->Auth->User('group_id')==1){
			        		if (!empty($this->User->data)) {
					            $this->RememberMe->setRememberMe($this->data[$this->User->alias]);
					        }
				        	$this->redirect('/admin');	       
				        	 	
				    	} else if($this->Auth->User('group_id')==2){
				    		
				    		// check whether a user has viewer profile records
				    		$this->loadModel('Viewer');
				    		$this->Viewer->recursive	= -1;
				    		$opts['limit'] 				= 1;
				    		$opts['conditions']			= array('Viewer.user_id' => $this->Auth->User('id'));
				    		$userProfile				= $this->Viewer->find('all', $opts);
				    		
				    		if(empty($userProfile)) {
				    			if (!empty($this->User->data)) {
					           		$this->RememberMe->setRememberMe($this->data[$this->User->alias]);
					        	} 		    				
				    			$this->redirect('/users/profile/add');
				    		} else {
				    			if (!empty($this->User->data)) {
					           		$this->RememberMe->setRememberMe($this->data[$this->User->alias]);
					        	} 
				    			$this->redirect('/users/home');
				    		}
				    		
				    	} else if($this->Auth->User('group_id')==3){
				    		if (!empty($this->User->data)) {
					           $this->RememberMe->setRememberMe($this->data[$this->User->alias]);
					        } 
				    			$this->redirect('/advertisers/home');
				    	}		    		
				    }		    	
		        }
		      else {
		            $this->Session->setFlash('Login failed. Invalid username or password.');
		      }
		 //   } else {
              //   $this->Session->setFlash('The result of the calculation was incorrect. Please, try again.');
           // }
	    }	    
		if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash('You are logged in!');
	        $this->redirect('/', null, false);
	    }
	    
		
	}
	
/**
 * Admin login method 
 * 
 * @return void
 */		
	public function admin_login() {
	   $this->redirect('/login');
	  
	}

/**
 * logout method
 * 
 * @return void
 */	
	public function logout() {
	    $this->Session->setFlash('Thank you for Eeling');
		$this->redirect($this->Auth->logout());
	}
		
/**
 * viewer_home method
 *
 * @return void
 */
	public function viewer_home() {
		$this->layout 		= 'users_default';
		$this->loadModel('Video');
		$this->loadModel('VideoLog');
		$this->Video->recursive		= -1;
		$this->VideoLog->recursive	= -1;	
		
		$today					= date('Y-m-d');			
		
		$user_id 				= $this->Auth->user('id');
		$vidsWatchedToday	 	= $this->VideoLog->findVidsWatchedToday($user_id);
		$this->set('vidsWatchedToday', $vidsWatchedToday);
		
		$vidsWatchedThisMonth 	= $this->VideoLog->findVidsWatchedThisMonth($user_id);
		$this->set('vidsWatchedThisMonth', $vidsWatchedThisMonth);
		
		$totalCredits 			=  $this->User->findCurrentBalance($user_id);
		$this->set('totalCredits', $totalCredits);
		
		$videosWatched 			= $this->VideoLog->watchedVideosByUser($user_id);
		
		$videosWatched2 		= array();
		foreach ($videosWatched as $videoWatched) {
   			$videosWatched2[$videoWatched['VideoLog']['video_id']] = $videoWatched;
		} 
		 if ($user_id == 36) {
		 $videos = $this->Video->find('all', array( 
												'conditions' => 
													array(
														'Video.end_date > ' . $today . ''
														
													)
											));
		 
		 } else {
		$videos = $this->Video->find('all', array( 
                                                'conditions' => 
                                                    array(
                                                        'Video.end_date > ' . $today . '',
                                                        'Video.status' => "PUBLISHED",
                                                        'Video.max_view > Video.video_views'
                                                    )
                                            ));
		 }
		$vidsToDisplay		= array();
		$i					= 0;
		$watched			= false;
		foreach ($videos as $video):
			foreach ($videosWatched2 as $key => $videoWatched2):
				if($video['Video']['id']== $key){
					$watched=true;
				}
			endforeach;
			
			if ($watched == false){
				$vidsToDisplay[$i]	= $video;
				$vidsTime[$i] = $this->getTimeInMins($video['Video']['length']);
				$i++;
			}
			$watched = false;
		endforeach;	
		
		$this->set('videos', $vidsToDisplay);
		if (!empty($vidsTime)){
		$this->set('vidsTime', $vidsTime);
		}
		
		
		$customVideos 		= $this->Video->getTargetedVideosForUser($user_id);
		$custVidsToDisplay	= array();
		$i					= 0;
		$watched			= false;
		$customVidsTime 	= array();
		foreach ($customVideos as $customVideo):
			foreach ($videosWatched2 as $key => $videoWatched2):
				if($customVideo['Video']['id']== $key){
					$watched=true;
				}			
			endforeach;
			
			if ($watched == false){
				$custVidsToDisplay[$i]	= $customVideo;
				$customVidsTime[$i] 	= $this->getTimeInMins($customVideo['Video']['length']);
				$i++;
			}
			$watched = false;
		endforeach;	
		
		$this->set('custVideos', $custVidsToDisplay);
		$this->set('custVideosTime', $customVidsTime);
		
		$creditLimit 		= $this->User->findCreditLimit($user_id);
		$creditlimitreached = $this->VideoLog->checkCreditLimit($user_id, $creditLimit);

		$this->set('creditlimitreached',$creditlimitreached);
		
		$this->loadModel('Viewer');
		$this->Viewer->recursive       = -1;
		$trust = $this->Viewer->getTrustScore($user_id);
		//$trust 				= 40;
		$this->set('trust', $trust);
		
        $bar = ($trust/16000)*100;
        $this->set('bar', $bar);
        
        $skipped = $this->Viewer->findSkipped($user_id);
        $this->set('skipped',$skipped);
        
        $real_user = true;
        $viewer_profile_exists = $this->Viewer->viewer_profile_exist($user_id);
        if ($viewer_profile_exists == true) {
          $real_user = $this->Viewer->checkNicValidity($user_id);
        }
        $this->set('real_user', $real_user);
       
				
	}
/**
 * getTimeInMins method
 *
 * @return void
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
		
		$displaytime 		= "$hours:$hoursdecimal:$minsdecimal";
		
		return $displaytime;
	}

/**
 * all_videos method
 * 
 * list of non filtered videos
 * @return void
 */	
	public function all_videos() {		
		
		$this->layout 				= 'users_default';
		$this->loadModel('Video');
		$this->loadModel('VideoLog');
		$this->Video->recursive		= -1;
		$this->VideoLog->recursive	= -1;	
		
		$today 			= date('Y-m-d');		
		$user_id 		= $this->Auth->user('id');
		$videosWatched 	= $this->VideoLog->watchedVideosByUser($user_id);		
		$videosWatched2 = array();
		
		foreach ($videosWatched as $videoWatched) {
   			 $videosWatched2[$videoWatched['VideoLog']['video_id']] = $videoWatched;
		} 
		 
		$videos = $this->Video->find('all', 
										array( 'conditions' => 
											array(
												'Video.end_date > ' . $today . '',
												'Video.status' => "PUBLISHED",
												'Video.target' => "ALL"
											)
										));
		$vidsToDisplay	= array();
		$i				= 0;
		$watched		= false;
	
		foreach ($videos as $video):
			foreach ($videosWatched2 as $key => $videoWatched2):
			if($video['Video']['id']== $key){
				$watched=true;
			}
			endforeach;
			
			if ($watched == false){
				$vidsToDisplay[$i]= $video;
				$i++;
			}
			$watched = false;
		endforeach;	
		$this->set('videos', $vidsToDisplay, $this->paginate());				
		
	} 

/**
 * custom_videos method
 * 
 * list of filtered (custom) videos
 * @return void
 */	
	public function custom_videos() {
		
		$this->layout 		= 'users_default';
		$this->loadModel('Video');
		$this->loadModel('VideoLog');
		$this->Video->recursive		= -1;
		$this->VideoLog->recursive	= -1;	
		
		$today				= date('Y-m-d');			
		
		$user_id 			= $this->Auth->user('id');		
		$videosWatched 		= $this->VideoLog->watchedVideosByUser($user_id);
		
		$videosWatched2 	= array();
		foreach ($videosWatched as $videoWatched) {
   			 $videosWatched2[$videoWatched['VideoLog']['video_id']] = $videoWatched;
		} 
		 
		$videos 			= $this->Video->getTargetedVideosForUser($user_id);
		$vidsToDisplay		= array();
		$i					= 0;
		$watched			= false;
		
		foreach ($videos as $video):
			foreach ($videosWatched2 as $key => $videoWatched2):
			if($video['Video']['id']== $key){
				$watched=true;
			}
			endforeach;
			
			if ($watched == false){
				$vidsToDisplay[$i]= $video;
				$i++;
			}
			$watched 		= false;
		endforeach;	
		$this->set('videos', $vidsToDisplay, $this->paginate());		
		
		
	}
	 
/**
 * credit_activity method
 * 
 * report of users credit and activities.
 * @return void
 */		
public function credit_activity() {
		$this->layout 		= 'users_default';
		
		$user_id 			= $this->Auth->user('id');
		$this->loadModel('CreditLog');
		$this->CreditLog->recursive	= -1;	
		$creditActivities 	= $this->CreditLog->findCreditActivities($user_id);
		$this->set('creditActivities', $creditActivities);
		
		$videoTitle 		= array();
		$i					= 0;
		$this->loadModel('Video');	
		if(!empty($creditActivities)) {
		  foreach ($creditActivities as $creditActivity):
			  $videoTitles[$i] = $this->Video->findVideoTitle($creditActivity['CreditLog']['external_id']);
			  $i++;
		  endforeach;
		  $this->set('videoTitles', $videoTitles);
		}	
	}
	
/**
 * viewer payments method
 *
 * @return void
 */
	public function payments() {
		$this->layout 		= 'users_default';
	     
		$this_user = $this->Auth->User('id');
		$this->loadModel('PaymentDetail');
		$this->PaymentDetail->recursive	= -1;		
		$opts['limit'] 				= 1;
		$opts['conditions']			= array('PaymentDetail.user_id' => $this->Auth->user('id'));
		$paymentDetails 			= $this->PaymentDetail->find('all', $opts);
		$this->set('paymentDetails', $paymentDetails);	
        
    	
		$current_pay_method = $this->User->findPayMethod($this_user);
		$this->set('current_pay_method', $current_pay_method);
		
	    if (empty($paymentDetails) && $current_pay_method == 'bank'){
            $this->redirect('/users/payment_details/add');
        }
		
		// find viewer address
		$this->loadModel('Viewer');
		$this->Viewer->recursive	= -1;
		$opts['limit'] 				=  1;
		$opts['conditions']			= array('Viewer.user_id' => $this_user);
		$viewerAddress				= $this->Viewer->find('all', $opts);
		if(!empty($viewerAddress)) {
		  	foreach ($viewerAddress as $vA){
			  	$address1 	= $vA['Viewer']['address1'];
			  	$address2 	= $vA['Viewer']['address2'];
			  	$city 		= $vA['Viewer']['city'];
			  	$country 	= $vA['Viewer']['country'];	
		  	}
	  		$this->set('address1', $address1);
	  		$this->set('address2', $address2);
	  		$this->set('city', $city);
	  		$this->set('country', $country);
		 }
	}
	
/**
 * viewer payments_details method
 *
 * @return void
 */
	public function payment_method() {
		$this->layout 		= 'users_default';
		$user_id			= $this->Auth->user('id');
		//$user_id 			= $id;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect('/users/payments');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $user_id);
		}		
	}
	
/**
 * viewer payments_details method
 *
 * @return void
 */
	public function payments_details() {
		$this->layout 		= 'users_default';
	}
	
/**
 * viewer payments_history method
 *
 * @return void
 */
	public function payments_history() {
		$this->layout 		= 'users_default';
	}	
	
/**
 * accounts method
 *
 * @return void
 */
	public function accounts() {
        $this->layout           = 'users_default';
        $this->loadModel('User');
        $this->User->recursive  = -1;
        $opts['limit']          = 1;
        $opts['conditions']     = array('User.id' => $this->Auth->user('id'));
        $users                  = $this->User->find('all', $opts);
        $this->set('users', $users);
        
        $this->loadModel('Viewer');
        $this->Viewer->recursive    = -1;
        $opts['limit']          = 1;
        $opts['conditions']     = array('Viewer.user_id' => $this->Auth->user('id'));
        $viewers                = $this->Viewer->find('all', $opts);
        $this->set('viewers', $viewers);
        
    }   
    
    public function advertiser_accounts() {
        $this->layout           = 'users_default';
        $this->User->recursive  = -1;
        $opts['limit']          = 1;
        $opts['conditions']     = array('User.id' => $this->Auth->user('id'));
        $users                  = $this->User->find('all', $opts);
        $this->set('users', $users);
        
        
        $this->loadModel('Advertiser');
        $this->Advertiser->recursive = -1;
        $opts['limit']          = 1;
        $opts['conditions']     = array('Advertiser.user_id' => $this->Auth->user('id'));
        $advertisers            = $this->Advertiser->find('all', $opts);
        $this->set('advertisers', $advertisers);    
    }   
/**
 * change password method
 *
 * @return void
 */
	public function change_password() {
		$this->layout 			= 'users_default';
		if (!empty($this->data)) {            	
			$user = $this->User->find('first', array(
													'conditions'	=> array(
													'User.id' 		=> $this->Auth->user('id')),
													'recursive' 	=> -1
												));               	 
			if ($this->Auth->password($this->data['User']['old_password'])!= $user['User']['password']) {
				            	
				$this->Session->setFlash(__('The password you entered as your current is not your current password.', true)); 
				     	 
			} else if($this->data['User']['new_password'] != $this->data['User']['confirm_password'] ) {    
				        	
				$this->Session->setFlash("New password and Confirm password field do not match");          
				        
			} else {            	
				
				$this->User->set( $this->data );
				if ($this->User->validates(array('fieldList' => array('new_password', 'confirm_password')))) {				            		    	
					$data 		= array(
											'id' 		=> $user['User']['id'],
											'password' 	=> AuthComponent::password($this->data['User']['new_password']),
					                       'group_id'   => $this->Auth->user('group_id'),
										);
					if($this->User->save($data)) {
						$this->Session->setFlash('Password has been changed. please login again.');		            		    	
						$this->redirect($this->Auth->logout());
					}					  
				} 	            		
			}
		} 
	}	
	
/**
 * admin profile method
 *
 * @return void
 */	
	public function admin_profile($id = null) {	

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
		
	}	

/**
 * admin change password method
 *
 * @return void
 */
	function admin_change_password(){			
		if (!empty($this->data)) {            	
			$user = $this->User->find('first', array(
													'conditions'	=> array(
													'User.id' 		=> $this->Auth->user('id')),
													'recursive' 	=> -1
												));               	 
			if ($this->Auth->password($this->data['User']['old_password'])!= $user['User']['password']) {
				            	
				$this->Session->setFlash(__('The password you entered as your current is not your current password.', true)); 
				     	 
			} else if($this->data['User']['new_password'] != $this->data['User']['confirm_password'] ) {    
				        	
				$this->Session->setFlash("New password and Confirm password field do not match");          
				        
			} else {            	
				
				$this->User->set( $this->data );
				if ($this->User->validates(array('fieldList' => array('new_password', 'confirm_password')))) {				            		    	
					$data 		= array(
											'id' 		=> $user['User']['id'],
											'password' 	=> AuthComponent::password($this->data['User']['new_password'])
										);
					if($this->User->save($data)) {
						$this->Session->setFlash('Password has been changed. please login again.');		            		    	
						$this->redirect($this->Auth->logout());
					}					  
				} 	            		
			}
		} 		
	}	
	

/**
 * user profile add method
 *
 * @return void
 */
	public function userprofile_add() {
		$this->loadModel('Viewer');
		$this->Viewer->recursive	= 0;		
		if ($this->request->is('post')) {
			$this->Viewer->create();
			$this->request->data['Viewer']['user_id'] = $this->Auth->user('id');
			
			if ($this->Viewer->save($this->request->data)) {
				$this->Session->setFlash(__('The user details has been saved'));
				$this->redirect(array('/users/home'));
			} else {
				$this->Session->setFlash(__('The viewer could not be saved. Please, try again.'));
			}
		}		
	}	

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view() {
		$id = $this->Auth->user('id');
		$this->User->id 	= $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));		
	}

/**
 * admin_credits method
 *
 * @return void
 */
	public function admin_credits() {		
		if(!empty($this->data)) {    
			$opts['limit']		= 1;
			$opts['conditions'] = array('User.email'=> $this->data['User']['email']);	
			$data 				= $this->User->find('all', $opts);
	      	$this->set('result', $data);	      	
	    } 	
	}
	
/**
 * admin_creditlimit method
 *
 * @return void
 */
	public function admin_creditlimit() {		
		if(!empty($this->data)) {    
			$credit_limit 	= $this->data['User']['credit_limit'];				
	      	$this->User->updateAll(
			    array('User.credit_limit' => $credit_limit)			  
			); 
			$this->Session->setFlash(__('Daily credit limit has been updated')); 	
	    } 
	    
	    $opts['limit']		= 1;	
		$users 				= $this->User->find('all', $opts);
	    $this->set('users', $users);

	    
	}
	
/**
 * admin_update_credit method
 *
 * @param string $id
 * @return void
 */
	public function admin_update_credit($id = null) {
		$this->User->id 	= $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$currentbalance 	= $this->User->findCurrentBalance($id);
		if ($this->request->is('post') || $this->request->is('put')) {
			$userId 		= $this->data['User']['id'];
			$creditamount 	= $this->data['User']['credit'];
			$total 			= $currentbalance + $creditamount;
			
			$data 			=  $this->User->set(array(  
											     	'id' 		=> $userId,   
											    	'credit' 	=> $total
										     	));
			$this->loadModel('CreditLog');	   			
			if ($this->User->save($data)) {
				$this->CreditLog->addCreditLog2($userId, $creditamount, $total);
				$this->Session->setFlash(__('The credit has been updated'));				
				$this->redirect(array('controller' => 'credit_logs', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit could not be updated. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}	

	
	
	
/**
 * admin_general_report method
 *
 * @return void
 */
    public function admin_general_report() {
          $this->loadModel('Viewer'); 
        $this->Viewer->recursive = -1;               
        $this->User->recursive = -1;     
       $opts_users['order'] = array('User.id'       => 'desc',
                                      ); 
        
        
        $users =  $this->User->find('all', $opts_users);
        $x = 0;
        foreach ($users as $user){
            $users[$x]['Viewer']['district'] = $this->Viewer->findDistrict($user['User']['id']);
            $users[$x]['Viewer']['province'] = $this->Viewer->findProvince($user['User']['id']);
            if (empty($users[$x]['Viewer']['district'])) {
                $users[$x]['Viewer']['district'] = null;
            }
            if (empty($users[$x]['Viewer']['province'])) {
                $users[$x]['Viewer']['province'] = null;
            }
          
            $x++;
        }
        
        
        $provinces = array(                     'Eastern Province'          ,
                                                'North Central Province'    ,
                                                'Uva Province'              ,
                                                'Western Province'          ,
                                                'Southern Province'         ,
                                                'Northern Province'         ,
                                                'Central Province'          ,
                                                'Sabaragamuwa Provincee'    ,
                                                'North Western Province'    );
        
        $districts = array(                     'Ampara'        ,
                                                'Anuradhapura'  ,
                                                'Badulla'       ,
                                                'Batticaloa'    ,
                                                'Colombo'       ,
                                                'Galle'         ,
                                                'Gampaha'       ,
                                                'Hambantota'    ,
                                                'Jaffna'        ,
                                                'Kalutara'      ,
                                                'Kandy'         ,
                                                'Kegalle'       ,
                                                'Kilinochchi'   ,
                                                'Kurunegala'    ,
                                                'Mannar'        ,
                                                'Matale'        ,
                                                'Matara'        ,
                                                'Moneragala'    ,
                                                'Mullaitivu'    ,
                                                'Nuwara Eliya'  ,
                                                'Polonnaruwa'   ,
                                                'Puttalam'      ,
                                                'Ratnapura'     ,
                                                'Trincomalee'   ,
                                                'Vavuniya'      );
        $z = 0;
        $provinces_details = array();
        foreach ($provinces as $province){
            
            $provinces_details[$province]['Prov'] = $province;
            $provinces_details[$province]['Num'] = 0;
            
            $z++;
        }
     //prd($users);
        $y = 0;
        foreach ($users as $user){
            $z =0;
            foreach ($provinces_details as $province){
                //prd($provinces_details[$province['Prov']]['Num']);
                if ($users[$y]['Viewer']['province'] == $province['Prov']) {
                    $provinces_details[$province['Prov']]['Num'] = $province['Num']+1;
                    
                }
                $z++;
            }
            
            $y++;
        }
        
        
        $z = 0;
        $districts_details = array();
        foreach ($districts as $district){
            
            $districts_details[$district]['Dis'] = $district;
            $districts_details[$district]['Num'] = 0;
            
            $z++;
        }
      //  prd($provinces_details);
        $y = 0;
        foreach ($users as $user){
            $z =0;
            foreach ($districts_details as $district){
                //prd($provinces_details[$province['Prov']]['Num']);
                if ($users[$y]['Viewer']['district'] == $district['Dis']) {
                    
                    $districts_details[$district['Dis']]['Num'] = $district['Num']+1;
                    
                }
                $z++;
            }
            
            $y++;
        }
        $males   = 0;
        $females = 0;
        $others  = 0;
       foreach ($users as $user){
            if ($user['User']['group_id'] == 2){
                $gender = $this->Viewer->findGender($user['User']['id']);
                if ($gender == 'male' || $gender == 'Male'){
                    $males = $males+1;
                }elseif ($gender == 'female' || $gender == 'Female'){
                    $females = $females +1;
                }else{
                    $others = $others+1;
                }
            }
        }
        $genders['Males']    = $males;
        $genders['Females']  = $females;
        $genders['Others']   = $others;
       $this->set('genders', $genders);
        
       $this->set('districts_details',$districts_details);  
       $this->set('provinces_details',$provinces_details);  
        //prd($users);                              
        $this->set('users',$users);  
        $opts['conditions'] = array('User.group_id' => 2);
        $num_of_viewers = $this->User->find('count',  $opts);
        $opts2['conditions'] = array('User.group_id' => 2, 'User.active' => 1);
        $num_of_active_viewers = $this->User->find('count', $opts2);
        $this->set('num_of_viewers', $num_of_viewers);
        $this->set('num_of_active_viewers', $num_of_active_viewers);
        $viewer_profiles = $this->Viewer->find('count');
        $this->set('viewer_profiles', $viewer_profiles);
        $opts3['conditions'] = array('User.group_id' => 3);
        $num_of_advertisers = $this->User->find('count', $opts3);
        $opts4['conditions'] = array('User.group_id' => 1);
        $num_of_admins = $this->User->find('count', $opts4);
        $this->set('num_of_advertisers', $num_of_advertisers);
        $this->set('num_of_admins', $num_of_admins);
        
        $age_groups[0]['Agegroup'] = '18 - 24';
        $viewers = $this->Viewer->findInAgegroup(0);
        $age_groups[0]['NumberOfViewers'] = count($viewers); 
        
        $age_groups[1]['Agegroup'] = '25 - 30';
        $viewers = $this->Viewer->findInAgegroup(1);
        $age_groups[1]['NumberOfViewers'] = count($viewers);
        
        $age_groups[2]['Agegroup'] = '31 - 35';
        $viewers = $this->Viewer->findInAgegroup(2);
        $age_groups[2]['NumberOfViewers'] = count($viewers);
        
        $age_groups[3]['Agegroup'] = '36 - 40';
        $viewers = $this->Viewer->findInAgegroup(3);
        $age_groups[3]['NumberOfViewers'] = count($viewers);
        
        $age_groups[4]['Agegroup'] = '41 - 45';
        $viewers = $this->Viewer->findInAgegroup(4);
        $age_groups[4]['NumberOfViewers'] = count($viewers);
        
        $age_groups[5]['Agegroup'] = '46 - 50';
        $viewers = $this->Viewer->findInAgegroup(5);
        $age_groups[5]['NumberOfViewers'] = count($viewers);
        
        $age_groups[6]['Agegroup'] = '50+';
        $viewers = $this->Viewer->findInAgegroup(6);
        $age_groups[6]['NumberOfViewers'] = count($viewers);
                         
       $this->set('age_groups', $age_groups);
        
    }

    
      
/**
 * admin_check_nic method
 *
 * @return void
 */
    public function admin_user_search(){
        $result = array();
        if ($this->request->is('post')) {
           $search_term = $this->data['User']['search'];
           $opts['limit']  = 1;
           $opts['conditions'] = array('User.id' => $search_term);
           $search_result = $this->User->find('first', $opts);
           if ($search_result == null){
             $opts['limit']  = 1;
             $opts['conditions'] = array('User.email' => $search_term);
             $search_result = $this->User->find('first', $opts);
           
           }
            if ($search_result == null){
               
	           $search_result2 = $this->User->query("SELECT * FROM users WHERE users.fullname LIKE '%{$search_term}%'"); 
	           $x = 0;
	           foreach ($search_result2 as $res){
	            $search_result2[$x]['Viewers'] = $this->Viewer->query("SELECT * FROM viewers WHERE viewers.user_id = '{$res['users']['id']}'"); 
	            $x++;
	           }
               //prd($search_result2);
           }
           if (!empty($search_result)){
	           $result['Search']['User']   = $search_result['User'];
	           $result['Search']['Viewer'] = $search_result['Viewer'];
	           
	           prd($result);
           }elseif (!empty($search_result2)){
                $x = 0;
                foreach ($search_result2 as $res) {
                     $result[$x]['Search']['User']      = $res['users'];
                     foreach ($res['Viewers'] as $res_viewer) {
                        $result[$x]['Search']['Viewer'] = $res_viewer['viewers'];
                     }
                     $x++;   
                }
                prd($result);
               
           }
        }
            
    
    }  
    
    
/**
 * admin_check_nic method
 *
 * @return void
 */
    public function admin_check_nic() {
        $this->loadModel('Viewer'); 
        $this->Viewer->recursive = -1; 
        $opts['conditions'] = array('User.active' => 1);
        $users = $this->User->find('all', $opts);
        $fake_users = array();
        $x = 0 ;
        foreach ($users as $user){
            $skipped = $this->Viewer->findSkipped($user['User']['id']);
            if ($skipped == false){
                $real = $this->Viewer->checkNicValidity($user['User']['id']);
                if ($real == false){
                    $fake_users[$x] = $user['User'];
                    $x++;
                }
                //prd($real);
            }
        }
        prd($fake_users);
    }    
    
    
    
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
	  $this->loadModel('Viewer'); 
        $this->Viewer->recursive = -1;               
        $this->User->recursive = -1;     
        //$opts_users['order'] = array('User.id' => 'desc'); 
        
        
        $this->paginate             = array(
                                            'User' => array(
                                                        'order'         => array('User.id' => 'desc')
                                                        )
                                            );
                                            
        $users =  $this->paginate();
        $x =0;
        foreach ($users as $user){
            $users[$x]['Viewer']['nic'] = $this->Viewer->findNic($user['User']['id']);
            $users[$x]['Viewer']['dob'] = $this->Viewer->findDob($user['User']['id']);
            if (empty($users[$x]['Viewer']['nic'])) {
                $users[$x]['Viewer']['nic'] = null;
            }
            if (empty($users[$x]['Viewer']['dob'])){
                $users[$x]['Viewer']['dob'] = null;
            }
            $x++;
        }
                                      
        $this->set('users',$users);  
		$opts['conditions'] = array('User.group_id' => 2);
        $num_of_viewers = $this->User->find('count',  $opts);
        $opts2['conditions'] = array('User.group_id' => 2, 'User.active' => 1);
        $num_of_active_viewers_list = $this->User->find('all', $opts2);
       	$this->set('num_of_active_viewers_list', $num_of_active_viewers_list);
       
        $num_of_active_viewers = $this->User->find('count', $opts2);
        
        
        
        $this->set('num_of_viewers', $num_of_viewers);
        $this->set('num_of_active_viewers', $num_of_active_viewers);
        $viewer_profiles = $this->Viewer->find('count');
        $this->set('viewer_profiles', $viewer_profiles);
        $opts3['conditions'] = array('User.group_id' => 3);
        $num_of_advertisers = $this->User->find('count', $opts3);
        $opts4['conditions'] = array('User.group_id' => 1);
        $num_of_admins = $this->User->find('count', $opts4);
        $this->set('num_of_advertisers', $num_of_advertisers);
        $this->set('num_of_admins', $num_of_admins);
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		//	$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
