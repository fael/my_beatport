<?php
App::uses('AppModel', 'Model');
/**
 * TracksLabel Model
 *
 * @property Track $Track
 * @property Label $Label
 */
class TracksLabel extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Track' => array(
			'className' => 'Track',
			'foreignKey' => 'track_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Label' => array(
			'className' => 'Label',
			'foreignKey' => 'label_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
