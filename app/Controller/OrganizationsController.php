<?php
App::uses('AppController', 'Controller');
/**
 * Organizations Controller
 *
 * @property Organization $Organization
 * @property PaginatorComponent $Paginator
 */
class OrganizationsController extends AppController {

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

		$dispensaryTotal = $this->Organization->find('count');
   		if (!(isset($dispensaryTotal))) {
   			$dispensaryTotal = 0;
   		}
		$prospectTotal = $this->Organization->find('count', array(
        	'conditions' => array('Organization.lead_status' => 'Prospect')
   		));
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
    	$this->set(compact('dispensaryTotal', 'prospectTotal', 'leadTotal', 'customerTotal'));



		$this->Organization->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Organization->parseCriteria($this->Prg->parsedParams());
		$this->set('organizations', $this->Paginator->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function prospects() {
		$this->layout = "boots";
		$this->Organization->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Organization->parseCriteria($this->Prg->parsedParams());
	    $this->Paginator->settings = array(
	        'conditions' => array(
	        	'Organization.lead_status' => 'Prospect',
	        	),
	    );
		$this->set('organizations', $this->Paginator->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function leads() {
		$this->layout = "boots";
		$this->Organization->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Organization->parseCriteria($this->Prg->parsedParams());
	    $this->Paginator->settings = array(
	        'conditions' => array(
	        	'Organization.lead_status' => 'Lead',
	        	),
	    );
		$this->set('organizations', $this->Paginator->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function customers() {
		$this->layout = "boots";
		$this->Organization->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Organization->parseCriteria($this->Prg->parsedParams());
	    $this->Paginator->settings = array(
	        'conditions' => array(
	        	'Organization.lead_status' => 'Customer',
	        	),
	    );
		$this->set('organizations', $this->Paginator->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function search() {
		$this->layout = "boots";
		$this->Organization->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Organization->parseCriteria($this->Prg->parsedParams());
		$this->set('organizations', $this->Paginator->paginate());
	}
/**
 * index method
 *
 * @return void
 */
	public function sresults() {
		$this->layout = "boots";
		$this->Organization->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Organization->parseCriteria($this->Prg->parsedParams());
		$this->set('organizations', $this->Paginator->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'boots';
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "boots";
		$uid = $this->Auth->user('id');
		$this->set('userId', $uid);
		$uname = $this->Auth->user('name');

		if ($this->request->is('post')) {
			$this->Organization->create();
			//$this->request->data['Activity'] = array('object_type' => 'Organization');
			if ($this->Organization->saveNewOrganization($this->request->data, $uname)) {
				$this->Flash->success(__('The organization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The organization could not be saved. Please, try again.'));
			}
		}
		$users = $this->Organization->User->find('list');
		$this->set(compact('users'));
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
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Organization->save($this->request->data)) {
				$this->Flash->success(__('The organization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The organization could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}
		$users = $this->Organization->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Organization->delete()) {
			$this->Flash->success(__('The organization has been deleted.'));
		} else {
			$this->Flash->error(__('The organization could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
