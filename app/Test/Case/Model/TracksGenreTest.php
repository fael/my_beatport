<?php
App::uses('TracksGenre', 'Model');

/**
 * TracksGenre Test Case
 *
 */
class TracksGenreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tracks_genre',
		'app.track',
		'app.artist',
		'app.tracks_artist',
		'app.genre',
		'app.label',
		'app.tracks_label'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TracksGenre = ClassRegistry::init('TracksGenre');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TracksGenre);

		parent::tearDown();
	}

}
