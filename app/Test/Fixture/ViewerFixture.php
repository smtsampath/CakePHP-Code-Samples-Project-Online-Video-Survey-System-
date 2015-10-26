<?php
/* Viewer Fixture generated on: 2012-08-20 04:24:45 : 1345436685 */

/**
 * ViewerFixture
 *
 */
class ViewerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'unique', 'collate' => NULL, 'comment' => ''),
		'dob' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'gender' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 6, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'address1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'address2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'district' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'province' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'country' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'contact1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 18, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'contact2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 18, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'education' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'relationship_status' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'num_of_kids' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'employment' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'career' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'monthly_income' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'user_id' => array('column' => 'user_id', 'unique' => 1), 'fk_viewers_users1' => array('column' => 'user_id', 'unique' => 0)),
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
			'user_id' => 1,
			'dob' => '2012-08-20',
			'gender' => 'Lore',
			'address1' => 'Lorem ipsum dolor sit amet',
			'address2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'district' => 'Lorem ipsum dolor sit amet',
			'province' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'contact1' => 'Lorem ipsum dolo',
			'contact2' => 'Lorem ipsum dolo',
			'education' => 'Lorem ipsum dolor sit amet',
			'relationship_status' => 'Lorem ipsum dolor sit amet',
			'num_of_kids' => 'Lorem ipsum dolor sit amet',
			'employment' => 'Lorem ipsum dolor sit amet',
			'career' => 'Lorem ipsum dolor sit amet',
			'monthly_income' => 1,
			'created' => '2012-08-20 04:24:45',
			'updated' => '2012-08-20 04:24:45'
		),
	);
}
