<?php
/**
 * TrackFixture
 *
 */
class TrackFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'release_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'beatport_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'isrc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'release_date' => '2013-04-03',
			'beatport_id' => 1,
			'isrc' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-04-03 13:38:12',
			'modified' => '2013-04-03 13:38:12'
		),
	);

}
