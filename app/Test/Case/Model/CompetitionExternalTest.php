<?php
/* CompetitionExternal Test cases generated on: 2012-07-10 08:45:46 : 1341909946*/
App::uses('CompetitionExternal', 'Model');

/**
 * CompetitionExternal Test Case
 *
 */
class CompetitionExternalTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.competition_external', 'app.competition', 'app.competitions_vote', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video_log', 'app.video', 'app.video_feedback', 'app.video_response', 'app.video_feedback_option', 'app.video_filter', 'app.filter', 'app.filter_group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CompetitionExternal = ClassRegistry::init('CompetitionExternal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompetitionExternal);

		parent::tearDown();
	}

}
