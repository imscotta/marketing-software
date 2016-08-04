<?php
App::uses('AppController', 'Controller');
/**
 * Interactions Controller
 *
 * @property Interaction $Interaction
 * @property PaginatorComponent $Paginator
 */
class InteractionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "boots";
		$this->Interaction->recursive = 0;
		$this->set('interactions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = "boots";
		if (!$this->Interaction->exists($id)) {
			throw new NotFoundException(__('Invalid interaction'));
		}
		$options = array('conditions' => array('Interaction.' . $this->Interaction->primaryKey => $id));
		$this->set('interaction', $this->Interaction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id) {
		$this->layout = "boots";
		$orgId = $id;
		//debug($orgId);
		$this->set('organizationId', $orgId);
		$uid = $this->Auth->user('id');
		$this->set('userId', $orgId);
		$uname = $this->Auth->user('name');

		if ($this->request->is('post')) {
			$this->Interaction->create();
			if ($this->Interaction->saveNewInteraction($this->request->data, $uid, $uname)) {
				$this->Flash->success(__('The interaction has been saved.'));
				return $this->redirect(array('controller' => 'Organizations', 'action' => 'view', $id));
			} else {
				$this->Flash->error(__('The interaction could not be saved. Please, try again.'));
			}
		}
		$users = $this->Interaction->User->find('list');
		$organizations = $this->Interaction->Organization->find('list');
		$this->set(compact('users', 'organizations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Interaction->exists($id)) {
			throw new NotFoundException(__('Invalid interaction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Interaction->save($this->request->data)) {
				$this->Flash->success(__('The interaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The interaction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Interaction.' . $this->Interaction->primaryKey => $id));
			$this->request->data = $this->Interaction->find('first', $options);
		}
		$users = $this->Interaction->User->find('list');
		$organizations = $this->Interaction->Organization->find('list');
		$contacts = $this->Interaction->Contact->find('list');
		$this->set(compact('users', 'organizations', 'contacts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Interaction->id = $id;
		if (!$this->Interaction->exists()) {
			throw new NotFoundException(__('Invalid interaction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Interaction->delete()) {
			$this->Flash->success(__('The interaction has been deleted.'));
		} else {
			$this->Flash->error(__('The interaction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
