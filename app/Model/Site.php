<?php
class Site extends AppModel {
    public $hasMany = array(
        'Image' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
        ),
    );
}