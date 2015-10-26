<?php
/* Menu Test cases generated on: 2012-06-08 08:52:29 : 1339145549*/
App::uses('Menu', 'Model');

/**
 * Menu Test Case
 *
 */
class MenuTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.menu');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Menu = ClassRegistry::init('Menu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Menu);

		parent::tearDown();
	}

}
