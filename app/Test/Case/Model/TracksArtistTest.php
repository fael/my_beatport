<?php
App::uses('TracksArtist', 'Model');

/**
 * TracksArtist Test Case
 *
 */
class TracksArtistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tracks_artist',
		'app.track',
		'app.artist',
		'app.genre',
		'app.tracks_genre',
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
		$this->TracksArtist = ClassRegistry::init('TracksArtist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TracksArtist);

		parent::tearDown();
	}

}
