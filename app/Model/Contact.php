<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 * @property Organization $Organization
 * @property Activity $Activity
 * @property Interaction $Interaction
 * @property Task $Task
 */
class Contact extends AppModel {

    public $actsAs = array(
        'Search.Searchable'
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';



/**
 * Validation
 *
 */
    public $validate = array(
		'organization_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,				
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
                'rule' => array('lengthBetween', 2, 16),
                'message' => 'Please include valid name'
            )
		),
		'last_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,				
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
                'rule' => array('lengthBetween', 2, 16),
                'message' => 'Please include valid name'
            )
		),
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,				
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
                'rule' => array('lengthBetween', 2, 16),
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
                'rule' => array('lengthBetween', 2, 16),
                'message' => 'Please include valid name'
            )
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
				'required' => false,
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
                'rule' => array('lengthBetween', 2, 128),
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
                'rule' => array('lengthBetween', 2, 128),
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
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
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
			'foreignKey' => 'contact_id',
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
	);



  public $filterArgs = array(
        'first_name' => array(
            'type' => 'value'
        ),
    );




    function saveNewContact($contactDetails, $uid, $uname) {

    	//debug($organizationDetails);
		$contactDataSource = $this->getDataSource();
		$activityDataSource = $this->Activity->getDataSource();

		$contactDataSource->begin();
		$activityDataSource->begin();
		//debug($contactDetails);
		$userId = $uid;
		$userName = $uname;

		if ($this->saveAll($contactDetails)) {

			$contactId = $this->id;
			$orgId = $contactDetails['Contact']['organization_id'];
			$currentOrg = $this->Organization->findById($orgId);
			$orgName = $currentOrg['Organization']['name'];
			$contactName = ($contactDetails['Contact']['first_name'] . ' ' . $contactDetails['Contact']['last_name']);

			$activityData = array('Activity' => array('contact_id' => $contactId, 'organization_id' => $orgId, 'object_type' => 'Contact', 'method' => 'create', 'contact_name' => $contactName, 'organization_name' => $orgName, 'user_name' => $userName, 'user_id' => $userId));

			if ($this->Activity->save($activityData)) {
				$contactDataSource->commit();
				$activityDataSource->commit();
				return true;
			} else {
				$contactDataSource->rollback();
				$activityDataSource->rollback();
				return false;	
			}

		} else {
			$contactDataSource->rollback();
			$activityDataSource->rollback();	
			return false;
		}
	}




}
