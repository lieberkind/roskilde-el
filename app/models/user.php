<?php
class User extends AppModel {

	var $name = 'User';

	// Ties roles to ACL, so each time a new user is added, it's also added to the AROS table	
	var $actsAs = array('Acl' => 'requester');

	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => 'notEmpty',
				'message' => 'Du skal angive et navn',
				'allowEmpty' => false,
			)
		),
		'username' => array(
			'email' => array(
				'rule' => array('email', true),
				'message' => 'Den angivne e-mail er ikke en gyldig e-mail adresse',
				'allowEmpty' => false,
				'required' => false
			),
			'isunique' => array(
				'rule' => 'isUnique',
				'message' => 'Der eksisterer allerede en anden bruger med samme e-mail. Vælg venligst et andet.'
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Adgangskoden må ikke være tom',
				'allowEmpty' => false
			),
		),
		'role_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Brugeren skal være tilknyttet en rolle',
				'allowEmpty' => false
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'user_id',
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
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'user_id',
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
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'user_id',
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
	
	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    $data = $this->data;
	    if (empty($this->data)) {
	        $data = $this->read();
	    }
	    if (!$data['User']['role_id']) {
	        return null;
	    } else {
	        return array('Role' => array('id' => $data['User']['role_id']));
	    }
	}
	
	function afterSave($created) {
        if (!$created) {
            $parent = $this->parentNode();
            $parent = $this->node($parent);
            $node = $this->node();
            $aro = $node[0];
            $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
            $this->Aro->save($aro);
        }
	}
	
	/* function afterDelete() {

		$id = $this->read('id');
		$projects = $this->Project->find('all', array('conditions' => array('Project.user_id' => $id)));
		
		foreach($projects as $project) {
			$this->Project->id = $project['Project']['id'];
			$this->Project->set('user_id', 0);
	        $this->Project->save(array('validate' => false));
		}
	} */		
}
?>