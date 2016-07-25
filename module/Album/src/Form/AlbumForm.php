<?php
/**
 * zf3-tutorial - AlbumForm.php
 *
 * @author: Timon Eckert - <timon.eckert@googlemail.com>
 * @since: 7/24/16 - 1:38 PM
 *
 * @copyright: abavo GmbH - <info@abavo.de>
 * @license: Proprietary
 */

namespace Album\Form;


use Zend\Form\Form;

class AlbumForm extends Form
{
    
    public function __construct($name = null)
    {
        parent::__construct('album');
        
        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        
        $this->add([
            'name' => 'artist',
            'type' => 'text',
            'options' => [
                'label' => 'Artist',
            ],
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ],
        ]);
    }
}
