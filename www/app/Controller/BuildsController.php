<?php
App::uses('AppController', 'Controller');
/**
 * Builds Controller
 *
 * @property Build $Build
 */
class BuildsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Build->recursive = 0;
		$this->set('builds', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Build->id = $id;
		if (!$this->Build->exists()) {
			throw new NotFoundException(__('Invalid build'));
		}
		$this->set('build', $this->Build->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Build->create();
			if ($this->Build->save($this->request->data)) {
				$this->Session->setFlash(__('The build has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The build could not be saved. Please, try again.'));
			}
		}
		$types = $this->Build->Type->find('list');
		$this->set(compact('types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Build->id = $id;
		if (!$this->Build->exists()) {
			throw new NotFoundException(__('Invalid build'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Build->save($this->request->data)) {
				$this->Session->setFlash(__('The build has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The build could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Build->read(null, $id);
		}
		$types = $this->Build->Type->find('list');
		$this->set(compact('types'));
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
		$this->Build->id = $id;
		if (!$this->Build->exists()) {
			throw new NotFoundException(__('Invalid build'));
		}
		if ($this->Build->delete()) {
			$this->Session->setFlash(__('Build deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Build was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
