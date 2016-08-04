<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Search.Prg');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "boots";
		$this->Contact->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Contact->parseCriteria($this->Prg->parsedParams());
		$this->set('contacts', $this->Paginator->paginate());
	}

	public function sresults() {
		$this->layout = "boots";
		$this->Contact->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Contact->parseCriteria($this->Prg->parsedParams());
		$this->set('contacts', $this->Paginator->paginate());
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
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
		$this->set('contact', $this->Contact->find('first', $options));
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
		$uname = $this->Auth->user('name');
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->saveNewContact($this->request->data, $uid, $uname)) {
				$this->Flash->success(__('The contact has been saved.'));
				return $this->redirect(array('controller' => 'Organizations', 'action' => 'view', $id));
			} else {
				$this->Flash->error(__('The contact could not be saved. Please, try again.'));
			}
		}
		$organizations = $this->Contact->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = "boots";
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contact->save($this->request->data)) {
				$this->Flash->success(__('The contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$this->request->data = $this->Contact->find('first', $options);
		}
		$organizations = $this->Contact->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Flash->success(__('The contact has been deleted.'));
		} else {
			$this->Flash->error(__('The contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
