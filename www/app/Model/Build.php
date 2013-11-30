<?php
App::uses('AppModel', 'Model');
/**
 * Build Model
 *
 * @property Type $Type
 * @property BuildIten $BuildIten
 */
class Build extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BuildItem' => array(
			'className' => 'BuildItem',
			'foreignKey' => 'build_id',
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
