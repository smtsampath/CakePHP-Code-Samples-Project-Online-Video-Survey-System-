<?php
/* CompetitionsVote Test cases generated on: 2012-07-10 05:15:47 : 1341897347*/
App::uses('CompetitionsVote', 'Model');

/**
 * CompetitionsVote Test Case
 *
 */
class CompetitionsVoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.competitions_vote', 'app.user', 'app.group', 'app.advertiser', 'app.credit_log', 'app.payment_detail', 'app.viewer', 'app.video_log', 'app.video', 'app.video_feedback', 'app.video_response', 'app.video_feedback_option', 'app.video_filter', 'app.filter', 'app.filter_group', 'app.competition', 'app.competition_external');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CompetitionsVote = ClassRegistry::init('CompetitionsVote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompetitionsVote);

		parent::tearDown();
	}

}
