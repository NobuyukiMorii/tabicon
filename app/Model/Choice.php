<?php
class Choice extends AppModel {

	public $uses  = array('Site','Choice','Attachment');

    public $recursive = 2;

	public $belongsTo = array(
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'site_id'
		),
	);
}

