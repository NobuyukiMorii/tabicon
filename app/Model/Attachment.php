<?php
class Attachment extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'photo_site' => array(
                'thumbnailSizes' => array(
                	'thumb80' => '80x80',
                    'thumb150' => '150x150',
                    'thumb200' => '200x200',
                    'thumb250' => '250x250',
                    'thumb300' => '300x300',
                    'thumb400' => '400x400',
                ),
                'thumbnailMethod' => 'php',
                'fields' => array('dir' => 'dir', 'type' => 'type', 'size' => 'size'),
                'mimetypes' => array('image/jpeg', 'image/gif', 'image/png'),
                'extensions' => array('jpg', 'jpeg', 'JPG', 'JPEG', 'gif', 'GIF', 'png', 'PNG'),
                'maxSize' => 2097152, //2MB
            ),
        ),
    );

    public $belongsTo = array(
        'Site' => array(
            'className' => 'Site',
            'foreignKey' => 'foreign_key',
        ),
    );
}
?>