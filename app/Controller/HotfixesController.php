<?php
App::uses('AppController', 'Controller');
/**
 * Hotfixes Controller
 *
 * @property Hotfix $Hotfix
 */
class HotfixesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Hotfix->recursive = 0;
		$this->set('hotfixes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Hotfix->id = $id;
		if (!$this->Hotfix->exists()) {
			throw new NotFoundException(__('Invalid hotfix'));
		}
		$this->set('hotfix', $this->Hotfix->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hotfix->create();
			if ($this->Hotfix->save($this->request->data)) {
				$this->Session->setFlash(__('The hotfix has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotfix could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Hotfix->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Hotfix->id = $id;
		if (!$this->Hotfix->exists()) {
			throw new NotFoundException(__('Invalid hotfix'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hotfix->save($this->request->data)) {
				$this->Session->setFlash(__('The hotfix has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotfix could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Hotfix->read(null, $id);
		}
		$projects = $this->Hotfix->Project->find('list');
		$this->set(compact('projects'));
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
		$this->Hotfix->id = $id;
		if (!$this->Hotfix->exists()) {
			throw new NotFoundException(__('Invalid hotfix'));
		}
		if ($this->Hotfix->delete()) {
			$this->Session->setFlash(__('Hotfix deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Hotfix was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
