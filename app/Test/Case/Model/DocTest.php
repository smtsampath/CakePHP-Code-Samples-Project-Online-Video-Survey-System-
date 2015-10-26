<?php
/* Doc Test cases generated on: 2012-06-08 08:37:28 : 1339144648*/
App::uses('Doc', 'Model');

/**
 * Doc Test Case
 *
 */
class DocTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.doc');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Doc = ClassRegistry::init('Doc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Doc);

		parent::tearDown();
	}

}
