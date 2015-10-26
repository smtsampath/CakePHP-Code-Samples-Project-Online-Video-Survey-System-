<?php
/* VideoFeedbackOption Test cases generated on: 2012-06-08 09:11:10 : 1339146670*/
App::uses('VideoFeedbackOption', 'Model');

/**
 * VideoFeedbackOption Test Case
 *
 */
class VideoFeedbackOptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video_feedback_option', 'app.video_feedback', 'app.video', 'app.video_response', 'app.option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->VideoFeedbackOption = ClassRegistry::init('VideoFeedbackOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoFeedbackOption);

		parent::tearDown();
	}

}
