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
    'admin' => array(
        'index' => array(
            'label'         => _a('Ads'),
            'permission'    => array(
                'resource'  => 'index',
            ),
            'route'         => 'admin',
            'module'        => 'ads',
            'controller'    => 'index',
            'action'        => 'index',
        ),
        'category' => array(
            'label'         => _a('Category'),
            'permission'    => array(
                'resource'  => 'category',
            ),
            'route'         => 'admin',
            'module'        => 'ads',
            'controller'    => 'category',
            'action'        => 'index',
        ),
        'view' => array(
            'label'         => _a('View log'),
            'permission'    => array(
                'resource'  => 'log',
            ),
            'route'         => 'admin',
            'module'        => 'ads',
            'controller'    => 'log',
            'action'        => 'view',
        ),
        'click' => array(
            'label'         => _a('Click log'),
            'permission'    => array(
                'resource'  => 'log',
            ),
            'route'         => 'admin',
            'module'        => 'ads',
            'controller'    => 'log',
            'action'        => 'click',
        ),
    ),
);