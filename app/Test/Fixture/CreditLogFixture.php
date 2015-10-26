<?php
/* CreditLog Fixture generated on: 2012-06-08 08:33:56 : 1339144436 */

/**
 * CreditLogFixture
 *
 */
class CreditLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'external_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'note' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'credit_amount' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '8,2', 'collate' => NULL, 'comment' => ''),
		'total' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '8,2', 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_credit_logs_users1' => array('column' => 'user_id', 'unique' => 0)),
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
			'external_id' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'note' => 'Lorem ipsum dolor sit amet',
			'credit_amount' => 1,
			'total' => 1,
			'created' => '2012-06-08 08:33:56'
		),
	);
}
