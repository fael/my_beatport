<?php
/**
 * TracksGenreFixture
 *
 */
class TracksGenreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'track_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
		'genre_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
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
			'track_id' => 1,
			'genre_id' => 1
		),
	);

}
