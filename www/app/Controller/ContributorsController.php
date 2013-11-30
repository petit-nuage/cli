<?php
App::uses('AppController', 'Controller');
/**
 * Contributors Controller
 *
 * @property Contributor $Contributor
 */
class ContributorsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contributor->recursive = 0;
		$this->set('contributors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contributor->id = $id;
		if (!$this->Contributor->exists()) {
			throw new NotFoundException(__('Invalid contributor'));
		}
		$this->set('contributor', $this->Contributor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contributor->create();
			if ($this->Contributor->save($this->request->data)) {
				$this->Session->setFlash(__('The contributor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contributor could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Contributor->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Contributor->id = $id;
		if (!$this->Contributor->exists()) {
			throw new NotFoundException(__('Invalid contributor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contributor->save($this->request->data)) {
				$this->Session->setFlash(__('The contributor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contributor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contributor->read(null, $id);
		}
		$groups = $this->Contributor->Group->find('list');
		$this->set(compact('groups'));
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
		$this->Contributor->id = $id;
		if (!$this->Contributor->exists()) {
			throw new NotFoundException(__('Invalid contributor'));
		}
		if ($this->Contributor->delete()) {
			$this->Session->setFlash(__('Contributor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contributor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
