<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Activity $Activity
 * @property User $User
 * @property Organization $Organization
 */
class Post extends AppModel {


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'comment';




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
		'comment' => array(
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

    function saveNewPost($postDetails, $uid, $uname) {

    	//debug($organizationDetails);
		$postDataSource = $this->getDataSource();
		$activityDataSource = $this->Activity->getDataSource();

		$postDataSource->begin();
		$activityDataSource->begin();
		//debug($contactDetails);
		$userId = $uid;
		$userName = $uname;
		//debug($postDetails);
		if ($this->saveAll($postDetails)) {
			//debug('AAA');
			$postId = $this->id;
			$orgId = $postDetails['Post']['organization_id'];
			$currentOrg = $this->Organization->findById($orgId);
			$orgName = $currentOrg['Organization']['name'];
			//$contactName = ($contactDetails['Contact']['first_name'] . ' ' . $contactDetails['Contact']['last_name']);

			$activityData = array('Activity' => array('organization_id' => $orgId, 'post_id' => $postId, 'object_type' => 'Post', 'method' => 'create', 'organization_name' => $orgName, 'user_name' => $userName, 'user_id' => $userId));

			if ($this->Activity->save($activityData)) {
				$postDataSource->commit();
				$activityDataSource->commit();
				return true;
			} else {
				$postDataSource->rollback();
				$activityDataSource->rollback();
				return false;	
			}

		} else {
			$postDataSource->rollback();
			$activityDataSource->rollback();	
			return false;
		}
	}


}
