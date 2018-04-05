<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
return [
    // Hide from front menu
    'front' => false,
    // Admin side
    'admin' => [
        'index'    => [
            'label'      => _a('Ads'),
            'permission' => [
                'resource' => 'index',
            ],
            'route'      => 'admin',
            'module'     => 'ads',
            'controller' => 'index',
            'action'     => 'index',
            'pages'      => [
                'index'             => [
                    'label'      => _a('Ads'),
                    'permission' => [
                        'resource' => 'index',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'index',
                    'action'     => 'index',
                ],
                'updateImageWeb'    => [
                    'label'      => _a('Image web'),
                    'permission' => [
                        'resource' => 'index',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'index',
                    'action'     => 'update',
                    'params'     => [
                        'type'   => 'image',
                        'device' => 'web',
                    ],
                ],
                'updateLinkWeb'    => [
                    'label'      => _a('Link web'),
                    'permission' => [
                        'resource' => 'index',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'index',
                    'action'     => 'update',
                    'params'     => [
                        'type'   => 'link',
                        'device' => 'web',
                    ],
                ],
                'updateHtmlWeb'     => [
                    'label'      => _a('Html web'),
                    'permission' => [
                        'resource' => 'index',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'index',
                    'action'     => 'update',
                    'params'     => [
                        'type'   => 'html',
                        'device' => 'web',
                    ],
                ],
                'updateScriptWeb'   => [
                    'label'      => _a('Script web'),
                    'permission' => [
                        'resource' => 'index',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'index',
                    'action'     => 'update',
                    'params'     => [
                        'type'   => 'script',
                        'device' => 'web',
                    ],
                ],
                'updateImageMobile' => [
                    'label'      => _a('Image mobile'),
                    'permission' => [
                        'resource' => 'index',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'index',
                    'action'     => 'update',
                    'params'     => [
                        'type'   => 'image',
                        'device' => 'mobile',
                    ],
                ],
            ],
        ],
        'category' => [
            'label'      => _a('Category'),
            'permission' => [
                'resource' => 'category',
            ],
            'route'      => 'admin',
            'module'     => 'ads',
            'controller' => 'category',
            'action'     => 'index',
            'pages'      => [
                'index'             => [
                    'label'      => _a('Category'),
                    'permission' => [
                        'resource' => 'category',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'category',
                    'action'     => 'index',
                ],
                'manage'    => [
                    'label'      => _a('Category'),
                    'permission' => [
                        'resource' => 'category',
                    ],
                    'route'      => 'admin',
                    'module'     => 'ads',
                    'controller' => 'category',
                    'action'     => 'update',
                ],
            ],
        ],
        'view'     => [
            'label'      => _a('View log'),
            'permission' => [
                'resource' => 'log',
            ],
            'route'      => 'admin',
            'module'     => 'ads',
            'controller' => 'log',
            'action'     => 'view',
        ],
        'click'    => [
            'label'      => _a('Click log'),
            'permission' => [
                'resource' => 'log',
            ],
            'route'      => 'admin',
            'module'     => 'ads',
            'controller' => 'log',
            'action'     => 'click',
        ],
    ],
];