<?php
App::uses('AppController', 'Controller');
/**
 * Releases Controller
 *
 * @property Release $Release
 */
class ReleasesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Release->recursive = 0;
		$this->set('releases', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Release->id = $id;
		if (!$this->Release->exists()) {
			throw new NotFoundException(__('Invalid release'));
		}
		$this->set('release', $this->Release->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Release->create();
			if ($this->Release->save($this->request->data)) {
				$this->Session->setFlash(__('The release has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The release could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Release->Project->find('list');
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
		$this->Release->id = $id;
		if (!$this->Release->exists()) {
			throw new NotFoundException(__('Invalid release'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Release->save($this->request->data)) {
				$this->Session->setFlash(__('The release has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The release could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Release->read(null, $id);
		}
		$projects = $this->Release->Project->find('list');
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
		$this->Release->id = $id;
		if (!$this->Release->exists()) {
			throw new NotFoundException(__('Invalid release'));
		}
		if ($this->Release->delete()) {
			$this->Session->setFlash(__('Release deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Release was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
