<?php
App::uses('AppController', 'Controller');
/**
 * BuildItems Controller
 *
 * @property BuildItem $BuildItem
 */
class BuildItemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BuildItem->recursive = 0;
		$this->set('buildItems', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BuildItem->id = $id;
		if (!$this->BuildItem->exists()) {
			throw new NotFoundException(__('Invalid build Item'));
		}
		$this->set('buildItem', $this->BuildItem->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BuildItem->create();
			if ($this->BuildItem->save($this->request->data)) {
				$this->Session->setFlash(__('The build Item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The build Item could not be saved. Please, try again.'));
			}
		}
		$builds = $this->BuildItem->Build->find('list');
		$this->set(compact('builds'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->BuildItem->id = $id;
		if (!$this->BuildItem->exists()) {
			throw new NotFoundException(__('Invalid build Item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BuildItem->save($this->request->data)) {
				$this->Session->setFlash(__('The build Item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The build Item could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BuildItem->read(null, $id);
		}
		$builds = $this->BuildItem->Build->find('list');
		$this->set(compact('builds'));
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
		$this->BuildItem->id = $id;
		if (!$this->BuildItem->exists()) {
			throw new NotFoundException(__('Invalid build Item'));
		}
		if ($this->BuildItem->delete()) {
			$this->Session->setFlash(__('Build Item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Build Item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
