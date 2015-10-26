<?php
/* CompetitionExternal Fixture generated on: 2012-07-10 08:45:44 : 1341909944 */

/**
 * CompetitionExternalFixture
 *
 */
class CompetitionExternalFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'competition_external';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'competition_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'external_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FK_competition_external_competitions' => array('column' => 'competition_id', 'unique' => 0), 'FK_competition_external_videos' => array('column' => 'external_id', 'unique' => 0)),
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
			'competition_id' => 1,
			'external_id' => 1,
			'created' => '2012-07-10 08:45:44'
		),
	);
}
