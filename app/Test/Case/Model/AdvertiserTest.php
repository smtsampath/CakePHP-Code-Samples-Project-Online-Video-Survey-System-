<?php
/* Advertiser Test cases generated on: 2012-06-08 08:30:26 : 1339144226*/
App::uses('Advertiser', 'Model');

/**
 * Advertiser Test Case
 *
 */
class AdvertiserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.advertiser', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Advertiser = ClassRegistry::init('Advertiser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Advertiser);

		parent::tearDown();
	}

}
