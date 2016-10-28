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
return array(
    // Hide from front menu
    'front' => false,
    // Admin side
    'admin' => array(
        'index' => array(
            'label' => _a('Ads'),
            'permission' => array(
                'resource' => 'index',
            ),
            'route' => 'admin',
            'module' => 'ads',
            'controller' => 'index',
            'action' => 'index',
            'pages' => array(
                'index' => array(
                    'label' => _a('Ads'),
                    'permission' => array(
                        'resource' => 'index',
                    ),
                    'route' => 'admin',
                    'module' => 'ads',
                    'controller' => 'index',
                    'action' => 'index',
                ),
                'updateImageWeb' => array(
                    'label' => _a('Image web'),
                    'permission' => array(
                        'resource' => 'index',
                    ),
                    'route' => 'admin',
                    'module' => 'ads',
                    'controller' => 'index',
                    'action' => 'update',
                    'params'        => array(
                        'type' => 'image',
                        'device' => 'web',
                    ),
                ),
                'updateHtmlWeb' => array(
                    'label' => _a('Html web'),
                    'permission' => array(
                        'resource' => 'index',
                    ),
                    'route' => 'admin',
                    'module' => 'ads',
                    'controller' => 'index',
                    'action' => 'update',
                    'params'        => array(
                        'type' => 'html',
                        'device' => 'web',
                    ),
                ),
                'updateScriptWeb' => array(
                    'label' => _a('Script web'),
                    'permission' => array(
                        'resource' => 'index',
                    ),
                    'route' => 'admin',
                    'module' => 'ads',
                    'controller' => 'index',
                    'action' => 'update',
                    'params'        => array(
                        'type' => 'script',
                        'device' => 'web',
                    ),
                ),
                'updateImageMobile' => array(
                    'label' => _a('Image mobile'),
                    'permission' => array(
                        'resource' => 'index',
                    ),
                    'route' => 'admin',
                    'module' => 'ads',
                    'controller' => 'index',
                    'action' => 'update',
                    'params'        => array(
                        'type' => 'image',
                        'device' => 'mobile',
                    ),
                ),
            ),
        ),
        'category' => array(
            'label' => _a('Category'),
            'permission' => array(
                'resource' => 'category',
            ),
            'route' => 'admin',
            'module' => 'ads',
            'controller' => 'category',
            'action' => 'index',
        ),
        'view' => array(
            'label' => _a('View log'),
            'permission' => array(
                'resource' => 'log',
            ),
            'route' => 'admin',
            'module' => 'ads',
            'controller' => 'log',
            'action' => 'view',
        ),
        'click' => array(
            'label' => _a('Click log'),
            'permission' => array(
                'resource' => 'log',
            ),
            'route' => 'admin',
            'module' => 'ads',
            'controller' => 'log',
            'action' => 'click',
        ),
    ),
);