<?php
/* VideoLog Test cases generated on: 2012-06-08 09:12:14 : 1339146734*/
App::uses('VideoLog', 'Model');

/**
 * VideoLog Test Case
 *
 */
class VideoLogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video_log', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video', 'app.video_response');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->VideoLog = ClassRegistry::init('VideoLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoLog);

		parent::tearDown();
	}

}
