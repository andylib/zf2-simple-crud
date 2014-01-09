<?php

namespace SimpleCrud\Barang;

use Zend\Form\Form;

class EntryForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }
    
    public function init()
    {
        $this->add(array(
            'type' => 'Text',
            'name' => 'kode',
            'options' => array(
                'label' => 'Kode Barang',
                'column-size' => 'sm-6',
                'label_attributes' => array(
                    'class' => 'col-sm-2',
                ),
            ),
            'attributes' => array(
                'placeholder' => 'masukkan kode barang, seperti : ABCD',
            ),
        ));
        
        $this->add(array(
            'type' => 'Text',
            'name' => 'nama',
            'options' => array(
                'label' => 'Nama Barang',
                'column-size' => 'sm-6',
                'label_attributes' => array(
                    'class' => 'col-sm-2',
                ),
            ),
            'attributes' => array(
                'placeholder' => 'masukkan nama barang, seperti : Bulpen',
            ),
        ));

        $this->add(array(
            'type' => 'Text',
            'name' => 'satuan',
            'options' => array(
                'label' => 'Satuan Barang',
                'column-size' => 'sm-6',
                'label_attributes' => array(
                    'class' => 'col-sm-2',
                ),
            ),
            'attributes' => array(
                'placeholder' => 'masukkan satuan barang, seperti : pcs, box',
            ),
        ));

        $this->add(array(
            'type' => 'Text',
            'name' => 'harga',
            'options' => array(
                'label' => 'Harga Barang',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2',
                ),
            ),
            'attributes' => array(
                'placeholder' => 'masukkan harga barang, seperti : 10000',
            ),
        ));
        
        $this->add(array(
            'type' => 'Text',
            'name' => 'keterangan',
            'options' => array(
                'label' => 'Keterangan',
                'column-size' => 'sm-6',
                'label_attributes' => array(
                    'class' => 'col-sm-2',
                ),
            ),
            'attributes' => array(
            ),
        ));


        $this->add(array(
            'type' => 'button',
            'name' => 'submit',
            'options' => array(
                'label' => 'Submit',
                'column-size' => 'sm-10 col-sm-offset-2',
            ),
            'attributes' => array(
                'type'  => 'submit',
                'class'  => 'btn-primary',
            ),
        ));
    }
}
