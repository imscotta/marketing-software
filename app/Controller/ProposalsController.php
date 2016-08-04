<?php
App::uses('AppController', 'Controller');
/**
 * Proposals Controller
 *
 * @property Proposal $Proposal
 * @property PaginatorComponent $Paginator
 */
class ProposalsController extends AppController {

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
		$this->Proposal->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Proposal->parseCriteria($this->Prg->parsedParams());
		$this->set('proposals', $this->Paginator->paginate());
	}

	public function open() {
		$this->layout = "boots";
		$this->Proposal->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Proposal->parseCriteria($this->Prg->parsedParams());
		$this->set('proposals', $this->Paginator->paginate());
	}

	public function paid() {
		$this->layout = "boots";
		$this->Proposal->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Proposal->parseCriteria($this->Prg->parsedParams());
		$this->set('proposals', $this->Paginator->paginate());
	}

	public function search() {
		$this->layout = "boots";
		$this->Proposal->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Proposal->parseCriteria($this->Prg->parsedParams());
		$this->set('proposals', $this->Paginator->paginate());
	}

	public function sresults() {
		$this->layout = "boots";
		$this->Proposal->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Proposal->parseCriteria($this->Prg->parsedParams());
		$this->set('proposals', $this->Paginator->paginate());
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
		if (!$this->Proposal->exists($id)) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		$options = array('conditions' => array('Proposal.' . $this->Proposal->primaryKey => $id));
		$this->set('proposal', $this->Proposal->find('first', $options));
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
			$this->Proposal->create();
			if ($this->Proposal->saveNewProposal($this->request->data, $uid, $uname)) {
				$this->Flash->success(__('The proposal has been saved.'));
				return $this->redirect(array('controller' => 'Organizations', 'action' => 'view', $id));
			} else {
				$this->Flash->error(__('The proposal could not be saved. Please, try again.'));
			}
		}
		$users = $this->Proposal->User->find('list');
		$organizations = $this->Proposal->Organization->find('list');
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
		if (!$this->Proposal->exists($id)) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Proposal->save($this->request->data)) {
				$this->Flash->success(__('The proposal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The proposal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Proposal.' . $this->Proposal->primaryKey => $id));
			$this->request->data = $this->Proposal->find('first', $options);
		}
		$users = $this->Proposal->User->find('list');
		$organizations = $this->Proposal->Organization->find('list');
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
		$this->Proposal->id = $id;
		if (!$this->Proposal->exists()) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Proposal->delete()) {
			$this->Flash->success(__('The proposal has been deleted.'));
		} else {
			$this->Flash->error(__('The proposal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
