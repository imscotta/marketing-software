<?php
App::uses('AppModel', 'Model');
/**
 * Interaction Model
 *
 * @property Activity $Activity
 * @property User $User
 * @property Organization $Organization
 * @property Contact $Contact
 * @property Task $Task
 */
class Interaction extends AppModel {


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'type';



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
				'notBlank' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
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
                'rule' => array('lengthBetween', 2, 256),
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
			'foreignKey' => 'interaction_id',
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
		),
	);



    function saveNewInteraction($interactionDetails, $uid, $uname) {

    	//debug($organizationDetails);
		$interactionDataSource = $this->getDataSource();
		$activityDataSource = $this->Activity->getDataSource();

		$interactionDataSource->begin();
		$activityDataSource->begin();
		//debug($contactDetails);
		$userId = $uid;
		$userName = $uname;
		//debug($interactionDetails);
		if ($this->saveAll($interactionDetails)) {
			//debug('AAA');
			$interactionId = $this->id;
			$orgId = $interactionDetails['Interaction']['organization_id'];
			$currentOrg = $this->Organization->findById($orgId);
			$orgName = $currentOrg['Organization']['name'];
			//$contactName = ($contactDetails['Contact']['first_name'] . ' ' . $contactDetails['Contact']['last_name']);

			$activityData = array('Activity' => array('organization_id' => $orgId, 'interaction_id' => $interactionId, 'object_type' => 'Interaction', 'method' => 'create', 'organization_name' => $orgName, 'user_name' => $userName, 'user_id' => $userId));

			if ($this->Activity->save($activityData)) {
				$interactionDataSource->commit();
				$activityDataSource->commit();
				return true;
			} else {
				$interactionDataSource->rollback();
				$activityDataSource->rollback();
				return false;	
			}

		} else {
			$interactionDataSource->rollback();
			$activityDataSource->rollback();	
			return false;
		}
	}





}
