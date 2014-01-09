<?php

namespace SimpleCrud\Paginator;

use Zend\Paginator\Paginator as ZendPaginator;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;

class ORMPaginator extends ZendPaginator
{
    public function __construct($query)
    {
        parent::__construct(
            new DoctrinePaginatorAdapter(
                new DoctrinePaginator($query)
            )
        );
    }
}
