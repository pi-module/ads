<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * Module meta
 *
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */

return array(
    'admin' => array(
        'index' => array(
            'label' => __('Ads'),
            'route' => 'admin',
            'controller' => 'index',
            'action' => 'index',
        ),
        'category' => array(
            'label' => __('Category'),
            'route' => 'admin',
            'controller' => 'category',
            'action' => 'index',
        ),
        'logs' => array(
            'label' => __('Logs'),
            'route' => 'admin',
            'controller' => 'logs',
            'action' => 'index',
        ),
        'tools' => array(
            'label' => __('Tools'),
            'route' => 'admin',
            'controller' => 'tools',
            'action' => 'index',
        ),
    ),
);