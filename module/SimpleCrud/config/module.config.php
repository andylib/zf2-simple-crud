<?php

return array(
    'router' => array(
        'routes' => array(
            'simple-crud' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/crud',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SimpleCrud\Controller',
                        'controller' => 'Contact',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),  
                            'defaults' => array(
                            ),  
                        ),  
                    ),  
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'SimpleCrud\Controller\Contact' => 'SimpleCrud\Controller\ContactController',
            'SimpleCrud\Controller\Barang'  => 'SimpleCrud\Barang\BarangController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'simple-crud/contact/index' => __DIR__ . '/../view/simple-crud/contact/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'simple_crud_mapping' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/doctrine-mappings',
                ),  
            ),  

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're do\ing
            'orm_default' => array(
                'drivers' => array(
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'SimpleCrud' => 'simple_crud_mapping',
                )   
            )   
        )   
    ),
);
