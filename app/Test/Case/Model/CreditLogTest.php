<?php
/* CreditLog Test cases generated on: 2012-06-08 08:33:56 : 1339144436*/
App::uses('CreditLog', 'Model');

/**
 * CreditLog Test Case
 *
 */
class CreditLogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.credit_log', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CreditLog = ClassRegistry::init('CreditLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CreditLog);

		parent::tearDown();
	}

}
