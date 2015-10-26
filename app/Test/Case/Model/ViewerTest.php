<?php
/* Viewer Test cases generated on: 2012-08-20 04:24:48 : 1345436688*/
App::uses('Viewer', 'Model');

/**
 * Viewer Test Case
 *
 */
class ViewerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.viewer', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.video_log', 'app.video', 'app.video_feedback', 'app.video_response', 'app.video_feedback_option', 'app.video_filter', 'app.filter', 'app.filter_group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Viewer = ClassRegistry::init('Viewer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Viewer);

		parent::tearDown();
	}

}
