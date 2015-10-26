<?php
/* PaymentDetail Test cases generated on: 2012-06-08 08:54:58 : 1339145698*/
App::uses('PaymentDetail', 'Model');

/**
 * PaymentDetail Test Case
 *
 */
class PaymentDetailTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.payment_detail', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PaymentDetail = ClassRegistry::init('PaymentDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentDetail);

		parent::tearDown();
	}

}
