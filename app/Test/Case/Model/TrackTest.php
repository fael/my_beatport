<?php
App::uses('Track', 'Model');

/**
 * Track Test Case
 *
 */
class TrackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.track',
		'app.artist',
		'app.tracks_artist',
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
		$this->Track = ClassRegistry::init('Track');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Track);

		parent::tearDown();
	}

}
