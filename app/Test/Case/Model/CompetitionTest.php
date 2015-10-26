<?php
/* Competition Test cases generated on: 2012-07-10 05:13:28 : 1341897208*/
App::uses('Competition', 'Model');

/**
 * Competition Test Case
 *
 */
class CompetitionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.competition', 'app.competition_external', 'app.competitions_vote');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Competition = ClassRegistry::init('Competition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Competition);

		parent::tearDown();
	}

}
