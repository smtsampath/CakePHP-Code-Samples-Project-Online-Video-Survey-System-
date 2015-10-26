<?php
/* VideoResponse Test cases generated on: 2012-06-08 09:13:03 : 1339146783*/
App::uses('VideoResponse', 'Model');

/**
 * VideoResponse Test Case
 *
 */
class VideoResponseTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video_response', 'app.video_log', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video', 'app.video_feedback', 'app.option', 'app.video_feedback_option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->VideoResponse = ClassRegistry::init('VideoResponse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoResponse);

		parent::tearDown();
	}

}
