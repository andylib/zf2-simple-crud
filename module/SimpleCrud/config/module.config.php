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
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'SimpleCrud\Controller\Contact' => 'SimpleCrud\Controller\ContactController',
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
);
