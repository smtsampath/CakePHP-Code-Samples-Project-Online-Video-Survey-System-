<?php
/* User Fixture generated on: 2012-06-08 09:05:30 : 1339146330 */

/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'firstname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'lastname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'credit' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '8,2', 'collate' => NULL, 'comment' => ''),
		'activation_code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pasword_reset' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_users_groups' => array('column' => 'group_id', 'unique' => 0)),
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
			'group_id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'firstname' => 'Lorem ipsum dolor sit amet',
			'lastname' => 'Lorem ipsum dolor sit amet',
			'credit' => 1,
			'activation_code' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'pasword_reset' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-06-08 09:05:30',
			'updated' => '2012-06-08 09:05:30'
		),
	);
}
