<?php
App::uses('AppModel', 'Model');
/**
 * Label Model
 *
 * @property Track $Track
 */
class Label extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $actsAs = array('Favorites.Favorite');
    
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Track' => array(
			'className' => 'Track',
			'foreignKey' => 'label_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
