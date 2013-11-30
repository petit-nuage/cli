<?php
App::uses('AppController', 'Controller');
/**
 * BuildCommands Controller
 *
 * @property BuildCommand $BuildCommand
 */
class BuildCommandsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BuildCommand->recursive = 0;
		$this->set('buildCommands', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BuildCommand->id = $id;
		if (!$this->BuildCommand->exists()) {
			throw new NotFoundException(__('Invalid build command'));
		}
		$this->set('buildCommand', $this->BuildCommand->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BuildCommand->create();
			if ($this->BuildCommand->save($this->request->data)) {
				$this->Session->setFlash(__('The build command has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The build command could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->BuildCommand->id = $id;
		if (!$this->BuildCommand->exists()) {
			throw new NotFoundException(__('Invalid build command'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BuildCommand->save($this->request->data)) {
				$this->Session->setFlash(__('The build command has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The build command could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BuildCommand->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->BuildCommand->id = $id;
		if (!$this->BuildCommand->exists()) {
			throw new NotFoundException(__('Invalid build command'));
		}
		if ($this->BuildCommand->delete()) {
			$this->Session->setFlash(__('Build command deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Build command was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
