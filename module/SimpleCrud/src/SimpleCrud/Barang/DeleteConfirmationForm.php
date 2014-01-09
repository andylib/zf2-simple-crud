<?php

namespace SimpleCrud\Barang;

use Zend\Form\Form;

class DeleteConfirmationForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }
    
    public function init()
    { 
        $this->add(array(
            'type' => 'button',
            'name' => 'yes',
            'options' => array(
                'label' => 'Ya',
            ),
            'attributes' => array(
                'type'  => 'submit',
                'class'  => 'btn-danger',
            ),
        ));
        
        $this->add(array(
            'type' => 'button',
            'name' => 'no',
            'options' => array(
                'label' => 'Tidak',
            ),
            'attributes' => array(
                'id'  => 'btn-no',
                'type'  => 'button',
                'class'  => 'btn-default',
            ),
        ));

    }
}
