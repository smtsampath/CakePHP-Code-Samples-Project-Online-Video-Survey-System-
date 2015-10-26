<?php
/* VideoResponse Fixture generated on: 2012-06-08 09:13:03 : 1339146783 */

/**
 * VideoResponseFixture
 *
 */
class VideoResponseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'video_log_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'video_feedback_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'video_feedback_option_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_video_responses_video_logs1' => array('column' => 'video_log_id', 'unique' => 0), 'fk_video_responses_video_feedback1' => array('column' => 'video_feedback_id', 'unique' => 0), 'fk_video_responses_video_feedback_options1' => array('column' => 'video_feedback_option_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'video_log_id' => 1,
			'video_feedback_id' => 1,
			'video_feedback_option_id' => 1
		),
	);
}
