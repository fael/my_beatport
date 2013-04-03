<?php
App::uses('Label', 'Model');

/**
 * Label Test Case
 *
 */
class LabelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.label',
		'app.track',
		'app.artist',
		'app.tracks_artist',
		'app.genre',
		'app.tracks_genre',
		'app.tracks_label'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Label = ClassRegistry::init('Label');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Label);

		parent::tearDown();
	}

}
