<?php
/* CreditLogs Test cases generated on: 2012-06-08 09:21:48 : 1339147308*/
App::uses('CreditLogs', 'Controller');

/**
 * TestCreditLogs *
 */
class TestCreditLogs extends CreditLogs {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * CreditLogs Test Case
 *
 */
class CreditLogsTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.advertiser', 'app.user', 'app.group', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video_log', 'app.video', 'app.video_feedback', 'app.video_response', 'app.video_feedback_option', 'app.option', 'app.video_target', '');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CreditLogs = new TestCreditLogs();
		$this->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CreditLogs);

		parent::tearDown();
	}

}
