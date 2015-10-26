<?php
/* VideoFeedback Test cases generated on: 2012-06-08 09:35:07 : 1339148107*/
App::uses('VideoFeedback', 'Model');

/**
 * VideoFeedback Test Case
 *
 */
class VideoFeedbackTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video_feedback', 'app.video', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video_log', 'app.video_response', 'app.video_feedback_option', 'app.video_target');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->VideoFeedback = ClassRegistry::init('VideoFeedback');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoFeedback);

		parent::tearDown();
	}

}
