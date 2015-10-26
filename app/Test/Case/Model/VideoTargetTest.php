<?php
/* VideoTarget Test cases generated on: 2012-06-08 09:14:56 : 1339146896*/
App::uses('VideoTarget', 'Model');

/**
 * VideoTarget Test Case
 *
 */
class VideoTargetTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video_target', 'app.video');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->VideoTarget = ClassRegistry::init('VideoTarget');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoTarget);

		parent::tearDown();
	}

}
