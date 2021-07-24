<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

return [
    'router' => [
        'routes' => [
            'literal' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'Controller' => \Magento\Setup\Controller\Index::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'setup' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '[/:Controller[/:action]]',
                    'defaults' => [
                        '__NAMESPACE__' => 'Magento\Setup\Controller',
                        'Controller'    => 'Index',
                        'action'        => 'index',
                    ],
                    'constraints' => [
                        'Controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
        ],
    ],
];
