<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

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
		$this->Task->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Task->parseCriteria($this->Prg->parsedParams());
		$this->set('tasks', $this->Paginator->paginate());
	}

	public function open() {
		$this->layout = "boots";
		$this->Task->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Task->parseCriteria($this->Prg->parsedParams());
	    $this->Paginator->settings = array(
	        'conditions' => array(
	        	'Task.completion_status' => 'Open',
	        	),
	    );
		$this->set('tasks', $this->Paginator->paginate());
	}

	public function completed() {
		$this->layout = "boots";
		$this->Task->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Task->parseCriteria($this->Prg->parsedParams());
	    $this->Paginator->settings = array(
	        'conditions' => array(
	        	'Task.completion_status' => 'Completed',
	        	),
	    );
		$this->set('tasks', $this->Paginator->paginate());
	}

	public function search() {
		$this->layout = "boots";
		$this->Task->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Task->parseCriteria($this->Prg->parsedParams());
		$this->set('tasks', $this->Paginator->paginate());
	}

	public function sresults() {
		$this->layout = "boots";
		$this->Task->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Task->parseCriteria($this->Prg->parsedParams());
		$this->set('tasks', $this->Paginator->paginate());
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
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
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
			$this->Task->create();
			if ($this->Task->saveNewTask($this->request->data, $uid, $uname)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('controller' => 'Organizations', 'action' => 'view', $id));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		}
		$users = $this->Task->User->find('list');
		$organizations = $this->Task->Organization->find('list');
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
		$this->layout = "boots";
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
		}
		$users = $this->Task->User->find('list');
		$organizations = $this->Task->Organization->find('list');
		$this->set(compact('users', 'organizations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Task->delete()) {
			$this->Flash->success(__('The task has been deleted.'));
		} else {
			$this->Flash->error(__('The task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
