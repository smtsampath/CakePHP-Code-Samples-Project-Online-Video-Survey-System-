<?php
/* Video Test cases generated on: 2012-06-08 09:17:47 : 1339147067*/
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video_log', 'app.video_response', 'app.video_feedback', 'app.option', 'app.video_feedback_option', 'app.video_target');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Video = ClassRegistry::init('Video');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
