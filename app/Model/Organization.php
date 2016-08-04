<?php
App::uses('AppModel', 'Model');
/**
 * Organization Model
 *
 * @property User $User
 * @property Activity $Activity
 * @property Contact $Contact
 * @property Interaction $Interaction
 * @property Post $Post
 * @property Proposal $Proposal
 * @property Task $Task
 */
class Organization extends AppModel {


    public $actsAs = array(
        'Search.Searchable'
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

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
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,				
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'street' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 0, 32),
                'message' => 'Please include valid name'
            )
		),
		'street_2' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 0, 32),
                'message' => 'Please include valid name'
            )	
		),
		'city' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'state' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'zip' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'notBlank' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
                'rule' => array('lengthBetween', 10, 18),
                'message' => 'Please include 10 digit number'
            ),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'uniqueEmail' => array(
	            'rule' => 'isUnique',
	        	'message' => 'Email is already taken'
        	),
		),
		'description' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'notes' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
		'timeframe' => array(
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
		'lead_status' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 32),
                'message' => 'Please include valid name'
            )
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		)
	);



/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Interaction' => array(
			'className' => 'Interaction',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Proposal' => array(
			'className' => 'Proposal',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

  public $filterArgs = array(
        'name' => array(
            'type' => 'value'
        ),
        'lead_status' => array(
            'type' => 'value'
        ),
    );



    function saveNewOrganization($organizationDetails, $uname) {

    	//debug($organizationDetails);
		$organizationDataSource = $this->getDataSource();
		$activityDataSource = $this->Activity->getDataSource();

		$organizationDataSource->begin();
		$activityDataSource->begin();

		$userId = $organizationDetails['Organization']['user_id'];
		$orgName = $organizationDetails['Organization']['name'];

		$userName = $uname;

		if ($this->saveAll($organizationDetails)) {

			$orgId = $this->id;
			$activityData = array('Activity' => array('organization_id' => $orgId, 'object_type' => 'Organization', 'method' => 'create', 'organization_name' => $orgName, 'user_name' => $userName, 'user_id' => $userId));

			if ($this->Activity->save($activityData)) {
				$organizationDataSource->commit();
				$activityDataSource->commit();
				return true;
			} else {
				$organizationDataSource->rollback();
				$activityDataSource->rollback();
				return false;	
			}

		} else {
			$organizationDataSource->rollback();
			$activityDataSource->rollback();	
			return false;
		}
	}

}
