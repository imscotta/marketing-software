<?php
App::uses('AppModel', 'Model');
/**
 * Proposal Model
 *
 * @property User $User
 * @property Organization $Organization
 */
class Proposal extends AppModel {


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
		'supermarket_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'notBlank' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'supermarket_id' => array(
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
		'description' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),	
			'between' => array(
                'rule' => array('lengthBetween', 2, 128),
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
		'payment_status' => array(
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
			'foreignKey' => 'post_id',
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
        'payment_status' => array(
            'type' => 'value'
        ),
    );

    function saveNewProposal($proposalDetails, $uid, $uname) {

    	//debug($organizationDetails);
		$proposalDataSource = $this->getDataSource();
		$activityDataSource = $this->Activity->getDataSource();

		$proposalDataSource->begin();
		$activityDataSource->begin();
		//debug($contactDetails);
		$userId = $uid;
		$userName = $uname;
		//debug($proposalDetails);
		if ($this->saveAll($proposalDetails)) {
			//debug('AAA');
			$proposalId = $this->id;
			$orgId = $proposalDetails['Proposal']['organization_id'];
			$currentOrg = $this->Organization->findById($orgId);
			$orgName = $currentOrg['Organization']['name'];
			//$contactName = ($contactDetails['Contact']['first_name'] . ' ' . $contactDetails['Contact']['last_name']);

			$activityData = array('Activity' => array('organization_id' => $orgId, 'proposal_id' => $proposalId, 'object_type' => 'Proposal', 'method' => 'create', 'organization_name' => $orgName, 'user_name' => $userName, 'user_id' => $userId));

			if ($this->Activity->save($activityData)) {
				$proposalDataSource->commit();
				$activityDataSource->commit();
				return true;
			} else {
				$proposalDataSource->rollback();
				$activityDataSource->rollback();
				return false;	
			}

		} else {
			$proposalDataSource->rollback();
			$activityDataSource->rollback();	
			return false;
		}
	}

	
}
