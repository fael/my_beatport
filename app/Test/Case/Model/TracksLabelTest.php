<?php
App::uses('TracksLabel', 'Model');

/**
 * TracksLabel Test Case
 *
 */
class TracksLabelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tracks_label',
		'app.track',
		'app.artist',
		'app.tracks_artist',
		'app.genre',
		'app.tracks_genre',
		'app.label'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TracksLabel = ClassRegistry::init('TracksLabel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TracksLabel);

		parent::tearDown();
	}

}
