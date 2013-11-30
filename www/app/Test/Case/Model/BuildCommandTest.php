<?php
App::uses('BuildCommand', 'Model');

/**
 * BuildCommand Test Case
 *
 */
class BuildCommandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.build_command',
		'app.type_id'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BuildCommand = ClassRegistry::init('BuildCommand');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BuildCommand);

		parent::tearDown();
	}

}
