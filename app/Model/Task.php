<?php
App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 * @property Activity $Activity
 * @property User $User
 * @property Organization $Organization
 */
class Task extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


    public $actsAs = array(
        'Search.Searchable'
    );


/**
 * Validation
 *
 */
    public $validate = array(
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'organization_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'notBlank' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'priority' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'type' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'notes' => array(
			/* 'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			), */	
			'between' => array(
                'rule' => array('lengthBetween', 0, 32),
                'message' => 'Please include valid name'
            )
		),
		'eta' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 1, 32),
                'message' => 'Please include valid name'
            ) 
		),
		'completion_status' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 1, 32),
                'message' => 'Please include valid name'
            ) 
		),
	);




	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'task_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

  public $filterArgs = array(
        'completion_status' => array(
            'type' => 'value'
        ),
        'name' => array(
            'type' => 'value'
        ),
    );


    function saveNewTask($taskDetails, $uid, $uname) {

    	//debug($organizationDetails);
		$taskDataSource = $this->getDataSource();
		$activityDataSource = $this->Activity->getDataSource();

		$taskDataSource->begin();
		$activityDataSource->begin();
		//debug($contactDetails);
		$userId = $uid;
		$userName = $uname;
		//debug($taskDetails);
		if ($this->saveAll($taskDetails)) {
			//debug('AAA');
			$taskId = $this->id;
			$orgId = $taskDetails['Task']['organization_id'];
			$currentOrg = $this->Organization->findById($orgId);
			$orgName = $currentOrg['Organization']['name'];
			//$contactName = ($contactDetails['Contact']['first_name'] . ' ' . $contactDetails['Contact']['last_name']);

			$activityData = array('Activity' => array('organization_id' => $orgId, 'task_id' => $taskId, 'object_type' => 'Task', 'method' => 'create', 'organization_name' => $orgName, 'user_name' => $userName, 'user_id' => $userId));

			if ($this->Activity->save($activityData)) {
				$taskDataSource->commit();
				$activityDataSource->commit();
				return true;
			} else {
				$taskDataSource->rollback();
				$activityDataSource->rollback();
				return false;	
			}

		} else {
			$taskDataSource->rollback();
			$activityDataSource->rollback();	
			return false;
		}
	}

	
}
