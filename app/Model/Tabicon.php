<?php
// 投稿用

App::uses('AppModel', 'TabiconModel');

class Tabicon extends AppModel {

	public $name     = 'Tabicon';
	public $uses	 = array('Tabicon','Attachment');
	public $useTable = 'Tabicon';

	public $hasMany = array(
	            'Attachment'
	);


}
