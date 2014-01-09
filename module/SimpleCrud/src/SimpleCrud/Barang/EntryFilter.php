<?php

namespace SimpleCrud\Barang;

use Zend\InputFilter\InputFilter;

class EntryFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name'     => 'kode',
            'required' => true,
        ));
        
        $this->add(array(
            'name'     => 'nama',
            'required' => true,
        ));
        
        $this->add(array(
            'name'     => 'satuan',
            'required' => true,
        ));
        
        $this->add(array(
            'name'     => 'harga',
            'required' => true,
        ));

    }
}
