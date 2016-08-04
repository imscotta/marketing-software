<?php
App::uses('AppController', 'Controller');
/**
 * Activities Controller
 *
 * @property Activity $Activity
 * @property PaginatorComponent $Paginator
 */
class ActivitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * home feed method
 *
 * @return void
 */
	public function feed() {
		$this->layout = 'boots';
		$this->loadModel('Task');
		$outstandingTasks = $this->Task->find('count', array(
        	'conditions' => array('Task.completion_status' => 'Open')
   		));
		$this->loadModel('Organization');
		$dispensaryTotal = $this->Organization->find('count');
   		if (!(isset($dispensaryTotal))) {
   			$dispensaryTotal = 0;
   		}
		$leadTotal = $this->Organization->find('count', array(
        	'conditions' => array('Organization.lead_status' => 'Lead')
   		));
   		if (!(isset($leadTotal))) {
   			$leadTotal = 0;
   		}
		$customerTotal = $this->Organization->find('count', array(
        	'conditions' => array('Organization.lead_status' => 'Customer')
   		));
   		if (!(isset($customerTotal))) {
   			$customerTotal = 0;
   		}
		$this->Activity->recursive = 1;
		$this->set('activities', $this->Paginator->paginate(), array('direction' => array(
            'Activity.created' => 'desc'
        )));
    	$this->set(compact('dispensaryTotal', 'outstandingTasks', 'leadTotal', 'customerTotal'));

		//$comments = $this->Activity->Comment->find('list');


	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Activity->recursive = 0;
		$this->set('activities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
		$this->set('activity', $this->Activity->find('first', $options));
		$this->set(compact('comments'));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Activity->create();
			if ($this->Activity->save($this->request->data)) {
				$this->Flash->success(__('The activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The activity could not be saved. Please, try again.'));
				//debug($this->validationErrors());
			}
		}
		$users = $this->Activity->User->find('list');
		$organizations = $this->Activity->Organization->find('list');
		$contacts = $this->Activity->Contact->find('list');
		$interactions = $this->Activity->Interaction->find('list');
		$tasks = $this->Activity->Task->find('list');
		$posts = $this->Activity->Post->find('list');
		$comments = $this->Activity->Comment->find('list');
		$this->set(compact('users', 'organizations', 'contacts', 'interactions', 'tasks', 'posts', 'comments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Activity->save($this->request->data)) {
				$this->Flash->success(__('The activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
			$this->request->data = $this->Activity->find('first', $options);
		}
		$users = $this->Activity->User->find('list');
		$organizations = $this->Activity->Organization->find('list');
		$contacts = $this->Activity->Contact->find('list');
		$interactions = $this->Activity->Interaction->find('list');
		$tasks = $this->Activity->Task->find('list');
		$posts = $this->Activity->Post->find('list');
		$comments = $this->Activity->Comment->find('list');
		$this->set(compact('users', 'organizations', 'contacts', 'interactions', 'tasks', 'posts', 'comments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Activity->delete()) {
			$this->Flash->success(__('The activity has been deleted.'));
		} else {
			$this->Flash->error(__('The activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
